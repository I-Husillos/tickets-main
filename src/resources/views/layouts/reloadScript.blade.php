<script>
    window.addEventListener('pageshow', function(event) {
        // Si la página se carga desde la caché de atrás/adelante (bfcache)
        if (event.persisted) {
            window.location.reload();
        }
    });
    
</script>