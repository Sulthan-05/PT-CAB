<?php include(APPPATH . 'views/layout/head.php'); ?>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0" style="font-family:'Plus Jakarta Sans',sans-serif;">
                Pengelolaan Header
            </h4>
            <small class="text-muted">Atur nama perusahaan dan tombol CTA header.</small>
        </div>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= html_escape($this->session->flashdata('success')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?= $this->session->flashdata('error') /* sudah berupa HTML dari validation_errors */ ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <form id="formHeader" method="post" action="<?= site_url('admin/header/save') ?>" novalidate>

        <!-- CSRF CodeIgniter 3 -->
        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>"
            value="<?= $this->security->get_csrf_hash() ?>">

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan" id="inpNama" maxlength="180"
                            required
                            value="<?= html_escape(isset($header->nama_perusahaan) ? $header->nama_perusahaan : 'PT Citra Abadi Bermartabat') ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Logo Saat Ini</label>
                        <div class="border rounded p-2 d-flex align-items-center"
                            style="background:#f8f9fa;min-height:56px;">
                            <?php if (!empty($header->logo)): ?>
                                <img src="<?= base_url(html_escape($header->logo)) ?>" alt="Logo" style="max-height:40px;">
                                <span class="ms-3 text-muted small">
                                    <?= html_escape($header->logo) ?>
                                </span>
                            <?php else: ?>
                                <span class="text-muted small">Belum ada logo tersimpan.</span>
                            <?php endif; ?>
                        </div>
                        <small class="text-muted">Logo hanya ditampilkan sebagai pratinjau.</small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Teks CTA</label>
                        <input type="text" class="form-control" name="cta_text" id="inpCtaText" maxlength="100" required
                            value="<?= html_escape(isset($header->cta_text) ? $header->cta_text : 'Hubungi Kami') ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">URL CTA</label>
                        <input type="text" class="form-control" name="cta_url" id="inpCtaUrl" maxlength="255" required
                            value="<?= html_escape(isset($header->cta_url) ? $header->cta_url : '#kontak') ?>">
                        <small class="text-muted">
                            Boleh http/https, path internal (/...), atau anchor (#...).
                        </small>
                    </div>

                </div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#modalPreviewHeader">
                <i class="bi bi-eye"></i> Preview
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
        </div>
    </form>
</div>

<!-- Modal Preview -->
<div class="modal fade" id="modalPreviewHeader" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Preview Header</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <nav class="navbar navbar-expand-lg navbar-light bg-white border rounded px-3">
                    <a class="navbar-brand d-flex align-items-center" href="#">
                        <?php if (!empty($header->logo)): ?>
                            <img src="<?= base_url(html_escape($header->logo)) ?>" alt="Logo" style="max-height:36px;"
                                class="me-2">
                        <?php endif; ?>
                        <span id="pvNama" class="fw-bold" style="font-family:'Plus Jakarta Sans',sans-serif;">
                            <?= html_escape(isset($header->nama_perusahaan) ? $header->nama_perusahaan : '') ?>
                        </span>
                    </a>
                    <div class="ms-auto">
                        <a id="pvCta" class="btn btn-warning fw-semibold" href="#" onclick="return false;">
                            <?= html_escape(isset($header->cta_text) ? $header->cta_text : '') ?>
                        </a>
                    </div>
                </nav>
                <p class="mt-3 mb-0 small text-muted">
                    Tujuan CTA: <span id="pvCtaUrl" class="fw-semibold"></span>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        var modalEl = document.getElementById('modalPreviewHeader');
        if (!modalEl) return;

        modalEl.addEventListener('show.bs.modal', function () {
            var nama = document.getElementById('inpNama').value.trim();
            var teks = document.getElementById('inpCtaText').value.trim();
            var url = document.getElementById('inpCtaUrl').value.trim();

            document.getElementById('pvNama').textContent = nama || '(Nama perusahaan)';
            document.getElementById('pvCta').textContent = teks || '(Teks CTA)';
            document.getElementById('pvCtaUrl').textContent = url || '(URL CTA)';
        });
    })();
</script>
<?php include(APPPATH . 'views/layout/foot.php'); ?>