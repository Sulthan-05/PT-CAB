<?php include(APPPATH . 'views/layout/head.php'); ?>

<style>
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
</style>


<div class="modal-dialog-centered modal-lg">

    <div class="modal-content">

        <!-- HEADER MODAL -->

        <div class="modal-header">

            <h5 class="modal-title" id="modalTambahProfilLabel">

                <i class="fa-solid fa-circle-plus me-2"></i>
                Edit Profil Perusahaan

            </h5>
        </div>


        <!-- BODY MODAL -->
        <form action="<?= base_url('admin/tentang/update') ?>" method="post" id="formTambahProfil"></form>
        <div class="modal-body">
            <!-- DESKRIPSI -->
            <input type="hidden" name="id_profil" value="<?=$tentang->id_profil?>" id="">

            <div class="mb-3">

                <label for="deskripsi" class="form-label">

                    Deskripsi Tentang Kami

                </label>

                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"><?= $tentang->deskripsi ?></textarea>

            </div>


            <!-- VISI -->

            <div class="mb-3">

                <label for="visi" class="form-label">

                    Visi Perusahaan

                </label>

                <textarea class="form-control" id="visi" name="visi" rows="3" placeholder="Masukkan visi perusahaan..."
                    required></textarea>

            </div>


            <!-- MISI -->

            <div class="mb-2">

                <label for="misi" class="form-label">

                    Misi Perusahaan

                </label>

                <textarea class="form-control" id="misi" name="misi" rows="4" placeholder="Masukkan misi perusahaan..."
                    required></textarea>

            </div>



        </div>

        </form>
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

<?php include(APPPATH . 'views/layout/foot.php'); ?>