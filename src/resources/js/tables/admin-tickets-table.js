import $ from 'jquery';

export function initAdminTicketsTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'en';

    $('#tabla-tickets').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: apiUrl,
            type: 'GET',
            dataType: 'json',
            data: function(d) {
                d.locale = locale;
                d.status = $('#filter-status').val();
                d.priority = $('#filter-priority').val();
                d.type = $('#filter-type').val();
            },
            responsive: true,
            beforeSend: function (xhr) {
                if (token) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                }
                xhr.setRequestHeader('X-Locale', locale);
            },
            error: function (xhr) {
                console.error('Error al cargar los tickets:', xhr.status, xhr.responseText);
            }
        },
        columns: [
            { data: 'id', className: 'text-center align-middle' },
            { data: 'title', className: 'text-center align-middle' },
            { data: 'description', className: 'text-center align-middle' },
            { data: 'status', className: 'text-center align-middle' },
            { data: 'priority', className: 'text-center align-middle' },
            { data: 'type', className: 'text-center align-middle' },
            { data: 'comments', className: 'text-center align-middle' },
            { data: 'assigned_to', className: 'text-center align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' },
        ]
    });

    $('#filter-status, #filter-priority, #filter-type').on('change', function() {
        $('#tabla-tickets').DataTable().ajax.reload();
    });
}
