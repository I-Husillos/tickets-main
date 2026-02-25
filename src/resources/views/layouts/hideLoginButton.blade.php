<script>
        document.addEventListener('submit', function(event) {
        const form = event.target;
        
        const button = form.querySelector('button[type="submit"]');

        if (button && !button.disabled) {
            button.disabled = true;
            const loadingText = '{{ __("Cargando...") }}';
            button.innerHTML = `<i class="fas fa-spinner fa-spin"></i> ${loadingText}`;
        }
    });
</script>