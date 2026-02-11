import $ from 'jquery';

export function initAdminTypesTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'en';

    $('#tabla-types').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: apiUrl,
            type: 'GET',
            dataType: 'json',
            data: {
                locale: locale
            },
            resposive: true,
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
            { data: 'name', className: 'text-center align-middle' },
            { data: 'description', className: 'text-center align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' },
        ]
    });
}
