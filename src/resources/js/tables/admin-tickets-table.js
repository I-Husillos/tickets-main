import $ from 'jquery';

export function initAdminTicketsTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'en';
    const projectId = new URLSearchParams(window.location.search).get('project_id');

    $('#tabla-tickets').DataTable({
        processing: true,
        serverSide: true,
        responsive: {
            details: {
                type: 'inline',
                target: 'tr'
            }
        },
        autoWidth: false,
        ajax: {
            url: apiUrl,
            type: 'GET',
            dataType: 'json',
            data: function(d) {
                d.locale = locale;
                d.status = $('#filter-status').val();
                d.priority = $('#filter-priority').val();
                d.type = $('#filter-type').val();
                d.project_id = projectId || '';
            },
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
            { data: 'title', className: 'align-middle text-wrap', orderable: true },
            { data: 'description', className: 'align-middle text-wrap', orderable: true },
            { data: 'status', className: 'text-center align-middle' },
            { data: 'priority', className: 'text-center align-middle' },
            { data: 'type', className: 'text-center align-middle' },
            { data: 'comments', className: 'text-center align-middle' },
            { data: 'assigned_to', className: 'text-center align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' },
        ],
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 2 },
            { responsivePriority: 3, targets: 3 },
            { responsivePriority: 4, targets: 4 },
            { responsivePriority: 100, targets: 7 },
            { responsivePriority: 101, targets: 1 },
            { responsivePriority: 102, targets: 5 },
            { responsivePriority: 103, targets: 6 },
        ],
    });

    $('#filter-status, #filter-priority, #filter-type').on('change', function() {
        $('#tabla-tickets').DataTable().ajax.reload();
    });

    $('#clear-filters').on('click', function() {
        $('#filter-status, #filter-priority, #filter-type').val('');
        $('#tabla-tickets').DataTable().search('').ajax.reload();
    });
}
