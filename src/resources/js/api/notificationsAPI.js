/**
 * API Service para Notificaciones
 * Centraliza TODAS las llamadas a notificaciones
 * Independiente de otras APIs
 */
export class NotificationsAPI {
    constructor(guard = 'user') {
        this.guard = guard; // 'user' | 'admin'
        this.baseUrl = `/api/${guard}/notifications`;
        this.token = this.getToken();
    }

    /**
     * Obtiene notificaciones paginadas (para DataTables)
     * @param {Object} params - { draw, start, length, search, type }
     * @returns {Promise<{draw, recordsTotal, recordsFiltered, data}>}
     */
    async fetchPaginated(params = {}) {
        try {
            const queryParams = new URLSearchParams({
                draw: params.draw || 1,
                start: params.start || 0,
                length: params.length || 10,
                type: params.type || '',
                'search[value]': params.search || '',
            });

            const response = await fetch(
                `${this.baseUrl}?${queryParams.toString()}`,
                this.getRequestOptions('GET')
            );

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }

            return await response.json();
        } catch (error) {
            console.error('Error fetching notifications:', error);
            throw error;
        }
    }

    /**
     * Obtiene una notificación específica
     * @param {string} notificationId
     * @returns {Promise<{data}>}
     */
    async getById(notificationId) {
        try {
            const response = await fetch(
                `${this.baseUrl}/${notificationId}`,
                this.getRequestOptions('GET')
            );

            if (!response.ok) {
                if (response.status === 404) {
                    throw new Error('Notificación no encontrada');
                }
                throw new Error(`HTTP ${response.status}`);
            }

            return await response.json();
        } catch (error) {
            console.error('Error fetching notification:', error);
            throw error;
        }
    }

    /**
     * Marca como leída
     * @param {string} notificationId
     * @returns {Promise<{message}>}
     */
    async markAsRead(notificationId) {
        return this.updateStatus(notificationId, 'read');
    }

    /**
     * Marca como no leída
     * @param {string} notificationId
     * @returns {Promise<{message}>}
     */
    async markAsUnread(notificationId) {
        return this.updateStatus(notificationId, 'unread');
    }

    /**
     * Actualiza el estado de una notificación
     * @private
     */
    async updateStatus(notificationId, action) {
        try {
            const response = await fetch(
                `${this.baseUrl}/${notificationId}/${action}`,
                this.getRequestOptions('PATCH')
            );

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }

            return await response.json();
        } catch (error) {
            console.error(`Error marking as ${action}:`, error);
            throw error;
        }
    }

    /**
     * Obtiene opciones para fetch() con headers correctos
     * @private
     */
    getRequestOptions(method = 'GET') {
        const locale = document.documentElement.lang || 'es';
        
        return {
            method,
            headers: {
                'Authorization': `Bearer ${this.token}`,
                'Accept': 'application/json',
                'X-Locale': locale,
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json',
            }
        };
    }

    /**
     * Obtiene token del localStorage
     * @private
     */
    getToken() {
        return localStorage.getItem('api_token') || '';
    }

    /**
     * Verifica si hay token válido
     */
    isAuthenticated() {
        return !!this.token;
    }
}