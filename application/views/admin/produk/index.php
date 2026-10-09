<?php include(APPPATH . 'views/layout/head.php'); ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - PT Citra Abadi Bermartabat</title>

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons 1.11.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('application/views/style/admin_produk.css') ?>">
    <style>
        /* HEADER HALAMAN PRODUK */
        .produk-header {
            background: linear-gradient(135deg, #1c3faa, #2a5298);
            color: #ffffff;
            padding: 30px 35px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        /* JUDUL HEADER */
        .produk-header h3 {
            font-size: 24px;
            font-weight: 600;
            color: #ffffff;
            margin: 0 0 6px 0;
        }

        /* DESKRIPSI HEADER */
        .produk-header p {
            margin: 0;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.6;
        }

        /* TOMBOL TAMBAH PRODUK */
        .btn-tambah-produk {
            background-color: #f59e0b;
            color: #1a202c;
            border: none;
            padding: 11px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.2s ease;
        }

        .btn-tambah-produk:hover {
            background-color: #fbbf24;
            color: #0b3b8c;
            transform: translateY(-1px);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .produk-header {
                flex-direction: column;
                align-items: flex-start;
                padding: 25px 22px;
            }

            .btn-tambah-produk {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .produk-header {
                padding: 22px 18px;
            }

            .produk-header h3 {
                font-size: 20px;
            }

            .produk-header p {
                font-size: 12px;
            }
        }
    </style>

</head>

<body class="bg-light">

    <div class="container py-4">

        <!-- HEADER -->

        <!-- HEADER PRODUK -->
        <div
            class="produk-header d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <h3 class="fw-bold mb-1">Produk Beras</h3>
                <p class="mb-0">
                    Kelola daftar produk beras yang tersedia untuk pelanggan.
                </p>
            </div>

            <button type="button" class="btn btn-tambah-produk d-flex align-items-center justify-content-center gap-2"
                data-bs-toggle="modal" data-bs-target="#modalTambahProduk">

                <i class="bi bi-plus-lg"></i>
                Tambah Produk
            </button>
        </div>

        <!-- ALERT FLASHDATA -->
        <?= $this->session->flashdata('alert'); ?>

        <!-- FILTER & SEARCH -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-3">
                <div class="row g-3">
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i
                                    class="bi bi-search text-muted"></i></span>
                            <input type="text" id="searchInput" class="form-control border-start-0 ps-0"
                                placeholder="Cari nama produk, kategori, atau berat...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select id="filterKategori" class="form-select">
                            <option value="">Semua Kategori</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k->nama_kategori ?>"><?= $k->nama_kategori ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="filterUnggulan" class="form-select">
                            <option value="">Semua Produk</option>
                            <option value="unggulan">Produk Unggulan</option>
                            <option value="biasa">Produk Biasa</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- GRID PRODUK -->
        <div class="row g-4" id="produkGrid">
            <?php if (empty($produk)): ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada data produk.</p>
                </div>
            <?php else: ?>
                <?php foreach ($produk as $p): ?>
                    <?php
                    // Logika Badge & Filter Data Attributes
                    $is_unggulan = $p->produk_unggulan == 1;
                    $badge_class = $is_unggulan ? 'bg-warning-custom' : 'bg-primary-custom';
                    $badge_text = $is_unggulan ? 'Produk Unggulan' : ($p->nama_kategori ?? 'Umum');
                    $search_text = strtolower($p->nama_produk . ' ' . ($p->nama_kategori ?? '') . ' ' . $p->berat);
                    ?>
                    <div class="col-md-6 col-lg-4 produk-item" data-nama="<?= strtolower($p->nama_produk) ?>"
                        data-kategori="<?= $p->nama_kategori ?? '' ?>" data-berat="<?= strtolower($p->berat) ?>"
                        data-unggulan="<?= $is_unggulan ? 'unggulan' : 'biasa' ?>">

                        <div class="card card-produk h-100 border-0 shadow-sm">
                            <!-- FOTO PRODUK -->
                            <div class="position-relative overflow-hidden img-wrapper">
                                <?php if ($p->foto_utama && file_exists('./assets/uploads/produk/' . $p->foto_utama)): ?>
                                    <img src="<?= base_url('assets/uploads/produk/' . $p->foto_utama) ?>" class="card-img-top"
                                        alt="<?= $p->nama_produk ?>">
                                <?php else: ?>
                                    <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center h-100">
                                        <i class="bi bi-image text-muted fs-1"></i>
                                    </div>
                                <?php endif; ?>

                                <!-- BADGE -->
                                <span class="badge badge-custom <?= $badge_class ?> position-absolute top-0 start-0 m-3">
                                    <?= $badge_text ?>
                                </span>
                            </div>

                            <!-- INFO PRODUK -->
                            <div class="card-body p-3 d-flex flex-column">
                                <h6 class="card-title fw-bold text-dark mb-2 line-clamp-2"><?= $p->nama_produk ?></h6>
                                <p class="card-text text-muted small mb-3 line-clamp-2"><?= $p->deskripsi_singkat ?></p>

                                <div class="mt-auto">
                                    <div class="d-flex align-items-center gap-2 text-muted small mb-2">
                                        <i class="bi bi-box-seam"></i>
                                        <span>Berat: <?= $p->berat ?></span>
                                    </div>
                                    <?php if ($is_unggulan): ?>
                                        <div class="d-flex align-items-center gap-2 text-warning small fw-medium">
                                            <i class="bi bi-star-fill"></i>
                                            <span>Produk Unggulan</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- FOOTER CARD -->
                            <div
                                class="card-footer bg-white border-top-0 p-3 pt-0 d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary btn-edit" data-id="<?= $p->id_produk ?>"
                                        data-kategori="<?= $p->id_kategori ?>"
                                        data-nama="<?= htmlspecialchars($p->nama_produk) ?>" data-slug="<?= $p->slug ?>"
                                        data-deskripsi_singkat="<?= htmlspecialchars($p->deskripsi_singkat) ?>"
                                        data-deskripsi="<?= htmlspecialchars($p->deskripsi) ?>"
                                        data-spesifikasi="<?= htmlspecialchars($p->spesifikasi) ?>"
                                        data-berat="<?= $p->berat ?>" data-foto="<?= $p->foto_utama ?>"
                                        data-wa="<?= $p->nomor_whatsapp ?>" data-unggulan="<?= $p->produk_unggulan ?>"
                                        data-bs-toggle="modal" data-bs-target="#modalEditProduk">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger btn-hapus" data-id="<?= $p->id_produk ?>"
                                        data-nama="<?= htmlspecialchars($p->nama_produk) ?>" data-bs-toggle="modal"
                                        data-bs-target="#modalHapusProduk">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                                <?php if ($is_unggulan): ?>
                                    <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill small">Unggulan</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- MODAL TAMBAH PRODUK -->
    <div class="modal fade" id="modalTambahProduk" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light border-0">
                    <h5 class="modal-title fw-bold">Tambah Produk Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/produk/tambah') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Kategori <span class="text-danger">*</span></label>
                                <select name="id_kategori" class="form-select" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategori as $k): ?>
                                        <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Berat <span class="text-danger">*</span></label>
                                <input type="text" name="berat" class="form-control" placeholder="Contoh: 5 Kg"
                                    required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Nama Produk <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="nama_produk" id="tambah_nama" class="form-control"
                                    placeholder="Contoh: Beras Premium Cianjur 5 Kg" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Slug (Otomatis)</label>
                                <input type="text" name="slug" id="tambah_slug" class="form-control bg-light" readonly>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Deskripsi Singkat</label>
                                <textarea name="deskripsi_singkat" class="form-control" rows="2"
                                    placeholder="Deskripsi singkat untuk card..."></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Deskripsi Lengkap</label>
                                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Spesifikasi</label>
                                <textarea name="spesifikasi" class="form-control" rows="2"
                                    placeholder="Contoh: Kadar air 14%, Butir patah 20%"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Foto Utama (JPG/PNG)</label>
                                <input type="file" name="foto_utama" class="form-control" accept="image/jpeg,image/png"
                                    onchange="previewImage(this, 'previewTambah')">
                                <div class="mt-2">
                                    <img id="previewTambah" src="#" alt="Preview" class="img-thumbnail d-none"
                                        style="max-height: 150px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Nomor WhatsApp</label>
                                <input type="text" name="nomor_whatsapp" class="form-control"
                                    placeholder="Contoh: 08123456789">
                                <small class="text-muted">Tautan WA akan dibuat otomatis.</small>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="produk_unggulan" value="1"
                                        id="tambah_unggulan">
                                    <label class="form-check-label fw-medium" for="tambah_unggulan">Jadikan Produk
                                        Unggulan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary-custom">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT PRODUK -->
    <div class="modal fade" id="modalEditProduk" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light border-0">
                    <h5 class="modal-title fw-bold">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" id="formEdit">
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Kategori <span class="text-danger">*</span></label>
                                <select name="id_kategori" id="edit_kategori" class="form-select" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategori as $k): ?>
                                        <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Berat <span class="text-danger">*</span></label>
                                <input type="text" name="berat" id="edit_berat" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Nama Produk <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="nama_produk" id="edit_nama" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Slug (Otomatis)</label>
                                <input type="text" name="slug" id="edit_slug" class="form-control bg-light" readonly>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Deskripsi Singkat</label>
                                <textarea name="deskripsi_singkat" id="edit_deskripsi_singkat" class="form-control"
                                    rows="2"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Deskripsi Lengkap</label>
                                <textarea name="deskripsi" id="edit_deskripsi" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Spesifikasi</label>
                                <textarea name="spesifikasi" id="edit_spesifikasi" class="form-control"
                                    rows="2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Foto Utama (Biarkan kosong jika tidak ganti)</label>
                                <input type="file" name="foto_utama" class="form-control" accept="image/jpeg,image/png"
                                    onchange="previewImage(this, 'previewEdit')">
                                <div class="mt-2">
                                    <img id="previewEdit" src="#" alt="Preview" class="img-thumbnail d-none"
                                        style="max-height: 150px;">
                                    <img id="fotoLama" src="#" alt="Foto Lama" class="img-thumbnail"
                                        style="max-height: 150px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Nomor WhatsApp</label>
                                <input type="text" name="nomor_whatsapp" id="edit_wa" class="form-control">
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="produk_unggulan" value="1"
                                        id="edit_unggulan">
                                    <label class="form-check-label fw-medium" for="edit_unggulan">Jadikan Produk
                                        Unggulan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary-custom">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL HAPUS PRODUK -->
    <div class="modal fade" id="modalHapusProduk" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 shadow">
                <div class="modal-body text-center p-4">
                    <div class="mb-3 text-danger">
                        <i class="bi bi-exclamation-triangle-fill fs-1"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Hapus Produk?</h5>
                    <p class="text-muted small mb-4">Apakah Anda yakin ingin menghapus produk <strong
                            id="hapusNamaProduk"></strong>? Tindakan ini tidak dapat dibatalkan.</p>
                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <a href="#" id="btnHapusConfirm" class="btn btn-danger">Hapus Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5.3.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // 1. Auto Slug Tambah
        document.getElementById('tambah_nama').addEventListener('input', function () {
            let nama = this.value;
            let slug = nama.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '') // Hapus karakter khusus
                .replace(/\s+/g, '-')         // Ganti spasi dengan dash
                .replace(/-+/g, '-');         // Ganti multiple dash dengan single dash
            document.getElementById('tambah_slug').value = slug;
        });

        // 2. Auto Slug Edit
        document.getElementById('edit_nama').addEventListener('input', function () {
            let nama = this.value;
            let slug = nama.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            document.getElementById('edit_slug').value = slug;
        });

        // 3. Preview Image
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // 4. Handle Edit Button Click
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const kategori = this.dataset.kategori;
                const nama = this.dataset.nama;
                const slug = this.dataset.slug;
                const deskripsi_singkat = this.dataset.deskripsi_singkat;
                const deskripsi = this.dataset.deskripsi;
                const spesifikasi = this.dataset.spesifikasi;
                const berat = this.dataset.berat;
                const foto = this.dataset.foto;
                const wa = this.dataset.wa;
                const unggulan = this.dataset.unggulan;

                // Set Action URL
                document.getElementById('formEdit').action = "<?= base_url('admin/produk/edit/') ?>" + id;

                // Isi Form
                document.getElementById('edit_kategori').value = kategori;
                document.getElementById('edit_nama').value = nama;
                document.getElementById('edit_slug').value = slug;
                document.getElementById('edit_deskripsi_singkat').value = deskripsi_singkat;
                document.getElementById('edit_deskripsi').value = deskripsi;
                document.getElementById('edit_spesifikasi').value = spesifikasi;
                document.getElementById('edit_berat').value = berat;
                document.getElementById('edit_wa').value = wa;
                document.getElementById('edit_unggulan').checked = unggulan == 1;

                // Handle Foto Lama
                const fotoLama = document.getElementById('fotoLama');
                const previewEdit = document.getElementById('previewEdit');
                if (foto) {
                    fotoLama.src = "<?= base_url('assets/uploads/produk/') ?>" + foto;
                    fotoLama.classList.remove('d-none');
                } else {
                    fotoLama.classList.add('d-none');
                }
                previewEdit.classList.add('d-none'); // Reset preview baru
            });
        });

        // 5. Handle Hapus Button Click
        document.querySelectorAll('.btn-hapus').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const nama = this.dataset.nama;

                document.getElementById('hapusNamaProduk').textContent = nama;
                document.getElementById('btnHapusConfirm').href = "<?= base_url('admin/produk/hapus/') ?>" + id;
            });
        });

        // 6. Search & Filter Logic
        const searchInput = document.getElementById('searchInput');
        const filterKategori = document.getElementById('filterKategori');
        const filterUnggulan = document.getElementById('filterUnggulan');
        const items = document.querySelectorAll('.produk-item');

        function filterProducts() {
            const searchTerm = searchInput.value.toLowerCase();
            const kategoriTerm = filterKategori.value;
            const unggulanTerm = filterUnggulan.value;

            items.forEach(item => {
                const nama = item.dataset.nama;
                const kategori = item.dataset.kategori;
                const berat = item.dataset.berat;
                const unggulan = item.dataset.unggulan;

                // Cek Search (Nama, Kategori, Berat)
                const matchSearch = nama.includes(searchTerm) || kategori.toLowerCase().includes(searchTerm) || berat.includes(searchTerm);

                // Cek Filter Kategori
                const matchKategori = kategoriTerm === "" || kategori === kategoriTerm;

                // Cek Filter Unggulan
                let matchUnggulan = true;
                if (unggulanTerm === "unggulan") {
                    matchUnggulan = unggulan === "unggulan";
                } else if (unggulanTerm === "biasa") {
                    matchUnggulan = unggulan === "biasa";
                }

                if (matchSearch && matchKategori && matchUnggulan) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('input', filterProducts);
        filterKategori.addEventListener('change', filterProducts);
        filterUnggulan.addEventListener('change', filterProducts);

        // 7. Auto Hide Alert
        setTimeout(function () {
            const alert = document.getElementById('alertProduk');
            if (alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(function () {
                    alert.remove();
                }, 500);
            }
        }, 3500);
    </script>

</body>

</html>
<?php include(APPPATH . 'views/layout/foot.php'); ?>