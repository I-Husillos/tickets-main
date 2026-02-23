import $ from 'jquery';

document.addEventListener('DOMContentLoaded', () => {

    $(document).on('click', '.btn-edit-user', function () {
        const userId = $(this).data('id');
        const name = $(this).data('name');
        const email = $(this).data('email');

        // Poblar el formulario
        $('#edit-user-id').val(userId);
        $('#edit-user-name').val(name);
        $('#edit-user-email').val(email);
        
        // Limpiar contraseñas
        $('#edit-user-password').val('');
        $('#edit-user-password-confirmation').val('');

        // Limpiar errores previos
        const editForm = document.getElementById('edit-user-form');
        if (editForm) {
            editForm.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            editForm.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
        }

        // Mostrar modal
        $('#editUserModal').modal('show');
    });

    $('#edit-user-form').on('submit', async function (e) {
        e.preventDefault();

        const id = $('#edit-user-id').val();
        const formData = new FormData(this);

        // Añadir el método PUT para Laravel/FormData
        formData.append('_method', 'PUT');

        const token = document.querySelector('meta[name="admin-token"]').getAttribute('content');
        const locale = document.documentElement.lang;

        try {
            const response = await fetch(`/api/admin/users/${id}`, {
                method: 'POST', // POST con _method: PUT para soportar FormData
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json',
                    'X-Locale': locale
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                if (response.status === 422 && data.errors) {
                    const form = document.getElementById('edit-user-form');
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
                    alert('Error al actualizar: ' + (data.message || 'Desconocido'));
                }
                return;
            }

            // Éxito:
            $('#editUserModal').modal('hide');
            alert(data.message || 'Usuario actualizado correctamente');
            
            // Recargar tabla
            if ($.fn.DataTable.isDataTable('#tabla-usuarios')) {
                $('#tabla-usuarios').DataTable().ajax.reload(null, false);
            }

        } catch (error) {
            console.error('Error:', error);
            alert('Error de conexión al actualizar usuario.');
        }
    });

    $(document).on('click', '.btn-delete-user', function () {
        const userId = $(this).data('id');
        const name = $(this).data('name');

        $('#delete-user-id').val(userId);
        $('#delete-user-name').text(name);

        $('#deleteUserModal').modal('show');
    });


    $('#delete-user-form').on('submit', async function (e) {
        e.preventDefault();

        const id = $('#delete-user-id').val();
        const token = document.querySelector('meta[name="admin-token"]').getAttribute('content');
        const locale = document.documentElement.lang;

        try {
            const response = await fetch(`/api/admin/users/${id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-Locale': locale
                }
            });

            const data = await response.json();

            if (!response.ok) {
                alert('Error al eliminar: ' + (data.message || 'Desconocido'));
                return;
            }

            // Éxito
            $('#deleteUserModal').modal('hide');
            alert(data.message || 'Usuario eliminado correctamente');

            // Recargar tabla
            if ($.fn.DataTable.isDataTable('#tabla-usuarios')) {
                $('#tabla-usuarios').DataTable().ajax.reload(null, false);
            }

        } catch (error) {
            console.error('Error:', error);
            alert('Error de conexión al eliminar usuario.');
        }
    });

});