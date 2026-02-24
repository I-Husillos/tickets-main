import $ from 'jquery';

export function initAdminNotificationsTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'es';

    const table = $('#tabla-notificaciones-admin').DataTable({
        processing: true,
        serverSide: true,
        responsive: {
            details: {
                type: 'inline',
                target: 'tr'
            }
        },
        autoWidth: false,
        order: [[2, 'desc']],
        ajax: {
            url: apiUrl,
            type: 'GET',
            dataType: 'json',
            data: function (d) {
                d.locale = locale;
                d.type = $('#filter-type').val();
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + token);
            },
            error: function (xhr) {
                console.error('Error AJAX:', xhr.responseText);
            }
        },
        columns: [
            { data: 'type', className: 'text-center align-middle', orderable: true },
            { data: 'content', className: 'align-middle text-wrap', orderable: true },
            { data: 'created_at', className: 'text-center align-middle', orderable: true },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' },
        ],
        columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: 0 },
            { responsivePriority: 3, targets: 2 },
            { responsivePriority: 100, targets: 3 },
        ],
    });
}