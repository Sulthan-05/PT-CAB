
<?php
$is_edit = !empty($anggota);
$aksi = $is_edit
    ? base_url('admin/anggota_struktur/update/' . $anggota->id_anggota)
    : base_url('admin/anggota_struktur/simpan');
?>

<style>
.anggota-form-content {
    padding: 0 30px 30px;
    color: #17345f;
}
.anggota-form-header {
    background: linear-gradient(120deg,#0b3479,#164b9b);
    color: #fff;
    padding: 28px 35px;
    border-radius: 16px;
    margin-bottom: 25px;
    box-shadow: 0 5px 15px rgba(11,52,121,.12);
}
.anggota-form-header h1 {
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 7px;
}
.anggota-form-header p {
    font-size: 13px;
    color: #e1eaff;
    margin: 0;
}
.anggota-form-alert {
    padding: 13px 17px;
    border-radius: 9px;
    margin-bottom: 20px;
    background: #fff0f0;
    color: #c52b35;
    border: 1px solid #f3c5c5;
    font-size: 13px;
}
.anggota-form-card {
    background: #fff;
    border: 1px solid #e7edf5;
    border-radius: 14px;
    padding: 25px;
    box-shadow: 0 4px 13px rgba(20,48,86,.045);
}
.anggota-form-card h2 {
    font-size: 18px;
    font-weight: 700;
    color: #17345f;
    margin-bottom: 22px;
}
.anggota-form-label {
    display: block;
    color: #334b6e;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 9px;
}
.anggota-form-label span {
    color: #d33a42;
}
.anggota-form-control {
    width: 100%;
    border: 1px solid #dce5f1;
    background: #fff;
    border-radius: 9px;
    padding: 11px 13px;
    outline: none;
    color: #334b6e;
    font-size: 12px;
}
.anggota-form-control:focus {
    border-color: #2360b4;
    box-shadow: 0 0 0 3px rgba(35,96,180,.09);
}
.anggota-form-hint {
    display: block;
    color: #8796aa;
    font-size: 11px;
    margin-top: 7px;
}
.anggota-preview {
    margin-top: 14px;
}
.anggota-preview img {
    width: 125px;
    height: 125px;
    object-fit: cover;
    border-radius: 9px;
    border: 1px solid #e7edf5;
}
.anggota-preview p {
    color: #74849b;
    font-size: 12px;
    margin-bottom: 8px;
}
.anggota-form-actions {
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
    .anggota-form-content {
        padding: 0 20px 25px;
    }
    .anggota-form-header {
        padding: 23px 20px;
    }
}
@media(max-width:560px) {
    .anggota-form-content {
        padding: 0 15px 20px;
    }
    .anggota-form-header h1 {
        font-size: 21px;
    }
    .anggota-form-card {
        padding: 18px;
    }
    .anggota-form-actions {
        flex-direction: column-reverse;
    }
    .btn-form {
        text-align: center;
        width: 100%;
    }
}
</style>

<div class="anggota-form-content">

    <div class="anggota-form-header">
        <h1><?= $is_edit ? 'Edit Anggota Struktur' : 'Tambah Anggota Struktur' ?></h1>
        <p><?= $is_edit ? 'Perbarui informasi anggota struktur perusahaan.' : 'Tambahkan anggota baru ke dalam struktur perusahaan.' ?></p>
    </div>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="anggota-form-alert">
            <i class="fa-solid fa-circle-exclamation"></i>
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="anggota-form-card">
        <h2>Informasi Anggota</h2>

        <form action="<?= $aksi ?>" method="POST" enctype="multipart/form-data">
            <div class="row g-4">

                <div class="col-md-6">
                    <label class="anggota-form-label">Nama Anggota <span>*</span></label>
                    <input type="text" name="nama" class="anggota-form-control" maxlength="100" required
                           value="<?= $is_edit ? html_escape($anggota->nama) : '' ?>"
                           placeholder="Masukkan nama anggota">
                </div>

                <div class="col-md-6">
                    <label class="anggota-form-label">Jabatan <span>*</span></label>
                    <input type="text" name="jabatan" class="anggota-form-control" maxlength="100" required
                           value="<?= $is_edit ? html_escape($anggota->jabatan) : '' ?>"
                           placeholder="Contoh: Direktur Utama">
                </div>

                <div class="col-md-6">
                    <label class="anggota-form-label">Foto Anggota</label>
                    <input type="file" name="foto" class="anggota-form-control" accept=".jpg,.jpeg,.png,.webp">
                    <small class="anggota-form-hint">Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</small>

                    <?php if ($is_edit && !empty($anggota->foto) && file_exists(FCPATH . 'assets/uploads/anggota_struktur/' . $anggota->foto)): ?>
                        <div class="anggota-preview">
                            <p>Foto saat ini:</p>
                            <img src="<?= base_url('assets/uploads/anggota_struktur/' . rawurlencode($anggota->foto)) ?>" alt="Foto anggota">
                            <small class="anggota-form-hint">Kosongkan jika tidak ingin mengganti foto.</small>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-6">
                    <label class="anggota-form-label">Urutan Tampil</label>
                    <input type="number" name="urutan" class="anggota-form-control" min="0"
                           value="<?= $is_edit ? (int) $anggota->urutan : 0 ?>">
                    <small class="anggota-form-hint">Angka lebih kecil akan ditampilkan lebih dahulu.</small>
                </div>

                <div class="col-12">
                    <label class="anggota-form-label">Deskripsi Anggota</label>
                    <textarea name="deskripsi" class="anggota-form-control" rows="4"
                              placeholder="Masukkan deskripsi singkat anggota"><?= $is_edit ? html_escape($anggota->deskripsi) : '' ?></textarea>
                </div>

            </div>

            <div class="anggota-form-actions">
                <a href="<?= base_url('admin/anggota_struktur') ?>" class="btn-form btn-form-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn-form btn-form-save">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <?= $is_edit ? 'Simpan Perubahan' : 'Simpan Anggota' ?>
                </button>
            </div>
        </form>
    </div>
</div>
