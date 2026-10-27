<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Dashboard</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
		rel="stylesheet">

	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif
		}

		body {
			background-color: #f8f9fa;
			min-height: 100vh;
			display: flex;
			overflow-x: hidden
		}

		/* ── SIDEBAR BASE ── */
		.sidebar {
			width: 260px;
			background-color: #0A2F6C;
			color: #fff;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
			position: fixed;
			top: 0;
			bottom: 0;
			left: 0;
			z-index: 1000;
			transition: transform .3s ease;
			overflow: hidden;
		}

		/* ── MOTIF SAMA PERSIS DENGAN bw-head ── */
		/* ── MOTIF SAMA PERSIS DENGAN bw-head ── */
		.sidebar::before {
			content: '';
			position: absolute;
			inset: 0;
			z-index: 0;
			pointer-events: none;
			background-color: #0A2F6C;
			background-image:
				linear-gradient(180deg, rgba(5,15,40,.50) 0%, rgba(5,15,40,.60) 100%),
				url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='120' height='120' viewBox='0 0 120 120'%3E%3Cdefs%3E%3Cg id='f'%3E%3Cg fill='none' stroke='%2393C5FD' stroke-opacity='.55' stroke-width='1.3'%3E%3Cellipse cx='0' cy='-17' rx='8' ry='14'/%3E%3Cellipse cx='0' cy='-17' rx='8' ry='14' transform='rotate(72)'/%3E%3Cellipse cx='0' cy='-17' rx='8' ry='14' transform='rotate(144)'/%3E%3Cellipse cx='0' cy='-17' rx='8' ry='14' transform='rotate(216)'/%3E%3Cellipse cx='0' cy='-17' rx='8' ry='14' transform='rotate(288)'/%3E%3C/g%3E%3Cg fill='%23FBBF24' fill-opacity='.8'%3E%3Ccircle cx='0' cy='-21' r='1.7'/%3E%3Ccircle cx='0' cy='-21' r='1.7' transform='rotate(72)'/%3E%3Ccircle cx='0' cy='-21' r='1.7' transform='rotate(144)'/%3E%3Ccircle cx='0' cy='-21' r='1.7' transform='rotate(216)'/%3E%3Ccircle cx='0' cy='-21' r='1.7' transform='rotate(288)'/%3E%3Ccircle r='4.5'/%3E%3C/g%3E%3Ccircle r='8.5' fill='none' stroke='%23FBBF24' stroke-opacity='.65' stroke-width='1' stroke-dasharray='1.5 3'/%3E%3C/g%3E%3Cg id='l' fill='none' stroke='%2393C5FD' stroke-opacity='.5' stroke-width='1.2' stroke-linecap='round'%3E%3Cpath d='M0,-20 C11,-9 11,9 0,20 C-11,9 -11,-9 0,-20Z'/%3E%3Cpath d='M0,-15 L0,15'/%3E%3Cpath d='M0,-7 L6,-12 M0,1 L7,-4 M0,9 L5,5 M0,-7 L-6,-12 M0,1 L-7,-4 M0,9 L-5,5'/%3E%3C/g%3E%3C/defs%3E%3Cuse xlink:href='%23f' transform='translate(60 60)'/%3E%3Cuse xlink:href='%23f' transform='translate(0 0) scale(.62)'/%3E%3Cuse xlink:href='%23f' transform='translate(120 0) scale(.62)'/%3E%3Cuse xlink:href='%23f' transform='translate(0 120) scale(.62)'/%3E%3Cuse xlink:href='%23f' transform='translate(120 120) scale(.62)'/%3E%3Cuse xlink:href='%23l' transform='translate(30 30) rotate(-45)'/%3E%3Cuse xlink:href='%23l' transform='translate(90 30) rotate(45)'/%3E%3Cuse xlink:href='%23l' transform='translate(30 90) rotate(-135)'/%3E%3Cuse xlink:href='%23l' transform='translate(90 90) rotate(135)'/%3E%3Cg fill='%2393C5FD' fill-opacity='.45'%3E%3Ccircle cx='60' cy='14' r='1.5'/%3E%3Ccircle cx='60' cy='106' r='1.5'/%3E%3Ccircle cx='14' cy='60' r='1.5'/%3E%3Ccircle cx='106' cy='60' r='1.5'/%3E%3Ccircle cx='52' cy='8' r='1'/%3E%3Ccircle cx='68' cy='8' r='1'/%3E%3Ccircle cx='52' cy='112' r='1'/%3E%3Ccircle cx='68' cy='112' r='1'/%3E%3Ccircle cx='8' cy='52' r='1'/%3E%3Ccircle cx='8' cy='68' r='1'/%3E%3Ccircle cx='112' cy='52' r='1'/%3E%3Ccircle cx='112' cy='68' r='1'/%3E%3C/g%3E%3C/svg%3E"),
				linear-gradient(135deg, #0D47A1 0%, #0A2F6C 100%);
			background-size: auto, 120px 120px, auto;
			background-position: 0 0, 0 0, 0 0;
		}

		/* Semua konten sidebar di atas pseudo-element */
		.sidebar>* {
			position: relative;
			z-index: 1
		}

		.sidebar-header {
			height: 84px;
			display: flex;
			align-items: center;
			gap: 10px;
			padding: 16px 14px;
			background-color: rgba(5, 18, 52, 0.55);
			border-bottom: 1px solid rgba(147, 197, 253, 0.15);
		}

		.logo-box {
			width: 44px;
			height: 44px;
			background-color: #fca311;
			color: #083b87;
			display: flex;
			justify-content: center;
			align-items: center;
			border-radius: 9px;
			font-size: 14px;
			font-weight: 700;
			flex-shrink: 0
		}

		.brand-text h2 {
			font-size: 13px;
			font-weight: 700;
			line-height: 1.2;
			color: #fff;
			margin: 0
		}

		.brand-text p {
			font-size: 9px;
			font-weight: 600;
			color: #ffdca1;
			letter-spacing: .8px;
			margin-top: 3px;
			margin-bottom: 0
		}

		.sidebar-menu {
			list-style: none;
			padding: 15px 6px 10px;
			margin: 0;
			flex-grow: 1;
			overflow-y: auto;
			overflow-x: hidden
		}

		.sidebar-menu::-webkit-scrollbar {
			width: 7px
		}

		.sidebar-menu::-webkit-scrollbar-track {
			background: transparent
		}

		.sidebar-menu::-webkit-scrollbar-thumb {
			background: rgba(255, 255, 255, .28);
			border-radius: 10px
		}

		.sidebar-menu>li {
			margin-bottom: 3px
		}

		.sidebar-menu>li>a {
			width: 100%;
			min-height: 40px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			color: #fff;
			text-decoration: none;
			font-size: 12px;
			font-weight: 600;
			padding: 10px 13px;
			border-radius: 9px;
			transition: all .2s ease
		}

		.sidebar-menu>li>a:hover {
			background-color: rgba(255, 255, 255, .10)
		}

		.sidebar-menu>li>a.active {
			background-color: #fca311;
			color: #1f2937;
			font-weight: 700
		}

		.dropdown-toggle::after {
			display: none !important;
			content: none !important
		}

		.dropdown-arrow {
			font-size: 9px;
			margin-left: auto;
			transition: transform .2s ease
		}

		.menu-dropdown.open>.dropdown-toggle .dropdown-arrow {
			transform: rotate(180deg)
		}

		.menu-dropdown>.dropdown-toggle {
			cursor: pointer
		}

		.menu-dropdown.open>.dropdown-toggle {
			background-color: #fca311;
			color: #1f2937;
			font-weight: 700
		}

		.submenu {
			list-style: none;
			margin: 2px 0 5px;
			padding: 0 0 0 7px;
			max-height: 0;
			overflow: hidden;
			transition: max-height .25s ease
		}

		.menu-dropdown.open>.submenu {
			max-height: 180px
		}

		.submenu li {
			margin: 2px 0
		}

		.submenu a {
			display: flex;
			align-items: center;
			width: 100%;
			min-height: 34px;
			padding: 8px 13px;
			border-radius: 8px;
			background-color: rgba(10, 47, 108, 0.55);
			color: #e5ecff;
			text-decoration: none;
			font-size: 11px;
			font-weight: 500;
			transition: all .2s ease
		}

		.submenu a:hover {
			background-color: rgba(255, 255, 255, .13);
			color: #fff
		}

		.submenu a.active {
			background-color: rgba(13, 71, 161, 0.85);
			color: #fff;
			font-weight: 600
		}

		.sidebar-footer {
			padding: 8px 6px 7px;
			background-color: rgba(5, 18, 52, 0.50);
			border-top: 1px solid rgba(147, 197, 253, 0.15);
		}

		.sidebar-footer a {
			min-height: 54px;
			padding: 14px 13px;
			background-color: rgba(255, 255, 255, 0.08);
			border-radius: 9px;
			color: #fff;
			text-decoration: none;
			font-size: 12px;
			font-weight: 700;
			display: flex;
			align-items: center;
			justify-content: space-between;
			border: 1px solid rgba(147, 197, 253, 0.18);
			transition: background-color .2s ease;
		}

		.sidebar-footer a:hover {
			background-color: rgba(255, 255, 255, .15)
		}

		.sidebar-footer .dot {
			width: 8px;
			height: 8px;
			background-color: #62f6b1;
			border-radius: 50%
		}

		/* ── MAIN CONTENT ── */
		.main-content {
			flex-grow: 1;
			margin-left: 260px;
			display: flex;
			flex-direction: column;
			min-height: 100vh;
			width: calc(100% - 260px);
			transition: margin-left .3s ease, width .3s ease
		}

		.top-bar {
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 20px 30px;
			background-color: #f8f9fa;
			position: sticky;
			top: 0;
			z-index: 900
		}

		.menu-toggle {
			display: none;
			background: none;
			border: none;
			font-size: 22px;
			color: #0b3b8c;
			cursor: pointer;
			margin-right: 15px
		}

		.search-container {
			background-color: #eef1f6;
			border-radius: 8px;
			display: flex;
			align-items: center;
			padding: 10px 15px;
			width: 350px;
			color: #6b7280
		}

		.search-container i {
			font-size: 14px;
			margin-right: 10px
		}

		.search-container input {
			border: none;
			background: transparent;
			outline: none;
			font-size: 13px;
			width: 100%;
			color: #4b5563
		}

		.search-container input::placeholder {
			color: #9ca3af
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
			white-space: nowrap
		}

		.content-area {
			padding: 0 30px 30px;
			flex-grow: 1
		}

		.banner {
			background: linear-gradient(135deg, #1c3faa, #2a5298);
			color: #fff;
			padding: 35px 40px;
			border-radius: 12px;
			margin-bottom: 25px;
			box-shadow: 0 4px 15px rgba(0, 0, 0, .1)
		}

		.banner h1 {
			font-size: 24px;
			font-weight: 600;
			line-height: 1.4
		}

		.stats-grid {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			gap: 25px
		}

		.stat-item {
			background-color: #fff;
			border-radius: 12px;
			padding: 25px 30px;
			display: flex;
			justify-content: space-between;
			align-items: center;
			border: 1px solid #f0f0f0;
			transition: transform .2s, box-shadow .2s
		}

		.stat-item:hover {
			transform: translateY(-2px);
			box-shadow: 0 5px 15px rgba(0, 0, 0, .05)
		}

		.stat-info {
			display: flex;
			flex-direction: column;
			gap: 8px
		}

		.stat-title {
			font-size: 11px;
			font-weight: 600;
			color: #7a7a7a;
			letter-spacing: 1px;
			text-transform: uppercase
		}

		.stat-value {
			font-size: 38px;
			font-weight: 700;
			color: #0b1a30;
			line-height: 1
		}

		.stat-icon {
			width: 60px;
			height: 60px;
			border-radius: 14px;
			display: flex;
			justify-content: center;
			align-items: center;
			font-size: 26px;
			flex-shrink: 0
		}

		.icon-fasilitas {
			background-color: #fcece1;
			color: #d98e4a
		}

		.icon-informasi,
		.icon-contact {
			background-color: #d4e6e0;
			color: #2b6b5c
		}

		.icon-produk {
			background-color: #e2e6fa;
			color: #4a5ec7
		}

		.overlay {
			display: none;
			position: fixed;
			inset: 0;
			background-color: rgba(0, 0, 0, .5);
			z-index: 999
		}

		/* ── RESPONSIVE ── */
		@media(max-width:992px) {
			.sidebar {
				transform: translateX(-100%)
			}

			.sidebar.open {
				transform: translateX(0)
			}

			.main-content {
				margin-left: 0;
				width: 100%
			}

			.menu-toggle {
				display: block
			}

			.overlay.active {
				display: block
			}

			.top-bar {
				padding: 15px 20px
			}

			.content-area {
				padding: 0 20px 20px
			}

			.banner {
				padding: 25px 20px
			}

			.banner h1 {
				font-size: 20px
			}
		}

		@media(max-width:768px) {
			.stats-grid {
				grid-template-columns: 1fr
			}

			.search-container {
				width: 100%;
				max-width: 200px
			}

			.btn-profil {
				padding: 10px 20px
			}

			.stat-value {
				font-size: 32px
			}

			.stat-icon {
				width: 50px;
				height: 50px;
				font-size: 22px
			}
		}

		@media(max-width:480px) {
			.top-bar {
				gap: 10px
			}

			.search-container {
				padding: 8px 10px
			}

			.search-container input {
				font-size: 12px
			}

			.btn-profil {
				padding: 8px 15px;
				font-size: 12px
			}

			.banner h1 {
				font-size: 16px
			}

			.stat-item {
				padding: 20px
			}

			.stat-value {
				font-size: 28px
			}

			.stat-icon {
				width: 45px;
				height: 45px;
				font-size: 20px
			}
		}
	</style>
</head>

<body>

<?php
$current_url = strtolower(trim(uri_string(), '/'));

$is_tentang = strpos($current_url, 'admin/tentang') === 0;
$is_website = strpos($current_url, 'admin/beranda') === 0
    || strpos($current_url, 'admin/header') === 0
    || strpos($current_url, 'admin/foot') === 0;
$is_produk = strpos($current_url, 'admin/kategori') === 0
    || strpos($current_url, 'admin/produk') === 0;
?>

<div class="overlay" id="overlay"></div>

<aside class="sidebar" id="sidebar">
    <div>
        <div class="sidebar-header">
            <div class="logo-box">CAB</div>
            <div class="brand-text">
                <h2>Citra Abadi<br>Bermartabat</h2>
                <p>ADMIN</p>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="<?= base_url('home') ?>"
                   class="<?= in_array($current_url, ['home', 'admin/dashboard']) ? 'active' : '' ?>">
                    <span>Dashboard</span>
                </a>
            </li>

				<li class="menu-dropdown <?= $is_website ? 'open' : '' ?>">
					<a href="javascript:void(0)" class="dropdown-toggle <?= $is_website ? 'active' : '' ?>">
						<span>Website</span>
						<i class="fa-solid fa-chevron-down dropdown-arrow"></i>
					</a>
					<ul class="submenu">
						<li><a href="<?= base_url('admin/beranda') ?>"
								class="<?= strpos($current_url, 'admin/beranda') === 0 ? 'active' : '' ?>">Beranda</a>
						</li>
						<li><a href="<?= base_url('admin/header') ?>"
								class="<?= strpos($current_url, 'admin/header') === 0 ? 'active' : '' ?>">Header</a>
						</li>
						<li><a href="<?= base_url('admin/foot') ?>"
							class="<?= strpos($current_url, 'admin/foot') === 0 ? 'active' : '' ?>">Footer</a>
						</li>
					</ul>
				</li>

            <li class="menu-dropdown <?= $is_tentang ? 'open' : '' ?>">
                <a href="javascript:void(0)" class="dropdown-toggle <?= $is_tentang ? 'active' : '' ?>">
                    <span>Tentang Kami</span>
                    <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?= base_url('admin/tentang') ?>" class="<?= $current_url === 'admin/tentang' || strpos($current_url, 'admin/tentang/index') === 0 ? 'active' : '' ?>">Tentang Kami</a></li>
                    <li><a href="<?= base_url('admin/tentang/profil') ?>" class="<?= strpos($current_url, 'admin/tentang/profil') === 0 ? 'active' : '' ?>">Profil Perusahaan</a></li>
                    <li><a href="<?= base_url('admin/tentang/visi_misi') ?>" class="<?= strpos($current_url, 'admin/tentang/visi_misi') === 0 ? 'active' : '' ?>">Visi &amp; Misi</a></li>
                </ul>
            </li>

            <li class="menu-dropdown <?= $is_produk ? 'open' : '' ?>">
                <a href="javascript:void(0)" class="dropdown-toggle <?= $is_produk ? 'active' : '' ?>">
                    <span>Produk</span>
                    <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?= base_url('admin/Kategori') ?>" class="<?= strpos($current_url, 'admin/kategori') === 0 ? 'active' : '' ?>">Kategori Produk</a></li>
                    <li><a href="<?= base_url('admin/produk') ?>" class="<?= strpos($current_url, 'admin/produk') === 0 ? 'active' : '' ?>">Produk</a></li>
                </ul>
            </li>

            <li><a href="#"><span>Informasi</span></a></li>
            <li><a href="#"><span>Jajaran Anggota Struktur</span></a></li>
            <li><a href="#"><span>Fasilitas</span></a></li>
            <li><a href="#"><span>Kontak</span></a></li>
            <li><a href="#"><span>Story</span></a></li>
        </ul>
    </div>

    <div class="sidebar-footer">
        <a href="<?= base_url('auth/logout') ?>">
            <span><i class="fa-solid fa-right-from-bracket"></i>&nbsp; LOGOUT</span>
            <span class="dot"></span>
        </a>
    </div>
</aside>

<main class="main-content">
    <header class="top-bar">
        <div style="display:flex;align-items:center;width:100%;gap:15px">
            <button class="menu-toggle" id="menuToggle" type="button">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="search-container">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Cari modul, SKU, dokumen...">
            </div>
        </div>
        <button class="btn-profil" type="button">Profil</button>
    </header>
