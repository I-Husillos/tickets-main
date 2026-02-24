import $ from 'jquery';

export function initAdminCommentsTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'en';

    const tabla = $('#tabla-comentarios');

    /* Evitar doble inicialización
        Porque todas las otras (Types, Users, Admins, etc.):
        Se encuentran en pestañas activas desde el inicio.
        Están presentes en el DOM desde el principio.
        Se inicializan una única vez.*/

    if ($.fn.DataTable.isDataTable(tabla)) {
        return;
    }

    tabla.DataTable({
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
            data: {
                locale: locale
            },
            beforeSend: function(xhr) {
                if(token) {
                    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
                }
                xhr.setRequestHeader('X-Locale', locale);
            },
            error: function(xhr) {
                console.error('Error al cargar comentarios:', xhr.responseText);
            }
        },
        columns: [
            { data: 'author', className: 'text-center align-middle' },
            { data: 'message', className: 'text-left align-middle text-wrap' },
            { data: 'date', className: 'text-center align-middle' },
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



