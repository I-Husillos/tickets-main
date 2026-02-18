import $ from 'jquery';

export function initUserNotificationsTable(apiUrl, token) {
    const locale = document.documentElement.lang || 'es';

    const table = $('#tabla-notificaciones-usuario').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: apiUrl,
            type: 'GET',
            dataType: 'json',
            data: function (d) {
                d.locale = locale;
                d.type = $('#filter-type').val(); // filtro
                d.type = $('#filter-content').val();
                d.type = $('#filter-created_at').val();
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + token);
            },
            error: function (xhr) {
                console.error('Error AJAX:', xhr.responseText);
            }
        },
        columns: [
            { data: 'type', className: 'text-center align-middle' },
            { data: 'content', className: 'align-middle' },
            { data: 'created_at', className: 'text-center align-middle' },
            { data: 'actions', orderable: false, searchable: false, className: 'text-center align-middle' },
        ],
    });
    $('#filter-type, #filter-content, #filter-created_at').on('change', function() {
        $('#tabla-notificaciones-usuario').DataTable().ajax.reload();
    });
}

