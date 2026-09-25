<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <!-- Import Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Import Google Font (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
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

        /* Logo Area */
        .sidebar-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 25px 20px;
        }

        .logo-box {
            background-color: #ffffff;
            color: #0b3b8c;
            width: 45px;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
            flex-shrink: 0;
        }

        .brand-text h2 {
            font-size: 13px;
            font-weight: 600;
            line-height: 1.2;
        }

        .brand-text p {
            font-size: 10px;
            color: #a0b4d6;
            letter-spacing: 1px;
            margin-top: 2px;
        }

        /* Menu Navigasi */
        .sidebar-menu {
            list-style: none;
            padding: 0 15px;
            margin-top: 10px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: block;
            color: #ffffff;
            text-decoration: none;
            font-size: 13px;
            font-weight: 400;
            padding: 12px 15px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .sidebar-menu a.active {
            background-color: #f59e0b;
            font-weight: 600;
            color: #1a202c;
        }

        .sidebar-menu a:hover:not(.active) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Tombol Logout */
        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-footer a {
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-footer .dot {
            width: 8px;
            height: 8px;
            background-color: #10b981;
            border-radius: 50%;
        }

        /* ================= KONTEN UTAMA ================= */
        .main-content {
            flex-grow: 1;
            margin-left: 260px; /* Memberi ruang untuk sidebar fixed */
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
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
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
        .icon-fasilitas { background-color: #fcece1; color: #d98e4a; }
        .icon-informasi, .icon-contact { background-color: #d4e6e0; color: #2b6b5c; }
        .icon-produk { background-color: #e2e6fa; color: #4a5ec7; }

        /* Overlay untuk mobile */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5);
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
    <aside class="sidebar" id="sidebar">
        <div>
            <div class="sidebar-header">
                <div class="logo-box">CAB</div>
                <div class="brand-text">
                    <h2>Citra Abadi Bermartabat</h2>
                    <p>ADMIN</p>
                </div>
            </div>
            
            <ul class="sidebar-menu">
                <li><a href="#" class="active">Dashboard</a></li>
                <li><a href="#">Website</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Produk</a></li>
                <li><a href="#">Informasi</a></li>
                <li><a href="#">Jajaran Anggota Struktur</a></li>
                <li><a href="#">Fasilitas</a></li>
                <li><a href="#">Kontak</a></li>
                <li><a href="#">Story</a></li>
            </ul>
        </div>
        
        <div class="sidebar-footer">
            <a href="#">
                LOGOUT
                <span class="dot"></span>
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

        <!-- Area Konten -->
        <div class="content-area">
            
            <!-- Banner Biru -->
            <div class="banner">
                <h1>Selamat Datang Di Sistem Pengelolaan PT Citra Abadi Bermartabat</h1>
            </div>

            <!-- Grid Statistik -->
            <div class="stats-grid">
                
                <div class="stat-item">
                    <div class="stat-info">
                        <span class="stat-title">Total Fasilitas</span>
                        <span class="stat-value">121</span>
                    </div>
                    <div class="stat-icon icon-fasilitas">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-info">
                        <span class="stat-title">Total Informasi</span>
                        <span class="stat-value">11</span>
                    </div>
                    <div class="stat-icon icon-informasi">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-info">
                        <span class="stat-title">Total Contact</span>
                        <span class="stat-value">5</span>
                    </div>
                    <div class="stat-icon icon-contact">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-info">
                        <span class="stat-title">Total Produk</span>
                        <span class="stat-value">23</span>
                    </div>
                    <div class="stat-icon icon-produk">
                        <i class="fa-solid fa-percent"></i>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Script untuk Toggle Sidebar di Mobile -->
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.style.display = sidebar.classList.contains('open') ? 'block' : 'none';
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.style.display = 'none';
        });
    </script>

</body>
</html>