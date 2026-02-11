document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('api_token');

    $(document).on('click', '.btn-delete-user-ticket', async function () {
        const ticketId = $(this).data('id');

        if (!confirm('¿Estás seguro de eliminar este ticket?')) return;

        try {
            const response = await fetch(`/api/user/tickets/${ticketId}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (!response.ok) throw new Error(result.message);

            alert(result.message || 'Ticket eliminado');
            $('#tabla-tickets-usuario').DataTable().ajax.reload(null, false);
        } catch (error) {
            console.error(error);
            alert('Error al eliminar el ticket');
        }
    });
});
