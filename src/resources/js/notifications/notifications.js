import { NotificationsAPI } from '../api/notificationsAPI.js';
import { NotificationModal } from '../components/NotificationModal.js';

/**
 * Manejador de modal para notificaciones de usuario
 * Refactorizado para usar NotificationsAPI y NotificationModal
 */

const userType = window.location.pathname.includes('/admin') ? 'admin' : 'user';
const api = new NotificationsAPI(userType);
const modal = new NotificationModal('#notificationModal');

document.addEventListener('DOMContentLoaded', () => {
    // Delegado: mostrar notificación
    $(document).on('click', '.show-notification', async function () {
        const notificationId = $(this).data('id');
        const locale = $(this).data('locale') || document.documentElement.lang || 'es';

        try {
            const response = await api.getById(notificationId);
            modal.show(response.data);
        } catch (error) {
            console.error('Error:', error);
            alert('Error al cargar la notificación si');
        }
    });

    // Ir al ticket desde modal
    $(document).on('click', '.go-to-ticket', function () {
        const link = $(this).data('link');
        if (link) {
            window.location.href = link;
        }
    });
});