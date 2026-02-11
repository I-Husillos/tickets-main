import $ from 'jquery';

$(document).on('click', '.btn-delete-comment', function () {
    const commentId = $(this).data('id');
    const locale = $(this).data('locale');
    const token = $('meta[name="csrf-token"]').attr('content');

    if (confirm('¿Estás seguro de que deseas eliminar este comentario?')) {
        $.ajax({
            url: `/api/admin/comments/delete/${commentId}`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': token
            },
            success: function (response) {
                // Recargar tabla DataTable sin refrescar página
                $('#tabla-comentarios').DataTable().ajax.reload(null, false);
            },
            error: function (xhr) {
                console.error('Error al eliminar comentario:', xhr.responseText);
                alert(xhr.responseText);
            }
        });
    }
});


