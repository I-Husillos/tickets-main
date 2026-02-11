import { NotificationsAPI } from '../api/notificationsAPI.js';
import { NotificationModal } from '../components/NotificationModal.js';

/**
 * Manejador de modal para notificaciones de admin
 * Refactorizado para usar NotificationsAPI y NotificationModal
 */

const api = new NotificationsAPI('admin');
const modal = new NotificationModal('#notificationModal');

document.addEventListener('DOMContentLoaded', () => {
    // Delegado: mostrar notificación
    $(document).on('click', '.show-notification-btn', async function () {
        const notificationId = $(this).data('id');

        try {
            const response = await api.getById(notificationId);
            modal.show(response.data);
        } catch (error) {
            console.error('Error:', error);
            alert('No se pudo cargar el detalle de la notificación.');
        }
    });
});