<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
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

        .sidebar {
            width: 260px;
            background-color: #0b3b8c;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar-header {
            height: 84px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 16px 14px;
            background-color: #11499b;
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
            flex-shrink: 0;
        }

        .brand-text h2 {
            font-size: 13px;
            font-weight: 700;
            line-height: 1.2;
            color: #ffffff;
            margin: 0;
        }

        .brand-text p {
            font-size: 9px;
            font-weight: 600;
            color: #ffdca1;
            letter-spacing: 0.8px;
            margin-top: 3px;
            margin-bottom: 0;
        }

        /* ================= MENU ================= */

        .sidebar-menu {
            list-style: none;
            padding: 15px 6px 10px;
            margin: 0;
            flex-grow: 1;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 7px;
        }

        .sidebar-menu::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.35);
            border-radius: 10px;
        }

        .sidebar-menu > li {
            margin-bottom: 3px;
        }

        .sidebar-menu > li > a {
            width: 100%;
            min-height: 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #ffffff;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            padding: 10px 13px;
            border-radius: 9px;
            transition: all 0.2s ease;
        }

        .sidebar-menu > li > a:hover {
            background-color: rgba(255, 255, 255, 0.08);
        }

        .sidebar-menu > li > a.active {
            background-color: #fca311;
            color: #1f2937;
            font-weight: 700;
        }

        /* Hilangkan panah bawaan Bootstrap */
        .dropdown-toggle::after {
            display: none !important;
            content: none !important;
        }

        /* Panah dropdown kita sendiri */
        .dropdown-arrow {
            font-size: 9px;
            margin-left: auto;
            transition: transform 0.2s ease;
        }

        .menu-dropdown.open > .dropdown-toggle .dropdown-arrow {
            transform: rotate(180deg);
        }

        .menu-dropdown > .dropdown-toggle {
            cursor: pointer;
        }

        .menu-dropdown.open > .dropdown-toggle {
            background-color: #fca311;
            color: #1f2937;
            font-weight: 700;
        }

        /* ================= SUBMENU ================= */

        .submenu {
            list-style: none;
            margin: 2px 0 5px;
            padding: 0 0 0 7px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.25s ease;
        }

        .menu-dropdown.open .submenu {
            max-height: 180px;
        }

        .submenu li {
            margin: 2px 0;
        }

        .submenu a {
            display: flex;
            align-items: center;
            width: 100%;
            min-height: 34px;
            padding: 8px 13px;
            border-radius: 8px;
            background-color: rgba(30, 64, 175, 0.45);
            color: #e5ecff;
            text-decoration: none;
            font-size: 11px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .submenu a:hover {
            background-color: rgba(255, 255, 255, 0.12);
            color: #ffffff;
        }

        .submenu a.active {
            background-color: #2856a7;
            color: #ffffff;
            font-weight: 600;
        }

        /* ================= LOGOUT ================= */

        .sidebar-footer {
            padding: 8px 6px 7px;
            background-color: #0b3b8c;
        }

        .sidebar-footer a {
            min-height: 54px;
            padding: 14px 13px;
            background-color: #1851a0;
            border-radius: 9px;
            color: #ffffff;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-footer a:hover {
            background-color: #205bac;
        }

        .sidebar-footer .dot {
            width: 8px;
            height: 8px;
            background-color: #62f6b1;
            border-radius: 50%;
        }

        /* ================= KONTEN UTAMA ================= */

        .main-content {
            flex-grow: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: calc(100% - 260px);
            transition: margin-left 0.3s ease, width 0.3s ease;
        }

        /* ================= TOP BAR ================= */

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

        /* ================= AREA KONTEN ================= */

        .content-area {
            padding: 0 30px 30px 30px;
            flex-grow: 1;
        }

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

        /* ================= STATISTIK ================= */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

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

        /* ================= OVERLAY ================= */

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

            .overlay.active {
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

<div class="overlay" id="overlay"></div>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">

    <div>

        <!-- LOGO -->
        <div class="sidebar-header">
            <div class="logo-box">CAB</div>

            <div class="brand-text">
                <h2>Citra Abadi<br>Bermartabat</h2>
                <p>ADMIN</p>
            </div>
        </div>

        <!-- MENU -->
        <ul class="sidebar-menu">

            <!-- DASHBOARD -->
            <li>
                <a href="<?= base_url('admin/dashboard') ?>">
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- WEBSITE -->
            <li class="menu-dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle">
                    <span>Website</span>
                    <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                </a>

                <ul class="submenu">
                    <li>
                        <a href="#">
                            Beranda
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Header
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Footer
                        </a>
                    </li>
                </ul>
            </li>

            <!-- TENTANG KAMI -->
            <li class="menu-dropdown open">
                <a href="javascript:void(0)" class="dropdown-toggle active">
                    <span>Tentang Kami</span>
                    <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                </a>

                <ul class="submenu">

                    <li>
                        <a href="<?= base_url('admin/tentang') ?>" class="active">
                            Tentang Kami
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Profil Perusahaan
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Visi &amp; Misi
                        </a>
                    </li>

                </ul>
            </li>

            <!-- PRODUK -->
            <li class="menu-dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle">
                    <span>Produk</span>
                    <i class="fa-solid fa-chevron-down dropdown-arrow"></i>
                </a>

                <ul class="submenu">

                    <li>
                        <a href="#">
                            Kategori Produk
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Produk
                        </a>
                    </li>

                </ul>
            </li>

            <!-- INFORMASI -->
            <li>
                <a href="#">
                    <span>Informasi</span>
                </a>
            </li>

            <!-- JAJARAN ANGGOTA STRUKTUR -->
            <li>
                <a href="#">
                    <span>Jajaran Anggota Struktur</span>
                </a>
            </li>

            <!-- FASILITAS -->
            <li>
                <a href="#">
                    <span>Fasilitas</span>
                </a>
            </li>

            <!-- KONTAK -->
            <li>
                <a href="#">
                    <span>Kontak</span>
                </a>
            </li>

            <!-- STORY -->
            <li>
                <a href="#">
                    <span>Story</span>
                </a>
            </li>

        </ul>
    </div>

    <!-- LOGOUT -->
    <div class="sidebar-footer">
        <a href="<?= base_url('auth/logout') ?>">
            <span>
                <i class="fa-solid fa-right-from-bracket"></i>
                &nbsp; LOGOUT
            </span>

            <span class="dot"></span>
        </a>
    </div>

</aside>

<!-- KONTEN UTAMA -->
<main class="main-content">

    <!-- TOP BAR -->
    <header class="top-bar">

        <div style="display: flex; align-items: center; width: 100%; gap: 15px;">

            <button class="menu-toggle" id="menuToggle" type="button">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="search-container">
                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    placeholder="Cari modul, SKU, dokumen..."
                >
            </div>

        </div>

        <button class="btn-profil" type="button">
            Profil
        </button>

    </header>
