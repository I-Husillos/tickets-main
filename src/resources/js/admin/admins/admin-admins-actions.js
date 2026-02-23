import $ from 'jquery';

document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('api_token');

    // Abrir modal de edición de administrador
    $(document).on('click', '.btn-edit-admin', function () {
        const adminId = $(this).data('id');
        const name = $(this).data('name');
        const email = $(this).data('email');

        $('#edit-admin-id').val(adminId);
        $('#edit-admin-name').val(name);
        $('#edit-admin-email').val(email);
        $('#edit-admin-password').val('');
        $('#edit-admin-password-confirmation').val('');

        // Limpiar errores previos
        const editForm = document.getElementById('edit-admin-form');
        if (editForm) {
            editForm.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            editForm.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
        }

        $('#edit-admin-form').attr('data-admin-id', adminId);
        $('#editAdminModal').modal('show');
    });

    // Abrir modal de confirmación de eliminación
    $(document).on('click', '.btn-delete-admin', function () {
        const adminId = $(this).data('id');
        const adminName = $(this).data('name'); // Capturar nombre
        
        $('#delete-admin-id').val(adminId);
        $('#delete-admin-name').text(adminName); // Mostrar nombre en modal
        
        $('#deleteAdminModal').modal('show');
    });

    // Enviar eliminación
    $('#delete-admin-form').on('submit', async function (e) {
        e.preventDefault();
        const id = $('#delete-admin-id').val();

        try {
            const response = await fetch(`/api/admin/admins/${id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (!response.ok) throw new Error(result.message || 'Error al eliminar');

            $('#deleteAdminModal').modal('hide');
            alert(result.message || 'Administrador eliminado correctamente');
            
            // FIX: Selector de tabla correcto (#tabla-admins en lugar de #tabla-administradores)
            if ($.fn.DataTable.isDataTable('#tabla-admins')) {
                $('#tabla-admins').DataTable().ajax.reload(null, false);
            }

        } catch (error) {
            console.error('Error al eliminar:', error);
            alert(error.message || 'No se pudo eliminar el administrador');
        }
    });

    // Enviar edición
    const form = document.getElementById('edit-admin-form');
    if (form && token) {
        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            const adminId = form.dataset.adminId;
            const formData = new FormData(form);
            formData.append('_method', 'PUT');

            // Limpiar errores previos
            form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            form.querySelectorAll('.invalid-feedback').forEach(el => el.remove());

            try {
                const response = await fetch(`/api/admin/admins/${adminId}`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const result = await response.json();

                if (!response.ok) {
                    if (response.status === 422 && result.errors) {
                        for (const [field, messages] of Object.entries(result.errors)) {
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
                        alert(result.message || 'No se pudo actualizar el administrador');
                    }
                    return;
                }

                $('#editAdminModal').modal('hide');
                alert(result.message || 'Administrador actualizado correctamente');

                if ($.fn.DataTable.isDataTable('#tabla-admins')) {
                    $('#tabla-admins').DataTable().ajax.reload(null, false);
                }

            } catch (error) {
                console.error('Error al actualizar:', error);
                alert(error.message || 'No se pudo actualizar el administrador');
            }
        });
    }
});