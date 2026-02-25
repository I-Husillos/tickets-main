const PRIORITY_CLASSES = {
    low: 'success',
    medium: 'info',
    high: 'warning',
    critical: 'danger',
};

function escapeHtml(value) {
    return String(value ?? '')
        .replaceAll('&', '&amp;')
        .replaceAll('<', '&lt;')
        .replaceAll('>', '&gt;')
        .replaceAll('"', '&quot;')
        .replaceAll("'", '&#039;');
}

function updateColumnCount(column, total) {
    const badge = column.closest('.card')?.querySelector('.kanban-count');
    if (badge) {
        badge.textContent = String(total ?? 0);
    }
}

function removeLoadMoreButton(column) {
    const button = column.querySelector('.kanban-load-more');
    if (button) {
        button.remove();
    }
}

function createLoadMoreButton(label, onClick) {
    const button = document.createElement('button');
    button.type = 'button';
    button.className = 'btn btn-outline-secondary btn-sm btn-block mt-2 kanban-load-more';
    button.textContent = label;
    button.addEventListener('click', onClick);
    return button;
}

function createEmptyPlaceholder() {
    const empty = document.createElement('p');
    empty.className = 'text-muted text-center small py-3 kanban-empty';
    empty.textContent = '—';
    return empty;
}

function createCard(ticket, status, unassignedLabel) {
    const ownerName = ticket.user_name || ticket.created_by_admin_name || unassignedLabel;
    const ownerIcon = ticket.user_name ? 'fa-user' : 'fa-user-shield';
    const priorityClass = PRIORITY_CLASSES[ticket.priority] || 'secondary';

    const tagsHtml = Array.isArray(ticket.tags)
        ? ticket.tags.map(tag => `<span class="badge badge-info small">${escapeHtml(tag)}</span>`).join(' ')
        : '';

    const projectHtml = ticket.project
        ? `<div class="mb-1">
                <span class="badge badge-secondary small">
                    <i class="fas fa-project-diagram"></i> ${escapeHtml(ticket.project)}
                </span>
           </div>`
        : '';

    const card = document.createElement('div');
    card.className = 'card mb-2 shadow-sm kanban-card';
    card.draggable = true;
    card.dataset.ticketId = String(ticket.id);
    card.dataset.status = status;

    card.innerHTML = `
        <div class="card-body p-2">
            <div class="d-flex justify-content-between align-items-start mb-1">
                <a href="${escapeHtml(ticket.view_url)}" class="font-weight-bold text-dark small">
                    ${escapeHtml(ticket.title)}
                </a>
                <span class="badge badge-${priorityClass} small">${escapeHtml(ticket.priority)}</span>
            </div>
            ${projectHtml}
            ${tagsHtml ? `<div class="mb-1">${tagsHtml}</div>` : ''}
            <div class="text-muted small">
                <i class="fas ${ownerIcon}"></i> ${escapeHtml(ownerName)}
            </div>
        </div>
    `;

    return card;
}

export function initKanbanLoader(token) {
    const root = document.getElementById('view-section-kanban');
    if (!root || !token) return;

    const apiUrl = root.dataset.apiUrl;
    if (!apiUrl) return;

    const locale = document.documentElement.lang || 'en';
    const perPage = Number(root.dataset.perPage || 50);
    const unassignedLabel = root.dataset.unassignedLabel || 'Unassigned';
    const loadingLabel = root.dataset.loadingLabel || 'Loading...';
    const loadMoreLabel = root.dataset.loadMoreLabel || 'Load more';

    const columns = Array.from(root.querySelectorAll('.kanban-column-body'));
    const stateByStatus = new Map();

    columns.forEach(column => {
        const status = column.dataset.status;
        if (!status) return;
        stateByStatus.set(status, { page: 0, lastPage: 1, total: 0, loading: false });
    });

    async function loadColumn(status, append = false) {
        const column = columns.find(col => col.dataset.status === status);
        if (!column) return;

        const state = stateByStatus.get(status);
        if (!state || state.loading) return;

        const nextPage = append ? state.page + 1 : 1;
        if (append && state.page >= state.lastPage) return;

        state.loading = true;
        removeLoadMoreButton(column);

        if (!append) {
            column.innerHTML = `<p class="text-muted text-center small py-3 kanban-empty">${escapeHtml(loadingLabel)}</p>`;
        }

        const params = new URLSearchParams({
            status,
            page: String(nextPage),
            per_page: String(perPage),
            locale,
        });

        try {
            const response = await fetch(`${apiUrl}?${params.toString()}`, {
                headers: {
                    Accept: 'application/json',
                    Authorization: `Bearer ${token}`,
                    'X-Locale': locale,
                },
                credentials: 'same-origin',
            });

            if (!response.ok) {
                throw new Error(`Kanban API error (${response.status})`);
            }

            const payload = await response.json();
            const tickets = Array.isArray(payload.data) ? payload.data : [];
            const meta = payload.meta || {};

            if (!append) {
                column.innerHTML = '';
            }

            if (!tickets.length && !append) {
                column.appendChild(createEmptyPlaceholder());
            } else {
                tickets.forEach(ticket => {
                    column.appendChild(createCard(ticket, status, unassignedLabel));
                });
            }

            state.page = Number(meta.current_page || nextPage);
            state.lastPage = Number(meta.last_page || state.page);
            state.total = Number(meta.total || 0);

            updateColumnCount(column, state.total);

            if (state.page < state.lastPage) {
                column.appendChild(createLoadMoreButton(loadMoreLabel, () => loadColumn(status, true)));
            }
        } catch (error) {
            console.error(error);
            if (!append) {
                column.innerHTML = '';
                column.appendChild(createEmptyPlaceholder());
            }
        } finally {
            state.loading = false;
        }
    }

    columns.forEach(column => {
        const status = column.dataset.status;
        if (status) {
            loadColumn(status, false);
        }
    });
}
