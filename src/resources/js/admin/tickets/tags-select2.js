import $ from 'jquery';

/**
 * Módulo de inicialización de Select2 para campos de etiquetas.
 *
 * Se activa automáticamente en cualquier <select> que tenga el atributo
 * `data-tags-search`, el cual debe contener la URL del endpoint AJAX de búsqueda.
 *
 * Como Select2 necesita encontrar jQuery como variable global (window.jQuery),
 * y Vite empaqueta los módulos ES en contextos aislados, este script carga
 * Select2 dinámicamente desde CDN dentro del evento DOMContentLoaded,
 * momento en el que jQuery ya está disponible en window.
 *
 * Atributos opcionales en el elemento <select>:
 *   data-placeholder  – texto de placeholder (por defecto: 'Search or create tags...')
 */
document.addEventListener('DOMContentLoaded', function () {

    /**
     * Inicializa Select2 en todos los <select data-tags-search>.
     * Se llama una vez que Select2 está disponible en $.fn.
     */
    function inicializarSelect2() {
        $('[data-tags-search]').each(function () {
            const url         = $(this).data('tags-search');
            const placeholder = $(this).data('placeholder') || 'Search or create tags...';

            $(this).select2({
                // Búsqueda AJAX: llama al endpoint con el término escrito
                ajax: {
                    url: url,
                    dataType: 'json',
                    delay: 250, // espera 250ms antes de lanzar la petición
                    data: function (params) {
                        return { q: params.term }; // parámetro de búsqueda
                    },
                    processResults: function (data) {
                        return { results: data }; // formato esperado por Select2
                    },
                },
                // Permite crear etiquetas nuevas que no existen aún en BD
                tags: true,
                // El admin puede separar múltiples etiquetas con coma
                tokenSeparators: [','],
                // Formatea la opción "Crear nueva etiqueta" cuando no hay coincidencia
                createTag: function (params) {
                    const term = $.trim(params.term);
                    if (term === '') return null;
                    return { id: term, text: term, newTag: true };
                },
                placeholder: placeholder,
                allowClear: true,
            });
        });
    }

    // Si Select2 ya está en $.fn (cargado previamente), inicializar directamente.
    // En caso contrario, inyectarlo desde CDN y esperar a que cargue.
    if (typeof $.fn.select2 === 'function') {
        inicializarSelect2();
    } else {
        // Exponer jQuery globalmente para que el UMD de Select2 lo encuentre
        window.jQuery = window.jQuery || $;
        window.$      = window.$      || $;

        const script  = document.createElement('script');
        script.src    = 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js';
        script.onload = inicializarSelect2;
        document.head.appendChild(script);
    }
});
