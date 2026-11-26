<?php include(APPPATH . 'views/layout/head.php'); ?>

<?php
$is_edit = !empty($informasi);
$nilai = function ($kolom, $default = '') use ($informasi) {
    return $informasi && isset($informasi[$kolom]) ? $informasi[$kolom] : $default;
};
?>

<style>
    .form-info-content { padding: 0 28px 30px; }
    .form-info-header {
        background: linear-gradient(135deg, #1c3faa, #2a5298);
        color: white;
        padding: 25px 30px;
        border-radius: 12px;
        margin-bottom: 22px;
    }
    .form-info-header h1 { font-size: 22px; font-weight: 600; margin: 0 0 5px; }
    .form-info-header p { font-size: 12px; margin: 0; color: #e5edff; }
    .form-info-card {
        background: white;
        border: 1px solid #edf0f5;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 12px rgba(15,23,42,.05);
    }
    .form-info-card h2 { font-size: 16px; font-weight: 600; color: #1e293b; margin-bottom: 20px; }
    .form-info-content .form-label { font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 7px; }
    .form-info-content .form-control, .form-info-content .form-select {
        border: 1px solid #dbe3ef;
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 12px;
    }
    .form-info-content .form-control:focus, .form-info-content .form-select:focus {
        border-color: #1565c0;
        box-shadow: 0 0 0 3px rgba(21,101,192,.1);
    }
    .form-info-content textarea { min-height: 120px; resize: vertical; }
    .form-actions { display: flex; justify-content: flex-end; gap: 9px; margin-top: 22px; }
    .btn-kembali, .btn-simpan-info {
        border: 0;
        border-radius: 8px;
        padding: 10px 18px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
    }
    .btn-kembali { background: #eef1f6; color: #475569; }
    .btn-simpan-info { background: #0d47a1; color: white; }
    .gambar-lama { width: 130px; height: 90px; object-fit: cover; border-radius: 8px; display: block; margin-bottom: 10px; }
    @media(max-width:768px) {
        .form-info-content { padding: 0 15px 20px; }
        .form-info-card { padding: 18px; }
    }
</style>

<div class="form-info-content">
    <div class="form-info-header">
        <h1><?= $is_edit ? 'Edit Informasi' : 'Tambah Informasi' ?></h1>
        <p>Lengkapi informasi yang akan dikelola pada website PT Citra Abadi Bermartabat.</p>
    </div>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= html_escape($this->session->flashdata('error')) ?>
        </div>
    <?php endif; ?>

    <div class="form-info-card">
        <h2>Detail Informasi</h2>

        <form action="<?= base_url('admin/informasi/' . $aksi) ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label">Judul Informasi <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control"
                           placeholder="Contoh: Lowongan Kerja Staff Administrasi"
                           value="<?= html_escape($nilai('judul')) ?>" maxlength="200" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Kategori Informasi <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select" required>
                        <option value="">Pilih kategori</option>
                        <?php
                        $kategori = ['Event', 'Lowongan Kerja', 'Informasi Perusahaan'];
                        foreach ($kategori as $pilihan):
                        ?>
                            <option value="<?= $pilihan ?>" <?= $nilai('kategori') === $pilihan ? 'selected' : '' ?>>
                                <?= $pilihan ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Ringkasan Informasi <span class="text-danger">*</span></label>
                    <textarea name="ringkasan" class="form-control" rows="3"
                              placeholder="Tuliskan ringkasan singkat informasi..." required><?= html_escape($nilai('ringkasan')) ?></textarea>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Isi Informasi <span class="text-danger">*</span></label>
                    <textarea name="isi" class="form-control" rows="8"
                              placeholder="Tuliskan isi informasi secara lengkap..." required><?= html_escape($nilai('isi')) ?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control"
                           placeholder="Contoh: Karanganyar"
                           value="<?= html_escape($nilai('lokasi')) ?>">
                    <small class="text-muted">Bisa diisi untuk event atau lokasi penempatan kerja.</small>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control"
                           value="<?= html_escape($nilai('tanggal_mulai')) ?>">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control"
                           value="<?= html_escape($nilai('tanggal_selesai')) ?>">
                </div>

                <div class="col-md-8 mb-3">
                    <label class="form-label">Gambar Informasi</label>
                    <?php if ($is_edit && !empty($informasi['gambar'])): ?>
                        <img src="<?= base_url('assets/uploads/informasi/' . rawurlencode($informasi['gambar'])) ?>" class="gambar-lama" alt="Gambar saat ini">
                        <small class="text-muted d-block mb-2">Pilih gambar baru jika ingin mengganti gambar lama.</small>
                    <?php endif; ?>
                    <input type="file" name="gambar" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                    <small class="text-muted">Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</small>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Status Publikasi <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="Draft" <?= $nilai('status', 'Draft') === 'Draft' ? 'selected' : '' ?>>Draft</option>
                        <option value="Terbit" <?= $nilai('status') === 'Terbit' ? 'selected' : '' ?>>Terbit</option>
                    </select>
                </div>
            </div>

            <div class="form-actions">
                <a href="<?= base_url('admin/informasi') ?>" class="btn-kembali">Kembali</a>
                <button type="submit" class="btn-simpan-info">
                    <i class="fa-solid fa-check me-1"></i>
                    <?= $is_edit ? 'Simpan Perubahan' : 'Simpan Informasi' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?php include(APPPATH . 'views/layout/foot.php'); ?>
