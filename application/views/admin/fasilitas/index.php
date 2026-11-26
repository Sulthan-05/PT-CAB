
<?php include(APPPATH . 'views/layout/head.php'); ?>

<style>
.fasilitas-content {
    padding: 0 30px 30px;
    color: #17345f;
}
.fasilitas-header {
    background: linear-gradient(120deg,#0b3479,#164b9b);
    color: #fff;
    padding: 28px 35px;
    border-radius: 16px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    box-shadow: 0 5px 15px rgba(11,52,121,.12);
}
.fasilitas-header h1 {
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 7px;
}
.fasilitas-header p {
    font-size: 13px;
    color: #e1eaff;
    margin: 0;
}
.btn-tambah-fasilitas {
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
.btn-tambah-fasilitas:hover {
    background: #ffb52e;
    color: #102e5c;
    transform: translateY(-2px);
}

/* NOTIFIKASI */
.fasilitas-alert {
    padding: 13px 17px;
    border-radius: 9px;
    margin-bottom: 20px;
    font-size: 13px;
    font-weight: 500;
}
.fasilitas-alert.success {
    background: #e9f9ef;
    color: #168044;
    border: 1px solid #bce8cb;
}
.fasilitas-alert.error {
    background: #fff0f0;
    color: #c52b35;
    border: 1px solid #f3c5c5;
}

/* TOOLBAR */
.fasilitas-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 22px;
    flex-wrap: wrap;
}
.fasilitas-toolbar h2 {
    font-size: 18px;
    font-weight: 700;
    margin: 0;
    color: #17345f;
}
.fasilitas-filter {
    display: flex;
    align-items: center;
    gap: 10px;
}
.fasilitas-search,
.fasilitas-select {
    height: 42px;
    border: 1px solid #dce5f1;
    background: #fff;
    border-radius: 9px;
    padding: 0 13px;
    outline: none;
    color: #334b6e;
    font-size: 12px;
}
.fasilitas-search {
    width: 230px;
}
.fasilitas-select {
    min-width: 190px;
}
.fasilitas-search:focus,
.fasilitas-select:focus {
    border-color: #2360b4;
    box-shadow: 0 0 0 3px rgba(35,96,180,.09);
}

/* GRID */
.fasilitas-grid {
    display: grid;
    grid-template-columns: repeat(3,minmax(0,1fr));
    gap: 22px;
}
.fasilitas-card {
    background: #fff;
    border: 1px solid #e7edf5;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 13px rgba(20,48,86,.045);
    transition: transform .2s ease,box-shadow .2s ease;
    display: flex;
    flex-direction: column;
    min-width: 0;
}
.fasilitas-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 9px 22px rgba(20,48,86,.10);
}
.fasilitas-image {
    width: 100%;
    height: 185px;
    background: #eaf0fa;
    overflow: hidden;
}
.fasilitas-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .3s ease;
}
.fasilitas-card:hover .fasilitas-image img {
    transform: scale(1.04);
}
.fasilitas-image-empty {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #8094b2;
    gap: 9px;
    background: linear-gradient(135deg,#eaf1fc,#dce8f8);
}
.fasilitas-image-empty i {
    font-size: 38px;
}
.fasilitas-image-empty span {
    font-size: 11px;
    font-weight: 600;
}

/* ISI CARD */
.fasilitas-card-body {
    padding: 17px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.fasilitas-card-meta {
    margin-bottom: 12px;
}
.fasilitas-kategori {
    display: inline-flex;
    align-items: center;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 700;
    background: #e8efff;
    color: #2456b2;
}
.fasilitas-card-title {
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
.fasilitas-card-description {
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
.fasilitas-card-detail {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-top: auto;
    padding-top: 12px;
    border-top: 1px solid #edf1f6;
}
.fasilitas-detail-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #74849b;
    font-size: 11px;
}
.fasilitas-detail-item i {
    color: #285da9;
    width: 14px;
    text-align: center;
}

/* AKSI */
.fasilitas-card-actions {
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

/* DATA KOSONG */
.fasilitas-empty {
    grid-column: 1/-1;
    background: #fff;
    border: 1px dashed #cbd8e9;
    border-radius: 14px;
    text-align: center;
    padding: 55px 20px;
}
.fasilitas-empty i {
    font-size: 43px;
    color: #b8c7db;
    margin-bottom: 14px;
}
.fasilitas-empty h3 {
    color: #345274;
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 7px;
}
.fasilitas-empty p {
    color: #8796aa;
    font-size: 12px;
    margin: 0;
}
.fasilitas-card.hidden {
    display: none;
}

/* RESPONSIVE */
@media(max-width:1100px) {
    .fasilitas-grid {
        grid-template-columns: repeat(2,minmax(0,1fr));
    }
}
@media(max-width:768px) {
    .fasilitas-content {
        padding: 0 20px 25px;
    }
    .fasilitas-header {
        padding: 23px 20px;
        align-items: flex-start;
        flex-direction: column;
    }
    .btn-tambah-fasilitas {
        width: 100%;
        text-align: center;
    }
    .fasilitas-toolbar {
        align-items: flex-start;
        flex-direction: column;
    }
    .fasilitas-filter {
        width: 100%;
        flex-wrap: wrap;
    }
    .fasilitas-search,
    .fasilitas-select {
        flex: 1;
        min-width: 0;
        width: 100%;
    }
}
@media(max-width:560px) {
    .fasilitas-grid {
        grid-template-columns: 1fr;
    }
    .fasilitas-image {
        height: 205px;
    }
    .fasilitas-header h1 {
        font-size: 21px;
    }
    .fasilitas-content {
        padding: 0 15px 20px;
    }
    .fasilitas-filter {
        flex-direction: column;
    }
}
</style>

<div class="fasilitas-content">

    <div class="fasilitas-header">
        <div>
            <h1>Kelola Fasilitas</h1>
            <p>Kelola informasi fasilitas dan sarana yang dimiliki PT Citra Abadi Bermartabat.</p>
        </div>
        <a href="<?= base_url('admin/fasilitas/tambah') ?>" class="btn-tambah-fasilitas">
            <i class="fa-solid fa-plus"></i>
            Tambah Fasilitas
        </a>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="fasilitas-alert success">
            <i class="fa-solid fa-circle-check"></i>
            <?= html_escape($this->session->flashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="fasilitas-alert error">
            <i class="fa-solid fa-circle-exclamation"></i>
            <?= html_escape($this->session->flashdata('error')) ?>
        </div>
    <?php endif; ?>

    <div class="fasilitas-toolbar">
        <h2>Daftar Fasilitas</h2>

        <div class="fasilitas-filter">
            <input type="text" id="cariFasilitas" class="fasilitas-search" placeholder="Cari nama fasilitas...">

            <select id="filterKategori" class="fasilitas-select">
                <option value="">Semua Kategori</option>
                <?php foreach ([
                    'Produksi & Pengolahan',
                    'Penyimpanan & Gudang',
                    'Pengemasan',
                    'Quality Control',
                    'Distribusi & Logistik',
                    'Kantor & Operasional',
                    'Fasilitas Umum'
                ] as $kategori): ?>
                    <option value="<?= html_escape($kategori) ?>"><?= html_escape($kategori) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="fasilitas-grid" id="fasilitasGrid">

        <?php if (!empty($fasilitas)): ?>

            <?php foreach ($fasilitas as $item): ?>

                <article class="fasilitas-card"
                    data-nama="<?= html_escape(strtolower($item['nama_fasilitas'])) ?>"
                    data-kategori="<?= html_escape($item['kategori']) ?>">

                    <div class="fasilitas-image">
                        <?php if (!empty($item['foto']) && file_exists(FCPATH . 'assets/uploads/fasilitas/' . $item['foto'])): ?>
                            <img src="<?= base_url('assets/uploads/fasilitas/' . rawurlencode($item['foto'])) ?>" alt="<?= html_escape($item['nama_fasilitas']) ?>">
                        <?php else: ?>
                            <div class="fasilitas-image-empty">
                                <i class="fa-regular fa-image"></i>
                                <span>Belum ada foto</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="fasilitas-card-body">
                        <div class="fasilitas-card-meta">
                            <span class="fasilitas-kategori">
                                <?= html_escape($item['kategori']) ?>
                            </span>
                        </div>

                        <h3 class="fasilitas-card-title">
                            <?= html_escape($item['nama_fasilitas']) ?>
                        </h3>

                        <p class="fasilitas-card-description">
                            <?= !empty($item['deskripsi'])
                                ? html_escape($item['deskripsi'])
                                : 'Belum ada deskripsi fasilitas.' ?>
                        </p>

                        <div class="fasilitas-card-detail">
                            <div class="fasilitas-detail-item">
                                <i class="fa-solid fa-layer-group"></i>
                                <span><?= html_escape($item['kategori']) ?></span>
                            </div>
                        </div>

                        <div class="fasilitas-card-actions">
                            <a href="<?= base_url('admin/fasilitas/edit/' . $item['id_fasilitas']) ?>" class="btn-card btn-card-edit">
                                <i class="fa-solid fa-pen"></i> Edit
                            </a>
                            <a href="<?= base_url('admin/fasilitas/hapus/' . $item['id_fasilitas']) ?>"
                               class="btn-card btn-card-delete"
                               onclick="return confirm('Apakah kamu yakin ingin menghapus fasilitas ini?')">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </a>
                        </div>
                    </div>
                </article>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="fasilitas-empty">
                <i class="fa-regular fa-folder-open"></i>
                <h3>Belum Ada Fasilitas</h3>
                <p>Silakan tambahkan fasilitas perusahaan melalui tombol Tambah Fasilitas.</p>
            </div>

        <?php endif; ?>

    </div>

    <div id="hasilFasilitasKosong" class="fasilitas-empty" style="display:none;margin-top:20px;">
        <i class="fa-solid fa-magnifying-glass"></i>
        <h3>Fasilitas Tidak Ditemukan</h3>
        <p>Coba gunakan kata kunci atau kategori yang berbeda.</p>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const pencarian = document.getElementById('cariFasilitas');
    const filterKategori = document.getElementById('filterKategori');
    const kartu = document.querySelectorAll('.fasilitas-card');
    const hasilKosong = document.getElementById('hasilFasilitasKosong');

    function filterFasilitas() {
        const kataKunci = pencarian.value.toLowerCase().trim();
        const kategoriDipilih = filterKategori.value;
        let jumlahTampil = 0;

        kartu.forEach(function (item) {
            const nama = item.dataset.nama || '';
            const kategori = item.dataset.kategori || '';

            const cocokNama = nama.includes(kataKunci);
            const cocokKategori = !kategoriDipilih || kategori === kategoriDipilih;

            if (cocokNama && cocokKategori) {
                item.classList.remove('hidden');
                jumlahTampil++;
            } else {
                item.classList.add('hidden');
            }
        });

        hasilKosong.style.display =
            (kartu.length > 0 && jumlahTampil === 0) ? 'block' : 'none';
    }

    pencarian.addEventListener('input', filterFasilitas);
    filterKategori.addEventListener('change', filterFasilitas);
});
</script>

<?php include(APPPATH . 'views/layout/foot.php'); ?>
