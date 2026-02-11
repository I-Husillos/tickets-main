import $ from 'jquery';
import { closeTicket, reopenTicket } from './ticket-actions';


export function initTicketActionButtons(token) {
    document.addEventListener('click', async (e) => {
        if (e.target.closest('.btn-close-ticket')) {
            const btn = e.target.closest('.btn-close-ticket');
            const id = btn.dataset.ticketId;

            if (!confirm('¿Estás seguro de que deseas cerrar el ticket?')) return;

            const result = await closeTicket(id, token);
            alert(result.message || 'Operación completada');
            location.reload(); // Recargar la página sin refrescar la pantalla
        }

        if (e.target.closest('.btn-reopen-ticket')) {
            const btn = e.target.closest('.btn-reopen-ticket');
            const id = btn.dataset.ticketId;

            if (!confirm('¿Deseas reabrir este ticket?')) return;

            const result = await reopenTicket(id, token);
            console.log(token);
            alert(result.message || 'Operación completada');
            location.reload(); // Recargar la página sin refrescar la pantalla
        }


        if (e.target.closest('.btn-delete-ticket')) {
            const btn = e.target.closest('.btn-delete-ticket');
            const id = btn.dataset.id;
        
            if (!confirm('¿Deseas eliminar este ticket? Esta acción no se puede deshacer.')) return;
        
            try {
                const res = await fetch(`/api/admin/tickets/delete/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });
        
                const data = await res.json();
        
                if (res.ok) {
                    alert(data.message || 'Ticket eliminado correctamente');
                    location.reload();
                } else {
                    alert(data.message || 'Error al eliminar el ticket');
                }
        
            } catch (error) {
                console.error('Error eliminando ticket:', error);
                alert('Ocurrió un error inesperado.');
            }
        }
        
    });
}



