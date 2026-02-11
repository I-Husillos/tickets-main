document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('ticketForm');

    if (!form) return;

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const token = localStorage.getItem('api_token');
        if (!token) {
            alert('No se encontró el token de autenticación.');
            return;
        }

        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        console.log('Datos enviados a la API:', data);


        try {
            const response = await fetch('/api/user/tickets/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                alert('Ticket creado correctamente');
                form.reset();
                // window.location.href = '/es/tickets'; // si quieres redirigir
            } else {
                let msg = '';
                if (result.errors) {
                    msg = Object.values(result.errors).flat().join('\n');
                } else {
                    msg = result.message || 'Error en la creación';
                }
                alert(msg);
            }

        } catch (error) {
            console.error(error);
            alert('Error inesperado.');
        }
    });
});
