document.addEventListener('DOMContentLoaded', () => {
    const sidebarToggle = document.querySelector('#sidebar-toggle');
    const sidebar = document.querySelector('.main-sidebar');

    sidebarToggle?.addEventListener('click', () => {
        sidebar.classList.toggle('open');
    });
});
