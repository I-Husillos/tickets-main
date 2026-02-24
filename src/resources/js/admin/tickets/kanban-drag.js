'use strict';

export function initKanbanDrag() {
    const root = document.getElementById('view-section-kanban');
    if (!root) return;

    // baseUrl = URL de admin.kanban, ej: http://localhost:8080/es/administrador/kanban
    // El JS añade /{ticketId}/estado para construir la URL del PATCH
    const baseUrl  = root.dataset.updateUrl.replace(/\/$/, '');
    const suffix   = root.dataset.updateSuffix;   // "estado" o "status" según locale
    const csrf     = document.querySelector('meta[name="csrf-token"]').content;
    let dragged    = null;

    root.querySelectorAll('.kanban-card').forEach(card => {
        card.addEventListener('dragstart', () => { dragged = card; card.classList.add('opacity-50'); });
        card.addEventListener('dragend',   () => { card.classList.remove('opacity-50'); });
    });

    root.querySelectorAll('.kanban-column-body').forEach(col => {
        col.addEventListener('dragover',  e => { e.preventDefault(); col.classList.add('border', 'border-primary'); });
        col.addEventListener('dragleave', () => col.classList.remove('border', 'border-primary'));
        col.addEventListener('drop', async e => {
            e.preventDefault();
            col.classList.remove('border', 'border-primary');

            const newStatus = col.dataset.status;
            if (!dragged || dragged.dataset.status === newStatus) return;

            col.querySelector('.kanban-empty')?.remove();
            col.prepend(dragged);
            dragged.dataset.status = newStatus;

            const url = `${baseUrl}/${dragged.dataset.ticketId}/${suffix}`;

            await fetch(url, {
                method:  'PATCH',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' },
                body:    JSON.stringify({ status: newStatus }),
            });
        });
    });
}