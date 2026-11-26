
<?php include(APPPATH . 'views/layout/head.php'); ?>

<style>
/* =========================
   HALAMAN INFORMASI
========================= */
.informasi-content {
    padding: 0 30px 30px;
    color: #17345f;
}

.informasi-header {
    background: linear-gradient(120deg, #0b3479, #164b9b);
    color: #fff;
    padding: 28px 35px;
    border-radius: 16px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    box-shadow: 0 5px 15px rgba(11, 52, 121, .12);
}

.informasi-header h1 {
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 7px;
}

.informasi-header p {
    font-size: 13px;
    color: #e1eaff;
    margin: 0;
}

.btn-tambah-informasi {
    background: #ffa412;
    color: #102e5c;
    padding: 12px 19px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    white-space: nowrap;
    transition: .2s;
}

.btn-tambah-informasi:hover {
    background: #ffb52e;
    color: #102e5c;
    transform: translateY(-2px);
}

/* =========================
   NOTIFIKASI
========================= */
.informasi-alert {
    padding: 13px 17px;
    border-radius: 9px;
    margin-bottom: 20px;
    font-size: 13px;
    font-weight: 500;
}

.informasi-alert.success {
    background: #e9f9ef;
    color: #168044;
    border: 1px solid #bce8cb;
}

.informasi-alert.error {
    background: #fff0f0;
    color: #c52b35;
    border: 1px solid #f3c5c5;
}

/* =========================
   FILTER DAN PENCARIAN
========================= */
.informasi-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 22px;
    flex-wrap: wrap;
}

.informasi-toolbar h2 {
    font-size: 18px;
    font-weight: 700;
    margin: 0;
    color: #17345f;
}

.informasi-filter {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.informasi-search,
.informasi-select {
    height: 42px;
    border: 1px solid #dce5f1;
    background: #fff;
    border-radius: 9px;
    padding: 0 13px;
    outline: none;
    color: #334b6e;
    font-size: 12px;
}

.informasi-search {
    width: 230px;
}

.informasi-select {
    min-width: 165px;
}

.informasi-search:focus,
.informasi-select:focus {
    border-color: #2360b4;
    box-shadow: 0 0 0 3px rgba(35, 96, 180, .09);
}

/* =========================
   GRID KARTU
========================= */
.informasi-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 22px;
}

.informasi-card {
    background: #fff;
    border: 1px solid #e7edf5;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 13px rgba(20, 48, 86, .045);
    transition: transform .2s ease, box-shadow .2s ease;
    display: flex;
    flex-direction: column;
    min-width: 0;
}

.informasi-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 9px 22px rgba(20, 48, 86, .10);
}

.informasi-image {
    width: 100%;
    height: 185px;
    background: #eaf0fa;
    overflow: hidden;
    position: relative;
}

.informasi-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .3s ease;
}

.informasi-card:hover .informasi-image img {
    transform: scale(1.04);
}

.informasi-image-empty {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #8094b2;
    gap: 9px;
    background: linear-gradient(135deg, #eaf1fc, #dce8f8);
}

.informasi-image-empty i {
    font-size: 38px;
}

.informasi-image-empty span {
    font-size: 11px;
    font-weight: 600;
}

/* =========================
   ISI KARTU
========================= */
.informasi-card-body {
    padding: 17px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.informasi-card-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 12px;
    flex-wrap: wrap;
}

.kategori-label {
    display: inline-flex;
    align-items: center;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 700;
}

.kategori-event {
    background: #fff3df;
    color: #c27b08;
}

.kategori-lowongan-kerja {
    background: #e8efff;
    color: #2456b2;
}

.kategori-informasi-perusahaan {
    background: #e5f7ed;
    color: #21804c;
}

.kategori-default {
    background: #edf0f5;
    color: #64748b;
}

.status-label {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 10px;
    font-weight: 700;
}

.status-label::before {
    content: "";
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: currentColor;
}

.status-terbit {
    color: #16a05a;
}

.status-draft {
    color: #d18b18;
}

.informasi-card-title {
    color: #17345f;
    font-size: 16px;
    font-weight: 700;
    line-height: 1.45;
    margin: 0 0 9px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 46px;
}

.informasi-card-description {
    font-size: 12px;
    line-height: 1.7;
    color: #75849a;
    margin: 0 0 15px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 61px;
}

.informasi-card-detail {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-top: auto;
    padding-top: 12px;
    border-top: 1px solid #edf1f6;
}

.informasi-detail-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #74849b;
    font-size: 11px;
}

.informasi-detail-item i {
    color: #285da9;
    width: 14px;
    text-align: center;
}

/* =========================
   TOMBOL KARTU
========================= */
.informasi-card-actions {
    display: flex;
    gap: 8px;
    margin-top: 15px;
}

.btn-card {
    flex: 1;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    padding: 9px 10px;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 700;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: .2s;
}

.btn-card-edit {
    background: #e8f0ff;
    color: #1750a0;
}

.btn-card-edit:hover {
    background: #1750a0;
    color: #fff;
}

.btn-card-delete {
    background: #fff0f0;
    color: #d33a42;
}

.btn-card-delete:hover {
    background: #d33a42;
    color: #fff;
}

/* =========================
   DATA KOSONG
========================= */
.informasi-empty {
    grid-column: 1 / -1;
    background: #fff;
    border: 1px dashed #cbd8e9;
    border-radius: 14px;
    text-align: center;
    padding: 55px 20px;
}

.informasi-empty i {
    font-size: 43px;
    color: #b8c7db;
    margin-bottom: 14px;
}

.informasi-empty h3 {
    color: #345274;
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 7px;
}

.informasi-empty p {
    color: #8796aa;
    font-size: 12px;
    margin: 0;
}

.informasi-card.hidden {
    display: none;
}

/* =========================
   RESPONSIVE
========================= */
@media (max-width: 1100px) {
    .informasi-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 768px) {
    .informasi-content {
        padding: 0 20px 25px;
    }

    .informasi-header {
        padding: 23px 20px;
        align-items: flex-start;
        flex-direction: column;
    }

    .btn-tambah-informasi {
        width: 100%;
        text-align: center;
    }

    .informasi-toolbar {
        align-items: flex-start;
        flex-direction: column;
    }

    .informasi-filter {
        width: 100%;
    }

    .informasi-search,
    .informasi-select {
        flex: 1;
        min-width: 0;
        width: 100%;
    }
}

@media (max-width: 560px) {
    .informasi-grid {
        grid-template-columns: 1fr;
    }

    .informasi-image {
        height: 205px;
    }

    .informasi-header h1 {
        font-size: 21px;
    }

    .informasi-content {
        padding: 0 15px 20px;
    }

    .informasi-filter {
        flex-direction: column;
    }

    .informasi-search,
    .informasi-select {
        width: 100%;
    }
}
</style>

<div class="informasi-content">

    <!-- HEADER -->
    <div class="informasi-header">
        <div>
            <h1>Kelola Informasi</h1>
            <p>Kelola event, lowongan kerja, dan informasi perusahaan PT Citra Abadi Bermartabat.</p>
        </div>

        <a href="<?= base_url('admin/informasi/tambah') ?>" class="btn-tambah-informasi">
            <i class="fa-solid fa-plus"></i>
            Tambah Informasi
        </a>
    </div>

    <!-- NOTIFIKASI -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="informasi-alert success">
            <i class="fa-solid fa-circle-check"></i>
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="informasi-alert error">
            <i class="fa-solid fa-circle-exclamation"></i>
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- JUDUL DAN FILTER -->
    <div class="informasi-toolbar">
        <h2>Daftar Informasi</h2>

        <div class="informasi-filter">
            <input
                type="text"
                id="cariInformasi"
                class="informasi-search"
                placeholder="Cari judul informasi..."
            >

            <select id="filterKategori" class="informasi-select">
                <option value="">Semua Kategori</option>
                <option value="Event">Event</option>
                <option value="Lowongan Kerja">Lowongan Kerja</option>
                <option value="Informasi Perusahaan">Informasi Perusahaan</option>
            </select>

            <select id="filterStatus" class="informasi-select">
                <option value="">Semua Status</option>
                <option value="Terbit">Terbit</option>
                <option value="Draft">Draft</option>
            </select>
        </div>
    </div>

    <!-- GRID INFORMASI -->
    <div class="informasi-grid" id="informasiGrid">

        <?php if (!empty($informasi)): ?>

            <?php foreach ($informasi as $item): ?>

                <?php
                    $kategori = $item['kategori'] ?? '';
                    $status = $item['status'] ?? 'Draft';

                    $kategoriClass = 'kategori-default';

                    if ($kategori === 'Event') {
                        $kategoriClass = 'kategori-event';
                    } elseif ($kategori === 'Lowongan Kerja') {
                        $kategoriClass = 'kategori-lowongan-kerja';
                    } elseif ($kategori === 'Informasi Perusahaan') {
                        $kategoriClass = 'kategori-informasi-perusahaan';
                    }

                    $statusClass = ($status === 'Terbit') ? 'status-terbit' : 'status-draft';

                    $tanggalMulai = !empty($item['tanggal_mulai'])
                        ? date('d M Y', strtotime($item['tanggal_mulai']))
                        : '';

                    $tanggalSelesai = !empty($item['tanggal_selesai'])
                        ? date('d M Y', strtotime($item['tanggal_selesai']))
                        : '';
                ?>

                <article
                    class="informasi-card"
                    data-judul="<?= html_escape(strtolower($item['judul'])) ?>"
                    data-kategori="<?= html_escape($kategori) ?>"
                    data-status="<?= html_escape($status) ?>"
                >

                    <!-- GAMBAR -->
                    <div class="informasi-image">

                        <?php if (!empty($item['gambar']) && file_exists(FCPATH . 'assets/uploads/informasi/' . $item['gambar'])): ?>

                            <img
                                src="<?= base_url('assets/uploads/informasi/' . rawurlencode($item['gambar'])) ?>"
                                alt="<?= html_escape($item['judul']) ?>"
                            >

                        <?php else: ?>

                            <div class="informasi-image-empty">
                                <i class="fa-regular fa-image"></i>
                                <span>Belum ada gambar</span>
                            </div>

                        <?php endif; ?>

                    </div>

                    <!-- ISI KARTU -->
                    <div class="informasi-card-body">

                        <div class="informasi-card-meta">
                            <span class="kategori-label <?= $kategoriClass ?>">
                                <?= html_escape($kategori) ?>
                            </span>

                            <span class="status-label <?= $statusClass ?>">
                                <?= html_escape($status) ?>
                            </span>
                        </div>

                        <h3 class="informasi-card-title">
                            <?= html_escape($item['judul']) ?>
                        </h3>

                        <p class="informasi-card-description">
                            <?= html_escape($item['ringkasan'] ?: 'Belum ada ringkasan informasi.') ?>
                        </p>

                        <div class="informasi-card-detail">

                            <?php if (!empty($tanggalMulai)): ?>
                                <div class="informasi-detail-item">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span>
                                        <?= $tanggalMulai ?>
                                        <?php if (!empty($tanggalSelesai) && $tanggalSelesai !== $tanggalMulai): ?>
                                            - <?= $tanggalSelesai ?>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($item['lokasi'])): ?>
                                <div class="informasi-detail-item">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span><?= html_escape($item['lokasi']) ?></span>
                                </div>
                            <?php endif; ?>

                        </div>

                        <!-- AKSI -->
                        <div class="informasi-card-actions">

                            <a
                                href="<?= base_url('admin/informasi/edit/' . $item['id_informasi']) ?>"
                                class="btn-card btn-card-edit"
                            >
                                <i class="fa-solid fa-pen"></i>
                                Edit
                            </a>

                            <a
                                href="<?= base_url('admin/informasi/hapus/' . $item['id_informasi']) ?>"
                                class="btn-card btn-card-delete"
                                onclick="return confirm('Apakah kamu yakin ingin menghapus informasi ini?')"
                            >
                                <i class="fa-solid fa-trash"></i>
                                Hapus
                            </a>

                        </div>

                    </div>
                </article>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="informasi-empty">
                <i class="fa-regular fa-folder-open"></i>
                <h3>Belum Ada Informasi</h3>
                <p>Silakan tambahkan informasi pertama perusahaan melalui tombol Tambah Informasi.</p>
            </div>

        <?php endif; ?>

    </div>

    <div id="hasilTidakDitemukan" class="informasi-empty" style="display:none; margin-top:20px;">
        <i class="fa-solid fa-magnifying-glass"></i>
        <h3>Informasi Tidak Ditemukan</h3>
        <p>Coba gunakan kata kunci atau filter kategori yang berbeda.</p>
    </div>

</div>

<!-- FILTER DAN PENCARIAN -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const pencarian = document.getElementById('cariInformasi');
    const filterKategori = document.getElementById('filterKategori');
    const filterStatus = document.getElementById('filterStatus');
    const kartu = document.querySelectorAll('.informasi-card');
    const hasilKosong = document.getElementById('hasilTidakDitemukan');

    function filterInformasi() {
        const kataKunci = pencarian.value.toLowerCase().trim();
        const kategoriDipilih = filterKategori.value;
        const statusDipilih = filterStatus.value;
        let jumlahTampil = 0;

        kartu.forEach(function (item) {
            const judul = item.dataset.judul || '';
            const kategori = item.dataset.kategori || '';
            const status = item.dataset.status || '';

            const cocokJudul = judul.includes(kataKunci);
            const cocokKategori = !kategoriDipilih || kategori === kategoriDipilih;
            const cocokStatus = !statusDipilih || status === statusDipilih;

            if (cocokJudul && cocokKategori && cocokStatus) {
                item.classList.remove('hidden');
                jumlahTampil++;
            } else {
                item.classList.add('hidden');
            }
        });

        if (hasilKosong) {
            hasilKosong.style.display = (kartu.length > 0 && jumlahTampil === 0) ? 'block' : 'none';
        }
    }

    pencarian.addEventListener('input', filterInformasi);
    filterKategori.addEventListener('change', filterInformasi);
    filterStatus.addEventListener('change', filterInformasi);
});
</script>

<?php include(APPPATH . 'views/layout/foot.php'); ?>
