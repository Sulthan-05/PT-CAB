<?php include(APPPATH . 'views/layout/head.php'); ?>

<!-- =========================================================
     HALAMAN ADMIN - TENTANG KAMI
     PT CITRA ABADI BERMARTABAT
     ========================================================= -->

<style>
    /* =========================================================
       CONTENT TENTANG KAMI
       Mengikuti desain Dashboard PT CAB
       ========================================================= */

    .profil-content {
        padding: 0 30px 30px 30px;
    }

    /* HEADER HALAMAN */
    .profil-header {
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

    .profil-header-text h1 {
        font-size: 24px;
        font-weight: 600;
        margin: 0 0 6px 0;
    }

    .profil-header-text p {
        margin: 0;
        font-size: 13px;
        color: rgba(255, 255, 255, 0.85);
        line-height: 1.6;
    }

    /* BUTTON TAMBAH */
    .btn-tambah-profil {
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

    .btn-tambah-profil:hover {
        background-color: #fbbf24;
        color: #0b3b8c;
        transform: translateY(-1px);
    }

    /* CARD TABLE */
    .profil-card {
        background-color: #ffffff;
        border-radius: 12px;
        border: 1px solid #f0f0f0;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05);
    }

    .profil-card-header {
        padding: 22px 25px;
        border-bottom: 1px solid #eef1f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .profil-card-header h2 {
        margin: 0;
        font-size: 17px;
        font-weight: 600;
        color: #1e293b;
    }

    .profil-card-header p {
        margin: 4px 0 0;
        font-size: 12px;
        color: #7a7a7a;
    }

    .profil-table-wrapper {
        overflow-x: auto;
    }

    .profil-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
        min-width: 850px;
    }

    .profil-table thead th {
        background-color: #f0f6ff;
        color: #0a2f6c;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 14px 16px;
        text-align: left;
        border-bottom: 1px solid #dce8f8;
    }

    .profil-table tbody td {
        padding: 16px;
        color: #475569;
        vertical-align: top;
        border-bottom: 1px solid #f0f2f5;
        line-height: 1.6;
    }

    .profil-table tbody tr {
        transition: background-color 0.2s ease;
    }

    .profil-table tbody tr:hover {
        background-color: #f8faff;
    }

    .profil-table tbody tr:last-child td {
        border-bottom: none;
    }

    .nomor {
        width: 50px;
        color: #0d47a1 !important;
        font-weight: 600;
    }

    .deskripsi {
        min-width: 250px;
        max-width: 350px;
    }

    .visi,
    .misi {
        min-width: 200px;
        max-width: 280px;
    }

    .tanggal {
        white-space: nowrap;
        color: #64748b !important;
        font-size: 12px;
    }

    /* BUTTON AKSI */
    .aksi-wrapper {
        display: flex;
        gap: 6px;
        white-space: nowrap;
    }

    .btn-aksi {
        border: none;
        border-radius: 7px;
        padding: 7px 10px;
        font-size: 11px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .btn-edit {
        background-color: #e5efff;
        color: #0d47a1;
    }

    .btn-edit:hover {
        background-color: #0d47a1;
        color: #ffffff;
    }

    .btn-hapus {
        background-color: #fff1f1;
        color: #dc2626;
    }

    .btn-hapus:hover {
        background-color: #dc2626;
        color: #ffffff;
    }

    /* =========================================================
       MODAL TAMBAH PROFIL
       ========================================================= */

    .modal-content {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(10, 47, 108, 0.18);
    }

    .modal-header {
        background: linear-gradient(135deg, #0a2f6c, #1565c0);
        color: #ffffff;
        border: none;
        padding: 18px 22px;
    }

    .modal-title {
        font-size: 16px;
        font-weight: 600;
    }

    .modal-header .btn-close {
        filter: brightness(0) invert(1);
        opacity: 0.8;
    }

    .modal-header .btn-close:hover {
        opacity: 1;
    }

    .modal-body {
        padding: 25px;
        background-color: #ffffff;
    }

    .form-label {
        color: #1e293b;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .form-control {
        border: 1px solid #dbe3ef;
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 13px;
        color: #1e293b;
        background-color: #fbfdff;
        transition: all 0.2s ease;
    }

    .form-control:focus {
        border-color: #1565c0;
        box-shadow: 0 0 0 3px rgba(21, 101, 192, 0.10);
        background-color: #ffffff;
    }

    .form-control::placeholder {
        color: #a0a9b8;
        font-size: 12px;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .modal-footer {
        background-color: #f8faff;
        border-top: 1px solid #eef1f6;
        padding: 15px 22px;
    }

    .btn-modal {
        border: none;
        border-radius: 8px;
        padding: 9px 18px;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .btn-batal {
        background-color: #eef1f6;
        color: #475569;
    }

    .btn-batal:hover {
        background-color: #e2e6ec;
        color: #1e293b;
    }

    .btn-simpan {
        background-color: #0d47a1;
        color: #ffffff;
    }

    .btn-simpan:hover {
        background-color: #0a2f6c;
        color: #ffffff;
        box-shadow: 0 4px 10px rgba(13, 71, 161, 0.2);
    }

    /* EMPTY DATA */
    .empty-data {
        text-align: center;
        padding: 45px 20px !important;
        color: #94a3b8 !important;
    }

    .empty-data i {
        font-size: 32px;
        margin-bottom: 10px;
        color: #cbd5e1;
    }

    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (max-width: 992px) {
        .profil-content {
            padding: 0 20px 20px;
        }

        .profil-header {
            padding: 25px 22px;
        }
    }

    @media (max-width: 768px) {
        .profil-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-tambah-profil {
            width: 100%;
            text-align: center;
        }

        .profil-card-header {
            padding: 18px 20px;
        }

        .modal-body {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {
        .profil-content {
            padding: 0 15px 15px;
        }

        .profil-header {
            padding: 22px 18px;
        }

        .profil-header-text h1 {
            font-size: 20px;
        }

        .profil-header-text p {
            font-size: 12px;
        }
    }
</style>


<!-- =========================================================
     CONTENT AREA
     ========================================================= -->

<div class="profil-content">
    <?php $no = 1;
    foreach ($tentang as $ttg) { ?>
        <!-- HEADER -->
        <div class="profil-header">

            <div class="profil-header-text">
                <h1>Kelola Tentang Kami</h1>
                <p>
                    Kelola informasi Tentang Kami serta Visi dan Misi
                    PT Citra Abadi Bermartabat.
                </p>
            </div>

            <!-- HANYA TAMBAH YANG MENGGUNAKAN MODAL -->
            <button type="button" class="btn-tambah-profil" data-bs-toggle="modal" data-bs-target="#modalTambahProfil">

                <i class="fa-solid fa-plus"></i>
                Tambah Profil

            </button>

        </div>
        <?= $this->session->flashdata('alert') ?>

        <!-- =====================================================
         CARD DATA PROFIL
         ===================================================== -->

        <div class="profil-card">

            <div class="profil-card-header">

                <div>
                    <h2>Data Profil Perusahaan</h2>

                    <p>
                        Daftar informasi Tentang Kami, Visi, dan Misi
                        yang tersimpan.
                    </p>
                </div>

            </div>


            <div class="profil-table-wrapper">

                <table class="profil-table">

                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Deskripsi</th>
                            <th>Visi</th>
                            <th>Misi</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td class="nomor"><?= $no ?></td>
                            <td class="deskripsi"><?= $ttg['deskripsi'] ?></td>
                            <td class="visi"><?= $ttg['visi'] ?></td>
                            <td class="misi"><?= $ttg['misi'] ?></td>
                            <td>
                                <div class="aksi-wrapper">

                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalEditProfil<?= $ttg['id_profil']; ?>"
                                        class="btn-aksi btn-edit">

                                        <i class="fa-solid fa-pen"></i>
                                        Edit

                                    </button>

                                    <a href="<?= base_url('admin/tentang/hapus/' . $ttg['id_profil']) ?>" type="submit"
                                        onclick="return confirm('anda Yakin Hapus Data INi')" class="btn-aksi btn-hapus">

                                        <i class="fa-solid fa-trash"></i>
                                        Hapus

                                    </a>

                                </div>

                            </td>
                        </tr>


                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="modal fade" id="modalTambahProfil" tabindex="-1" aria-labelledby="modalTambahProfilLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">

                <!-- HEADER MODAL -->

                <div class="modal-header">

                    <h5 class="modal-title" id="modalTambahProfilLabel">

                        <i class="fa-solid fa-circle-plus me-2"></i>
                        Tambah Profil Perusahaan

                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>


                <!-- BODY MODAL -->

                <div class="modal-body">

                    <form action="<?= base_url('admin/tentang/tambah') ?>" method="post" id="formTambahProfil">

                        <!-- DESKRIPSI -->

                        <div class="mb-3">

                            <label for="deskripsi" class="form-label">

                                Deskripsi Tentang Kami

                            </label>

                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                                placeholder="Masukkan deskripsi perusahaan..." required></textarea>

                        </div>


                        <!-- VISI -->

                        <div class="mb-3">

                            <label for="visi" class="form-label">

                                Visi Perusahaan

                            </label>

                            <textarea class="form-control" id="visi" name="visi" rows="3"
                                placeholder="Masukkan visi perusahaan..." required></textarea>

                        </div>


                        <!-- MISI -->

                        <div class="mb-2">

                            <label for="misi" class="form-label">

                                Misi Perusahaan

                            </label>

                            <textarea class="form-control" id="misi" name="misi" rows="4"
                                placeholder="Masukkan misi perusahaan..." required></textarea>

                        </div>

                    </form>

                </div>


                <!-- FOOTER MODAL -->

                <div class="modal-footer">

                    <button type="button" class="btn-modal btn-batal" data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button type="submit" form="formTambahProfil" class="btn-modal btn-simpan">

                        <i class="fa-solid fa-check me-1"></i>
                        Simpan

                    </button>

                </div>

            </div>

        </div>

    </div>

    <div class="modal fade" id="modalEditProfil<?= $ttg['id_profil']; ?>" tabindex="-1"
        aria-labelledby="modalTambahProfilLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">

                <!-- HEADER MODAL -->

                <div class="modal-header">

                    <h5 class="modal-title" id="modalTambahProfilLabel">

                        <i class="fa-solid fa-circle-plus me-2"></i>
                        Edit Profil Perusahaan

                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>

                </div>


                <!-- BODY MODAL -->
                <form action="<?= base_url('admin/tentang/update') ?>" method="post">
                    <input type="hidden" name="id_profil" value="<?= $ttg['id_profil'] ?>" id="">
                    <div class="modal-body">


                        <!-- DESKRIPSI -->

                        <div class="mb-3">

                            <label for="deskripsi" class="form-label">

                                Deskripsi Tentang Kami

                            </label>

                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                                placeholder="Masukkan deskripsi perusahaan..." value=""
                                required><?= $ttg['deskripsi'] ?></textarea>

                        </div>


                        <!-- VISI -->

                        <div class="mb-3">

                            <label for="visi" class="form-label">

                                Visi Perusahaan

                            </label>

                            <textarea class="form-control" id="visi" name="visi" rows="3"
                                placeholder="Masukkan visi perusahaan..." required><?= $ttg['visi'] ?></textarea>

                        </div>


                        <!-- MISI -->

                        <div class="mb-2">

                            <label for="misi" class="form-label">

                                Misi Perusahaan

                            </label>

                            <textarea class="form-control" id="misi" name="misi" rows="4"
                                placeholder="Masukkan misi perusahaan..." required><?= $ttg['misi'] ?></textarea>

                        </div>



                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn-modal btn-batal" data-bs-dismiss="modal">

                            Batal

                        </button>

                        <button type="submit" class="btn-modal btn-simpan">

                            <i class="fa-solid fa-check me-1"></i>
                            Simpan

                        </button>

                    </div>
                </form>
            </div>

        </div>
        <?php $no++;
    } ?>
</div>
<?php include(APPPATH . 'views/layout/foot.php'); ?>