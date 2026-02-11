import $ from 'jquery';

export function initAdminEventsTable(apiUrl, token) {
    $('#tabla-eventos').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: apiUrl,
            type: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token,
                'X-Locale': document.documentElement.lang || 'en'
            },
            dataSrc: 'data'
        },
        columns: [
            { data: 'event_type', title: 'Tipo de evento' },
            { data: 'description', title: 'Descripción' },
            { data: 'user', title: 'Usuario' },
            { data: 'date', title: 'Fecha' }
        ],
    });
}


