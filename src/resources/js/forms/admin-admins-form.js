document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('create-admin-form');
    if (!form) return;

    form.addEventListener('submit', async function (e) {
        e.preventDefault(); // Evita el envío tradicional

        const formData = new FormData(form);
        const locale = document.documentElement.lang;
        const token = localStorage.getItem('api_token'); // o desde meta tag

        try {
            // Limpiar errores previos
            form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            form.querySelectorAll('.invalid-feedback').forEach(el => el.remove());

            const response = await fetch('/api/admin/admins/store', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                if (response.status === 422 && data.errors) {
                    // Mostrar errores de validación en el formulario
                    for (const [field, messages] of Object.entries(data.errors)) {
                        const input = form.querySelector(`[name="${field}"]`);
                        if (input) {
                            input.classList.add('is-invalid');

                            let feedback = input.nextElementSibling;
                            if (!feedback || !feedback.classList.contains('invalid-feedback')) {
                                feedback = document.createElement('div');
                                feedback.className = 'invalid-feedback';
                                input.parentNode.appendChild(feedback);
                            }
                            feedback.textContent = messages[0];
                        }
                    }
                } else {
                    console.error('Errores:', data);
                    alert('Ocurrió un error inesperado');
                }
                return;
            }

            alert(data.message);
            form.reset();
        } catch (error) {
            console.error('Error al crear el administrador:', error);
            alert('Error al crear el administrador: ' + error.message);
        }
    });
});