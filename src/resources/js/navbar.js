document.addEventListener('DOMContentLoaded', () => {
    const profileMenu = document.querySelector('#profile-menu');
    const notificationMenu = document.querySelector('#notification-menu');

    document.querySelector('#profile-button')?.addEventListener('click', () => {
        profileMenu.classList.toggle('d-none');
    });

    document.querySelector('#notification-button')?.addEventListener('click', () => {
        notificationMenu.classList.toggle('d-none');
    });
});
