import { NotificationsAPI } from '../api/notifications.js';
import { NotificationModal } from '../components/NotificationModal.js';

/**
 * Tabla DataTables para notificaciones
 * Reutilizable para user y admin
 * Integrada con NotificationsAPI y NotificationModal
 */
export class NotificationsTable {
    constructor(tableSelector, guard = 'user') {
        this.tableElement = document.querySelector(tableSelector);
        this.guard = guard;
        this.api = new NotificationsAPI(guard);
        this.modal = new NotificationModal();
        this.dataTable = null;

        if (!this.tableElement) {
            console.warn(`Tabla no encontrada: ${tableSelector}`);
            return;
        }

        this.init();
    }

    /**
     * Inicializa DataTables
     */
    init() {
        this.dataTable = $(this.tableElement).DataTable({
            processing: true,
            serverSide: true,
            ajax: (request, callback, settings) => {
                this.fetchData(request, callback);
            },
            columns: [
                { data: 'type', className: 'text-center align-middle' },
                { data: 'content', className: 'align-middle' },
                { data: 'created_at', className: 'text-center align-middle' },
                { 
                    data: null, 
                    orderable: false, 
                    searchable: false, 
                    className: 'text-center align-middle',
                    render: (data, type, row) => this.renderActions(row)
                },
            ],
            language: this.getDataTablesLanguage(),
            dom: 'lBfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        });

        this.bindEvents();
    }

    /**
     * Obtiene datos de la API
     */
    async fetchData(request, callback) {
        try {
            const response = await this.api.fetchPaginated({
                draw: request.draw,
                start: request.start,
                length: request.length,
                search: request.search?.value || '',
                type: document.querySelector('[data-filter-type]')?.value || '',
            });

            callback(response);
        } catch (error) {
            console.error('Error fetching notifications:', error);
            callback({
                draw: request.draw,
                recordsTotal: 0,
                recordsFiltered: 0,
                data: []
            });
        }
    }

    /**
     * Vincula eventos de acción
     */
    bindEvents() {
        // Delegado: mostrar modal
        $(this.tableElement).on('click', '[data-action="show"]', async (e) => {
            const notificationId = $(e.target).closest('[data-action="show"]').data('id');
            await this.showNotification(notificationId);
        });

        // Delegado: marcar como leída
        $(this.tableElement).on('click', '[data-action="read"]', async (e) => {
            const notificationId = $(e.target).closest('[data-action="read"]').data('id');
            await this.markAsRead(notificationId);
        });

        // Delegado: marcar como no leída
        $(this.tableElement).on('click', '[data-action="unread"]', async (e) => {
            const notificationId = $(e.target).closest('[data-action="unread"]').data('id');
            await this.markAsUnread(notificationId);
        });
    }

    /**
     * Muestra una notificación en el modal
     */
    async showNotification(notificationId) {
        try {
            const response = await this.api.getById(notificationId);
            this.modal.show(response.data);
        } catch (error) {
            alert('Error al cargar la notificación');
            console.error(error);
        }
    }

    /**
     * Marca como leída
     */
    async markAsRead(notificationId) {
        try {
            await this.api.markAsRead(notificationId);
            this.dataTable.ajax.reload(null, false); // Recarga sin resetear página
        } catch (error) {
            alert('Error al actualizar notificación');
            console.error(error);
        }
    }

    /**
     * Marca como no leída
     */
    async markAsUnread(notificationId) {
        try {
            await this.api.markAsUnread(notificationId);
            this.dataTable.ajax.reload(null, false);
        } catch (error) {
            alert('Error al actualizar notificación');
            console.error(error);
        }
    }

    /**
     * Renderiza botones de acciones
     */
    renderActions(row) {
        const readButton = !row.read_at 
            ? `<button class="btn btn-sm btn-primary" data-action="read" data-id="${row.id}" title="Marcar como leída"><i class="fas fa-check"></i></button>`
            : `<button class="btn btn-sm btn-secondary" data-action="unread" data-id="${row.id}" title="Marcar como no leída"><i class="fas fa-times"></i></button>`;

        return `
            <div class="btn-group btn-group-sm" role="group">
                <button class="btn btn-info" data-action="show" data-id="${row.id}" title="Ver detalles">
                    <i class="fas fa-eye"></i>
                </button>
                ${readButton}
            </div>
        `;
    }

    /**
     * Obtiene idioma para DataTables
     */
    getDataTablesLanguage() {
        const locale = document.documentElement.lang || 'es';
        
        const languages = {
            es: {
                lengthMenu: 'Mostrar _MENU_ registros',
                search: 'Buscar:',
                info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
                infoEmpty: 'Mostrando 0 registros',
                infoFiltered: '(filtrado de _MAX_ registros totales)',
                loadingRecords: 'Cargando...',
                processing: 'Procesando...',
                paginate: {
                    first: 'Primero',
                    last: 'Último',
                    next: 'Siguiente',
                    previous: 'Anterior'
                }
            },
            en: {
                lengthMenu: 'Show _MENU_ records',
                search: 'Search:',
                info: 'Showing _START_ to _END_ of _TOTAL_ records',
                infoEmpty: 'Showing 0 records',
                infoFiltered: '(filtered from _MAX_ total records)',
                loadingRecords: 'Loading...',
                processing: 'Processing...',
                paginate: {
                    first: 'First',
                    last: 'Last',
                    next: 'Next',
                    previous: 'Previous'
                }
            }
        };

        return languages[locale] || languages.es;
    }

    /**
     * Recarga la tabla
     */
    reload() {
        if (this.dataTable) {
            this.dataTable.ajax.reload(null, false);
        }
    }

    /**
     * Destruye la tabla
     */
    destroy() {
        if (this.dataTable) {
            this.dataTable.destroy();
        }
    }
}