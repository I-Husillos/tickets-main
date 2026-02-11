export function closeTicket(ticketId, token) {
    return fetch(`/api/admin/tickets/${ticketId}/close`, {
        method: 'PATCH',
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }).then(response => response.json());
}


export function reopenTicket(ticketId, token) {
    return fetch(`/api/admin/tickets/${ticketId}/reopen`, {
        method: 'PATCH',
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    }).then(response => response.json());
}


