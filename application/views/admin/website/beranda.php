<?php include(APPPATH . 'views/layout/head.php'); ?>
<?php $row = $beranda ?? null; ?>
<?php
$row = $beranda ?? null;
$tgl = (!empty($row->updated_at)) ? date('d-m-Y H:i', strtotime($row->updated_at)) : null;
?>
<style>
    .adm-hero {
        position: relative;
        overflow: hidden;
        color: #fff;
        background: linear-gradient(135deg, #0A2F6C 0%, #0D47A1 55%, #1565C0 100%);
        padding: clamp(18px, 4vw, 30px) clamp(18px, 4vw, 35px);
        border-radius: 14px;
        margin-bottom: 18px;
        box-shadow: 0 4px 15px rgba(10, 47, 108, .15)
    }

    .adm-hero::after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 6px;
        background: #FBBF24
    }

    .adm-hero h4 {
        font-weight: 800;
        font-size: clamp(1.15rem, 3.5vw, 1.5rem);
        margin-bottom: 4px
    }

    .adm-hero p {
        margin: 0;
        color: rgba(219, 234, 254, .9);
        font-size: clamp(.85rem, 2.5vw, 1rem)
    }

    .adm-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
        margin-bottom: 16px
    }

    .adm-chip {
        font-size: .8rem;
        padding: 5px 12px;
        border-radius: 999px;
        background: #EFF6FF;
        color: #0D47A1;
        font-weight: 600
    }

    .adm-chip.dirty {
        background: #FEF3C7;
        color: #92400E;
        display: none
    }

    .adm-tip {
        background: #F0F9FF;
        border: 1px solid #BAE6FD;
        border-radius: 12px;
        padding: 12px 16px;
        color: #075985;
        font-size: .88rem;
        margin-bottom: 18px
    }

    .adm-card {
        border: 0;
        border-radius: 14px;
        box-shadow: 0 2px 12px rgba(15, 23, 42, .07);
        margin-bottom: 18px
    }

    .adm-card .card-body {
        padding: clamp(16px, 3.5vw, 26px)
    }

    .adm-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 700;
        color: #0A2F6C;
        margin-bottom: 18px
    }

    .adm-title .ic {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        flex: 0 0 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #FEF3C7;
        color: #B45309
    }

    .adm-card .form-label {
        font-weight: 600;
        color: #334155;
        font-size: .9rem;
        margin-bottom: 6px
    }

    .adm-card .form-control {
        border-radius: 10px;
        padding: .65rem .85rem;
        border-color: #CBD5E1
    }

    .adm-card .form-control:focus {
        border-color: #1565C0;
        box-shadow: 0 0 0 .2rem rgba(21, 101, 192, .15)
    }

    .adm-card textarea.form-control {
        resize: vertical;
        min-height: 120px
    }

    .fld-foot {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-top: 4px;
        font-size: .8rem;
        color: #64748B;
        min-height: 18px
    }

    .fld-counter {
        margin-left: auto;
        white-space: nowrap
    }

    .fld-counter.near {
        color: #B45309;
        font-weight: 600
    }

    .stat-box {
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        border-radius: 12px;
        padding: 14px;
        height: 100%
    }

    .stat-box .stat-no {
        font-size: .75rem;
        font-weight: 700;
        letter-spacing: .4px;
        color: #B45309;
        text-transform: uppercase;
        margin-bottom: 10px
    }

    .adm-actions {
        position: sticky;
        bottom: 0;
        z-index: 5;
        margin-top: 20px;
        padding: 14px 0;
        background: linear-gradient(180deg, rgba(248, 250, 252, 0), #F8FAFC 35%)
    }

    .adm-actions .btn,
    .modal-footer .btn-adm-simpan {
        position: relative;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;
        font-weight: 700;
        border-radius: 12px;
        padding: .75rem 1.5rem;
        transition: transform .2s ease, box-shadow .25s ease, background .2s ease, color .2s ease
    }

    .adm-actions .btn:hover {
        transform: translateY(-3px)
    }

    .adm-actions .btn:active {
        transform: translateY(0) scale(.97)
    }

    .adm-actions .btn:focus-visible,
    .modal-footer .btn:focus-visible {
        outline: 3px solid rgba(21, 101, 192, .35);
        outline-offset: 2px
    }

    .btn-adm-preview {
        background: #fff;
        border: 2px solid #1565C0;
        color: #1565C0
    }

    .btn-adm-preview:hover {
        background: #1565C0;
        color: #fff;
        box-shadow: 0 8px 18px rgba(21, 101, 192, .3)
    }

    .btn-adm-preview:hover i {
        animation: adm-pulse .6s ease-in-out infinite alternate
    }

    .btn-adm-reset {
        background: #fff;
        border: 2px solid #CBD5E1;
        color: #475569
    }

    .btn-adm-reset:hover {
        background: #F1F5F9;
        color: #0F172A
    }

    .btn-adm-reset:disabled {
        opacity: .5;
        transform: none !important
    }

    .btn-adm-simpan {
        background: linear-gradient(90deg, #F59E0B, #FBBF24);
        border: 0;
        color: #0A2F6C;
        box-shadow: 0 4px 10px rgba(245, 158, 11, .35)
    }

    .btn-adm-simpan:hover {
        color: #0A2F6C;
        box-shadow: 0 10px 22px rgba(245, 158, 11, .5)
    }

    .btn-adm-simpan::after {
        content: "";
        position: absolute;
        top: 0;
        left: -80%;
        width: 50%;
        height: 100%;
        background: linear-gradient(120deg, transparent, rgba(255, 255, 255, .55), transparent);
        transform: skewX(-20deg);
        transition: left .6s ease
    }

    .btn-adm-simpan:hover::after {
        left: 130%
    }

    .btn-adm-simpan:hover i {
        animation: adm-bounce .5s ease
    }

    .btn-adm-simpan:disabled {
        opacity: .85;
        transform: none;
        box-shadow: none;
        cursor: wait
    }

    @keyframes adm-pulse {
        from {
            transform: scale(1)
        }

        to {
            transform: scale(1.25)
        }
    }

    @keyframes adm-bounce {

        0%,
        100% {
            transform: translateY(0)
        }

        40% {
            transform: translateY(-4px)
        }

        70% {
            transform: translateY(1px)
        }
    }

    @media (prefers-reduced-motion:reduce) {

        .adm-actions .btn,
        .btn-adm-simpan::after {
            transition: none
        }

        .adm-actions .btn:hover {
            transform: none
        }

        .btn-adm-preview:hover i,
        .btn-adm-simpan:hover i {
            animation: none
        }
    }

    .pv-multi {
        white-space: pre-line;
        word-break: break-word
    }

    .pv-hero {
        background: linear-gradient(166deg, #0D47A1, #1565C0 50%, #0A2F6C);
        border-radius: 10px;
        padding: 22px 18px;
        color: #fff
    }

    .pv-cta {
        display: inline-block;
        background: #F59E0B;
        color: #0F172A;
        font-weight: 700;
        border-radius: 10px;
        padding: 8px 18px;
        font-size: .9rem
    }
</style>

<div class="adm-hero">
    <h4><i class="bi bi-house-door me-2"></i>Konten Beranda</h4>
    <p>Ubah teks banner dan statistik. Struktur dan desain halaman tidak berubah.</p>
</div>

<div class="adm-meta">
    <?php if ($tgl): ?><span class="adm-chip"><i class="bi bi-clock-history me-1"></i>Terakhir diperbarui:
            <?= html_escape($tgl); ?></span><?php endif; ?>
    <span class="adm-chip dirty" id="chipDirty"><i class="bi bi-exclamation-circle me-1"></i>Ada perubahan belum
        disimpan</span>
</div>

<div class="adm-tip">
    <i class="bi bi-lightbulb me-1"></i>
    <strong>Tips:</strong> Klik <b>Preview</b> untuk melihat hasilnya dulu. Teks dan link tombol "Belanja Produk Beras"
    diatur di menu <b>Header</b>.
</div>

<?php if ($this->session->flashdata('sukses')): ?>
    <div class="alert alert-success alert-dismissible fade show js-auto-alert">
        <i class="bi bi-check-circle me-1"></i><?= html_escape($this->session->flashdata('sukses')); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('gagal')): ?>
    <div class="alert alert-danger alert-dismissible fade show js-auto-alert">
        <i class="bi bi-x-circle me-1"></i><?= html_escape($this->session->flashdata('gagal')); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>
<?php if (validation_errors()): ?>
    <div class="alert alert-danger" id="serverError"><i class="bi bi-exclamation-triangle me-1"></i>Periksa kembali isian
        Anda:<?= validation_errors(); ?></div>
<?php endif; ?>

<?= form_open('admin/beranda/simpan', ['id' => 'formBeranda', 'novalidate' => 'novalidate']); ?>

<div class="card adm-card">
    <div class="card-body">
        <div class="adm-title"><span class="ic"><i class="bi bi-stars"></i></span>Banner</div>
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label" for="judul_banner">Judul Banner</label>
                <input type="text" name="judul_banner" id="judul_banner" class="form-control" maxlength="180"
                    placeholder="Judul utama di halaman Beranda"
                    value="<?= set_value('judul_banner', $row->judul_banner ?? ''); ?>" required>
                <div class="fld-foot"></div>
            </div>
            <div class="col-12">
                <label class="form-label" for="deskripsi_banner">Deskripsi Banner</label>
                <textarea name="deskripsi_banner" id="deskripsi_banner" class="form-control" rows="5" maxlength="600"
                    placeholder="Penjelasan singkat di bawah judul"
                    required><?= set_value('deskripsi_banner', $row->deskripsi_banner ?? ''); ?></textarea>
                <div class="fld-foot"><span>Tekan Enter untuk pindah baris.</span></div>
            </div>
        </div>
    </div>
</div>

<div class="card adm-card">
    <div class="card-body">
        <div class="adm-title"><span class="ic"><i class="bi bi-bar-chart"></i></span>Statistik</div>
        <div class="row g-3">
            <?php for ($i = 1; $i <= 2; $i++): ?>
                <div class="col-12 col-md-6">
                    <div class="stat-box">
                        <div class="stat-no">Statistik <?= $i ?></div>
                        <div class="mb-3">
                            <label class="form-label" for="statistik_<?= $i ?>_nilai">Nilai</label>
                            <input type="text" name="statistik_<?= $i ?>_nilai" id="statistik_<?= $i ?>_nilai"
                                class="form-control" maxlength="40" placeholder="Contoh: 150+ Ton"
                                value="<?= set_value('statistik_' . $i . '_nilai', $row->{'statistik_' . $i . '_nilai'} ?? ''); ?>"
                                required>
                            <div class="fld-foot"></div>
                        </div>
                        <div>
                            <label class="form-label" for="statistik_<?= $i ?>_label">Label</label>
                            <input type="text" name="statistik_<?= $i ?>_label" id="statistik_<?= $i ?>_label"
                                class="form-control" maxlength="100" placeholder="Contoh: Kapasitas Giling / Hari"
                                value="<?= set_value('statistik_' . $i . '_label', $row->{'statistik_' . $i . '_label'} ?? ''); ?>"
                                required>
                            <div class="fld-foot"></div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>

<div class="adm-actions d-flex flex-column flex-sm-row gap-2">
    <button type="button" class="btn btn-adm-preview" id="btnPreview"><i
            class="bi bi-eye"></i><span>Preview</span></button>
    <button type="button" class="btn btn-adm-reset" id="btnReset" disabled><i
            class="bi bi-arrow-counterclockwise"></i><span>Batalkan</span></button>
    <button type="submit" class="btn btn-adm-simpan ms-sm-auto" id="btnSimpan"><i
            class="bi bi-check2-circle"></i><span>Simpan Perubahan</span></button>
</div>
<?= form_close(); ?>

<!-- Modal Preview: hanya tampilan, tidak menyimpan apa pun -->
<div class="modal fade" id="previewModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-eye me-2"></i>Preview Beranda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="pv-hero">
                    <h4 class="fw-bold" style="word-break:break-word;" data-src="judul_banner"></h4>
                    <p class="pv-multi" style="color:#DBEAFE;" data-src="deskripsi_banner"></p>
                    <span class="pv-cta mb-3">Tombol CTA (diatur di menu Header)</span>
                    <div class="row g-2 mt-1">
                        <?php for ($i = 1; $i <= 2; $i++): ?>
                            <div class="col-12 col-sm-6">
                                <div class="p-2 rounded bg-white text-dark h-100">
                                    <div class="fw-bold" style="word-break:break-word;"
                                        data-src="statistik_<?= $i ?>_nilai"></div>
                                    <div class="small text-secondary" style="word-break:break-word;"
                                        data-src="statistik_<?= $i ?>_label"></div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <p class="small text-muted mt-3 mb-0">Ini hanya pratinjau. Data belum disimpan.</p>
            </div>
            <div class="modal-footer flex-column flex-sm-row">
                <button type="button" class="btn btn-secondary w-100 w-sm-auto" data-bs-dismiss="modal">Kembali
                    Mengedit</button>
                <button type="button" class="btn btn-adm-simpan w-100 w-sm-auto" id="btnSimpanModal"><i
                        class="bi bi-check2-circle"></i><span>Simpan Sekarang</span></button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('formBeranda');
        var btnSimpan = document.getElementById('btnSimpan');
        var btnReset = document.getElementById('btnReset');
        var chipDirty = document.getElementById('chipDirty');
        var fields = Array.prototype.slice.call(form.querySelectorAll('input.form-control, textarea.form-control'));
        var submitting = false;

        var awal = {};
        fields.forEach(function (f) { awal[f.name] = f.value; });

        // Penghitung karakter
        fields.forEach(function (f) {
            var c = document.createElement('span');
            c.className = 'fld-counter';
            f.parentNode.querySelector('.fld-foot').appendChild(c);
            f._counter = c;
        });
        function hitung(f) {
            var max = parseInt(f.getAttribute('maxlength'), 10);
            f._counter.textContent = f.value.length + '/' + max;
            f._counter.classList.toggle('near', f.value.length >= max * 0.9);
        }

        function dirty() {
            return fields.some(function (f) { return f.value !== awal[f.name]; });
        }
        function perbarui() {
            var d = dirty();
            chipDirty.style.display = d ? 'inline-block' : 'none';
            btnReset.disabled = !d;
        }
        fields.forEach(function (f) {
            hitung(f);
            f.addEventListener('input', function () { hitung(f); perbarui(); f.classList.remove('is-invalid'); });
        });
        perbarui();

        btnReset.addEventListener('click', function () {
            fields.forEach(function (f) { f.value = awal[f.name]; f.classList.remove('is-invalid'); hitung(f); });
            perbarui();
        });

        window.addEventListener('beforeunload', function (e) {
            if (dirty() && !submitting) { e.preventDefault(); e.returnValue = ''; }
        });

        var teksAwal = btnSimpan.innerHTML;
        form.addEventListener('submit', function (e) {
            var salah = null;
            fields.forEach(function (f) {
                f.value = f.value.trim();
                var ok = f.checkValidity();
                f.classList.toggle('is-invalid', !ok);
                if (!ok && !salah) { salah = f; }
            });
            if (salah) {
                e.preventDefault();
                salah.scrollIntoView({ behavior: 'smooth', block: 'center' });
                salah.focus();
                return;
            }
            submitting = true;
            btnSimpan.disabled = true;
            btnSimpan.innerHTML = '<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span>Menyimpan...</span>';
        });
        window.addEventListener('pageshow', function () {
            submitting = false; btnSimpan.disabled = false; btnSimpan.innerHTML = teksAwal;
        });

        // Preview memakai nilai TERBARU dari form; textContent agar aman dari HTML
        var modalEl = document.getElementById('previewModal');
        document.getElementById('btnPreview').addEventListener('click', function () {
            document.querySelectorAll('[data-src]').forEach(function (el) {
                var input = form.querySelector('[name="' + el.dataset.src + '"]');
                if (input) { el.textContent = input.value; }
            });
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        });
        document.getElementById('btnSimpanModal').addEventListener('click', function () {
            bootstrap.Modal.getOrCreateInstance(modalEl).hide();
            if (form.requestSubmit) { form.requestSubmit(btnSimpan); } else { btnSimpan.click(); }
        });

        document.addEventListener('keydown', function (e) {
            if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 's') {
                e.preventDefault();
                if (form.requestSubmit) { form.requestSubmit(btnSimpan); } else { btnSimpan.click(); }
            }
        });

        document.querySelectorAll('.js-auto-alert').forEach(function (el) {
            setTimeout(function () { bootstrap.Alert.getOrCreateInstance(el).close(); }, 4000);
        });
        var se = document.getElementById('serverError');
        if (se) { se.scrollIntoView({ behavior: 'smooth', block: 'center' }); }
    });
</script>
<?php include(APPPATH . 'views/layout/foot.php'); ?>