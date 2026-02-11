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
        ajax: {
            url: apiUrl,
            type: 'GET',
            dataType: 'json',
            data: {
                locale: locale
            },
            responsive: true,
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
            { data: 'author', className: 'text-center' },
            { data: 'message', className: 'text-left' },
            { data: 'date', className: 'text-center' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center' },
        ]
    });    
}



