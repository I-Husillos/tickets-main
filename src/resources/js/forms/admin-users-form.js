document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('create-user-form');
    if (!form) return;

    
    form.addEventListener('submit', async function (e) {
        e.preventDefault(); // Evita el envío tradicional

        const formData = new FormData(form);
        const locale = document.documentElement.lang;
        const token = localStorage.getItem('api_token'); // o desde meta tag

        try {
            const response = await fetch('/api/admin/users/store', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                // Mostrar errores de validación
                console.error('Errores:', data.errors);
                return;
            }

            alert(data.message); // Usuario creado correctamente.
            form.reset(); // Limpiar formulario
            // Redirigir o actualizar tabla
        } catch (error) {
            console.error('Error al crear usuario:', error);
        }
    });
});


