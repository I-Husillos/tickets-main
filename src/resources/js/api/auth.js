export function getToken() {
    return localStorage.getItem('api_token');
}

export function clearTokenAndRedirect() {
    localStorage.removeItem('api_token');

    const isAdmin = window.location.pathname.includes('/admin');
    const locale = window.location.pathname.split('/')[1] || 'es';

    if (isAdmin) {
        window.location.href = `/${locale}/admin/login`;
    } else {
        window.location.href = `/${locale}/login`;
    }
}
