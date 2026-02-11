import $ from 'jquery';

export function initAdminNotificationsTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'es';

    const table = $('#tabla-notificaciones-admin').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: apiUrl,
            type: 'GET',
            dataType: 'json',
            data: function (d) {
                d.locale = locale;
                d.type = $('#filter-type').val(); // filtro
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + token);
            },
            error: function (xhr) {
                console.error('Error AJAX:', xhr.responseText);
            }
        },
        columns: [
            { data: 'type', className: 'text-center align-middle' },
            { data: 'content', className: 'align-middle' },
            { data: 'created_at', className: 'text-center align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' },
        ],
    });
}