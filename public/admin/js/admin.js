document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('adminSidebar');
    const toggle = document.getElementById('adminMenuToggle');
    const overlay = document.getElementById('adminOverlay');

    function closeSidebar() {
        if (sidebar) sidebar.classList.remove('open');
        if (overlay) overlay.classList.remove('open');
    }

    if (toggle) {
        toggle.addEventListener('click', function () {
            if (sidebar) sidebar.classList.toggle('open');
            if (overlay) overlay.classList.toggle('open');
        });
    }
    if (overlay) overlay.addEventListener('click', closeSidebar);

    const userMenu = document.querySelector('[data-user-menu]');
    const userButton = document.querySelector('[data-user-button]');
    if (userButton && userMenu) {
        userButton.addEventListener('click', function (e) {
            e.stopPropagation();
            userMenu.classList.toggle('open');
        });
        document.addEventListener('click', function () {
            userMenu.classList.remove('open');
        });
    }

    document.querySelectorAll('[data-modal-open]').forEach(function (button) {
        button.addEventListener('click', function () {
            const modal = document.getElementById(button.dataset.modalOpen);
            if (modal) modal.classList.add('open');
        });
    });

    document.querySelectorAll('[data-modal-close]').forEach(function (button) {
        button.addEventListener('click', function () {
            const modal = button.closest('.modal-backdrop');
            if (modal) modal.classList.remove('open');
        });
    });

    document.querySelectorAll('.modal-backdrop').forEach(function (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) modal.classList.remove('open');
        });
    });

    document.querySelectorAll('[data-filter-table]').forEach(function (input) {
        input.addEventListener('input', function () {
            const table = document.getElementById(input.dataset.filterTable);
            if (!table) return;
            const query = input.value.toLowerCase().trim();
            table.querySelectorAll('tbody tr').forEach(function (row) {
                row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
            });
        });
    });

    document.querySelectorAll('[data-confirm]').forEach(function (element) {
        element.addEventListener('click', function (e) {
            if (!window.confirm(element.dataset.confirm)) e.preventDefault();
        });
    });

    setTimeout(function () {
        document.querySelectorAll('.alert[data-auto-hide]').forEach(function (alert) {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity .3s ease';
            setTimeout(function () { alert.remove(); }, 300);
        });
    }, 4500);
});
