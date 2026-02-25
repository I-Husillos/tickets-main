<script>
    window.addEventListener('pageshow', function(event) {
        const navigationEntries = performance.getEntriesByType('navigation');
        const navigationType = navigationEntries.length ? navigationEntries[0].type : null;
        const restoredFromHistory = event.persisted || navigationType === 'back_forward';

        if (!restoredFromHistory) {
            sessionStorage.removeItem('bfcache-reloaded');
            return;
        }

        if (!sessionStorage.getItem('bfcache-reloaded')) {
            sessionStorage.setItem('bfcache-reloaded', '1');
            window.location.reload();
        } else {
            sessionStorage.removeItem('bfcache-reloaded');
        }
    });
</script>