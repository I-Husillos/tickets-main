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
            data: {
                locale: locale
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
}


