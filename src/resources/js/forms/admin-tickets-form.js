document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('edit-ticket-form');
    if (!form) return;

    const ticketId = form.dataset.ticketId;
    const token = localStorage.getItem('api_token');
    const locale = document.documentElement.lang || 'en';

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = {
            title: document.getElementById('title').value,
            description: document.getElementById('description').value,
            status: document.getElementById('status').value,
            priority: document.getElementById('priority').value,
            type: document.getElementById('type').value,
            assigned_to: document.getElementById('assigned_to')?.value || null
        };

        try {
            const response = await fetch(`/api/admin/tickets/update/${ticketId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + token,
                    'X-Locale': locale,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            const data = await response.json();

            if (!response.ok) {
                alert(data.message || 'Error al actualizar el ticket');
                return;
            }

            alert(data.message || 'Ticket actualizado correctamente');

            setTimeout(() => location.reload(), 1500);
        } catch (error) {
            console.error(error);
            alert('Error inesperado.');
        }
    });
});
