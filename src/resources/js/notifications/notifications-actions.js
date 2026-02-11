import { NotificationsAPI } from '../api/notificationsAPI.js';

/**
 * Acciones de notificaciones (marcar como leída/no leída)
 * Refactorizado para usar NotificationsAPI
 */

/**
 * Helper: obtiene la tabla DataTable según el guard
 */
function getNotificationTable(guard) {
    const tableId = guard === 'admin'
        ? '#tabla-notificaciones-admin'
        : '#tabla-notificaciones-usuario';
    
    return $(tableId).DataTable();
}

/**
 * Helper: crea una instancia de API según el guard
 */
function getNotificationAPI(guard) {
    return new NotificationsAPI(guard);
}


$(document).on('click', '.mark-as-read', async function () {
    const notificationId = $(this).data('id');
    const guard = $(this).data('guard') || 'user';

    const api = getNotificationAPI(guard);
    const table = getNotificationTable(guard);

    try {
        await api.markAsRead(notificationId);
        table.ajax.reload(null, false); // Recarga sin resetear página
    } catch (error) {
        console.error('Error al marcar como leída:', error);
        alert('Error al actualizar notificación');
    }
});


$(document).on('click', '.mark-as-unread', async function () {
    const notificationId = $(this).data('id');
    const guard = $(this).data('guard') || 'user';

    const api = getNotificationAPI(guard);
    const table = getNotificationTable(guard);

    try {
        await api.markAsUnread(notificationId);
        table.ajax.reload(null, false);
    } catch (error) {
        console.error('Error al marcar como no leída:', error);
        alert('Error al actualizar notificación');
    }
});