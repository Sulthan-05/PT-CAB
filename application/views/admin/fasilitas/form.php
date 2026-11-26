
<?php
$is_edit = !empty($fasilitas);
$aksi = $is_edit
    ? base_url('admin/fasilitas/update/' . $fasilitas['id_fasilitas'])
    : base_url('admin/fasilitas/simpan');
?>

<?php include(APPPATH . 'views/layout/head.php'); ?>

<style>
.fasilitas-form-content {
    padding: 0 30px 30px;
    color: #17345f;
}
.fasilitas-form-header {
    background: linear-gradient(120deg,#0b3479,#164b9b);
    color: #fff;
    padding: 28px 35px;
    border-radius: 16px;
    margin-bottom: 25px;
    box-shadow: 0 5px 15px rgba(11,52,121,.12);
}
.fasilitas-form-header h1 {
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 7px;
}
.fasilitas-form-header p {
    font-size: 13px;
    color: #e1eaff;
    margin: 0;
}
.fasilitas-form-alert {
    padding: 13px 17px;
    border-radius: 9px;
    margin-bottom: 20px;
    background: #fff0f0;
    color: #c52b35;
    border: 1px solid #f3c5c5;
    font-size: 13px;
}
.fasilitas-form-card {
    background: #fff;
    border: 1px solid #e7edf5;
    border-radius: 14px;
    padding: 25px;
    box-shadow: 0 4px 13px rgba(20,48,86,.045);
}
.fasilitas-form-card h2 {
    font-size: 18px;
    font-weight: 700;
    color: #17345f;
    margin-bottom: 22px;
}
.fasilitas-form-label {
    display: block;
    color: #334b6e;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 9px;
}
.fasilitas-form-label span {
    color: #d33a42;
}
.fasilitas-form-control {
    width: 100%;
    border: 1px solid #dce5f1;
    background: #fff;
    border-radius: 9px;
    padding: 11px 13px;
    outline: none;
    color: #334b6e;
    font-size: 12px;
}
.fasilitas-form-control:focus {
    border-color: #2360b4;
    box-shadow: 0 0 0 3px rgba(35,96,180,.09);
}
.fasilitas-form-hint {
    display: block;
    color: #8796aa;
    font-size: 11px;
    margin-top: 7px;
}
.fasilitas-preview {
    margin-top: 14px;
}
.fasilitas-preview p {
    color: #74849b;
    font-size: 12px;
    margin-bottom: 8px;
}
.fasilitas-preview img {
    width: 145px;
    height: 120px;
    object-fit: cover;
    border-radius: 9px;
    border: 1px solid #e7edf5;
}
.fasilitas-form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 9px;
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid #edf1f6;
}
.btn-form {
    padding: 11px 18px;
    border-radius: 9px;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
    border: none;
    transition: .2s;
    cursor: pointer;
}
.btn-form-back {
    background: #e8f0ff;
    color: #1750a0;
}
.btn-form-back:hover {
    background: #1750a0;
    color: #fff;
}
.btn-form-save {
    background: #ffa412;
    color: #102e5c;
}
.btn-form-save:hover {
    background: #ffb52e;
    color: #102e5c;
    transform: translateY(-2px);
}
@media(max-width:768px) {
    .fasilitas-form-content {
        padding: 0 20px 25px;
    }
    .fasilitas-form-header {
        padding: 23px 20px;
    }
}
@media(max-width:560px) {
    .fasilitas-form-content {
        padding: 0 15px 20px;
    }
    .fasilitas-form-header h1 {
        font-size: 21px;
    }
    .fasilitas-form-card {
        padding: 18px;
    }
    .fasilitas-form-actions {
        flex-direction: column-reverse;
    }
    .btn-form {
        width: 100%;
        text-align: center;
    }
}
</style>

<div class="fasilitas-form-content">

    <div class="fasilitas-form-header">
        <h1><?= $is_edit ? 'Edit Fasilitas' : 'Tambah Fasilitas' ?></h1>
        <p><?= $is_edit ? 'Perbarui informasi fasilitas perusahaan.' : 'Tambahkan informasi fasilitas baru perusahaan.' ?></p>
    </div>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="fasilitas-form-alert">
            <i class="fa-solid fa-circle-exclamation"></i>
            <?= html_escape($this->session->flashdata('error')) ?>
        </div>
    <?php endif; ?>

    <div class="fasilitas-form-card">
        <h2>Informasi Fasilitas</h2>

        <form action="<?= $aksi ?>" method="POST" enctype="multipart/form-data">
            <div class="row g-4">

                <div class="col-md-6">
                    <label class="fasilitas-form-label">Nama Fasilitas <span>*</span></label>
                    <input type="text" name="nama_fasilitas" class="fasilitas-form-control" maxlength="255" required
                           value="<?= $is_edit ? html_escape($fasilitas['nama_fasilitas']) : '' ?>"
                           placeholder="Masukkan nama fasilitas">
                </div>

                <div class="col-md-6">
                    <label class="fasilitas-form-label">Kategori Fasilitas <span>*</span></label>
                    <select name="kategori" class="fasilitas-form-control" required>
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= html_escape($k) ?>"
                                <?= $is_edit && $fasilitas['kategori'] === $k ? 'selected' : '' ?>>
                                <?= html_escape($k) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="fasilitas-form-label">Foto Fasilitas</label>
                    <input type="file" name="foto" class="fasilitas-form-control" accept=".jpg,.jpeg,.png,.webp">
                    <small class="fasilitas-form-hint">Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</small>

                    <?php if ($is_edit && !empty($fasilitas['foto']) && file_exists(FCPATH . 'assets/uploads/fasilitas/' . $fasilitas['foto'])): ?>
                        <div class="fasilitas-preview">
                            <p>Foto saat ini:</p>
                            <img src="<?= base_url('assets/uploads/fasilitas/' . rawurlencode($fasilitas['foto'])) ?>" alt="Foto fasilitas">
                            <small class="fasilitas-form-hint">Kosongkan jika tidak ingin mengganti foto.</small>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-12">
                    <label class="fasilitas-form-label">Deskripsi Fasilitas</label>
                    <textarea name="deskripsi" class="fasilitas-form-control" rows="5"
                              placeholder="Jelaskan fasilitas perusahaan"><?= $is_edit ? html_escape($fasilitas['deskripsi']) : '' ?></textarea>
                </div>

            </div>

            <div class="fasilitas-form-actions">
                <a href="<?= base_url('admin/fasilitas') ?>" class="btn-form btn-form-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn-form btn-form-save">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <?= $is_edit ? 'Simpan Perubahan' : 'Simpan Fasilitas' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?php include(APPPATH . 'views/layout/foot.php'); ?>
