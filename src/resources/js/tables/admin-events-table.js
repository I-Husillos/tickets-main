import $ from 'jquery';

export function initAdminEventsTable(apiUrl, token) {
    $('#tabla-eventos').DataTable({
        processing: true,
        serverSide: true,
        responsive: {
            details: {
                type: 'inline',
                target: 'tr'
            }
        },
        autoWidth: false,
        order: [[3, 'desc']],
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
            { data: 'event_type', title: 'Tipo de evento', className: 'text-center align-middle' },
            { data: 'description', title: 'Descripción', className: 'align-middle text-wrap' },
            { data: 'user', title: 'Usuario', className: 'text-center align-middle' },
            { data: 'date', title: 'Fecha', className: 'text-center align-middle' }
        ],
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 },
            { responsivePriority: 3, targets: 3 },
            { responsivePriority: 100, targets: 2 },
        ],
    });
}


