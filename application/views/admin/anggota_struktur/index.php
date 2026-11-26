
<style>
/* HALAMAN ANGGOTA STRUKTUR */
.anggota-content {
    padding: 0 30px 30px;
    color: #17345f;
}
.anggota-header {
    background: linear-gradient(120deg, #0b3479, #164b9b);
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
.anggota-header h1 {
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 7px;
}
.anggota-header p {
    font-size: 13px;
    color: #e1eaff;
    margin: 0;
}
.btn-tambah-anggota {
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
.btn-tambah-anggota:hover {
    background: #ffb52e;
    color: #102e5c;
    transform: translateY(-2px);
}

/* NOTIFIKASI */
.anggota-alert {
    padding: 13px 17px;
    border-radius: 9px;
    margin-bottom: 20px;
    font-size: 13px;
    font-weight: 500;
}
.anggota-alert.success {
    background: #e9f9ef;
    color: #168044;
    border: 1px solid #bce8cb;
}
.anggota-alert.error {
    background: #fff0f0;
    color: #c52b35;
    border: 1px solid #f3c5c5;
}

/* TOOLBAR */
.anggota-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 22px;
    flex-wrap: wrap;
}
.anggota-toolbar h2 {
    font-size: 18px;
    font-weight: 700;
    margin: 0;
    color: #17345f;
}
.anggota-search {
    height: 42px;
    width: 230px;
    border: 1px solid #dce5f1;
    background: #fff;
    border-radius: 9px;
    padding: 0 13px;
    outline: none;
    color: #334b6e;
    font-size: 12px;
}
.anggota-search:focus {
    border-color: #2360b4;
    box-shadow: 0 0 0 3px rgba(35,96,180,.09);
}

/* GRID */
.anggota-grid {
    display: grid;
    grid-template-columns: repeat(3,minmax(0,1fr));
    gap: 22px;
}
.anggota-card {
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
.anggota-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 9px 22px rgba(20,48,86,.10);
}
.anggota-image {
    width: 100%;
    height: 210px;
    background: #eaf0fa;
    overflow: hidden;
    position: relative;
}
.anggota-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .3s ease;
}
.anggota-card:hover .anggota-image img {
    transform: scale(1.04);
}
.anggota-image-empty {
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
.anggota-image-empty i {
    font-size: 38px;
}
.anggota-image-empty span {
    font-size: 11px;
    font-weight: 600;
}
.anggota-urutan {
    position: absolute;
    top: 12px;
    left: 12px;
    background: #ffa412;
    color: #102e5c;
    padding: 6px 10px;
    border-radius: 7px;
    font-size: 10px;
    font-weight: 700;
}

/* ISI CARD */
.anggota-card-body {
    padding: 17px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.anggota-card-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 12px;
    flex-wrap: wrap;
}
.jabatan-label {
    display: inline-flex;
    align-items: center;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 700;
    background: #e8efff;
    color: #2456b2;
}
.anggota-card-title {
    color: #17345f;
    font-size: 16px;
    font-weight: 700;
    line-height: 1.45;
    margin: 0 0 9px;
    min-height: 23px;
}
.anggota-card-description {
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
.anggota-card-detail {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-top: auto;
    padding-top: 12px;
    border-top: 1px solid #edf1f6;
}
.anggota-detail-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #74849b;
    font-size: 11px;
}
.anggota-detail-item i {
    color: #285da9;
    width: 14px;
    text-align: center;
}

/* TOMBOL */
.anggota-card-actions {
    display: flex;
    gap: 8px;
    margin-top: 15px;
}
.btn-anggota-card {
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
.btn-anggota-edit {
    background: #e8f0ff;
    color: #1750a0;
}
.btn-anggota-edit:hover {
    background: #1750a0;
    color: #fff;
}
.btn-anggota-delete {
    background: #fff0f0;
    color: #d33a42;
}
.btn-anggota-delete:hover {
    background: #d33a42;
    color: #fff;
}

/* DATA KOSONG */
.anggota-empty {
    grid-column: 1/-1;
    background: #fff;
    border: 1px dashed #cbd8e9;
    border-radius: 14px;
    text-align: center;
    padding: 55px 20px;
}
.anggota-empty i {
    font-size: 43px;
    color: #b8c7db;
    margin-bottom: 14px;
}
.anggota-empty h3 {
    color: #345274;
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 7px;
}
.anggota-empty p {
    color: #8796aa;
    font-size: 12px;
    margin: 0;
}
.anggota-card.hidden {
    display: none;
}

/* RESPONSIVE */
@media(max-width:1100px) {
    .anggota-grid {
        grid-template-columns: repeat(2,minmax(0,1fr));
    }
}
@media(max-width:768px) {
    .anggota-content {
        padding: 0 20px 25px;
    }
    .anggota-header {
        padding: 23px 20px;
        align-items: flex-start;
        flex-direction: column;
    }
    .btn-tambah-anggota {
        width: 100%;
        text-align: center;
    }
    .anggota-toolbar {
        align-items: flex-start;
        flex-direction: column;
    }
    .anggota-search {
        width: 100%;
    }
}
@media(max-width:560px) {
    .anggota-grid {
        grid-template-columns: 1fr;
    }
    .anggota-image {
        height: 205px;
    }
    .anggota-header h1 {
        font-size: 21px;
    }
    .anggota-content {
        padding: 0 15px 20px;
    }
}
</style>

<div class="anggota-content">

    <!-- HEADER -->
    <div class="anggota-header">
        <div>
            <h1>Jajaran Anggota Struktur</h1>
            <p>Kelola susunan anggota dan jabatan struktur PT Citra Abadi Bermartabat.</p>
        </div>
        <a href="<?= base_url('admin/anggota_struktur/tambah') ?>" class="btn-tambah-anggota">
            <i class="fa-solid fa-plus"></i>
            Tambah Anggota
        </a>
    </div>

    <!-- NOTIFIKASI -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="anggota-alert success">
            <i class="fa-solid fa-circle-check"></i>
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="anggota-alert error">
            <i class="fa-solid fa-circle-exclamation"></i>
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- TOOLBAR -->
    <div class="anggota-toolbar">
        <h2>Daftar Anggota Struktur</h2>
        <input type="text" id="cariAnggota" class="anggota-search" placeholder="Cari nama atau jabatan...">
    </div>

    <!-- GRID -->
    <div class="anggota-grid" id="anggotaGrid">

        <?php if (!empty($anggota)): ?>

            <?php foreach ($anggota as $a): ?>

                <article class="anggota-card"
                    data-nama="<?= html_escape(strtolower($a->nama)) ?>"
                    data-jabatan="<?= html_escape(strtolower($a->jabatan)) ?>">

                    <div class="anggota-image">
                        <?php if (!empty($a->foto) && file_exists(FCPATH . 'assets/uploads/anggota_struktur/' . $a->foto)): ?>
                            <img src="<?= base_url('assets/uploads/anggota_struktur/' . rawurlencode($a->foto)) ?>" alt="<?= html_escape($a->nama) ?>">
                        <?php else: ?>
                            <div class="anggota-image-empty">
                                <i class="fa-solid fa-user-tie"></i>
                                <span>Belum ada foto</span>
                            </div>
                        <?php endif; ?>

                        <span class="anggota-urutan">
                            Urutan <?= (int) $a->urutan ?>
                        </span>
                    </div>

                    <div class="anggota-card-body">

                        <div class="anggota-card-meta">
                            <span class="jabatan-label">
                                <?= html_escape($a->jabatan) ?>
                            </span>
                        </div>

                        <h3 class="anggota-card-title">
                            <?= html_escape($a->nama) ?>
                        </h3>

                        <p class="anggota-card-description">
                            <?= !empty($a->deskripsi)
                                ? html_escape($a->deskripsi)
                                : 'Belum ada deskripsi anggota.' ?>
                        </p>

                        <div class="anggota-card-detail">
                            <div class="anggota-detail-item">
                                <i class="fa-solid fa-briefcase"></i>
                                <span><?= html_escape($a->jabatan) ?></span>
                            </div>
                            <div class="anggota-detail-item">
                                <i class="fa-solid fa-sort-numeric-down"></i>
                                <span>Urutan tampil: <?= (int) $a->urutan ?></span>
                            </div>
                        </div>

                        <div class="anggota-card-actions">
                            <a href="<?= base_url('admin/anggota_struktur/edit/' . $a->id_anggota) ?>" class="btn-anggota-card btn-anggota-edit">
                                <i class="fa-solid fa-pen"></i> Edit
                            </a>
                            <a href="<?= base_url('admin/anggota_struktur/hapus/' . $a->id_anggota) ?>"
                               class="btn-anggota-card btn-anggota-delete"
                               onclick="return confirm('Apakah kamu yakin ingin menghapus anggota ini?')">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </a>
                        </div>

                    </div>
                </article>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="anggota-empty">
                <i class="fa-solid fa-users"></i>
                <h3>Belum Ada Anggota Struktur</h3>
                <p>Silakan tambahkan anggota struktur perusahaan melalui tombol Tambah Anggota.</p>
            </div>

        <?php endif; ?>

    </div>

    <div id="hasilAnggotaKosong" class="anggota-empty" style="display:none;margin-top:20px;">
        <i class="fa-solid fa-magnifying-glass"></i>
        <h3>Anggota Tidak Ditemukan</h3>
        <p>Coba gunakan kata kunci pencarian yang berbeda.</p>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const pencarian = document.getElementById('cariAnggota');
    const kartu = document.querySelectorAll('.anggota-card');
    const hasilKosong = document.getElementById('hasilAnggotaKosong');

    pencarian.addEventListener('input', function () {
        const kataKunci = this.value.toLowerCase().trim();
        let jumlahTampil = 0;

        kartu.forEach(function (item) {
            const nama = item.dataset.nama || '';
            const jabatan = item.dataset.jabatan || '';
            const cocok = nama.includes(kataKunci) || jabatan.includes(kataKunci);

            item.classList.toggle('hidden', !cocok);

            if (cocok) jumlahTampil++;
        });

        hasilKosong.style.display =
            (kartu.length > 0 && jumlahTampil === 0) ? 'block' : 'none';
    });
});
</script>
