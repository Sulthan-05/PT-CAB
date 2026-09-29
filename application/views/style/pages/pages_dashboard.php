<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT Citra Abadi Bermartabat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">
  <style>
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .hero-bg {
      background:
        radial-gradient(ellipse 314% 94% at 12% 10%, rgba(245, 158, 11, .28) 0%, rgba(245, 158, 11, 0) 35%),
        radial-gradient(ellipse 251% 75% at 88% 30%, rgba(13, 71, 161, .22) 0%, rgba(13, 71, 161, 0) 42%),
        radial-gradient(ellipse 234% 70% at 15% 65%, rgba(254, 240, 138, .45) 0%, rgba(254, 240, 138, 0) 40%),
        radial-gradient(ellipse 298% 89% at 85% 85%, rgba(2, 132, 199, .25) 0%, rgba(2, 132, 199, 0) 45%),
        linear-gradient(129deg, #F0F6FF 0%, #fff 28%, #FEF9C3 55%, #FFFBEB 75%, #E0F2FE 100%);
    }

    .nav-top-bar {
      background: linear-gradient(90deg, #0A3578 0%, #0D47A1 50%, #1565C0 100%);
      height: 23px;
      border-bottom: 1px solid rgba(251, 191, 36, .4);
    }

    .navbar-cab {
      background: rgba(255, 255, 255, .95);
      backdrop-filter: blur(6px);
      box-shadow: 0 4px 20px rgba(13, 71, 161, .08);
      border-bottom: 1px solid rgba(253, 230, 138, .5);
    }

    .nav-link-cab {
      color: #475569;
      font-weight: 700;
      font-size: 14px;
    }

    .nav-link-cab.active {
      color: #FEA619;
    }

    .btn-login {
      background: #FEA619;
      color: #0D47A1;
      font-weight: 700;
      font-size: 14px;
      border-radius: 0;
      padding: .6rem 1.2rem;
    }

    .machine-badge {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      padding: 3px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .machine-badge .inner {
      background: #fff;
      border-radius: 50%;
      padding: 2px;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .machine-badge .inner img {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      object-fit: cover;
    }

    .machine-badge.grad-amber {
      background: linear-gradient(45deg, #F59E0B 0%, #0D47A1 50%, #FBBF24 100%);
    }

    .machine-badge.grad-blue {
      background: linear-gradient(45deg, #0D47A1 0%, #1E40AF 50%, #F59E0B 100%);
    }

    .machine-badge.grad-amber2 {
      background: linear-gradient(45deg, #F59E0B 0%, #FBBF24 50%, #0D47A1 100%);
    }

    .machine-badge.grad-blue2 {
      background: linear-gradient(45deg, #0D47A1 0%, #1565C0 50%, #F59E0B 100%);
    }

    .machine-badge.grad-amber3 {
      background: linear-gradient(45deg, #F59E0B 0%, #0D47A1 50%, #FBBF24 100%);
    }

    .machine-badge.grad-blue3 {
      background: linear-gradient(45deg, #0D47A1 0%, #F59E0B 50%, #1565C0 100%);
    }

    .live-tag {
      position: absolute;
      bottom: 6px;
      left: 50%;
      transform: translateX(-50%);
      background: #DC2626;
      color: #fff;
      font-size: 9px;
      font-weight: 700;
      letter-spacing: .45px;
      padding: 2px 10px;
      border-radius: 4px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, .1);
    }

    .machine-item {
      width: 120px;
      position: relative;
    }

    .hero-title {
      color: #fff;
      font-weight: 800;
      font-size: 48px;
      line-height: 1.25;
    }

    .hero-sub {
      color: rgba(219, 234, 254, .9);
      font-size: 16px;
      line-height: 26px;
    }

    .btn-cta {
      background: linear-gradient(90deg, #F59E0B 0%, #FBBF24 50%, #F59E0B 100%);
      border: 1px solid rgba(252, 211, 77, .7);
      color: #0F172A;
      font-weight: 700;
      border-radius: 12px;
      padding: 14px 32px;
      box-shadow: 0 4px 6px -4px rgba(0, 0, 0, .1), 0 10px 15px -3px rgba(0, 0, 0, .1);
    }

    .stat-card {
      border-radius: 12px;
      padding: 16px;
      border: 1px solid rgba(252, 211, 77, .4);
      box-shadow: 0 4px 6px -4px rgba(0, 0, 0, .1), 0 10px 15px -3px rgba(0, 0, 0, .1);
    }

    .stat-1 {
      background: linear-gradient(174deg, rgba(255, 255, 255, .95) 0%, rgba(239, 246, 255, .9) 100%);
    }

    .stat-2 {
      background: linear-gradient(174deg, rgba(255, 255, 255, .95) 0%, rgba(255, 251, 235, .9) 100%);
    }

    .stat-3 {
      background: linear-gradient(174deg, rgba(255, 255, 255, .95) 0%, rgba(236, 253, 245, .9) 100%);
    }

    .stat-value-1 {
      color: #0D47A1;
    }

    .stat-value-2 {
      color: #D97706;
    }

    .stat-value-3 {
      color: #047857;
    }

    .section-blue {
      background: linear-gradient(166deg, #0D47A1 0%, #1565C0 50%, #0A2F6C 100%);
    }

    .about-card {
      background: linear-gradient(129deg, #fff 0%, rgba(255, 251, 235, .3) 50%, #fff 100%);
      border: 1px solid rgba(253, 230, 138, .7);
      border-radius: 16px;
    }

    footer.footer-cab {
      background: linear-gradient(180deg, #0A2F6C 0%, #0D47A1 50%, #081C3D 100%);
      border-top: 2px solid #FBBF24;
      color: #fff;
    }

    .footer-title {
      color: #fff;
      font-weight: 700;
      font-size: 16px;
    }

    .footer-text {
      color: rgba(219, 234, 254, .8);
      font-size: 14px;
      line-height: 22.75px;
    }

    .footer-badge {
      background: rgba(255, 255, 255, .1);
      border: 1px solid rgba(251, 191, 36, .4);
      border-radius: 4px;
      padding: 4px 8px;
      color: #FDE68A;
      font-size: 10px;
      font-weight: 600;
    }

    .footer-bar {
      color: #FBBF24;
      width: 6px;
      height: 16px;
      border-radius: 9999px;
      background: #FBBF24;
      display: inline-block;
    }

    .section-tag {
      background: rgba(255, 255, 255, .1);
      border: 1px solid rgba(252, 211, 77, .4);
      border-radius: 9999px;
      padding: 4px 16px;
      color: #FDE68A;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .3px;
      text-transform: uppercase;
    }

    .status-strip {
      background: rgba(255, 255, 255, .9);
      backdrop-filter: blur(2px);
      border-bottom: 1px solid #FEF3C7;
      box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
    }

    .hero-img {
      height: 380px;
      /* atur tinggi sesuai selera */
      object-fit: cover;
      /* biar gambar tidak gepeng */
      object-position: center;
    }

    /* Responsif: di layar kecil tinggi dikurangi */
    @media (max-width: 768px) {
      .hero-img {
        height: 220px;
      }
    }
  </style>
</head>

<body>

  <!-- ============ NAVBAR ============ -->
  <header class="sticky-top">
    <div class="nav-top-bar"></div>
    <nav class="navbar-cab">
      <div class="container-fluid px-3" style="max-width:1280px;">
        <div class="d-flex align-items-center justify-content-between py-2" style="height:80px;">

          <!-- Brand -->
          <div class="d-flex align-items-center gap-3">
            <img src="https://placehold.co/68x68" width="68" height="68" alt="Logo">
            <div>
              <div class="fw-bold" style="color:#0D47A1; font-size:16px; line-height:20px;">PT CAB</div>
              <div style="color:#64748B; font-size:10px; font-weight:500; letter-spacing:.4px;">
                Pabrik &amp; Distribusi Beras Modern
              </div>
            </div>
          </div>

          <!-- Menu -->
          <ul class="nav d-none d-lg-flex align-items-center gap-4 mb-0">
            <li class="nav-item"><a class="nav-link nav-link-cab active p-1" href="#">Beranda</a></li>
            <li class="nav-item"><a class="nav-link nav-link-cab p-1" href="#">Tentang Kami</a></li>
            <li class="nav-item"><a class="nav-link nav-link-cab p-1" href="#">Produk</a></li>
            <li class="nav-item"><a class="nav-link nav-link-cab p-1" href="#">Informasi</a></li>
            <li class="nav-item"><a class="nav-link nav-link-cab p-1" href="#">Fasilitas</a></li>
            <li class="nav-item"><a class="nav-link nav-link-cab p-1" href="#">Jajaran Struktur</a></li>
            <li class="nav-item"><a class="nav-link nav-link-cab p-1" href="#">Kontak Kami</a></li>
          </ul>

          <a href="#" class="btn btn-login">Login</a>
        </div>
      </div>
    </nav>
  </header>

  <!-- ============ HERO ============ -->
  <main class="hero-bg">

    <!-- Status Operasional -->
    <section class="status-strip py-2">
      <div class="container-fluid px-3" style="max-width:1280px;">
        <div class="d-flex align-items-center gap-2 mb-3">
          <span class="rounded-circle d-inline-block" style="width:10px;height:10px;background:#F59E0B;"></span>
          <span style="color:#0D47A1; font-weight:800; font-size:16px;">Story Operasional PT Citra Abadi
            Bermartabat</span>
        </div>

        <div class="d-flex flex-wrap gap-4 justify-content-start">
          <!-- Item 1 -->
          <div class="machine-item text-center">
            <div class="position-relative d-inline-block">
              <span class="machine-badge grad-amber">
                <span class="inner"><img src="https://placehold.co/64x64" alt=""></span>
              </span>
              <span class="live-tag">LIVE</span>
            </div>
            <div class="mt-2 fw-bold" style="color:#1E293B; font-size:12px;">QC Mutu Lab</div>
          </div>
          <!-- Item 2 -->
          <div class="machine-item text-center">
            <span class="machine-badge grad-blue">
              <span class="inner"><img src="https://placehold.co/64x64" alt=""></span>
            </span>
            <div class="mt-2 fw-semibold" style="color:#1E293B; font-size:12px;">Giling Subang Line 1</div>
          </div>
          <!-- Item 3 -->
          <div class="machine-item text-center">
            <span class="machine-badge grad-amber2">
              <span class="inner"><img src="https://placehold.co/64x64" alt=""></span>
            </span>
            <div class="mt-2 fw-semibold" style="color:#1E293B; font-size:12px;">Pecah Kulit (PK)</div>
          </div>
          <!-- Item 4 -->
          <div class="machine-item text-center">
            <span class="machine-badge grad-blue2">
              <span class="inner"><img src="https://placehold.co/64x64" alt=""></span>
            </span>
            <div class="mt-2 fw-semibold" style="color:#1E293B; font-size:12px;">Packing Line Karung</div>
          </div>
          <!-- Item 5 -->
          <div class="machine-item text-center">
            <span class="machine-badge grad-amber3">
              <span class="inner"><img src="https://placehold.co/64x64" alt=""></span>
            </span>
            <div class="mt-2 fw-semibold" style="color:#1E293B; font-size:12px;">Muat Tronton Cipinang</div>
          </div>
          <!-- Item 6 -->
          <div class="machine-item text-center">
            <span class="machine-badge grad-blue3">
              <span class="inner"><img src="https://placehold.co/64x64" alt=""></span>
            </span>
            <div class="mt-2 fw-semibold" style="color:#1E293B; font-size:12px;">Timbang 60 Ton</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Image besar -->
    <!-- Carousel Hero -->
    <section class="section-blue position-relative overflow-hidden">
      <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://placehold.co/1280x500" class="d-block w-100 hero-img" alt="Slide 1">
          </div>
          <div class="carousel-item">
            <img src="https://placehold.co/1280x500" class="d-block w-100 hero-img" alt="Slide 2">
          </div>
          <div class="carousel-item">
            <img src="https://placehold.co/1280x500" class="d-block w-100 hero-img" alt="Slide 3">
          </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </section>

    <!-- Konten Hero -->
    <section class="section-blue py-5 position-relative overflow-hidden">
      <div class="container" style="max-width:1280px;">

        <span class="section-tag d-inline-flex align-items-center gap-2 mb-4">
          <span class="rounded-circle d-inline-block" style="width:10px;height:10px;background:#FBBF24;"></span>
          PT CITRA ABADI BERMARTABAT
        </span>

        <h1 class="hero-title mb-3">
          Pusat Industri Penggilingan Padi &amp; Distribusi Beras Berkualitas Terpadu
        </h1>

        <p class="hero-sub mb-4">
          Menggabungkan presisi teknologi sortasi optik Jepang dengan jaringan kemitraan ribuan<br>
          petani Nusantara. Melayani pengadaan beras retail kemasan higienis, pasokan grosir Horeka,<br>
          dan kontrak kontinu industri pangan nasional dengan jaminan sertifikasi SNI &amp; Halal.
        </p>

        <div class="mb-4">
          <a href="#" class="btn btn-cta">Belanja Produk Beras</a>
        </div>

        <!-- Stat Cards -->
        <div class="row g-3">
          <div class="col-12 col-md-4">
            <div class="stat-card stat-1 h-100">
              <div class="stat-value-1 fw-bold" style="font-size:22px;">150+ Ton</div>
              <div class="fw-semibold" style="color:#475569; font-size:10px; letter-spacing:.4px;">
                Kapasitas Giling / Hari
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="stat-card stat-2 h-100">
              <div class="stat-value-2 fw-bold" style="font-size:22px;">100% Sah</div>
              <div class="fw-semibold" style="color:#475569; font-size:10px; letter-spacing:.4px;">
                Tera Metrologi Legal RI
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="stat-card stat-3 h-100">
              <div class="stat-value-3 fw-bold" style="font-size:22px;">H-0 Cair</div>
              <div class="fw-semibold" style="color:#475569; font-size:10px; letter-spacing:.4px;">
                Pembayaran Tunai Petani
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Tentang CAB -->
    <section class="py-5"
      style="background: linear-gradient(180deg,#fff 0%, #F7FAFF 50%, #fff 100%); border-bottom:1px solid #EFF6FF;">
      <div class="container" style="max-width:1280px;">
        <h2 class="text-center fw-bold mb-5" style="color:#0D47A1; font-size:36px;">Tentang CAB</h2>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="about-card p-4">
              <p style="color:#475569; font-size:18px; line-height:1.7;">
                PT Citra Abadi Bermartabat merupakan perusahaan industri yang bergerak di bidang
                pengolahan dan penggilingan beras yang berpusat di Jalan Derpoyudo, Pronasan, Gedong,
                Kecamatan Karanganyar, Kabupaten Karanganyar, Jawa Tengah.
                <br><br>
                PT Citra Abadi Bermartabat telah memproduksi dan memasarkan sekitar 13 jenis merek
                dagang produk beras yang telah didistribusikan secara luas dan bersaing di berbagai
                wilayah perdagangan di Indonesia.
              </p>
              <hr style="border-color:#FEF3C7;">
              <a href="#" class="fw-bold text-decoration-none" style="color:#B45309;">Pelajari Lebih Lanjut →</a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- ============ FOOTER ============ -->
  <footer class="footer-cab pt-4 pb-3">
    <div class="container" style="max-width:1280px;">
      <div class="row g-4">

        <!-- Kolom 1: Brand -->
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center gap-2 mb-3">
            <img src="https://placehold.co/32x32" width="32" height="32"
              style="background:#fff; padding:2px; border-radius:4px;" alt="">
            <div>
              <div class="footer-title">PT CAB</div>
              <div style="color:#FCD34D; font-size:10px; font-weight:700; letter-spacing:.4px;">
                Citra Abadi Bermartabat
              </div>
            </div>
          </div>
          <p class="footer-text">
            Pionir modernisasi penggilingan gabah padi dan suplai beras curah higienis
            berstandar industri dengan teknologi optical sorter dan dryer mutakhir.
          </p>
          <div class="d-flex flex-wrap gap-2">
            <span class="footer-badge">NIB: 912000384112</span>
            <span class="footer-badge">KEMTAN RI: PD-32.13-A.I</span>
            <span class="footer-badge">HALAL ID: 32110008472</span>
          </div>
        </div>

        <!-- Kolom 2: Lokasi Pabrik -->
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="footer-bar"></span>
            <span class="footer-title">Lokasi Pabrik &amp; Gudang</span>
          </div>
          <p class="footer-text mb-2">
            PT. Citra Abadi Bermartabat merupakan sebuah perusahaan di bidang pangan
            yang khususnya di bahan makanan pokok yaitu beras.
          </p>
          <p class="footer-text mb-0">
            <u>Alamat</u>: Jl. Derpoyudo, Gedong, Kec. Karanganyar, Kabupaten Karanganyar, Jawa Tengah 57716
          </p>
        </div>

        <!-- Kolom 3: Sosial Media -->
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="footer-bar"></span>
            <span class="footer-title">Contact Media Sosial</span>
          </div>
          <ul class="list-unstyled footer-text mb-0 d-flex flex-column gap-2">
            <li>• Whatsapp (09899066)</li>
            <li>• Instagram (Citra Abadi Bermartabat)</li>
            <li>• TikTok (PT CAB)</li>
            <li>• LinkedIn (CAB)</li>
          </ul>
        </div>

        <!-- Kolom 4: Peta -->
        <div class="col-lg-3 col-md-6">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="footer-bar"></span>
            <span class="footer-title">Lokasi PT CAB</span>
          </div>
          <div class="p-2 rounded-3" style="background: rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.15);">
            <img src="https://placehold.co/250x200" class="img-fluid rounded" alt="Map">
          </div>
        </div>
      </div>

      <hr style="border-color: rgba(96,165,250,.3); margin-top: 2rem;">

      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
        <div style="color:#BFDBFE; font-size:12px;">
          © 2025 PT Citra Abadi Bermartabat. Seluruh Hak Cipta Dilindungi Undang-Undang.
        </div>
        <div class="d-flex gap-3" style="color:#BFDBFE; font-size:12px;">
          <a href="#" class="text-decoration-none" style="color:#BFDBFE;">Syarat Kemitraan</a>
          <span>•</span>
          <a href="#" class="text-decoration-none" style="color:#BFDBFE;">Standar Mutu SNI</a>
          <span>•</span>
          <a href="#" class="text-decoration-none" style="color:#BFDBFE;">Karir &amp; Magang</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>