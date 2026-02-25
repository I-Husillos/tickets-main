<script>
    window.addEventListener('pageshow', function(event) {
        // Si la página se carga desde la caché de atrás/adelante (bfcache)
        if (event.persisted) {
            window.location.reload();
        }
    });

    document.addEventListener('submit', function(event) {
        const form = event.target;
        const button = form.querySelector('button[type="submit"]');

        if (button && !button.disabled) {
            // Deshabilitamos para evitar el segundo POST que causa el Error 419
            button.disabled = true;
            
            // Feedback visual para el usuario impaciente
            const loadingText = '{{ __("Cargando...") }}';
            button.innerHTML = `<i class="fas fa-spinner fa-spin"></i> ${loadingText}`;
        }
    });
</script>