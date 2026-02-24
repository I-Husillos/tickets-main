import $ from 'jquery';

export function initAdminUsersTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'en';

    $('#tabla-usuarios').DataTable({
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
                d.name = $('#filter-name').val();
                d.email = $('#filter-email').val();
            },
            beforeSend: function (xhr) {
                if (token) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                }
                xhr.setRequestHeader('X-Locale', locale);
            },
            error: function (xhr) {
                console.error('Error en respuesta AJAX:', xhr.responseText);
            }
        },
        columns: [
            { data: 'name', className: 'text-center align-middle', orderable: true },
            { data: 'email', className: 'text-center align-middle', orderable: true },
            { 
                data: 'actions', 
                orderable: false, 
                searchable: false, 
                className: 'text-center align-middle' 
            },
        ],
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 },
            { responsivePriority: 100, targets: 2 },
        ],
    });

    $('#filter-name, #filter-email').on('change', function() {
        $('#tabla-usuarios').DataTable().ajax.reload();
    });
}




