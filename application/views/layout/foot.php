</main>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const sidebar = document.getElementById('sidebar');
			const overlay = document.getElementById('overlay');
			const menuToggle = document.getElementById('menuToggle');

			/* ================= MOBILE SIDEBAR ================= */
			if (menuToggle) {
				menuToggle.addEventListener('click', function () {
					sidebar.classList.toggle('open');
					overlay.classList.toggle('active');
				});
			}

			if (overlay) {
				overlay.addEventListener('click', function () {
					sidebar.classList.remove('open');
					overlay.classList.remove('active');
				});
			}

			/* ================= DROPDOWN SIDEBAR ================= */
			const dropdowns = document.querySelectorAll('.dropdown-toggle');

			dropdowns.forEach(function (dropdown) {
				dropdown.addEventListener('click', function (event) {
					event.preventDefault();

					const parent = this.closest('.menu-dropdown');

					if (!parent) {
						return;
					}

					const isOpen = parent.classList.contains('open');

					document.querySelectorAll('.menu-dropdown').forEach(function (item) {
						item.classList.remove('open');
					});

					if (!isOpen) {
						parent.classList.add('open');
					}
				});
			});

			/* ================= SUBMENU ACTIVE ================= */
			const submenuLinks = document.querySelectorAll('.submenu a');

			submenuLinks.forEach(function (link) {
				link.addEventListener('click', function () {
					submenuLinks.forEach(function (item) {
						item.classList.remove('active');
					});

					this.classList.add('active');
				});
			});
		});

	</script>

</body>

</html>
