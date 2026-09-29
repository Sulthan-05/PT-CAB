<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <!-- Import Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Import Google Font (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        /* Reset Dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        /* ================= SIDEBAR ================= */
        /* SIDEBAR */
		.sidebar {
			position: fixed;
			top: 0;
			left: 0;
			width: 288px;
			height: 100vh;
			background: #003178;
			display: flex;
			flex-direction: column;
			z-index: 1000;
			overflow: hidden;
		}

		.sidebar-header {
			height: 95px;
			padding: 0 16px;
			background: #0D47A1;
			display: flex;
			align-items: center;
			gap: 10px;
			flex-shrink: 0;
		}

		.sidebar-logo {
			width: 48px;
			height: 48px;
			background: #FEA619;
			color: #684000;
			border-radius: 10px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 17px;
			font-weight: 800;
			flex-shrink: 0;
		}

		.brand-text {
			min-width: 0;
		}

		.brand-text h2 {
			margin: 0;
			color: #FFFFFF;
			font-size: 15px;
			line-height: 20px;
			font-weight: 700;
		}

		.brand-text p {
			margin: 3px 0 0;
			color: #FFDDB8;
			font-size: 10px;
			line-height: 14px;
			font-weight: 700;
			letter-spacing: .6px;
		}

		.sidebar-menu {
			flex: 1;
			padding: 16px 8px 8px;
			overflow-y: auto;
		}

		.sidebar-menu::-webkit-scrollbar {
			width: 4px;
		}

		.sidebar-menu::-webkit-scrollbar-thumb {
			background: rgba(255,255,255,.18);
			border-radius: 10px;
		}

		.sidebar-menu ul {
			list-style: none;
			margin: 0;
			padding: 0;
		}

		.sidebar-menu > ul > li {
			margin-bottom: 3px;
		}

		.sidebar-menu a {
			text-decoration: none;
		}

		.sidebar-menu > ul > li > a,
		.sidebar-menu .dropdown-toggle {
			min-height: 36px;
			padding: 9px 16px;
			display: flex;
			align-items: center;
			width: 100%;
			border-radius: 10px;
			color: #E2E7FF;
			background: transparent;
			font-size: 12px;
			font-weight: 600;
			line-height: 18px;
			transition: .2s ease;
		}

		.sidebar-menu > ul > li > a:hover,
		.sidebar-menu .dropdown-toggle:hover {
			background: rgba(30,64,175,.45);
			color: #FFFFFF;
		}

		.sidebar-menu .dropdown-toggle {
			cursor: pointer;
		}

		/* DROPDOWN */
		.submenu {
			list-style: none;
			margin: 0;
			padding: 4px 0 2px;
			max-height: 0;
			overflow: hidden;
			opacity: 0;
			transition: max-height .25s ease, opacity .2s ease;
		}

		.menu-dropdown.open .submenu {
			max-height: 180px;
			opacity: 1;
		}

		.menu-dropdown.open > .dropdown-toggle {
			background: #FEA619;
			color: #684000;
			font-size: 16px;
			font-weight: 700;
		}

		.submenu li {
			padding: 3px 0;
		}

		.submenu a {
			display: flex;
			align-items: center;
			width: 223px;
			min-height: 30px;
			margin-left: auto;
			padding: 6px 16px;
			border-radius: 12px;
			background: rgba(30,64,175,.40);
			color: #E2E7FF;
			font-size: 12px;
			font-weight: 600;
			line-height: 18px;
			transition: .2s ease;
		}

		.submenu a:hover,
		.submenu a.active {
			background: rgba(30,64,175,.70);
			color: #FFFFFF;
		}

		/* FOOTER SIDEBAR */
		.sidebar-footer {
			width: 100%;
			padding: 8px;
			flex-shrink: 0;
		}

		.sidebar-footer a {
			width: 100%;
			min-height: 56px;
			padding: 16px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			background: rgba(13,71,161,.80);
			border-radius: 12px;
			color: #D9E2FF;
			text-decoration: none;
			font-size: 15px;
			font-weight: 700;
			line-height: 20px;
			transition: .2s ease;
		}

		.sidebar-footer a:hover {
			background: rgba(13,71,161,1);
			color: #FFFFFF;
		}

		.logout-status {
			width: 9px;
			height: 9px;
			background: #6FFBBE;
			border-radius: 50%;
			flex-shrink: 0;
		}

        /* ================= KONTEN UTAMA ================= */
        .main-content {
            flex-grow: 1;
            margin-left: 260px;
            /* Memberi ruang untuk sidebar fixed */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: calc(100% - 260px);
            transition: margin-left 0.3s ease, width 0.3s ease;
        }

        /* Top Bar */
        .top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 30px;
            background-color: #f8f9fa;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 22px;
            color: #0b3b8c;
            cursor: pointer;
            margin-right: 15px;
        }

        .search-container {
            background-color: #eef1f6;
            border-radius: 8px;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            width: 350px;
            color: #6b7280;
        }

        .search-container i {
            font-size: 14px;
            margin-right: 10px;
        }

        .search-container input {
            border: none;
            background: transparent;
            outline: none;
            font-size: 13px;
            width: 100%;
            color: #4b5563;
        }

        .search-container input::placeholder {
            color: #9ca3af;
        }

        .btn-profil {
            background-color: #f59e0b;
            color: #1a202c;
            border: none;
            padding: 10px 35px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
        }

        /* Area Konten */
        .content-area {
            padding: 0 30px 30px 30px;
            flex-grow: 1;
        }

        /* Banner Biru */
        .banner {
            background: linear-gradient(135deg, #1c3faa, #2a5298);
            color: #ffffff;
            padding: 35px 40px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .banner h1 {
            font-size: 24px;
            font-weight: 600;
            line-height: 1.4;
        }

        /* Grid Statistik */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        /* Kartu Statistik (Tanpa border & shadow tebal) */
        .stat-item {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #f0f0f0;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .stat-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .stat-title {
            font-size: 11px;
            font-weight: 600;
            color: #7a7a7a;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .stat-value {
            font-size: 38px;
            font-weight: 700;
            color: #0b1a30;
            line-height: 1;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 26px;
            flex-shrink: 0;
        }

        /* Warna Ikon */
        .icon-fasilitas {
            background-color: #fcece1;
            color: #d98e4a;
        }

        .icon-informasi,
        .icon-contact {
            background-color: #d4e6e0;
            color: #2b6b5c;
        }

        .icon-produk {
            background-color: #e2e6fa;
            color: #4a5ec7;
        }

        /* Overlay untuk mobile */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* ================= RESPONSIVE ================= */

        /* Tablet & HP (Lebar < 992px) */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .menu-toggle {
                display: block;
            }

            .top-bar {
                padding: 15px 20px;
            }

            .content-area {
                padding: 0 20px 20px 20px;
            }

            .banner {
                padding: 25px 20px;
            }

            .banner h1 {
                font-size: 20px;
            }
        }

        /* HP Kecil (Lebar < 768px) */
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .search-container {
                width: 100%;
                max-width: 200px;
            }

            .btn-profil {
                padding: 10px 20px;
            }

            .stat-value {
                font-size: 32px;
            }

            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 22px;
            }
        }

        /* HP Sangat Kecil (Lebar < 480px) */
        @media (max-width: 480px) {
            .top-bar {
                gap: 10px;
            }

            .search-container {
                padding: 8px 10px;
            }

            .search-container input {
                font-size: 12px;
            }

            .btn-profil {
                padding: 8px 15px;
                font-size: 12px;
            }

            .banner h1 {
                font-size: 16px;
            }

            .stat-item {
                padding: 20px;
            }

            .stat-value {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

    <!-- Overlay untuk mobile saat sidebar terbuka -->
    <div class="overlay" id="overlay"></div>

    <!-- SIDEBAR KIRI -->
    <!-- SIDEBAR -->
	<aside class="sidebar" id="sidebar">

		<div class="sidebar-header">
			<div class="sidebar-logo">CAB</div>

			<div class="brand-text">
				<h2>Citra Abadi<br>Bermartabat</h2>
				<p>ADMIN</p>
			</div>
		</div>

		<nav class="sidebar-menu">
			<ul>

				<li>
					<a href="<?= base_url('admin/dashboard'); ?>">
						Dashboard
					</a>
				</li>

				<li class="menu-dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle">
						Website
					</a>

					<ul class="submenu">
						<li>
							<a href="<?= base_url('admin/website/beranda'); ?>">
								Beranda
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/website/header'); ?>">
								Header
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/website/footer'); ?>">
								Footer
							</a>
						</li>
					</ul>
				</li>

				<li class="menu-dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle">
						Tentang Kami
					</a>

					<ul class="submenu">
						<li>
							<a href="<?= base_url('admin/profil-perusahaan'); ?>">
								Profil Perusahaan
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/tentang-kami'); ?>">
								Tentang Kami
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/visi-misi'); ?>">
								Visi &amp; Misi
							</a>
						</li>
					</ul>
				</li>

				<li class="menu-dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle">
						Produk
					</a>

					<ul class="submenu">
						<li>
							<a href="<?= base_url('admin/kategori-produk'); ?>">
								Kategori Produk
							</a>
						</li>
						<li>
							<a href="<?= base_url('admin/produk'); ?>">
								Produk
							</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="<?= base_url('admin/informasi'); ?>">
						Informasi
					</a>
				</li>

				<li>
					<a href="<?= base_url('admin/jajaran-struktur'); ?>">
						Jajaran Anggota Struktur
					</a>
				</li>

				<li>
					<a href="<?= base_url('admin/fasilitas'); ?>">
						Fasilitas
					</a>
				</li>

				<li>
					<a href="<?= base_url('admin/kontak'); ?>">
						Kontak
					</a>
				</li>

				<li>
					<a href="<?= base_url('admin/story'); ?>">
						Story
					</a>
				</li>

			</ul>
		</nav>

		<div class="sidebar-footer">
			<a href="<?= base_url('auth/logout'); ?>">
				<span>LOGOUT</span>
				<span class="logout-status"></span>
			</a>
		</div>

	</aside>

    <!-- KONTEN UTAMA KANAN -->
    <main class="main-content">

        <!-- Top Bar (Search & Profil) -->
        <header class="top-bar">
            <div style="display: flex; align-items: center; width: 100%; gap: 15px;">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="search-container">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Cari modul, SKU, dokumen...">
                </div>
            </div>
            <button class="btn-profil">Profil</button>
        </header>
        