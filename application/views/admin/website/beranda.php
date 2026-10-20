<?php include(APPPATH . 'views/layout/head.php'); ?>
<?php
$row = $beranda ?? null;
$tgl = (!empty($row->updated_at)) ? date('d-m-Y H:i', strtotime($row->updated_at)) : null;
// Ambil nilai kolom dari database (aman jika baris belum ada)
$v = function ($k) use ($row) {
    return isset($row->$k) ? $row->$k : '';
};
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    /* Semua aturan dibatasi di bawah .bw agar tidak memengaruhi halaman admin lain */
    .bw {
        --b900: #0A2F6C;
        --b700: #0D47A1;
        --b500: #1565C0;
        --gold: #F59E0B;
        --gold-l: #FBBF24;
        --bg: #F5F7FB;
        --ink: #0F172A;
        --sub: #475569;
        --mut: #64748B;
        --line: #E2E8F0;
        --bw-top: 96px; /* jarak pratinjau dari atas saat menempel; sesuaikan dengan tinggi topbar */
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
        color: var(--ink);
        /* Jarak dari sidebar & tepi layar, dan batas lebar agar tidak terlalu penuh */
        box-sizing: border-box;
        width: 100%;
        min-width: 0;
        max-width: 1240px;
        margin: 0 auto;
        padding: clamp(20px, 3.2vw, 44px) clamp(16px, 3.4vw, 48px) 56px
    }

    .bw *,
    .bw *::before,
    .bw *::after {
        box-sizing: border-box
    }

    .bw input,
    .bw textarea,
    .bw button {
        font-family: inherit
    }

    /* ---------- Kepala halaman ---------- */
    .bw-head {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-end;
        justify-content: space-between;
        gap: 14px 24px;
        padding-bottom: 26px;
        margin-bottom: 32px;
        border-bottom: 1px solid var(--line)
    }

    .bw-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: .76rem;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: var(--b500)
    }

    .bw-eyebrow::before {
        content: "";
        width: 28px;
        height: 3px;
        border-radius: 3px;
        background: var(--gold)
    }

    .bw-head h1 {
        font-size: clamp(1.7rem, 3.6vw, 2.35rem);
        font-weight: 800;
        letter-spacing: -.02em;
        line-height: 1.1;
        color: var(--b900);
        margin: 8px 0 8px
    }

    .bw-head p {
        margin: 0;
        max-width: 58ch;
        color: var(--sub);
        font-size: .95rem;
        line-height: 1.6
    }

    .bw-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 8px
    }

    .bw-pill {
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

    .bw-pill.warn {
        display: none;
        background: #FEF3C7;
        color: #92400E
    }

    .bw .alert {
        border: 0;
        border-radius: 12px;
        font-size: .92rem
    }

    /* ---------- Kepala bermotif batik kawung (biru + kuning PT-CAB) ---------- */
    .bw-head {
        position: relative;
        overflow: hidden;
        align-items: flex-end;
        padding: clamp(24px, 3.4vw, 40px) clamp(20px, 3.4vw, 44px);
        margin-bottom: 32px;
        border: 0;
        border-radius: 20px;
        color: #fff;
        background-color: var(--b900);
        background-image:
            linear-gradient(90deg, rgba(10, 47, 108, .92) 0%, rgba(10, 47, 108, .55) 55%, rgba(10, 47, 108, 0) 100%),
            url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='72' height='72' viewBox='0 0 72 72'%3E%3Cg fill='none' stroke='%2393C5FD' stroke-opacity='.32' stroke-width='1.2'%3E%3Cellipse cx='36' cy='18' rx='10' ry='17'/%3E%3Cellipse cx='36' cy='54' rx='10' ry='17'/%3E%3Cellipse cx='18' cy='36' rx='17' ry='10'/%3E%3Cellipse cx='54' cy='36' rx='17' ry='10'/%3E%3Ccircle cx='36' cy='36' r='4'/%3E%3C/g%3E%3Cg fill='%23FBBF24' fill-opacity='.55'%3E%3Ccircle cx='36' cy='36' r='1.6'/%3E%3Ccircle cx='0' cy='0' r='1.6'/%3E%3Ccircle cx='72' cy='0' r='1.6'/%3E%3Ccircle cx='0' cy='72' r='1.6'/%3E%3Ccircle cx='72' cy='72' r='1.6'/%3E%3C/g%3E%3C/svg%3E"),
            linear-gradient(135deg, var(--b700) 0%, var(--b900) 100%);
        background-size: auto, 72px 72px, auto
    }

    .bw-head::after {
        content: "";
        position: absolute;
        inset: auto 0 0 0;
        height: 4px;
        background: linear-gradient(90deg, var(--gold), var(--gold-l) 40%, transparent 100%)
    }

    .bw-head>* {
        position: relative;
        z-index: 1
    }

    .bw-head .bw-eyebrow {
        color: var(--gold-l)
    }

    .bw-head h1 {
        color: #fff
    }

    .bw-head p {
        color: #DBEAFE
    }

    .bw-head .bw-pill {
        background: rgba(255, 255, 255, .14);
        color: #fff
    }

    .bw-head .bw-pill.warn {
        background: var(--gold-l);
        color: var(--b900)
    }

    /* ---------- Grid asimetris ---------- */
    .bw-grid>* {
        min-width: 0
    }

    .bw-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        gap: 24px;
        align-items: start
    }

    @media (min-width: 992px) {
        .bw-grid {
            grid-template-columns: minmax(0, 5fr) minmax(0, 6fr);
            gap: 40px
        }
    }

    /* ---------- Panel isian ---------- */
    .panel {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 18px
    }

    .sec {
        padding: 24px 24px 8px
    }

    .sec+.sec {
        border-top: 1px solid var(--line)
    }

    .sec-h {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        margin-bottom: 20px
    }

    .sec-n {
        flex: 0 0 30px;
        width: 30px;
        height: 30px;
        border-radius: 9px;
        background: var(--b900);
        color: var(--gold-l);
        font-weight: 800;
        font-size: .8rem;
        display: grid;
        place-items: center
    }

    .sec-h h2 {
        font-size: 1rem;
        font-weight: 800;
        margin: 0;
        color: var(--b900)
    }

    .sec-h p {
        margin: 2px 0 0;
        font-size: .82rem;
        color: var(--mut);
        line-height: 1.5
    }

    .fld {
        margin-bottom: 18px
    }

    .fld-top {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        gap: 8px;
        margin-bottom: 6px
    }

    .fld label {
        font-size: .82rem;
        font-weight: 700;
        color: var(--ink);
        margin: 0
    }

    .fld-meta {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: .74rem;
        font-weight: 600;
        color: var(--mut);
        font-variant-numeric: tabular-nums
    }

    .fld-meta .chg {
        display: none;
        color: #92400E;
        background: #FEF3C7;
        padding: 1px 8px;
        border-radius: 999px
    }

    .fld.changed .chg {
        display: inline-block
    }

    .fld-count.near {
        color: #B45309
    }

    .fld-count.full {
        color: #B91C1C
    }

    .inp {
        display: block;
        width: 100%;
        padding: 10px 13px;
        border: 1.5px solid #CBD5E1;
        border-radius: 11px;
        background: #fff;
        color: var(--ink);
        font-size: .95rem;
        line-height: 1.5;
        resize: none;
        overflow: hidden;
        transition: border-color .15s, box-shadow .15s
    }

    .inp::placeholder {
        color: #94A3B8
    }

    .inp:hover {
        border-color: #94A3B8
    }

    .inp:focus {
        outline: 0;
        border-color: var(--b500);
        box-shadow: 0 0 0 4px rgba(21, 101, 192, .14)
    }

    .inp.is-invalid {
        border-color: #DC2626;
        background: #FEF2F2
    }

    .inp.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(220, 38, 38, .14)
    }

    .fld-err {
        display: none;
        margin-top: 6px;
        font-size: .8rem;
        font-weight: 600;
        color: #B91C1C
    }

    .inp.is-invalid~.fld-err {
        display: block
    }

    .pair {
        container-type: inline-size;
        border: 1px solid var(--line);
        border-radius: 14px;
        padding: 16px 16px 0;
        margin-bottom: 16px;
        background: #F8FAFC
    }

    .pair-t {
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--mut);
        margin-bottom: 12px
    }

    .pair-g {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        gap: 0 14px
    }

    @container (min-width: 400px) {
        .pair-g {
            grid-template-columns: minmax(0, 2fr) minmax(0, 3fr)
        }
    }

    /* ---------- Bar aksi menyatu dengan panel ---------- */
    .act {
        position: sticky;
        bottom: 0;
        z-index: 4;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 12px 16px;
        padding: 14px 24px;
        background: #fff;
        border-top: 1px solid var(--line);
        border-radius: 0 0 18px 18px;
        box-shadow: 0 -10px 22px -16px rgba(10, 47, 108, .35)
    }

    .act-state {
        flex: 1 1 180px;
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: .88rem;
        font-weight: 600;
        color: var(--sub)
    }

    .act-state .dot {
        width: 9px;
        height: 9px;
        flex: 0 0 9px;
        border-radius: 50%;
        background: #22C55E
    }

    .act-state.dirty {
        color: #92400E
    }

    .act-state.dirty .dot {
        background: var(--gold)
    }

    .act-btns {
        display: flex;
        flex-wrap: wrap;
        gap: 10px
    }

    .btn-x {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 44px;
        padding: 0 20px;
        border-radius: 12px;
        border: 2px solid transparent;
        font-weight: 700;
        font-size: .92rem;
        cursor: pointer;
        transition: background .15s, color .15s, border-color .15s, box-shadow .15s
    }

    .btn-x:focus-visible {
        outline: 3px solid rgba(21, 101, 192, .4);
        outline-offset: 2px
    }

    .btn-x.save {
        background: var(--gold);
        color: var(--b900)
    }

    .btn-x.save:hover {
        background: var(--gold-l);
        box-shadow: 0 8px 18px -6px rgba(245, 158, 11, .7)
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

    .bw-kbd {
        text-align: center;
        font-size: .78rem;
        color: var(--mut);
        margin-top: 10px
    }

    /* ---------- Pratinjau ---------- */
    .prev {
        min-width: 0
    }

    @media (min-width: 992px) {
        .prev {
            position: sticky;
            top: var(--bw-top)
        }
    }

    .prev-bar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 10px 16px;
        margin-bottom: 12px
    }

    .prev-t {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        font-size: .82rem;
        font-weight: 700;
        color: var(--b900)
    }

    .prev-t .live {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--gold)
    }

    .seg {
        display: inline-flex;
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 12px;
        padding: 3px
    }

    .seg button {
        border: 0;
        background: transparent;
        color: var(--sub);
        font-weight: 600;
        font-size: .82rem;
        padding: 6px 13px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        cursor: pointer
    }

    .seg button.on {
        background: var(--b700);
        color: #fff
    }

    .seg button:focus-visible {
        outline: 3px solid rgba(21, 101, 192, .4);
        outline-offset: 1px
    }

    .canvas {
        background: #E8EEF8;
        border-radius: 20px;
        padding: clamp(14px, 2.6vw, 28px)
    }

    .frame {
        container-type: inline-size;
        max-width: 100%;
        margin: 0 auto;
        transition: max-width .3s ease
    }

    .frame.mobile {
        max-width: 340px
    }

    .hero {
        position: relative;
        overflow: hidden;
        color: #fff;
        padding: clamp(28px, 8cqi, 48px) clamp(20px, 6cqi, 44px) clamp(22px, 5cqi, 32px) clamp(26px, 7cqi, 52px);
        border-radius: 18px;
        background: linear-gradient(150deg, var(--b700), var(--b900))
    }

    .hero::before {
        content: "";
        position: absolute;
        inset: 0 auto 0 0;
        width: 7px;
        background: var(--gold-l)
    }

    .h-title {
        margin: 0 0 14px;
        font-weight: 800;
        font-size: clamp(1.45rem, 7cqi, 2.6rem);
        line-height: 1.12;
        letter-spacing: -.025em;
        overflow-wrap: anywhere
    }

    .h-desc {
        margin: 0;
        font-size: clamp(.88rem, 2.5cqi, 1rem);
        line-height: 1.7;
        color: #DBEAFE;
        white-space: pre-line;
        overflow-wrap: anywhere
    }

    .h-title:empty::before,
    .h-desc:empty::before {
        content: attr(data-ph);
        opacity: .4
    }

    .h-cta {
        margin: 24px 0 clamp(24px, 6cqi, 36px)
    }

    .cta {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--gold);
        color: var(--ink);
        font-weight: 700;
        font-size: .9rem;
        border-radius: 10px;
        padding: 11px 20px
    }

    .h-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        border-top: 1px solid rgba(255, 255, 255, .22);
        padding-top: 22px
    }

    .h-stat {
        min-width: 0;
        padding-right: 16px
    }

    .h-stat+.h-stat {
        border-left: 1px solid rgba(255, 255, 255, .22);
        padding-left: clamp(16px, 4cqi, 28px)
    }

    .h-val {
        font-weight: 800;
        font-size: clamp(1.35rem, 5.2cqi, 2.1rem);
        line-height: 1.1;
        letter-spacing: -.02em;
        color: var(--gold-l);
        overflow-wrap: anywhere
    }

    .h-lbl {
        margin-top: 4px;
        font-size: clamp(.78rem, 2.1cqi, .9rem);
        color: #BFDBFE;
        overflow-wrap: anywhere
    }

    .h-val:empty::before,
    .h-lbl:empty::before {
        content: attr(data-ph);
        opacity: .45
    }

    @container (max-width: 420px) {
        .h-stats {
            grid-template-columns: 1fr;
            gap: 18px
        }

        .h-stat+.h-stat {
            border-left: 0;
            padding-left: 0;
            border-top: 1px solid rgba(255, 255, 255, .22);
            padding-top: 18px
        }
    }

    .prev-note {
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 12px 4px 0;
        font-size: .8rem;
        color: var(--mut)
    }

    @media (max-width: 575.98px) {
        .sec {
            padding: 20px 16px 4px
        }

        .act {
            padding: 12px 16px
        }

        .act-btns {
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

        .bw-kbd {
            display: none
        }
    }

    @media (prefers-reduced-motion: reduce) {

        .bw *,
        .bw *::before {
            transition: none !important
        }
    }
</style>

<div class="bw">

    <header class="bw-head">
        <div>
            <span class="bw-eyebrow">Website</span>
            <h1>Beranda Website</h1>
            <p>Atur judul, deskripsi, dan dua angka pencapaian yang tampil di banner halaman depan PT Citra Abadi Bermartabat. Pratinjau di sebelah kanan ikut berubah saat Anda mengetik.</p>
        </div>
        <div class="bw-pills">
            <?php if ($tgl): ?><span class="bw-pill"><i class="bi bi-clock-history"></i>Terakhir diperbarui <?= html_escape($tgl); ?></span><?php endif; ?>
            <span class="bw-pill warn" id="chipDirty" role="status" aria-live="polite"><i class="bi bi-pencil-fill"></i>Belum disimpan</span>
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

    <div class="bw-grid">

        <!-- ===== Kiri: panel isian ===== -->
        <div>
            <div class="panel">

                <section class="sec">
                    <div class="sec-h">
                        <span class="sec-n">01</span>
                        <div>
                            <h2>Banner utama</h2>
                            <p>Kalimat pertama yang dibaca pengunjung website.</p>
                        </div>
                    </div>

                    <div class="fld">
                        <div class="fld-top">
                            <label for="judul_banner">Judul banner</label>
                            <span class="fld-meta"><span class="chg">Diubah</span><span class="fld-count"></span></span>
                        </div>
                        <textarea name="judul_banner" id="judul_banner" class="inp" rows="2" maxlength="180"
                            placeholder="Contoh: Pabrik &amp; Distribusi Beras Modern"
                            data-label="Judul banner" data-single="1" data-target="pvJudul"
                            data-awal="<?= html_escape($v('judul_banner')); ?>" required><?= set_value('judul_banner', $v('judul_banner')); ?></textarea>
                        <div class="fld-err"></div>
                    </div>

                    <div class="fld">
                        <div class="fld-top">
                            <label for="deskripsi_banner">Deskripsi banner</label>
                            <span class="fld-meta"><span class="chg">Diubah</span><span class="fld-count"></span></span>
                        </div>
                        <textarea name="deskripsi_banner" id="deskripsi_banner" class="inp" rows="4" maxlength="600"
                            placeholder="Penjelasan singkat di bawah judul"
                            data-label="Deskripsi banner" data-target="pvDesk"
                            data-awal="<?= html_escape($v('deskripsi_banner')); ?>" required><?= set_value('deskripsi_banner', $v('deskripsi_banner')); ?></textarea>
                        <div class="fld-err"></div>
                    </div>
                </section>

                <section class="sec">
                    <div class="sec-h">
                        <span class="sec-n">02</span>
                        <div>
                            <h2>Angka pencapaian</h2>
                            <p>Dua angka yang tampil di bagian bawah banner.</p>
                        </div>
                    </div>

                    <?php for ($i = 1; $i <= 2; $i++):
                        $kn = 'statistik_' . $i . '_nilai';
                        $kl = 'statistik_' . $i . '_label';
                    ?>
                        <div class="pair">
                            <div class="pair-t">Angka <?= $i; ?></div>
                            <div class="pair-g">
                                <div class="fld">
                                    <div class="fld-top">
                                        <label for="<?= $kn; ?>">Nilai</label>
                                        <span class="fld-meta"><span class="chg">Diubah</span><span class="fld-count"></span></span>
                                    </div>
                                    <input type="text" name="<?= $kn; ?>" id="<?= $kn; ?>" class="inp" maxlength="40"
                                        placeholder="150+ Ton" data-label="Nilai angka <?= $i; ?>" data-single="1"
                                        data-target="pvN<?= $i; ?>" data-awal="<?= html_escape($v($kn)); ?>"
                                        value="<?= set_value($kn, $v($kn)); ?>" required>
                                    <div class="fld-err"></div>
                                </div>
                                <div class="fld">
                                    <div class="fld-top">
                                        <label for="<?= $kl; ?>">Keterangan</label>
                                        <span class="fld-meta"><span class="chg">Diubah</span><span class="fld-count"></span></span>
                                    </div>
                                    <input type="text" name="<?= $kl; ?>" id="<?= $kl; ?>" class="inp" maxlength="100"
                                        placeholder="Kapasitas Produksi" data-label="Keterangan angka <?= $i; ?>" data-single="1"
                                        data-target="pvL<?= $i; ?>" data-awal="<?= html_escape($v($kl)); ?>"
                                        value="<?= set_value($kl, $v($kl)); ?>" required>
                                    <div class="fld-err"></div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </section>

                <div class="act">
                    <div class="act-state" id="barState" role="status" aria-live="polite">
                        <span class="dot"></span><span id="barTxt">Belum ada perubahan</span>
                    </div>
                    <div class="act-btns">
                        <button type="button" class="btn-x ghost" id="btnReset" disabled><i class="bi bi-arrow-counterclockwise"></i><span>Batalkan perubahan</span></button>
                        <button type="submit" class="btn-x save" id="btnSimpan"><i class="bi bi-check2-circle"></i><span>Simpan perubahan</span></button>
                    </div>
                </div>
            </div>
            <div class="bw-kbd">Pintasan: <kbd>Ctrl</kbd> + <kbd>S</kbd> untuk menyimpan</div>
        </div>

        <!-- ===== Kanan: pratinjau langsung ===== -->
        <aside class="prev" aria-label="Pratinjau banner">
            <div class="prev-bar">
                <span class="prev-t"><span class="live"></span>Pratinjau langsung</span>
                <div class="seg" role="group" aria-label="Ukuran layar">
                    <button type="button" class="on" data-dev="desktop"><i class="bi bi-display"></i>Komputer</button>
                    <button type="button" data-dev="mobile"><i class="bi bi-phone"></i>HP</button>
                </div>
            </div>

            <div class="canvas">
                <div class="frame" id="frame">
                    <div class="hero">
                        <h2 class="h-title" id="pvJudul" data-ph="Judul banner"></h2>
                        <p class="h-desc" id="pvDesk" data-ph="Deskripsi banner"></p>
                        <div class="h-cta"><span class="cta"><i class="bi bi-bag-check-fill"></i>Belanja Produk Beras</span></div>
                        <div class="h-stats">
                            <div class="h-stat">
                                <div class="h-val" id="pvN1" data-ph="150+ Ton"></div>
                                <div class="h-lbl" id="pvL1" data-ph="Keterangan angka 1"></div>
                            </div>
                            <div class="h-stat">
                                <div class="h-val" id="pvN2" data-ph="121"></div>
                                <div class="h-lbl" id="pvL2" data-ph="Keterangan angka 2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="prev-note"><i class="bi bi-lock-fill"></i>Tombol "Belanja Produk Beras" diatur di menu Header.</div>
        </aside>

    </div>

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
        var fields = Array.prototype.slice.call(form.querySelectorAll('.inp'));
        var submitting = false;

        // Nilai awal = data tersimpan di database (bukan isian yang gagal validasi)
        var awal = {};
        fields.forEach(function (f) { awal[f.name] = f.getAttribute('data-awal') || ''; });

        function bersih(f) {
            if (f.dataset.single) { f.value = f.value.replace(/[\r\n]+/g, ' '); }
        }
        function tinggi(f) {
            if (f.tagName !== 'TEXTAREA') { return; }
            f.style.height = 'auto';
            f.style.height = f.scrollHeight + 2 + 'px';
        }
        function hitung(f) {
            var c = f.closest('.fld').querySelector('.fld-count');
            var max = parseInt(f.getAttribute('maxlength'), 10), n = f.value.length;
            c.textContent = n + '/' + max;
            c.classList.toggle('near', n >= max * 0.9 && n < max);
            c.classList.toggle('full', n >= max);
        }
        function pratinjau(f) {
            var el = document.getElementById(f.getAttribute('data-target'));
            if (el) { el.textContent = f.value.trim(); }
        }
        function validasi(f, tampil) {
            var ok = f.value.trim() !== '';
            f.classList.toggle('is-invalid', tampil && !ok);
            var er = f.closest('.fld').querySelector('.fld-err');
            if (er) { er.textContent = ok ? '' : ((f.getAttribute('data-label') || 'Kolom ini') + ' wajib diisi.'); }
            return ok;
        }
        function jumlahUbah() {
            return fields.filter(function (f) { return f.value !== awal[f.name]; }).length;
        }
        function perbarui() {
            var n = jumlahUbah();
            fields.forEach(function (f) {
                f.closest('.fld').classList.toggle('changed', f.value !== awal[f.name]);
            });
            chipDirty.style.display = n ? 'inline-flex' : 'none';
            btnReset.disabled = !n;
            barState.classList.toggle('dirty', n > 0);
            barTxt.textContent = n ? (n + ' bagian diubah, belum disimpan') : 'Belum ada perubahan';
        }

        fields.forEach(function (f) {
            bersih(f); tinggi(f); hitung(f); pratinjau(f);
            f.addEventListener('input', function () {
                bersih(f); tinggi(f); hitung(f); pratinjau(f); perbarui();
                if (f.classList.contains('is-invalid')) { validasi(f, true); }
            });
            f.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' && f.dataset.single) { e.preventDefault(); }
            });
            f.addEventListener('blur', function () {
                f.value = f.value.trim();
                tinggi(f); hitung(f); pratinjau(f); perbarui();
                if (f.value !== awal[f.name] || f.classList.contains('is-invalid')) { validasi(f, true); }
            });
        });
        perbarui();

        window.addEventListener('resize', function () { fields.forEach(tinggi); });

        // Batalkan perubahan: klik dua kali agar tidak terhapus tanpa sengaja
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
                var er = f.closest('.fld').querySelector('.fld-err');
                if (er) { er.textContent = ''; }
                tinggi(f); hitung(f); pratinjau(f);
            });
            perbarui();
        });

        window.addEventListener('beforeunload', function (e) {
            if (jumlahUbah() && !submitting) { e.preventDefault(); e.returnValue = ''; }
        });

        // Simpan
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

        // Komputer / HP
        var frame = document.getElementById('frame');
        document.querySelectorAll('[data-dev]').forEach(function (b) {
            b.addEventListener('click', function () {
                document.querySelectorAll('[data-dev]').forEach(function (x) { x.classList.remove('on'); });
                b.classList.add('on');
                frame.classList.toggle('mobile', b.dataset.dev === 'mobile');
            });
        });

        // Ctrl/Cmd + S
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