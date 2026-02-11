/**
 * Componente Modal para mostrar notificaciones
 * Accede a raw_data del backend
 * Renderiza contenido según tipo
 */
export class NotificationModal {
    constructor(modalSelector = '#notificationModal') {
        this.modal = document.querySelector(modalSelector);
        this.titleElement = this.modal?.querySelector('.modal-title');
        this.detailsContainer = this.modal?.querySelector('[data-notification-details]');
        
        if (!this.modal) {
            console.warn(`Modal no encontrado: ${modalSelector}`);
            return;
        }
    }

    /**
     * Muestra una notificación en el modal
     * @param {Object} notification - Objeto con data de NotificationService
     */
    show(notification) {
        if (!this.modal || !this.detailsContainer) {
            console.error('Modal no configurado');
            return;
        }

        console.log('Notificación completa:', notification);
        console.log('Raw data:', notification.raw_data);

        // Establecer título
        if (this.titleElement) {
            this.titleElement.textContent = notification.message || 'Notificación';
        }

        // Renderizar contenido
        this.detailsContainer.innerHTML = this.renderContent(notification);

        // Mostrar modal
        $(this.modal).modal('show');
    }

    /**
     * Cierra el modal
     */
    close() {
        $(this.modal).modal('hide');
    }

    /**
     * Renderiza el contenido completo
     */
    renderContent(notification) {
        const typeSpecific = this.renderTypeSpecificContent(notification);
        const actionButton = notification.link ? this.renderActionButton(notification.link) : '';

        return `
            <div class="notification-content">
                <div class="lead">${notification.content}</div>
                
                <hr>
                
                ${typeSpecific}
                
                <hr>
                
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                        <i class="far fa-clock"></i> 
                        <span class="ms-1">Fecha:</span>
                        <strong>${notification.created_at}</strong>
                    </div>
                    ${actionButton}
                </div>
            </div>
        `;
    }

    /**
     * RENDERIZA DATOS ESPECÍFICOS SEGÚN TIPO
     * Accede a raw_data que viene del backend
     */
    renderTypeSpecificContent(notification) {
        const { type } = notification;
        const data = notification.raw_data || {}; // ACCEDE A raw_data

        console.log(`Tipo: ${type}`, data);

        switch (type) {
            case 'created':
                return this.renderCreated(data);

            case 'comment':
                return this.renderComment(data);

            case 'status':
                return this.renderStatus(data);

            case 'closed':
                return this.renderClosed(data);

            case 'reopened':
                return this.renderReopened(data);

            default:
                return `<div class="alert alert-secondary mt-3">Notificación sin detalles adicionales</div>`;
        }
    }

    /**
     * Renderiza cuando un ticket es CREADO
     */
    renderCreated(data) {
        return `
            <div class=">
                <p>
                    <strong>Creado por:</strong> 
                    ${data.created_by || data.author || 'Usuario desconocido'}
                </p>
                <p class="mb-0">
                    <strong>Ticket:</strong> 
                    <em>"${data.title || 'Sin título'}"</em>
                </p>
            </div>
        `;
    }

    /**
     * Renderiza cuando se COMENTA
     */
    renderComment(data) {
        return `
            <div>
                <p>
                    <strong>Comentario de:</strong> 
                    ${data.author || 'Usuario desconocido'}
                </p>
                <p>
                    <strong>En ticket:</strong> 
                    <em>${data.ticket_title || 'Sin título'}</em>
                </p>
                <p><strong>Comentario: </strong>${data.comment || 'Sin contenido'}</p>
            </div>
        `;
    }

    /**
     * Renderiza cuando cambia el ESTADO
     */
    renderStatus(data) {
        return `
            <div>
                <p>
                    <strong>Ticket:</strong> 
                    <em>"${data.title || 'Sin título'}"</em>
                </p>
                <p>
                    <strong>Nuevo estado:</strong> 
                    <span class="badge bg-primary">${data.status || 'Desconocido'}</span>
                </p>
                <p>
                    <strong>Prioridad:</strong> 
                    ${data.priority || 'Normal'}
                </p>
                <p class="mb-0">
                    <strong>Actualizado por:</strong> 
                    ${data.updated_by || 'Desconocido'}
                </p>
            </div>
        `;
    }

    /**
     * Renderiza cuando un ticket es CERRADO
     */
    renderClosed(data) {
        return `
            <div">
                <p>
                    <strong>Ticket cerrado:</strong> 
                    <em>"${data.title || 'Sin título'}"</em>
                </p>
                <p class="mb-0">
                    <strong>Cerrado por:</strong> 
                    ${data.closed_by || 'Desconocido'}
                </p>
            </div>
        `;
    }

    /**
     * Renderiza cuando un ticket es REABIERTO
     */
    renderReopened(data) {
        return `
            <div>
                <p>
                    <strong>Ticket reabierto:</strong> 
                    <em>"${data.title || 'Sin título'}"</em>
                </p>
                <p class="mb-0">
                    <strong>Reabierto por:</strong> 
                    ${data.reopened_by || data.author || 'Desconocido'}
                </p>
            </div>
        `;
    }

    /**
     * Renderiza botón de acción
     */
    renderActionButton(link) {
        return `
            <a href="${link}" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-ticket-alt"></i> Ver Ticket
            </a>
        `;
    }
}