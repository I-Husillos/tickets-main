import { clearTokenAndRedirect } from './api/auth.js';

window.addEventListener('storage', function (event) {
    if (event.key === 'api_token') {
        if (!event.newValue) {
            console.warn('[sync-auth] Token eliminado. Cerrando sesión...');
            clearTokenAndRedirect();
        }

        if (event.newValue && event.newValue !== localStorage.getItem('api_token')) {
            console.warn('[sync-auth] Token cambiado. Cerrando sesión...');
            clearTokenAndRedirect();
        }
    }
});
