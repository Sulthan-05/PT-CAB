<?php include(APPPATH . 'views/layout/head.php'); ?>

<style>
    .footer-page {
        padding: 0 30px 40px;
    }

    .page-header {
        margin-bottom: 25px;
    }

    .page-header h1 {
        font-size: 24px;
        color: #0b1a30;
        margin-bottom: 6px;
    }

    .page-header p {
        font-size: 13px;
        color: #6b7280;
    }

    .footer-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e5e7eb;
        padding: 25px;
        margin-bottom: 25px;
    }

    .footer-card-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 22px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eef0f3;
    }

    .footer-card-title .title-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: #eaf2ff;
        color: #0d47a1;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .footer-card-title h2 {
        font-size: 16px;
        color: #172033;
        margin: 0;
    }

    .footer-card-title p {
        font-size: 11px;
        color: #8a93a3;
        margin-top: 2px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        font-size: 12px;
        font-weight: 600;
        color: #374151;
    }

    .form-control {
        width: 100%;
        border: 1px solid #dfe3e8;
        background: #ffffff;
        border-radius: 8px;
        padding: 11px 13px;
        outline: none;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        color: #1f2937;
        transition: .2s ease;
    }

    .form-control:focus {
        border-color: #0d47a1;
        box-shadow: 0 0 0 3px rgba(13, 71, 161, .08);
    }

    textarea.form-control {
        min-height: 105px;
        resize: vertical;
    }

    .form-help {
        font-size: 10px;
        color: #8a93a3;
    }

    .logo-upload {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .logo-preview {
        width: 90px;
        height: 90px;
        border: 1px dashed #cfd5dd;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: #f8fafc;
        flex-shrink: 0;
    }

    .logo-preview img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .logo-placeholder {
        text-align: center;
        color: #9ca3af;
        font-size: 10px;
    }

    .logo-placeholder i {
        display: block;
        font-size: 22px;
        margin-bottom: 5px;
    }

    .file-input {
        font-size: 11px;
        color: #6b7280;
    }

    .file-input::file-selector-button {
        border: none;
        background: #0d47a1;
        color: #ffffff;
        padding: 9px 13px;
        border-radius: 7px;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        margin-right: 8px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #eef0f3;
    }

    .btn-save {
        border: none;
        background: #0d47a1;
        color: #ffffff;
        padding: 11px 20px;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: .2s ease;
    }

    .btn-save:hover {
        background: #003178;
        transform: translateY(-1px);
    }

    .alert {
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .alert-success {
        background: #ecfdf3;
        color: #166534;
        border: 1px solid #bbf7d0;
    }

    .alert-error {
        background: #fef2f2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    .preview-title {
        margin-bottom: 15px;
    }

    .preview-title h2 {
        font-size: 16px;
        color: #172033;
        margin-bottom: 4px;
    }

    .preview-title p {
        font-size: 11px;
        color: #8a93a3;
    }

    .footer-preview {
        border-radius: 10px;
        overflow: hidden;
        background: #003b88;
        color: #ffffff;
    }

    .preview-main {
        padding: 28px 25px;
        display: grid;
        grid-template-columns: 1.2fr 1.2fr 1fr 1fr;
        gap: 25px;
    }

    .preview-column h3 {
        font-size: 12px;
        margin-bottom: 12px;
        color: #ffffff;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .preview-column h3::before {
        content: '';
        width: 4px;
        height: 14px;
        background: #f6b400;
        border-radius: 4px;
    }

    .preview-column p,
    .preview-column a {
        font-size: 9px;
        line-height: 1.8;
        color: #d9e6ff;
        text-decoration: none;
    }

    .preview-logo {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
    }

    .preview-logo-box {
        width: 30px;
        height: 30px;
        background: #ffffff;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #003178;
        font-size: 8px;
        font-weight: 700;
        overflow: hidden;
    }

    .preview-logo-box img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .preview-company-name {
        font-size: 11px;
        font-weight: 700;
    }

    .preview-social {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .preview-social a {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .preview-map {
        height: 110px;
        border-radius: 7px;
        background: #d9e5ef;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #526173;
        text-align: center;
        font-size: 9px;
    }

    .preview-map i {
        display: block;
        font-size: 24px;
        margin-bottom: 5px;
    }

    .preview-bottom {
        padding: 10px 25px;
        background: #00295f;
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .preview-bottom span {
        font-size: 8px;
        color: #b9c9e3;
    }

    @media (max-width: 900px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .preview-main {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .footer-page {
            padding: 0 20px 25px;
        }

        .footer-card {
            padding: 18px;
        }

        .preview-main {
            grid-template-columns: 1fr;
        }

        .preview-bottom {
            flex-direction: column;
        }
    }
</style>

<section class="footer-page">

    <div class="page-header">
        <h1>Kelola Footer Website</h1>
        <p>Atur informasi perusahaan, kontak, dan media sosial yang ditampilkan pada footer website.</p>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <i class="fa-solid fa-circle-check"></i>
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-error">
            <i class="fa-solid fa-circle-exclamation"></i>
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/website/footer'); ?>" method="post" enctype="multipart/form-data">

        <div class="footer-card">

            <div class="footer-card-title">
                <div class="title-icon">
                    <i class="fa-solid fa-building"></i>
                </div>

                <div>
                    <h2>Informasi Perusahaan</h2>
                    <p>Informasi utama yang ditampilkan pada bagian footer.</p>
                </div>
            </div>

            <div class="form-grid">

                <div class="form-group">
                    <label for="nama_website">Nama Website / Perusahaan</label>

                    <input
                        type="text"
                        id="nama_website"
                        name="nama_website"
                        class="form-control"
                        value="<?= html_escape($pengaturan->nama_website ?? ''); ?>"
                        placeholder="PT Citra Abadi Bermartabat"
                    >
                </div>

                <div class="form-group">
                    <label for="nomor_whatsapp">Nomor WhatsApp</label>

                    <input
                        type="text"
                        id="nomor_whatsapp"
                        name="nomor_whatsapp"
                        class="form-control"
                        value="<?= html_escape($pengaturan->nomor_whatsapp ?? ''); ?>"
                        placeholder="0899xxxxxxxx"
                    >
                </div>

                <div class="form-group full">
                    <label for="deskripsi_singkat">Deskripsi Singkat</label>

                    <textarea
                        id="deskripsi_singkat"
                        name="deskripsi_singkat"
                        class="form-control"
                        placeholder="Masukkan deskripsi singkat perusahaan..."
                    ><?= html_escape($pengaturan->deskripsi_singkat ?? ''); ?></textarea>

                    <span class="form-help">
                        Deskripsi singkat perusahaan yang akan muncul di bagian kiri footer.
                    </span>
                </div>

                <div class="form-group full">
                    <label>Logo Website</label>

                    <div class="logo-upload">

                        <div class="logo-preview">
                            <?php if (!empty($pengaturan->logo)): ?>

                                <img
                                    src="<?= base_url('assets/uploads/website/' . $pengaturan->logo); ?>"
                                    alt="Logo Website"
                                >

                            <?php else: ?>

                                <div class="logo-placeholder">
                                    <i class="fa-regular fa-image"></i>
                                    Belum ada logo
                                </div>

                            <?php endif; ?>
                        </div>

                        <div>
                            <input
                                type="file"
                                name="logo"
                                class="file-input"
                                accept=".jpg,.jpeg,.png,.webp,.svg"
                            >

                            <div class="form-help" style="margin-top:8px;">
                                Format JPG, JPEG, PNG, WEBP atau SVG. Maksimal 2 MB.
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <div class="footer-card">

            <div class="footer-card-title">
                <div class="title-icon">
                    <i class="fa-solid fa-link"></i>
                </div>

                <div>
                    <h2>Kontak & Media Sosial</h2>
                    <p>Kelola tautan yang digunakan pada footer website.</p>
                </div>
            </div>

            <div class="form-grid">

                <div class="form-group">
                    <label for="link_google_maps">Link Google Maps</label>

                    <input
                        type="text"
                        id="link_google_maps"
                        name="link_google_maps"
                        class="form-control"
                        value="<?= html_escape($pengaturan->link_google_maps ?? ''); ?>"
                        placeholder="https://maps.google.com/..."
                    >
                </div>

                <div class="form-group">
                    <label for="link_shopee">Link Shopee</label>

                    <input
                        type="text"
                        id="link_shopee"
                        name="link_shopee"
                        class="form-control"
                        value="<?= html_escape($pengaturan->link_shopee ?? ''); ?>"
                        placeholder="https://shopee.co.id/..."
                    >
                </div>

                <div class="form-group">
                    <label for="instagram">Instagram</label>

                    <input
                        type="text"
                        id="instagram"
                        name="instagram"
                        class="form-control"
                        value="<?= html_escape($pengaturan->instagram ?? ''); ?>"
                        placeholder="https://instagram.com/..."
                    >
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook</label>

                    <input
                        type="text"
                        id="facebook"
                        name="facebook"
                        class="form-control"
                        value="<?= html_escape($pengaturan->facebook ?? ''); ?>"
                        placeholder="https://facebook.com/..."
                    >
                </div>

                <div class="form-group">
                    <label for="youtube">YouTube</label>

                    <input
                        type="text"
                        id="youtube"
                        name="youtube"
                        class="form-control"
                        value="<?= html_escape($pengaturan->youtube ?? ''); ?>"
                        placeholder="https://youtube.com/..."
                    >
                </div>

                <div class="form-group">
                    <label for="tiktok">TikTok</label>

                    <input
                        type="text"
                        id="tiktok"
                        name="tiktok"
                        class="form-control"
                        value="<?= html_escape($pengaturan->tiktok ?? ''); ?>"
                        placeholder="https://tiktok.com/@..."
                    >
                </div>

            </div>

            <div class="form-actions">
                <button type="submit" class="btn-save">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan Perubahan
                </button>
            </div>

        </div>

    </form>

    <div class="footer-card">

        <div class="preview-title">
            <h2>Preview Footer</h2>
            <p>Gambaran informasi footer yang akan ditampilkan pada website publik.</p>
        </div>

        <div class="footer-preview">

            <div class="preview-main">

                <div class="preview-column">

                    <div class="preview-logo">

                        <div class="preview-logo-box">

                            <?php if (!empty($pengaturan->logo)): ?>

                                <img
                                    src="<?= base_url('assets/uploads/website/' . $pengaturan->logo); ?>"
                                    alt="Logo"
                                >

                            <?php else: ?>

                                CAB

                            <?php endif; ?>

                        </div>

                        <div class="preview-company-name">
                            <?= html_escape($pengaturan->nama_website ?? 'PT Citra Abadi Bermartabat'); ?>
                        </div>

                    </div>

                    <p>
                        <?= html_escape($pengaturan->deskripsi_singkat ?? 'Deskripsi singkat perusahaan akan ditampilkan di sini.'); ?>
                    </p>

                </div>

                <div class="preview-column">

                    <h3>Lokasi Pabrik & Gudang</h3>

                    <p>
                        PT Citra Abadi Bermartabat merupakan perusahaan
                        yang bergerak pada bidang pengolahan pangan.
                    </p>

                    <p style="margin-top:7px;">
                        Klik link Google Maps untuk melihat lokasi perusahaan.
                    </p>

                </div>

                <div class="preview-column">

                    <h3>Contact Media Sosial</h3>

                    <div class="preview-social">

                        <?php if (!empty($pengaturan->nomor_whatsapp)): ?>
                            <a href="<?= html_escape($pengaturan->nomor_whatsapp); ?>">
                                <i class="fa-brands fa-whatsapp"></i>
                                WhatsApp
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($pengaturan->instagram)): ?>
                            <a href="<?= html_escape($pengaturan->instagram); ?>" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                                Instagram
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($pengaturan->tiktok)): ?>
                            <a href="<?= html_escape($pengaturan->tiktok); ?>" target="_blank">
                                <i class="fa-brands fa-tiktok"></i>
                                TikTok
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($pengaturan->facebook)): ?>
                            <a href="<?= html_escape($pengaturan->facebook); ?>" target="_blank">
                                <i class="fa-brands fa-facebook"></i>
                                Facebook
                            </a>
                        <?php endif; ?>

                    </div>

                </div>

                <div class="preview-column">

                    <h3>Lokasi PT CAB</h3>

                    <div class="preview-map">

                        <div>
                            <i class="fa-solid fa-location-dot"></i>
                            <div>
                                Google Maps
                            </div>

                            <?php if (!empty($pengaturan->link_google_maps)): ?>

                                <a
                                    href="<?= html_escape($pengaturan->link_google_maps); ?>"
                                    target="_blank"
                                    style="color:#003178;font-weight:600;"
                                >
                                    Lihat Lokasi
                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

            <div class="preview-bottom">

                <span>
                    © <?= date('Y'); ?>
                    <?= html_escape($pengaturan->nama_website ?? 'PT Citra Abadi Bermartabat'); ?>.
                    Seluruh Hak Cipta Dilindungi Undang-Undang.
                </span>

                <span>
                    Syarat Kemitraan &nbsp; • &nbsp;
                    Standar Mutu &nbsp; • &nbsp;
                    Karir &amp; Magang
                </span>

            </div>

        </div>

    </div>

</section>

<?php include(APPPATH . 'views/layout/foot.php'); ?>
