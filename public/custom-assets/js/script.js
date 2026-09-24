document.addEventListener('DOMContentLoaded', function () {

    // 1. Sidebar Toggle (Desktop & Mobile)
    const sidebarCollapse = document.getElementById('sidebarCollapse');
    const sidebar = document.getElementById('sidebar');

    if (sidebarCollapse && sidebar) {
        sidebarCollapse.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            if (window.innerWidth <= 991.98) {
                sidebar.classList.toggle('show');
                sidebar.classList.toggle('active');
            } else {
                sidebar.classList.toggle('collapsed');
            }
        });
    }

    // Mobile outdoor click toggle close
    document.addEventListener('click', function (e) {
        if (window.innerWidth <= 991.98 && sidebar && sidebar.classList.contains('show')) {
            if (!sidebar.contains(e.target) && sidebarCollapse && !sidebarCollapse.contains(e.target)) {
                sidebar.classList.remove('show', 'active');
            }
        }
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 991.98 && sidebar) {
            sidebar.classList.remove('show', 'active');
        }
    });

    // 2. Charts Initialization
    const lineChartElem = document.getElementById('lineChart');
    if (lineChartElem && typeof Chart !== 'undefined') {
        const ctxLine = lineChartElem.getContext('2d');
        if (Chart.getChart(lineChartElem)) {
            Chart.getChart(lineChartElem).destroy();
        }
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['Apr 12', 'Apr 13', 'Apr 14', 'Apr 15', 'Apr 16', 'Apr 17', 'Apr 18'],
                datasets: [{
                    label: 'Transactions',
                    data: [180, 200, 230, 210, 250, 280, 270],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#3b82f6'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });
    }

    const doughnutChartElem = document.getElementById('doughnutChart');
    if (doughnutChartElem && typeof Chart !== 'undefined') {
        const ctxDoughnut = doughnutChartElem.getContext('2d');
        if (Chart.getChart(doughnutChartElem)) {
            Chart.getChart(doughnutChartElem).destroy();
        }
        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Food & Dining', 'Transport', 'Hostel / Rent', 'Academics', 'Entertainment', 'Others'],
                datasets: [{
                    data: [32, 18, 15, 10, 8, 17],
                    backgroundColor: ['#3b82f6', '#60a5fa', '#34d399', '#fbbf24', '#f87171', '#9ca3af']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: { boxWidth: 12 }
                    }
                },
                cutout: '70%'
            }
        });
    }

    // 3. Announcements Filtering
    const annSearchInput = document.getElementById('announcementSearch');
    const annStatusFilter = document.getElementById('statusFilter');
    const annTypeFilter = document.getElementById('typeFilter');
    const annTableRows = document.querySelectorAll('#announcementsTable tbody tr');

    if (annSearchInput && annTableRows.length > 0) {
        function filterAnnouncements() {
            const query = annSearchInput.value.toLowerCase().trim();
            const selectedStatus = annStatusFilter ? annStatusFilter.value.toLowerCase() : '';
            const selectedType = annTypeFilter ? annTypeFilter.value.toLowerCase() : '';

            annTableRows.forEach(row => {
                const titleText = row.children[1] ? row.children[1].textContent.toLowerCase() : '';
                const typeText = row.children[2] ? row.children[2].textContent.toLowerCase() : '';
                const previewText = row.children[3] ? row.children[3].textContent.toLowerCase() : '';
                const statusText = row.children[4] ? row.children[4].textContent.toLowerCase() : '';

                const matchesSearch = titleText.includes(query) || previewText.includes(query);
                const matchesStatus = !selectedStatus || statusText.includes(selectedStatus);
                const matchesType = !selectedType || typeText.includes(selectedType);

                row.style.display = (matchesSearch && matchesStatus && matchesType) ? '' : 'none';
            });
        }

        annSearchInput.addEventListener('input', filterAnnouncements);
        if (annStatusFilter) annStatusFilter.addEventListener('change', filterAnnouncements);
        if (annTypeFilter) annTypeFilter.addEventListener('change', filterAnnouncements);
    }

    // 4. Settings Tabs
    const navLinks = document.querySelectorAll('#settingsTabs .nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            navLinks.forEach(item => item.classList.remove('active'));
            this.classList.add('active');
        });
    });

    const settingsForm = document.getElementById('generalSettingsForm');
    if (settingsForm) {
        settingsForm.addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Settings saved successfully!');
        });
    }

    // 5. Category Search
    const catSearchInput = document.getElementById('categorySearch');
    const categoryTables = document.querySelectorAll('.category-table tbody');

    if (catSearchInput && categoryTables.length > 0) {
        catSearchInput.addEventListener('input', function () {
            const query = catSearchInput.value.toLowerCase().trim();

            categoryTables.forEach(tableBody => {
                const rows = tableBody.querySelectorAll('tr');
                rows.forEach(row => {
                    const categoryName = row.children[2] ? row.children[2].textContent.toLowerCase() : '';
                    const description = row.children[3] ? row.children[3].textContent.toLowerCase() : '';

                    row.style.display = (categoryName.includes(query) || description.includes(query)) ? '' : 'none';
                });
            });
        });
    }

    // 6. User Management Filtering
    const userSearchInput = document.getElementById('userSearch');
    const roleFilter = document.getElementById('roleFilter');
    const userStatusFilter = document.getElementById('statusFilter');
    const resetButton = document.getElementById('resetFilters');
    const userTableRows = document.querySelectorAll('#usersTable tbody tr');

    if (userSearchInput && userTableRows.length > 0) {
        function filterUserTable() {
            const query = userSearchInput.value.toLowerCase().trim();
            const selectedRole = roleFilter ? roleFilter.value.toLowerCase() : '';
            const selectedStatus = userStatusFilter ? userStatusFilter.value.toLowerCase() : '';

            userTableRows.forEach(row => {
                const textContent = row.textContent.toLowerCase();
                const roleText = row.children[3] ? row.children[3].textContent.toLowerCase() : '';
                const statusText = row.children[5] ? row.children[5].textContent.toLowerCase() : '';

                const matchesSearch = textContent.includes(query);
                const matchesRole = !selectedRole || roleText.includes(selectedRole);
                const matchesStatus = !selectedStatus || statusText.includes(selectedStatus);

                row.style.display = (matchesSearch && matchesRole && matchesStatus) ? '' : 'none';
            });
        }

        userSearchInput.addEventListener('input', filterUserTable);
        if (roleFilter) roleFilter.addEventListener('change', filterUserTable);
        if (userStatusFilter) userStatusFilter.addEventListener('change', filterUserTable);

        if (resetButton) {
            resetButton.addEventListener('click', function () {
                userSearchInput.value = '';
                if (roleFilter) roleFilter.value = '';
                if (userStatusFilter) userStatusFilter.value = '';
                filterUserTable();
            });
        }
    }

    // 7. Profile & Password Forms
    const personalInfoForm = document.getElementById('personalInfoForm');
    if (personalInfoForm) {
        personalInfoForm.addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Personal information updated successfully!');
        });
    }

    const changePasswordForm = document.getElementById('changePasswordForm');
    if (changePasswordForm) {
        changePasswordForm.addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Password updated successfully!');
        });
    }

    // Password Visibility Toggle
    const toggleButtons = document.querySelectorAll('.toggle-password');
    toggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const inputGroup = this.closest('.input-group');
            if (inputGroup) {
                const input = inputGroup.querySelector('input');
                const icon = this.querySelector('i');

                if (input && icon) {
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('bi-eye');
                        icon.classList.add('bi-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('bi-eye-slash');
                        icon.classList.add('bi-eye');
                    }
                }
            }
        });
    });
});

// Quick Action Helpers
function clearCacheAction() {
    alert('Cache cleared successfully!');
}

function resetSettingsAction() {
    if (confirm('Are you sure you want to reset settings to default?')) {
        alert('Settings reset to default.');
    }
}

function exportLogsAction() {
    alert('Exporting system logs...');
}

function systemHealthAction() {
    alert('System health is optimal (100% operational).');
}