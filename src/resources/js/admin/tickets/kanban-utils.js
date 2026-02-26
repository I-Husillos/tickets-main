/**
 * Shared utilities for Kanban functionality
 * Centralizes common DOM operations and state management
 */
'use strict';

export function createEmptyPlaceholder() {
    const placeholder = document.createElement('p');
    placeholder.className = 'text-muted text-center small py-3 kanban-empty';
    placeholder.textContent = '—';
    return placeholder;
}

export function updateColumnCount(column) {
    const card = column.closest('.card');
    const badge = card?.querySelector('.kanban-count');
    if (!badge) return;
    badge.textContent = String(column.querySelectorAll('.kanban-card').length);
}

export function syncEmptyState(column) {
    const hasCards = column.querySelector('.kanban-card');
    const empty = column.querySelector('.kanban-empty');

    if (!hasCards && !empty) {
        column.appendChild(createEmptyPlaceholder());
    }

    if (hasCards && empty) {
        empty.remove();
    }
}

export function removeLoadMoreButton(column) {
    const button = column.querySelector('.kanban-load-more');
    if (button) {
        button.remove();
    }
}

export function escapeHtml(value) {
    return String(value ?? '')
        .replaceAll('&', '&amp;')
        .replaceAll('<', '&lt;')
        .replaceAll('>', '&gt;')
        .replaceAll('"', '&quot;')
        .replaceAll("'", '&#039;');
}

export const PRIORITY_CLASSES = {
    low: 'success',
    medium: 'info',
    high: 'warning',
    critical: 'danger',
};
