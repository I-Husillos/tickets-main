import $ from 'jquery';

export function initAdminTypesTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'en';

    $('#tabla-types').DataTable({
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
            },
            beforeSend: function (xhr) {
                if (token) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                }
                xhr.setRequestHeader('X-Locale', locale);
            },
            error: function (xhr) {
                console.error('Error en petición AJAX (Types):', xhr.status, xhr.responseText);
            }
        },
        columns: [
            { data: 'name', className: 'text-center align-middle', orderable: true },
            { data: 'description', className: 'align-middle text-wrap', orderable: true },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' },
        ],
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 },
            { responsivePriority: 100, targets: 2 },
        ],
    });
}
