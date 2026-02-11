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
        $('#editTypeModal').modal('show');
    });

    // Enviar edición
    $('#edit-type-form').on('submit', async function (e) {
        e.preventDefault();
        const id = $('#edit-type-id').val();
        const formData = new FormData(this);
        formData.append('_method', 'PUT');

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
            if (!response.ok) throw result;

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
