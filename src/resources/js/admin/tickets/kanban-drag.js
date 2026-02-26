'use strict';

import { syncEmptyState, updateColumnCount } from './kanban-utils.js';

export function initKanbanDrag() {
    const root = document.getElementById('view-section-kanban');
    if (!root) return;

    const updateUrlTemplate = root.dataset.updateUrl;
    const csrf    = document.querySelector('meta[name="csrf-token"]').content;
    let dragged   = null;

    root.addEventListener('dragstart', event => {
        const card = event.target.closest('.kanban-card');
        if (!card) return;
        dragged = card;
        card.classList.add('opacity-50');
    });

    root.addEventListener('dragend', event => {
        const card = event.target.closest('.kanban-card');
        if (!card) return;
        card.classList.remove('opacity-50');
        dragged = null;
    });

    root.querySelectorAll('.kanban-column-body').forEach(col => {
        col.style.minHeight = '180px';
        syncEmptyState(col);
        updateColumnCount(col);

        col.addEventListener('dragover',  e => { e.preventDefault(); col.classList.add('border', 'border-primary'); });
        col.addEventListener('dragleave', () => col.classList.remove('border', 'border-primary'));
        col.addEventListener('drop', async e => {
            e.preventDefault();
            col.classList.remove('border', 'border-primary');

            const newStatus = col.dataset.status;
            if (!dragged || dragged.dataset.status === newStatus) return;

            const oldCol = dragged.closest('.kanban-column-body');
            if (!oldCol) return;
            const oldStatus = dragged.dataset.status;

            col.prepend(dragged);
            dragged.dataset.status = newStatus;
            syncEmptyState(oldCol);
            syncEmptyState(col);
            updateColumnCount(oldCol);
            updateColumnCount(col);

            const url = updateUrlTemplate.replace('__TICKET__', dragged.dataset.ticketId);

            try {
                const response = await fetch(url, {
                    method:  'PATCH',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                    body:    JSON.stringify({ status: newStatus }),
                    credentials: 'same-origin',
                });

                if (!response.ok) {
                    throw new Error('Status update failed');
                }
            } catch (_) {
                oldCol.prepend(dragged);
                dragged.dataset.status = oldStatus;
                syncEmptyState(oldCol);
                syncEmptyState(col);
                updateColumnCount(oldCol);
                updateColumnCount(col);
                if (root.dataset.errorMsg) window.alert(root.dataset.errorMsg);
            }
        });
    });
}