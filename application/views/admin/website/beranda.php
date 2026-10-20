<?php include(APPPATH . 'views/layout/head.php'); ?>
<?php
$row = $beranda ?? null;
$tgl = (!empty($row->updated_at)) ? date('d-m-Y H:i', strtotime($row->updated_at)) : null;
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    .cv {
        --b900: #0A2F6C;
        --b700: #0D47A1;
        --b500: #1565C0;
        --gold: #F59E0B;
        --gold-l: #FBBF24;
        --ink: #0F172A;
        --sub: #475569;
        --mut: #64748B;
        --line: #E2E8F0;
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
        color: var(--ink)
    }

    .cv *,
    .cv *::before,
    .cv *::after {
        font-family: inherit
    }

    .cv .disp {
        font-family: 'Bricolage Grotesque', 'Plus Jakarta Sans', system-ui, sans-serif
    }

    /* ---------- Kepala ---------- */
    .cv-head {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 10px 20px;
        margin-bottom: 18px
    }

    .cv-head h1 {
        font-family: 'Bricolage Grotesque', sans-serif;
        font-weight: 800;
        font-size: clamp(1.6rem, 4vw, 2.2rem);
        letter-spacing: -.02em;
        color: var(--b900);
        margin: 0;
        line-height: 1.1
    }

    .cv-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 8px
    }

    .cv-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: .8rem;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 999px;
        background: #EFF6FF;
        color: var(--b700)
    }

    .cv-pill.warn {
        display: none;
        background: #FEF3C7;
        color: #92400E
    }

    .cv .alert {
        border: 0;
        border-radius: 12px;
        font-size: .92rem
    }

    /* ---------- Panggung ---------- */
    .stage {
        border-radius: 22px;
        padding: clamp(14px, 3vw, 28px);
        background-color: #EEF3FA;
        background-image: radial-gradient(#C7D4E6 1.2px, transparent 1.3px);
        background-size: 20px 20px;
        border: 1px solid var(--line)
    }

    .stage-bar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 10px 16px;
        margin-bottom: 18px
    }

    .stage-hint {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: .92rem;
        font-weight: 600;
        color: var(--b900);
        background: #fff;
        border-radius: 999px;
        padding: 8px 16px 8px 10px;
        box-shadow: 0 1px 2px rgba(15, 23, 42, .08)
    }

    .stage-hint i {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--gold-l);
        color: var(--b900);
        font-size: .8rem
    }

    .seg {
        display: inline-flex;
        background: #fff;
        border-radius: 12px;
        padding: 4px;
        box-shadow: 0 1px 2px rgba(15, 23, 42, .08)
    }

    .seg button {
        border: 0;
        background: transparent;
        color: var(--sub);
        font-weight: 600;
        font-size: .85rem;
        padding: 7px 14px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        gap: 7px
    }

    .seg button.on {
        background: var(--b700);
        color: #fff
    }

    .seg button:focus-visible {
        outline: 3px solid rgba(21, 101, 192, .4);
        outline-offset: 1px
    }

    .frame {
        container-type: inline-size;
        container-name: frm;
        max-width: 100%;
        margin: 0 auto;
        transition: max-width .3s ease
    }

    .frame.mobile {
        max-width: 360px
    }

    /* ---------- Banner yang bisa diedit ---------- */
    .hero {
        position: relative;
        overflow: hidden;
        color: #fff;
        padding: clamp(40px, 9cqi, 64px) clamp(20px, 6cqi, 52px) 0 clamp(26px, 7cqi, 62px);
        border-radius: 20px;
        background: linear-gradient(160deg, var(--b700) 0%, var(--b500) 55%, var(--b900) 100%);
        box-shadow: 0 30px 60px -24px rgba(10, 47, 108, .6)
    }

    .hero::before {
        content: "";
        position: absolute;
        inset: 0 auto 0 0;
        width: 8px;
        background: var(--gold-l)
    }

    .ed {
        position: relative;
        margin-bottom: 8px
    }

    .ed-in {
        display: block;
        width: 100%;
        max-width: 100%;
        margin: 0;
        padding: 6px 10px;
        border: 0;
        border-radius: 10px;
        background: transparent;
        color: inherit;
        font: inherit;
        line-height: inherit;
        letter-spacing: inherit;
        resize: none;
        overflow: hidden;
        caret-color: var(--gold-l);
        box-shadow: 0 0 0 1.5px rgba(255, 255, 255, .0);
        transition: background-color .15s, box-shadow .15s
    }

    .ed-in::placeholder {
        color: rgba(255, 255, 255, .42);
        font-weight: 500
    }

    .ed:hover .ed-in {
        background: rgba(255, 255, 255, .08);
        box-shadow: 0 0 0 1.5px rgba(255, 255, 255, .28)
    }

    .ed-in:focus {
        outline: 0;
        background: rgba(255, 255, 255, .12);
        box-shadow: 0 0 0 2.5px var(--gold-l)
    }

    .ed-in.is-invalid {
        background: rgba(220, 38, 38, .22);
        box-shadow: 0 0 0 2px #FCA5A5
    }

    /* Tag nama kolom saat disorot */
    .ed::before {
        content: attr(data-tag);
        position: absolute;
        left: 10px;
        top: -9px;
        transform: translateY(-100%);
        z-index: 2;
        background: var(--gold-l);
        color: var(--b900);
        font-size: .72rem;
        font-weight: 700;
        padding: 2px 9px;
        border-radius: 6px;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity .15s
    }

    .ed:hover::before,
    .ed:focus-within::before {
        opacity: 1
    }

    .ed.changed::after {
        content: "";
        position: absolute;
        right: -3px;
        top: -3px;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--gold-l);
        box-shadow: 0 0 0 3px rgba(10, 47, 108, .9)
    }

    .ed-count {
        position: absolute;
        right: 8px;
        bottom: 6px;
        font-size: .72rem;
        font-weight: 600;
        font-variant-numeric: tabular-nums;
        color: #DBEAFE;
        background: rgba(10, 47, 108, .85);
        padding: 1px 8px;
        border-radius: 999px;
        opacity: 0;
        pointer-events: none;
        transition: opacity .15s
    }

    .ed:focus-within .ed-count {
        opacity: 1
    }

    .ed-count.near {
        color: var(--gold-l)
    }

    .ed-count.full {
        color: #FCA5A5
    }

    .ed-err {
        display: none;
        margin: 6px 0 0 4px;
        font-size: .8rem;
        font-weight: 700;
        color: #FEE2E2
    }

    .ed-in.is-invalid~.ed-err {
        display: block
    }

    .t-title {
        font-family: 'Bricolage Grotesque', sans-serif;
        font-weight: 800;
        font-size: clamp(1.55rem, 7.4cqi, 2.9rem);
        line-height: 1.08;
        letter-spacing: -.025em
    }

    .t-desc {
        font-size: clamp(.9rem, 2.6cqi, 1.05rem);
        line-height: 1.65;
        color: #DBEAFE
    }

    .t-desc::placeholder {
        color: rgba(219, 234, 254, .42)
    }

    .cta-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px 14px;
        margin: 22px 0 clamp(30px, 7cqi, 48px) 10px
    }

    .cta {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--gold);
        color: var(--ink);
        font-weight: 700;
        font-size: .92rem;
        border-radius: 10px;
        padding: 11px 20px
    }

    .lock {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: .78rem;
        color: #BFDBFE
    }

    .stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        margin: 0 calc(-1 * clamp(20px, 6cqi, 52px)) 0 calc(-1 * clamp(26px, 7cqi, 62px));
        border-top: 1px solid rgba(255, 255, 255, .2)
    }

    .stat {
        padding: 26px clamp(14px, 4cqi, 32px) 28px clamp(16px, 4cqi, 32px)
    }

    .stat:first-child {
        padding-left: clamp(26px, 7cqi, 62px) ;
    }

    .stat+.stat {
        border-left: 1px solid rgba(255, 255, 255, .2)
    }

    .t-val {
        font-family: 'Bricolage Grotesque', sans-serif;
        font-weight: 800;
        font-size: clamp(1.5rem, 5.6cqi, 2.3rem);
        line-height: 1.1;
        color: var(--gold-l);
        letter-spacing: -.02em
    }

    .t-val::placeholder {
        color: rgba(251, 191, 36, .4)
    }

    .t-lbl {
        font-size: clamp(.8rem, 2.2cqi, .92rem);
        color: #BFDBFE
    }

    .stat .ed:first-child {
        margin-bottom: 2px
    }

    .stat .ed-in {
        width: 100%
    }

    @container frm (max-width: 520px) {
        .stats {
            grid-template-columns: 1fr
        }

        .stat+.stat {
            border-left: 0;
            border-top: 1px solid rgba(255, 255, 255, .2)
        }

        .stat,
        .stat:first-child {
            padding: 20px 20px 20px 26px
        }
    }

    /* ---------- Bar aksi ---------- */
    .bar {
        position: sticky;
        bottom: 14px;
        z-index: 5;
        margin-top: 22px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 12px 16px;
        padding: 12px 14px 12px 20px;
        background: rgba(255, 255, 255, .95);
        -webkit-backdrop-filter: blur(8px);
        backdrop-filter: blur(8px);
        border: 1px solid var(--line);
        border-radius: 16px;
        box-shadow: 0 16px 40px -12px rgba(10, 47, 108, .32)
    }

    .bar-state {
        flex: 1 1 220px;
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: .9rem;
        font-weight: 600;
        color: var(--sub)
    }

    .bar-state .dot {
        width: 9px;
        height: 9px;
        flex: 0 0 9px;
        border-radius: 50%;
        background: #22C55E
    }

    .bar-state.dirty {
        color: #92400E
    }

    .bar-state.dirty .dot {
        background: var(--gold)
    }

    .bar-btns {
        display: flex;
        flex-wrap: wrap;
        gap: 10px
    }

    .btn-x {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 46px;
        padding: 0 22px;
        border-radius: 12px;
        border: 2px solid transparent;
        font-weight: 700;
        font-size: .95rem;
        cursor: pointer;
        transition: background .15s, color .15s, border-color .15s, box-shadow .15s
    }

    .btn-x:focus-visible {
        outline: 3px solid rgba(21, 101, 192, .4);
        outline-offset: 2px
    }

    .btn-x.save {
        background: linear-gradient(90deg, var(--gold), var(--gold-l));
        color: var(--b900);
        box-shadow: 0 6px 16px -4px rgba(245, 158, 11, .6)
    }

    .btn-x.save:hover {
        box-shadow: 0 9px 22px -4px rgba(245, 158, 11, .85)
    }

    .btn-x.save:disabled {
        cursor: wait;
        opacity: .85;
        box-shadow: none
    }

    .btn-x.ghost {
        background: #fff;
        border-color: #CBD5E1;
        color: var(--sub)
    }

    .btn-x.ghost:hover:not(:disabled) {
        border-color: var(--b500);
        color: var(--b700)
    }

    .btn-x.ghost:disabled {
        opacity: .45;
        cursor: not-allowed
    }

    .btn-x.ghost.confirm {
        background: #FEF2F2;
        border-color: #DC2626;
        color: #B91C1C
    }

    @media (max-width:575.98px) {
        .bar {
            padding: 12px
        }

        .bar-btns {
            width: 100%
        }

        .btn-x {
            flex: 1 1 100%
        }

        .btn-x.save {
            order: -1
        }

        .seg {
            width: 100%
        }

        .seg button {
            flex: 1;
            justify-content: center
        }
    }

    .cv-kbd {
        text-align: center;
        font-size: .78rem;
        color: var(--mut);
        margin-top: 10px
    }

    @media (max-width:575.98px) {
        .cv-kbd {
            display: none
        }
    }

    @media (prefers-reduced-motion:reduce) {

        .cv *,
        .cv *::before {
            transition: none !important
        }
    }
</style>

<div class="cv">

    <header class="cv-head">
        <h1>Beranda</h1>
        <div class="cv-pills">
            <?php if ($tgl): ?><span class="cv-pill"><i class="bi bi-clock-history"></i>Terakhir diperbarui <?= html_escape($tgl); ?></span><?php endif; ?>
            <span class="cv-pill warn" id="chipDirty" role="status" aria-live="polite"><i class="bi bi-pencil-fill"></i>Belum disimpan</span>
        </div>
    </header>

    <?php if ($this->session->flashdata('sukses')): ?>
        <div class="alert alert-success alert-dismissible fade show js-auto-alert" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i><?= html_escape($this->session->flashdata('sukses')); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('gagal')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-x-circle-fill me-1"></i><?= html_escape($this->session->flashdata('gagal')); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    <?php endif; ?>
    <?php if (validation_errors()): ?>
        <div class="alert alert-danger" id="serverError" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-1"></i>Perbaiki isian berikut lalu simpan lagi:<?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?= form_open('admin/beranda/simpan', ['id' => 'formBeranda', 'novalidate' => 'novalidate']); ?>

    <div class="stage">
        <div class="stage-bar">
            <span class="stage-hint"><i class="bi bi-cursor-fill"></i>Klik langsung pada tulisan di banner untuk mengubahnya</span>
            <div class="seg" role="group" aria-label="Ukuran layar">
                <button type="button" class="on" data-pv="desktop"><i class="bi bi-display"></i>Komputer</button>
                <button type="button" data-pv="mobile"><i class="bi bi-phone"></i>HP</button>
            </div>
        </div>

        <div class="frame" id="frame">
            <div class="hero">

                <div class="ed" data-tag="Judul">
                    <textarea name="judul_banner" id="judul_banner" class="ed-in t-title" rows="1" maxlength="180"
                        placeholder="Tulis judul banner di sini" aria-label="Judul banner" data-label="Judul banner" data-single="1"
                        required><?= set_value('judul_banner', $row->judul_banner ?? ''); ?></textarea>
                    <span class="ed-count"></span>
                    <div class="ed-err"></div>
                </div>

                <div class="ed" data-tag="Deskripsi">
                    <textarea name="deskripsi_banner" id="deskripsi_banner" class="ed-in t-desc" rows="3" maxlength="600"
                        placeholder="Tulis penjelasan singkat di bawah judul" aria-label="Deskripsi banner" data-label="Deskripsi banner"
                        required><?= set_value('deskripsi_banner', $row->deskripsi_banner ?? ''); ?></textarea>
                    <span class="ed-count"></span>
                    <div class="ed-err"></div>
                </div>

                <div class="cta-row">
                    <span class="cta"><i class="bi bi-bag-check-fill"></i>Belanja Produk Beras</span>
                    <span class="lock"><i class="bi bi-lock-fill"></i>Tombol ini diatur di menu Header</span>
                </div>

                <div class="stats">
                    <?php for ($i = 1; $i <= 2; $i++): ?>
                        <div class="stat">
                            <div class="ed" data-tag="Angka <?= $i ?>">
                                <input type="text" name="statistik_<?= $i ?>_nilai" id="statistik_<?= $i ?>_nilai"
                                    class="ed-in t-val" maxlength="40" placeholder="150+ Ton"
                                    aria-label="Nilai angka <?= $i ?>" data-label="Nilai angka <?= $i ?>"
                                    value="<?= set_value('statistik_' . $i . '_nilai', $row->{'statistik_' . $i . '_nilai'} ?? ''); ?>"
                                    required>
                                <span class="ed-count"></span>
                                <div class="ed-err"></div>
                            </div>
                            <div class="ed" data-tag="Keterangan angka <?= $i ?>">
                                <input type="text" name="statistik_<?= $i ?>_label" id="statistik_<?= $i ?>_label"
                                    class="ed-in t-lbl" maxlength="100" placeholder="Kapasitas giling per hari"
                                    aria-label="Keterangan angka <?= $i ?>" data-label="Keterangan angka <?= $i ?>"
                                    value="<?= set_value('statistik_' . $i . '_label', $row->{'statistik_' . $i . '_label'} ?? ''); ?>"
                                    required>
                                <span class="ed-count"></span>
                                <div class="ed-err"></div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>

            </div>
        </div>
    </div>

    <div class="bar">
        <div class="bar-state" id="barState" role="status" aria-live="polite">
            <span class="dot"></span><span id="barTxt">Belum ada perubahan</span>
        </div>
        <div class="bar-btns">
            <button type="button" class="btn-x ghost" id="btnReset" disabled><i class="bi bi-arrow-counterclockwise"></i><span>Batalkan perubahan</span></button>
            <button type="submit" class="btn-x save" id="btnSimpan"><i class="bi bi-check2-circle"></i><span>Simpan perubahan</span></button>
        </div>
    </div>
    <div class="cv-kbd">Pintasan: <kbd>Ctrl</kbd> + <kbd>S</kbd> untuk menyimpan</div>

    <?= form_close(); ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('formBeranda');
        var btnSimpan = document.getElementById('btnSimpan');
        var btnReset = document.getElementById('btnReset');
        var chipDirty = document.getElementById('chipDirty');
        var barState = document.getElementById('barState');
        var barTxt = document.getElementById('barTxt');
        var fields = Array.prototype.slice.call(form.querySelectorAll('.ed-in'));
        var submitting = false;

        var awal = {};
        fields.forEach(function (f) { awal[f.name] = f.value; });

        function bersih(f) {
            // Judul hanya satu baris: buang baris baru
            if (f.dataset.single) { f.value = f.value.replace(/[\r\n]+/g, ' '); }
        }
        function tinggi(f) {
            if (f.tagName !== 'TEXTAREA') { return; }
            f.style.height = 'auto';
            f.style.height = f.scrollHeight + 'px';
        }
        function hitung(f) {
            var c = f.parentNode.querySelector('.ed-count');
            var max = parseInt(f.getAttribute('maxlength'), 10), n = f.value.length;
            c.textContent = n + '/' + max;
            c.classList.toggle('near', n >= max * 0.9 && n < max);
            c.classList.toggle('full', n >= max);
        }
        function validasi(f, tampil) {
            var ok = f.value.trim() !== '';
            f.classList.toggle('is-invalid', tampil && !ok);
            var er = f.parentNode.querySelector('.ed-err');
            if (er) { er.textContent = ok ? '' : ((f.getAttribute('data-label') || 'Kolom ini') + ' wajib diisi.'); }
            return ok;
        }
        function jumlahUbah() {
            return fields.filter(function (f) { return f.value !== awal[f.name]; }).length;
        }
        function perbarui() {
            var n = jumlahUbah();
            fields.forEach(function (f) {
                f.parentNode.classList.toggle('changed', f.value !== awal[f.name]);
            });
            chipDirty.style.display = n ? 'inline-flex' : 'none';
            btnReset.disabled = !n;
            barState.classList.toggle('dirty', n > 0);
            barTxt.textContent = n ? (n + ' bagian diubah, belum disimpan') : 'Belum ada perubahan';
        }

        fields.forEach(function (f) {
            bersih(f); tinggi(f); hitung(f);
            f.addEventListener('input', function () {
                bersih(f); tinggi(f); hitung(f); perbarui();
                if (f.classList.contains('is-invalid')) { validasi(f, true); }
            });
            f.addEventListener('keydown', function (e) {
                // Enter di judul/teks pendek tidak membuat baris baru
                if (e.key === 'Enter' && f.dataset.single) { e.preventDefault(); }
            });
            f.addEventListener('blur', function () {
                f.value = f.value.trim();
                tinggi(f); hitung(f); perbarui();
                if (f.value !== awal[f.name] || f.classList.contains('is-invalid')) { validasi(f, true); }
            });
        });
        perbarui();

        // Tinggi ulang saat lebar berubah (komputer/HP/ubah ukuran jendela)
        window.addEventListener('resize', function () { fields.forEach(tinggi); });

        /* Batalkan perubahan: klik dua kali agar tidak terhapus tanpa sengaja */
        var resetTimer = null, resetLabel = btnReset.querySelector('span');
        function resetNormal() {
            btnReset.classList.remove('confirm');
            resetLabel.textContent = 'Batalkan perubahan';
            clearTimeout(resetTimer);
        }
        btnReset.addEventListener('click', function () {
            if (!btnReset.classList.contains('confirm')) {
                btnReset.classList.add('confirm');
                resetLabel.textContent = 'Klik lagi untuk memastikan';
                resetTimer = setTimeout(resetNormal, 3500);
                return;
            }
            resetNormal();
            fields.forEach(function (f) {
                f.value = awal[f.name];
                f.classList.remove('is-invalid');
                tinggi(f); hitung(f);
            });
            perbarui();
        });

        window.addEventListener('beforeunload', function (e) {
            if (jumlahUbah() && !submitting) { e.preventDefault(); e.returnValue = ''; }
        });

        /* Simpan */
        var teksAwal = btnSimpan.innerHTML;
        form.addEventListener('submit', function (e) {
            var salah = null;
            fields.forEach(function (f) {
                f.value = f.value.trim();
                if (!validasi(f, true) && !salah) { salah = f; }
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

        /* Komputer / HP */
        var frame = document.getElementById('frame');
        document.querySelectorAll('[data-pv]').forEach(function (b) {
            b.addEventListener('click', function () {
                document.querySelectorAll('[data-pv]').forEach(function (x) { x.classList.remove('on'); });
                b.classList.add('on');
                frame.classList.toggle('mobile', b.dataset.pv === 'mobile');
                setTimeout(function () { fields.forEach(tinggi); }, 320);
            });
        });

        /* Ctrl/Cmd + S */
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