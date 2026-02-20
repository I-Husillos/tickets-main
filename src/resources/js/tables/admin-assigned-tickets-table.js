import $ from 'jquery';

export function initAssignedTicketsTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'en';

    $('#tabla-tickets-asignados').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: apiUrl,
            type: 'GET',
            dataType: 'json',
            data: function(d) {
                d.locale = locale;
                d.status = $('#filter-status-asignados').val();
                d.priority = $('#filter-priority-asignados').val();
                d.type = $('#filter-type-asignados').val();
            },
            responsive: true,
            beforeSend: function (xhr) {
                if (token) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                }
                xhr.setRequestHeader('X-Locale', locale);
            },
            error: function (xhr) {
                console.error('Error en AJAX (Assigned Tickets):', xhr.status, xhr.responseText);
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
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' }
        ]
    });

    $('#filter-status-asignados, #filter-priority-asignados, #filter-type-asignados').on('change', function() {
        $('#tabla-tickets-asignados').DataTable().ajax.reload();
    });

    $('#clear-filters-asignados').on('click', function() {
        $('#filter-status-asignados, #filter-priority-asignados, #filter-type-asignados').val('');
        $('#tabla-tickets-asignados').DataTable().search('').ajax.reload();
    });
}


