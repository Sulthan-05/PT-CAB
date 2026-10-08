</main>

<script>
	document.addEventListener('DOMContentLoaded', function () {

		const sidebar = document.getElementById('sidebar');
		const overlay = document.getElementById('overlay');
		const menuToggle = document.getElementById('menuToggle');

		if (menuToggle) {
			menuToggle.addEventListener('click', function () {
				sidebar.classList.toggle('open');

				if (overlay) {
					overlay.classList.toggle('active');
				}
			});
		}

		if (overlay) {
			overlay.addEventListener('click', function () {
				sidebar.classList.remove('open');
				overlay.classList.remove('active');
			});
		}

		const dropdowns = document.querySelectorAll('.dropdown-toggle');

		dropdowns.forEach(function (dropdown) {

			dropdown.addEventListener('click', function () {

				const parent = this.closest('.menu-dropdown');

				document.querySelectorAll('.menu-dropdown').forEach(function (item) {

					if (item !== parent) {
						item.classList.remove('open');

						const toggle = item.querySelector('.dropdown-toggle');

						if (toggle) {
							toggle.classList.remove('active');
						}
					}

				});

				parent.classList.toggle('open');
				this.classList.toggle('active');

			});

		});

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		const alertMessage = document.getElementById('alertMessage');

		if (alertMessage) {
			setTimeout(function () {
				alertMessage.style.transition = 'opacity 0.5s ease';
				alertMessage.style.opacity = '0';

				setTimeout(function () {
					alertMessage.remove();
				}, 500);
			}, 3000);
		}
	});
</script>
</body>

</html>