
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const menuToggle = document.getElementById('menuToggle');

    if (menuToggle && sidebar) {
        menuToggle.addEventListener('click', function () {
            sidebar.classList.toggle('open');
            if (overlay) overlay.classList.toggle('active');
        });
    }

    if (overlay && sidebar) {
        overlay.addEventListener('click', function () {
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
        });
    }

    document.querySelectorAll('.menu-dropdown > .dropdown-toggle').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const parent = this.closest('.menu-dropdown');
            const isOpen = parent.classList.contains('open');

            document.querySelectorAll('.menu-dropdown').forEach(function (item) {
                item.classList.remove('open');
                const itemToggle = item.querySelector(':scope > .dropdown-toggle');
                if (itemToggle) itemToggle.classList.remove('active');
            });

            if (!isOpen) {
                parent.classList.add('open');
                this.classList.add('active');
            }
        });
    });

    const alertMessage = document.getElementById('alertMessage');
    if (alertMessage) {
        setTimeout(function () {
            alertMessage.style.transition = 'opacity .5s ease';
            alertMessage.style.opacity = '0';
            setTimeout(function () {
                alertMessage.remove();
            }, 500);
        }, 3000);
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
