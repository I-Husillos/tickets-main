const STORAGE_KEY = 'tickets_view_mode';

export function initViewToggle() {
    const btnTable  = document.getElementById('btn-view-table');
    const btnKanban = document.getElementById('btn-view-kanban');
    const secTable  = document.getElementById('view-section-table');
    const secKanban = document.getElementById('view-section-kanban');

    if (!btnTable || !btnKanban || !secTable || !secKanban) return;

    function activateTable() {
        secTable.style.display  = '';
        secKanban.style.display = 'none';
        btnTable.classList.add('active');
        btnKanban.classList.remove('active');
        localStorage.setItem(STORAGE_KEY, 'table');
    }

    function activateKanban() {
        secTable.style.display  = 'none';
        secKanban.style.display = '';
        btnKanban.classList.add('active');
        btnTable.classList.remove('active');
        localStorage.setItem(STORAGE_KEY, 'kanban');
    }

    btnTable.addEventListener('click', activateTable);
    btnKanban.addEventListener('click', activateKanban);

    if (localStorage.getItem(STORAGE_KEY) === 'kanban') {
        activateKanban();
    }
}
