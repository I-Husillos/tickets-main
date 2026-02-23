import $ from 'jquery';

document.addEventListener('DOMContentLoaded', () => {
    const token = localStorage.getItem('api_token');

    // Abrir modal de edición
    $(document).on('click', '.btn-edit-type', function () {
        const id = $(this).data('id');
        const name = $(this).data('name');
        const description = $(this).data('description');

        $('#edit-type-id').val(id);
        $('#edit-type-name').val(name);
        $('#edit-type-description').val(description);

        // Limpiar errores previos
        const editForm = document.getElementById('edit-type-form');
        if (editForm) {
            editForm.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            editForm.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
        }

        $('#editTypeModal').modal('show');
    });

    // Enviar edición
    $('#edit-type-form').on('submit', async function (e) {
        e.preventDefault();
        const id = $('#edit-type-id').val();
        const formData = new FormData(this);
        formData.append('_method', 'PUT');
        const form = this;

        // Limpiar errores previos
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        form.querySelectorAll('.invalid-feedback').forEach(el => el.remove());

        try {
            const response = await fetch(`/api/admin/types/${id}`, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json',
                },
                body: formData,
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
                    alert(result.message || 'No se pudo actualizar el tipo');
                }
                return;
            }

            $('#editTypeModal').modal('hide');
            $('#tabla-types').DataTable().ajax.reload(null, false);
            alert(result.message);
        } catch (error) {
            console.error('Error al actualizar tipo:', error);
            alert(error.message || 'No se pudo actualizar el tipo');
        }
    });

    // Confirmar eliminación
    $(document).on('click', '.btn-delete-type', function () {
        const id = $(this).data('id');
        const name = $(this).data('name');
        $('#delete-type-id').val(id);
        $('#delete-type-name').text(name);
        $('#deleteTypeModal').modal('show');
    });

    // Enviar eliminación
    $('#delete-type-form').on('submit', async function (e) {
        e.preventDefault();
        const id = $('#delete-type-id').val();

        try {
            const response = await fetch(`/api/admin/types/${id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();
            if (!response.ok) throw result;

            $('#deleteTypeModal').modal('hide');
            $('#tabla-types').DataTable().ajax.reload(null, false);
            alert(result.message);
        } catch (error) {
            console.error('Error al eliminar tipo:', error);
            alert(error.message || 'No se pudo eliminar el tipo');
        }
    });
});
