import $ from 'jquery';

export function initAssignedTicketsTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'en';

    $('#tabla-tickets-asignados').DataTable({
        processing: true,
        serverSide: true,
        responsive: {
            details: {
                type: 'inline',
                target: 'tr'
            }
        },
        autoWidth: false,
        order: [[0, 'desc']],
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
            { data: 'title', className: 'align-middle text-wrap' },
            { data: 'description', className: 'align-middle text-wrap' },
            { data: 'status', className: 'text-center align-middle' },
            { data: 'priority', className: 'text-center align-middle' },
            { data: 'type', className: 'text-center align-middle' },
            { data: 'comments', className: 'text-center align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' }
        ],
        columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: 3 },
            { responsivePriority: 3, targets: 4 },
            { responsivePriority: 4, targets: 5 },
            { responsivePriority: 100, targets: 7 },
            { responsivePriority: 101, targets: 2 },
            { responsivePriority: 102, targets: 6 },
            { responsivePriority: 103, targets: 0 },
        ],
    });

    $('#filter-status-asignados, #filter-priority-asignados, #filter-type-asignados').on('change', function() {
        $('#tabla-tickets-asignados').DataTable().ajax.reload();
    });

    $('#clear-filters-asignados').on('click', function() {
        $('#filter-status-asignados, #filter-priority-asignados, #filter-type-asignados').val('');
        $('#tabla-tickets-asignados').DataTable().search('').ajax.reload();
    });
}


