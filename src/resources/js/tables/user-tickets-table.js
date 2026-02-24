import $ from 'jquery';

export function initUserTicketsTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'en';

    $('#tabla-tickets-usuario').DataTable({
        processing: true,
        serverSide: true,
        responsive: {
            details: {
                type: 'inline',
                target: 'tr'
            }
        },
        autoWidth: false,
        order: [[4, 'desc']],
        ajax: {
            url: apiUrl,
            type: 'GET',
            dataType: 'json',
            data: function (d) {
                d.locale = locale;
                d.status = $('#filter-status').val();
                d.priority = $('#filter-priority').val();
                d.type = $('#filter-type').val();
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                xhr.setRequestHeader('X-Locale', locale);
            },
            error: function (xhr) {
                console.error('Error en respuesta AJAX:', xhr.responseText);
            }
        },
        columns: [
            { data: 'title', className: 'align-middle text-wrap', orderable: true  },
            { data: 'status', className: 'text-center align-middle', orderable: true  },
            { data: 'priority', className: 'text-center align-middle', orderable: true  },
            { data: 'comments', className: 'text-center align-middle', orderable: true  },
            { data: 'date', className: 'text-center align-middle', orderable: true  },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' },
        ],
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 },
            { responsivePriority: 3, targets: 2 },
            { responsivePriority: 4, targets: 4 },
            { responsivePriority: 100, targets: 5 },
            { responsivePriority: 101, targets: 3 },
        ],
    });

    $('#filter-status, #filter-priority, #filter-type').on('change', function() {
        $('#tabla-tickets-usuario').DataTable().ajax.reload();
    });

    $('#clear-filters').on('click', function() {
        $('#filter-status, #filter-priority, #filter-type').val('');
        $('#tabla-tickets-usuario').DataTable().search('').ajax.reload();
    });
}
