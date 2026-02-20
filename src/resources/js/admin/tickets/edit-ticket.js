import $ from 'jquery';

export function initEditTicketForm(token) {
    $('#edit-ticket-form').on('submit', function (e) {
        e.preventDefault();

        const ticketId = $(this).data('ticket-id');
        const locale = document.documentElement.lang || 'en';

        const formData = {
            title: $('#title').val(),
            description: $('#description').val(),
            status: $('#status').val(),
            priority: $('#priority').val(),
            type: $('#type').val(),
            assigned_to: $('#assigned_to').val() || null,
            project_id: $('#project_id').val() || null,
            tags: $('#tags-edit-select').val() || [],
        };

        fetch(`/api/admin/tickets/update/${ticketId}`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token,
                'X-Locale': locale,
                'Accept': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(res => {
            if (!res.ok) {
                return res.json().then(data => {
                    // Mostrar errores de validación específicos si los hay
                    if (data.errors) {
                        const mensajes = Object.values(data.errors).flat().join('\n');
                        alert('Error de validación:\n' + mensajes);
                    } else {
                        alert(data.message || 'Error al guardar los cambios');
                    }
                    throw new Error('Validación fallida');
                });
            }
            return res.json();
        })
        .then(data => {
            alert(data.message || 'Cambios guardados correctamente');
        })
        .catch(err => {
            if (err.message !== 'Validación fallida') {
                console.error(err);
                alert('Error al guardar los cambios');
            }
        });
    });
}
