<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PT Citra Abadi Bermartabat</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Plus Jakarta Sans', sans-serif; }

  /* ===== HERO BG ===== */
  .hero-bg {
    background:
      radial-gradient(ellipse 314% 94% at 12% 10%, rgba(245,158,11,.28) 0%, rgba(245,158,11,0) 35%),
      radial-gradient(ellipse 251% 75% at 88% 30%, rgba(13,71,161,.22) 0%, rgba(13,71,161,0) 42%),
      radial-gradient(ellipse 234% 70% at 15% 65%, rgba(254,240,138,.45) 0%, rgba(254,240,138,0) 40%),
      radial-gradient(ellipse 298% 89% at 85% 85%, rgba(2,132,199,.25) 0%, rgba(2,132,199,0) 45%),
      linear-gradient(129deg, #F0F6FF 0%, #fff 28%, #FEF9C3 55%, #FFFBEB 75%, #E0F2FE 100%);
  }

  /* ===== NAVBAR ===== */
  .nav-top-bar {
    background: linear-gradient(90deg,#0A3578 0%,#0D47A1 50%,#1565C0 100%);
    height: 23px;
    border-bottom: 1px solid rgba(251,191,36,.4);
  }
  .navbar-cab {
    background: rgba(255,255,255,.95);
    backdrop-filter: blur(6px);
    box-shadow: 0 4px 20px rgba(13,71,161,.08);
    border-bottom: 1px solid rgba(253,230,138,.5);
  }
  .nav-link-cab { color:#475569; font-weight:700; font-size:14px; }
  .nav-link-cab.active { color:#FEA619; }
  .btn-login {
    background:#FEA619; color:#0D47A1; font-weight:700; font-size:14px;
    border-radius:0; padding:.6rem 1.2rem;
  }

  /* ===== STATUS OPERASIONAL ===== */
  .status-strip {
    background: rgba(255,255,255,.9);
    backdrop-filter: blur(2px);
    border-bottom: 1px solid #FEF3C7;
    box-shadow: 0 1px 2px rgba(0,0,0,.05);
  }
  .machine-item { width: 110px; position: relative; }
  .machine-badge {
    width: 76px; height: 76px; border-radius: 50%;
    padding: 3px; display:inline-flex;
    align-items:center; justify-content:center;
  }
  .machine-badge .inner {
    background:#fff; border-radius:50%; padding:2px; width:100%; height:100%;
    display:flex; align-items:center; justify-content:center;
  }
  .machine-badge .inner img {
    width:64px; height:64px; border-radius:50%; object-fit:cover;
  }
  .grad-amber  { background: linear-gradient(45deg,#F59E0B 0%,#0D47A1 50%,#FBBF24 100%); }
  .grad-blue   { background: linear-gradient(45deg,#0D47A1 0%,#1E40AF 50%,#F59E0B 100%); }
  .grad-amber2 { background: linear-gradient(45deg,#F59E0B 0%,#FBBF24 50%,#0D47A1 100%); }
  .grad-blue2  { background: linear-gradient(45deg,#0D47A1 0%,#1565C0 50%,#F59E0B 100%); }
  .grad-amber3 { background: linear-gradient(45deg,#F59E0B 0%,#0D47A1 50%,#FBBF24 100%); }
  .grad-blue3  { background: linear-gradient(45deg,#0D47A1 0%,#F59E0B 50%,#1565C0 100%); }
  .live-tag {
    position: absolute; bottom: -2px; left: 50%; transform: translateX(-50%);
    background:#DC2626; color:#fff; font-size:9px; font-weight:700;
    letter-spacing:.45px; padding:2px 10px; border-radius:4px;
    box-shadow: 0 1px 3px rgba(0,0,0,.1);
  }

  /* ===== CAROUSEL ===== */
  .section-blue {
    background: linear-gradient(166deg,#0D47A1 0%,#1565C0 50%,#0A2F6C 100%);
  }
  .hero-img {
    height: 380px;
    object-fit: cover;
    object-position: center;
  }
  @media (max-width: 768px) {
    .hero-img { height: 220px; }
  }

  /* ===== HERO TEXT ===== */
  .hero-title { color:#fff; font-weight:800; font-size:48px; line-height:1.25; }
  .hero-sub   { color: rgba(219,234,254,.9); font-size:16px; line-height:26px; }
  @media (max-width: 768px) {
    .hero-title { font-size:30px; }
    .hero-sub { font-size:14px; line-height:22px; }
  }

  .section-tag {
    background: rgba(255,255,255,.1);
    border:1px solid rgba(252,211,77,.4);
    border-radius:9999px; padding:4px 16px;
    color:#FDE68A; font-size:12px; font-weight:700;
    letter-spacing:.3px; text-transform:uppercase;
  }

  .btn-cta {
    background: linear-gradient(90deg,#F59E0B 0%,#FBBF24 50%,#F59E0B 100%);
    border:1px solid rgba(252,211,77,.7);
    color:#0F172A; font-weight:700; border-radius:12px;
    padding:14px 32px;
    box-shadow: 0 4px 6px -4px rgba(0,0,0,.1), 0 10px 15px -3px rgba(0,0,0,.1);
  }

  /* ===== STAT CARDS ===== */
  .stat-card {
    border-radius:12px; padding:16px;
    border:1px solid rgba(252,211,77,.4);
    box-shadow: 0 4px 6px -4px rgba(0,0,0,.1), 0 10px 15px -3px rgba(0,0,0,.1);
  }
  .stat-1 { background: linear-gradient(174deg, rgba(255,255,255,.95) 0%, rgba(239,246,255,.9) 100%); }
  .stat-2 { background: linear-gradient(174deg, rgba(255,255,255,.95) 0%, rgba(255,251,235,.9) 100%); }
  .stat-3 { background: linear-gradient(174deg, rgba(255,255,255,.95) 0%, rgba(236,253,245,.9) 100%); }
  .stat-value-1 { color:#0D47A1; }
  .stat-value-2 { color:#D97706; }
  .stat-value-3 { color:#047857; }

  /* ===== ABOUT / CONTACT / VISI-MISI ===== */
  .about-section {
    background: linear-gradient(142deg, rgba(224,242,254,.9) 0%, rgba(255,255,255,.98) 35%, rgba(254,249,195,.85) 68%, rgba(245,158,11,.22) 88%, rgba(13,71,161,.18) 100%);
  }
  .about-card {
    background: #fff;
    border:1px solid rgba(253,230,138,.8);
    border-radius:16px;
  }
  .contact-card {
    background: linear-gradient(90deg,#fff 0%, rgba(239,246,255,.4) 50%, rgba(255,251,235,.4) 100%);
    border:2px solid rgba(252,211,77,.8);
    border-radius:16px;
    box-shadow: 0 8px 10px -6px rgba(0,0,0,.1), 0 20px 25px -5px rgba(0,0,0,.1);
  }
  .btn-wa {
    background: linear-gradient(90deg,#059669 0%,#0F766E 100%);
    border:1px solid #34D399;
    color:#fff; font-weight:700; border-radius:12px;
    padding:14px 24px;
    box-shadow: 0 2px 4px -2px rgba(0,0,0,.1), 0 4px 6px -1px rgba(0,0,0,.1);
  }

  .visi-card {
    background: linear-gradient(129deg,#fff 0%, rgba(239,246,255,.4) 50%, #fff 100%);
    border:1px solid rgba(253,230,138,.7);
    border-radius:16px;
  }
  .visi-card.amber {
    background: linear-gradient(129deg,#fff 0%, rgba(255,251,235,.3) 50%, #fff 100%);
  }
  .visi-icon {
    width:56px; height:56px; border-radius:12px;
    display:flex; align-items:center; justify-content:center;
    color:#FCD34D;
  }
  .visi-icon.blue { background: linear-gradient(135deg,#0D47A1 0%,#1565C0 100%); }
  .visi-icon.amber { background: linear-gradient(135deg,#F59E0B 0%,#D97706 100%); color:#fff; }

  /* ===== FOOTER ===== */
  footer.footer-cab {
    background: linear-gradient(180deg,#0A2F6C 0%,#0D47A1 50%,#081C3D 100%);
    border-top:2px solid #FBBF24;
    color:#fff;
  }
  .footer-title { color:#fff; font-weight:700; font-size:16px; }
  .footer-text  { color: rgba(219,234,254,.8); font-size:14px; line-height:22.75px; }
  .footer-badge {
    background: rgba(255,255,255,.1);
    border:1px solid rgba(251,191,36,.4);
    border-radius:4px; padding:4px 8px;
    color:#FDE68A; font-size:10px; font-weight:600;
  }
  .footer-bar {
    width:6px; height:16px; border-radius:9999px;
    background:#FBBF24; display:inline-block;
  }
</style>
</head>
<body>

<!-- ============ NAVBAR ============ -->
<header class="sticky-top">
  <div class="nav-top-bar"></div>
  <nav class="navbar-cab">
    <div class="container-fluid px-3 mx-auto" style="max-width:1280px;">
      <div class="d-flex align-items-center justify-content-between py-2" style="min-height:80px;">

        <div class="d-flex align-items-center gap-3">
          <img src="https://placehold.co/68x68" width="68" height="68" alt="Logo">
          <div>
            <div class="fw-bold" style="color:#0D47A1; font-size:16px; line-height:20px;">PT CAB</div>
            <div style="color:#64748B; font-size:10px; font-weight:500; letter-spacing:.4px;">
              Pabrik &amp; Distribusi Beras Modern
            </div>
          </div>
        </div>

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
  <section class="status-strip py-3">
    <div class="container-fluid px-3 mx-auto" style="max-width:1280px;">
      <div class="d-flex align-items-center gap-2 mb-3">
        <span class="rounded-circle d-inline-block" style="width:10px;height:10px;background:#F59E0B;"></span>
        <span style="color:#0D47A1; font-weight:800; font-size:16px;">Story Operasional PT Citra Abadi Bermartabat</span>
      </div>

      <div class="d-flex flex-wrap gap-4 justify-content-start">
        <div class="machine-item text-center">
          <div class="position-relative d-inline-block">
            <span class="machine-badge grad-amber">
              <span class="inner"><img src="https://placehold.co/64x64" alt=""></span>
            </span>
            <span class="live-tag">LIVE</span>
          </div>
          <div class="mt-2 fw-bold" style="color:#1E293B; font-size:12px;">QC Mutu Lab</div>
        </div>
        <div class="machine-item text-center">
          <span class="machine-badge grad-blue">
            <span class="inner"><img src="https://placehold.co/64x64" alt=""></span>
          </span>
          <div class="mt-2 fw-semibold" style="color:#1E293B; font-size:12px;">Giling Subang Line 1</div>
        </div>
        <div class="machine-item text-center">
          <span class="machine-badge grad-amber2">
            <span class="inner"><img src="https://placehold.co/64x64" alt=""></span>
          </span>
          <div class="mt-2 fw-semibold" style="color:#1E293B; font-size:12px;">Pecah Kulit (PK)</div>
        </div>
        <div class="machine-item text-center">
          <span class="machine-badge grad-blue2">
            <span class="inner"><img src="https://placehold.co/64x64" alt=""></span>
          </span>
          <div class="mt-2 fw-semibold" style="color:#1E293B; font-size:12px;">Packing Line Karung</div>
        </div>
        <div class="machine-item text-center">
          <span class="machine-badge grad-amber3">
            <span class="inner"><img src="https://placehold.co/64x64" alt=""></span>
          </span>
          <div class="mt-2 fw-semibold" style="color:#1E293B; font-size:12px;">Muat Tronton Cipinang</div>
        </div>
        <div class="machine-item text-center">
          <span class="machine-badge grad-blue3">
            <span class="inner"><img src="https://placehold.co/64x64" alt=""></span>
          </span>
          <div class="mt-2 fw-semibold" style="color:#1E293B; font-size:12px;">Timbang 60 Ton</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Carousel Hero (diperkecil) -->
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

  <!-- Hero Text / CTA -->
  <section class="section-blue py-5 position-relative overflow-hidden">
    <div class="container mx-auto" style="max-width:1280px;">

      <span class="section-tag d-inline-flex align-items-center gap-2 mb-4">
        <span class="rounded-circle d-inline-block" style="width:10px;height:10px;background:#FBBF24;"></span>
        PT CITRA ABADI BERMARTABAT
      </span>

      <h1 class="hero-title mb-3">
        Pusat Industri Penggilingan Padi &amp; Distribusi Beras Berkualitas Terpadu
      </h1>

      <p class="hero-sub mb-4">
        Menggabungkan presisi teknologi sortasi optik Jepang dengan jaringan kemitraan ribuan<br class="d-none d-md-block">
        petani Nusantara. Melayani pengadaan beras retail kemasan higienis, pasokan grosir Horeka,<br class="d-none d-md-block">
        dan kontrak kontinu industri pangan nasional dengan jaminan sertifikasi SNI &amp; Halal.
      </p>

      <div class="mb-4">
        <a href="#" class="btn btn-cta">Belanja Produk Beras</a>
      </div>

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

  <!-- Tentang PT CAB -->
  <section class="about-section py-5">
    <div class="container mx-auto" style="max-width:1280px;">
      <h2 class="text-center fw-bold mb-5" style="color:#0D47A1; font-size:36px;">
        Tentang PT Citra Abadi Bermartabat
      </h2>

      <div class="row justify-content-center mb-4">
        <div class="col-lg-10">
          <div class="about-card p-4">
            <p style="color:#475569; font-size:18px; line-height:1.7;">
              PT Citra Abadi Bermartabat (PT CAB) adalah perusahaan produsen dan penggilingan beras premium
              berskala besar yang berbasis di Kabupaten Karanganyar, Jawa Tengah. Perusahaan ini dikenal
              sebagai produsen beras berkualitas tinggi yang telah mengantongi sertifikat SPPB PSAT Level 1
              dari Dinas Ketahanan Pangan Provinsi Jawa Tengah, sebuah standarisasi tertinggi yang menjamin
              bahwa seluruh proses produksi dan sanitasi pangan mereka sangat aman serta higienis.
              <br><br>
              Dalam operasionalnya, PT Citra Abadi Bermartabat menyerap hasil panen padi dari petani lokal
              untuk diolah menggunakan mesin modern menjadi berbagai merek dagang beras populer di pasar,
              seperti beras premium Cap Janjoss, Cap Mbok Ben, dan Cap Bengawan yang banyak didistribusikan
              ke berbagai daerah baik secara konvensional maupun melalui platform e-commerce.
            </p>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="contact-card p-4">
            <h3 class="fw-bold mb-2" style="color:#0D47A1; font-size:24px;">Konsultasi Hubungi Contact</h3>
            <p style="color:#475569; font-size:14px; line-height:20px;" class="mb-3">
              Tanyakan harga gabah harian, ketersediaan tonase stok beras, permintaan sertifikasi analisa lab SNI,
              atau pengajuan jadwal muat truk tronton Anda sekarang.
            </p>
            <a href="#" class="btn btn-wa d-inline-flex align-items-center gap-2">
              <span style="color:#FCD34D; font-size:18px;">💬</span>
              Chat WhatsApp: 0811-9238-CAB
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Visi & Misi -->
  <section class="py-5" style="background: linear-gradient(180deg,#fff 0%, #F7FAFF 50%, #fff 100%); border-bottom:1px solid #EFF6FF;">
    <div class="container mx-auto" style="max-width:1280px;">
      <h2 class="text-center fw-bold mb-5" style="color:#0D47A1; font-size:36px;">Visi &amp; Misi</h2>

      <div class="row g-4">

        <!-- Card 1 -->
        <div class="col-lg-3 col-md-6">
          <div class="visi-card h-100 p-4 d-flex flex-column gap-3">
            <div class="visi-icon blue">⭐</div>
            <div>
              <div class="fw-bold mb-1" style="color:#0D47A1; font-size:16px;">Visi &amp; Misi Terpadu</div>
              <p class="mb-0" style="color:#475569; font-size:14px; line-height:22.75px;">
                Menjadi pilar ketahanan pangan Indonesia melalui pengolahan gabah presisi bersertifikasi SNI
                dan sistem distribusi beras pangan sehat terpercaya.
              </p>
            </div>
            <div class="pt-2 mt-auto" style="border-top:1px solid #DBEAFE;">
              <div class="fw-bold" style="color:#0D47A1; font-size:12px;">
                Standar SNI 6128:2020 • Halal BPJPH
              </div>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-lg-3 col-md-6">
          <div class="visi-card amber h-100 p-4 d-flex flex-column gap-3">
            <div class="visi-icon amber">⚖️</div>
            <div>
              <div class="fw-bold mb-1" style="color:#0D47A1; font-size:16px;">Timbangan Sah &amp; Akurat</div>
              <p class="mb-0" style="color:#475569; font-size:14px; line-height:22.75px;">
                Jembatan timbang 60 ton terkalibrasi berkala oleh Badan Metrologi Legal RI.
                Transparansi angka disaksikan langsung oleh supir dan mitra tani pengirim.
              </p>
            </div>
            <div class="pt-2 mt-auto" style="border-top:1px solid #FEF3C7;">
              <div class="fw-bold" style="color:#B45309; font-size:12px;">
                Zero Manipulasi • Cetak Tiket Otomatis
              </div>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-lg-3 col-md-6">
          <div class="visi-card h-100 p-4 d-flex flex-column gap-3">
            <div class="visi-icon blue">🔬</div>
            <div>
              <div class="fw-bold mb-1" style="color:#0D47A1; font-size:16px;">Sortasi Optik Warna</div>
              <p class="mb-0" style="color:#475569; font-size:14px; line-height:22.75px;">
                Memisahkan butir hitam, kapur, batu, kotoran, dan butir patah secara presisi.
                Beras putih alami mengkilap tanpa zat pemutih sintetis atau aroma kimia.
              </p>
            </div>
            <div class="pt-2 mt-auto" style="border-top:1px solid #DBEAFE;">
              <div class="fw-bold" style="color:#0D47A1; font-size:12px;">
                Alami 100% Higienis • Bebas Kutu
              </div>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-lg-3 col-md-6">
          <div class="visi-card amber h-100 p-4 d-flex flex-column gap-3">
            <div class="visi-icon amber">🤝</div>
            <div>
              <div class="fw-bold mb-1" style="color:#0D47A1; font-size:16px;">Mitra Tani &amp; Supplier Adil</div>
              <p class="mb-0" style="color:#475569; font-size:14px; line-height:22.75px;">
                Penentuan harga gabah transparan berbasis rendemen riil lab. Sistem pembayaran tunai
                atau transfer hari itu juga (H-0) tanpa potongan terselubung.
              </p>
            </div>
            <div class="pt-2 mt-auto" style="border-top:1px solid #FEF3C7;">
              <div class="fw-bold" style="color:#B45309; font-size:12px;">
                Pencairan Cepat • Kontrak Pasok Jangka Panjang
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<!-- ============ FOOTER ============ -->
<footer class="footer-cab pt-4 pb-3">
  <div class="container mx-auto" style="max-width:1280px;">
    <div class="row g-4">

      <div class="col-lg-3 col-md-6">
        <div class="d-flex align-items-center gap-2 mb-3">
          <img src="https://placehold.co/32x32" width="32" height="32" style="background:#fff; padding:2px; border-radius:4px;" alt="">
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