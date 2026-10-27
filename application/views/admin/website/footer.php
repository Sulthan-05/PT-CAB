<?php include(APPPATH . 'views/layout/head.php'); ?>
<?php
$row = $footer ?? null;
$tgl = (!empty($row->updated_at)) ? date('d-m-Y H:i', strtotime($row->updated_at)) : null;
$v = function ($k) use ($row) {
    return isset($row->$k) ? $row->$k : '';
};
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
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
        --bw-top: 96px;
        font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
        color: var(--ink);
        box-sizing: border-box;
        width: 100%;
        min-width: 0;
        max-width: 1240px;
        margin: 0 auto;
        padding: clamp(20px, 3.2vw, 44px) clamp(16px, 3.4vw, 48px) 56px;
    }
    .bw *, .bw *::before, .bw *::after { box-sizing: border-box }
    .bw input, .bw textarea, .bw button { font-family: inherit }

    /* Kepala bermotif — identik dengan beranda */
    .bw-head {
        position: relative;
        overflow: hidden;
        display: flex;
        flex-wrap: wrap;
        align-items: flex-end;
        justify-content: space-between;
        gap: 14px 24px;
        padding: clamp(24px, 3.4vw, 40px) clamp(20px, 3.4vw, 44px);
        margin-bottom: 32px;
        border-radius: 20px;
        color: #fff;
        background-color: var(--b900);
        background-image:
            linear-gradient(90deg, rgba(10,47,108,.92) 0%, rgba(10,47,108,.55) 55%, rgba(10,47,108,0) 100%),
            url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='120' height='120' viewBox='0 0 120 120'%3E%3Cdefs%3E%3Cg id='f'%3E%3Cg fill='none' stroke='%2393C5FD' stroke-opacity='.55' stroke-width='1.3'%3E%3Cellipse cx='0' cy='-17' rx='8' ry='14'/%3E%3Cellipse cx='0' cy='-17' rx='8' ry='14' transform='rotate(72)'/%3E%3Cellipse cx='0' cy='-17' rx='8' ry='14' transform='rotate(144)'/%3E%3Cellipse cx='0' cy='-17' rx='8' ry='14' transform='rotate(216)'/%3E%3Cellipse cx='0' cy='-17' rx='8' ry='14' transform='rotate(288)'/%3E%3C/g%3E%3Cg fill='%23FBBF24' fill-opacity='.8'%3E%3Ccircle cx='0' cy='-21' r='1.7'/%3E%3Ccircle cx='0' cy='-21' r='1.7' transform='rotate(72)'/%3E%3Ccircle cx='0' cy='-21' r='1.7' transform='rotate(144)'/%3E%3Ccircle cx='0' cy='-21' r='1.7' transform='rotate(216)'/%3E%3Ccircle cx='0' cy='-21' r='1.7' transform='rotate(288)'/%3E%3Ccircle r='4.5'/%3E%3C/g%3E%3Ccircle r='8.5' fill='none' stroke='%23FBBF24' stroke-opacity='.65' stroke-width='1' stroke-dasharray='1.5 3'/%3E%3C/g%3E%3Cg id='l' fill='none' stroke='%2393C5FD' stroke-opacity='.5' stroke-width='1.2' stroke-linecap='round'%3E%3Cpath d='M0,-20 C11,-9 11,9 0,20 C-11,9 -11,-9 0,-20Z'/%3E%3Cpath d='M0,-15 L0,15'/%3E%3Cpath d='M0,-7 L6,-12 M0,1 L7,-4 M0,9 L5,5 M0,-7 L-6,-12 M0,1 L-7,-4 M0,9 L-5,5'/%3E%3C/g%3E%3C/defs%3E%3Cuse xlink:href='%23f' transform='translate(60 60)'/%3E%3Cuse xlink:href='%23f' transform='translate(0 0) scale(.62)'/%3E%3Cuse xlink:href='%23f' transform='translate(120 0) scale(.62)'/%3E%3Cuse xlink:href='%23f' transform='translate(0 120) scale(.62)'/%3E%3Cuse xlink:href='%23f' transform='translate(120 120) scale(.62)'/%3E%3Cuse xlink:href='%23l' transform='translate(30 30) rotate(-45)'/%3E%3Cuse xlink:href='%23l' transform='translate(90 30) rotate(45)'/%3E%3Cuse xlink:href='%23l' transform='translate(30 90) rotate(-135)'/%3E%3Cuse xlink:href='%23l' transform='translate(90 90) rotate(135)'/%3E%3Cg fill='%2393C5FD' fill-opacity='.45'%3E%3Ccircle cx='60' cy='14' r='1.5'/%3E%3Ccircle cx='60' cy='106' r='1.5'/%3E%3Ccircle cx='14' cy='60' r='1.5'/%3E%3Ccircle cx='106' cy='60' r='1.5'/%3E%3Ccircle cx='52' cy='8' r='1'/%3E%3Ccircle cx='68' cy='8' r='1'/%3E%3Ccircle cx='52' cy='112' r='1'/%3E%3Ccircle cx='68' cy='112' r='1'/%3E%3Ccircle cx='8' cy='52' r='1'/%3E%3Ccircle cx='8' cy='68' r='1'/%3E%3Ccircle cx='112' cy='52' r='1'/%3E%3Ccircle cx='112' cy='68' r='1'/%3E%3C/g%3E%3C/svg%3E"),
            linear-gradient(135deg, var(--b700) 0%, var(--b900) 100%);
        background-size: auto, 120px 120px, auto;
    }
    .bw-head::after {
        content: "";
        position: absolute;
        inset: auto 0 0 0;
        height: 4px;
        background: linear-gradient(90deg, var(--gold), var(--gold-l) 40%, transparent 100%);
    }
    .bw-head > * { position: relative; z-index: 1 }
    .bw-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: .76rem;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: var(--gold-l);
    }
    .bw-eyebrow::before {
        content: "";
        width: 28px;
        height: 3px;
        border-radius: 3px;
        background: var(--gold);
    }
    .bw-head h1 { font-size: clamp(1.7rem,3.6vw,2.35rem); font-weight: 800; letter-spacing: -.02em; line-height: 1.1; color: #fff; margin: 8px 0 8px }
    .bw-head p  { margin: 0; max-width: 58ch; color: #DBEAFE; font-size: .95rem; line-height: 1.6 }
    .bw-pills   { display: flex; flex-wrap: wrap; gap: 8px }
    .bw-pill    { display: inline-flex; align-items: center; gap: 6px; font-size: .8rem; font-weight: 600; padding: 6px 12px; border-radius: 999px; background: rgba(255,255,255,.14); color: #fff }
    .bw-pill.warn { display: none; background: var(--gold-l); color: var(--b900) }
    .bw .alert  { border: 0; border-radius: 12px; font-size: .92rem }

    /* Grid */
    .bw-grid { display: grid; grid-template-columns: minmax(0,1fr); gap: 24px; align-items: start }
    .bw-grid > * { min-width: 0 }
    @media(min-width:992px) { .bw-grid { grid-template-columns: minmax(0,1fr) minmax(0,1fr); gap: 32px } }

    /* Panel */
    .panel { background: #fff; border: 1px solid var(--line); border-radius: 18px }
    .sec   { padding: 24px 24px 8px }
    .sec + .sec { border-top: 1px solid var(--line) }
    .sec-h { display: flex; gap: 12px; align-items: flex-start; margin-bottom: 20px }
    .sec-n { flex: 0 0 30px; width: 30px; height: 30px; border-radius: 9px; background: var(--b900); color: var(--gold-l); font-weight: 800; font-size: .8rem; display: grid; place-items: center }
    .sec-h h2 { font-size: 1rem; font-weight: 800; margin: 0; color: var(--b900) }
    .sec-h p  { margin: 2px 0 0; font-size: .82rem; color: var(--mut); line-height: 1.5 }

    /* Field */
    .fld { margin-bottom: 18px }
    .fld-top { display: flex; justify-content: space-between; align-items: baseline; gap: 8px; margin-bottom: 6px }
    .fld label { font-size: .82rem; font-weight: 700; color: var(--ink); margin: 0 }
    .fld-meta  { display: inline-flex; align-items: center; gap: 8px; font-size: .74rem; font-weight: 600; color: var(--mut); font-variant-numeric: tabular-nums }
    .fld-meta .chg { display: none; color: #92400E; background: #FEF3C7; padding: 1px 8px; border-radius: 999px }
    .fld.changed .chg { display: inline-block }
    .fld-count.near { color: #B45309 }
    .fld-count.full { color: #B91C1C }
    .inp {
        display: block; width: 100%; padding: 10px 13px;
        border: 1.5px solid #CBD5E1; border-radius: 11px;
        background: #fff; color: var(--ink); font-size: .95rem;
        line-height: 1.5; resize: none; overflow: hidden;
        transition: border-color .15s, box-shadow .15s;
    }
    .inp::placeholder { color: #94A3B8 }
    .inp:hover  { border-color: #94A3B8 }
    .inp:focus  { outline: 0; border-color: var(--b500); box-shadow: 0 0 0 4px rgba(21,101,192,.14) }
    .inp.is-invalid { border-color: #DC2626; background: #FEF2F2 }
    .inp.is-invalid:focus { box-shadow: 0 0 0 4px rgba(220,38,38,.14) }
    .fld-err { display: none; margin-top: 6px; font-size: .8rem; font-weight: 600; color: #B91C1C }
    .inp.is-invalid ~ .fld-err { display: block }

    /* Input dengan ikon prefix */
    .inp-wrap { position: relative }
    .inp-wrap .inp-icon {
        position: absolute; left: 13px; top: 50%; transform: translateY(-50%);
        color: var(--mut); font-size: .9rem; pointer-events: none;
    }
    .inp-wrap .inp { padding-left: 36px }

    /* Bar aksi */
    .act {
        position: sticky; bottom: 0; z-index: 4;
        display: flex; flex-wrap: wrap; align-items: center; gap: 12px 16px;
        padding: 14px 24px; background: #fff;
        border-top: 1px solid var(--line);
        border-radius: 0 0 18px 18px;
        box-shadow: 0 -10px 22px -16px rgba(10,47,108,.35);
    }
    .act-state { flex: 1 1 180px; display: flex; align-items: center; gap: 9px; font-size: .88rem; font-weight: 600; color: var(--sub) }
    .act-state .dot { width: 9px; height: 9px; flex: 0 0 9px; border-radius: 50%; background: #22C55E }
    .act-state.dirty { color: #92400E }
    .act-state.dirty .dot { background: var(--gold) }
    .act-btns { display: flex; flex-wrap: wrap; gap: 10px }
    .btn-x {
        display: inline-flex; align-items: center; justify-content: center;
        gap: 8px; min-height: 44px; padding: 0 20px; border-radius: 12px;
        border: 2px solid transparent; font-weight: 700; font-size: .92rem;
        cursor: pointer; transition: background .15s, color .15s, border-color .15s, box-shadow .15s;
    }
    .btn-x.save { background: var(--gold); color: var(--b900) }
    .btn-x.save:hover { background: var(--gold-l); box-shadow: 0 8px 18px -6px rgba(245,158,11,.7) }
    .btn-x.save:disabled { cursor: wait; opacity: .85; box-shadow: none }
    .btn-x.ghost { background: #fff; border-color: #CBD5E1; color: var(--sub) }
    .btn-x.ghost:hover:not(:disabled) { border-color: var(--b500); color: var(--b700) }
    .btn-x.ghost:disabled { opacity: .45; cursor: not-allowed }
    .btn-x.ghost.confirm { background: #FEF2F2; border-color: #DC2626; color: #B91C1C }
    .bw-kbd { text-align: center; font-size: .78rem; color: var(--mut); margin-top: 10px }

    /* Pratinjau footer */
    .prev { min-width: 0 }
    @media(min-width:992px) { .prev { position: sticky; top: var(--bw-top) } }
    .prev-bar {
        display: flex; flex-wrap: wrap; align-items: center;
        justify-content: space-between; gap: 10px 16px; margin-bottom: 12px;
    }
    .prev-t { display: inline-flex; align-items: center; gap: 9px; font-size: .82rem; font-weight: 700; color: var(--b900) }
    .prev-t .live { width: 8px; height: 8px; border-radius: 50%; background: var(--gold) }
    .canvas { background: #E8EEF8; border-radius: 20px; padding: clamp(14px,2.6vw,28px) }

    /* Pratinjau footer — miniatur */
    .fp {
        background: var(--b900);
        border-radius: 14px;
        padding: 24px 20px 16px;
        color: #fff;
        font-size: .78rem;
        line-height: 1.6;
    }
    .fp-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px 16px;
        margin-bottom: 16px;
    }
    .fp-col-title {
        display: flex; align-items: center; gap: 8px;
        font-size: .72rem; font-weight: 800;
        text-transform: uppercase; letter-spacing: .06em;
        color: var(--gold-l); margin-bottom: 10px;
    }
    .fp-col-title i { font-size: .8rem }
    .fp-logo { display: flex; align-items: center; gap: 9px; margin-bottom: 10px }
    .fp-logo-box {
        width: 32px; height: 32px; background: var(--gold);
        border-radius: 7px; display: grid; place-items: center;
        font-size: .7rem; font-weight: 800; color: var(--b900); flex-shrink: 0;
    }
    .fp-brand { font-size: .75rem; font-weight: 700; line-height: 1.2; color: #fff }
    .fp-desc { color: #BFDBFE; font-size: .73rem; line-height: 1.55; margin-bottom: 10px }
    .fp-item { display: flex; align-items: flex-start; gap: 7px; color: #BFDBFE; margin-bottom: 6px; font-size: .73rem }
    .fp-item i { color: var(--gold-l); font-size: .78rem; flex-shrink: 0; margin-top: 2px }
    .fp-social { display: flex; flex-direction: column; gap: 6px }
    .fp-social-item { display: flex; align-items: center; gap: 8px; color: #BFDBFE; font-size: .73rem }
    .fp-social-item i { width: 22px; height: 22px; background: rgba(255,255,255,.1); border-radius: 6px; display: grid; place-items: center; font-size: .72rem; color: #fff; flex-shrink: 0 }
    .fp-map {
        background: #1a3a7a; border-radius: 10px;
        height: 90px; display: grid; place-items: center;
        color: #93C5FD; font-size: .7rem; text-align: center;
    }
    .fp-copy {
        border-top: 1px solid rgba(255,255,255,.12);
        padding-top: 12px; color: #94A3B8;
        font-size: .7rem; text-align: center;
    }
    .fp-empty { color: rgba(255,255,255,.3); font-style: italic }

    @media(max-width:575.98px) {
        .sec { padding: 20px 16px 4px }
        .act { padding: 12px 16px }
        .act-btns { width: 100% }
        .btn-x { flex: 1 1 100% }
        .btn-x.save { order: -1 }
        .bw-kbd { display: none }
        .fp-grid { grid-template-columns: 1fr }
    }
    @media(prefers-reduced-motion:reduce) { .bw *, .bw *::before { transition: none !important } }
</style>

<div class="bw">

    <header class="bw-head">
        <div>
            <span class="bw-eyebrow">Website</span>
            <h1>Footer Website</h1>
            <p>Atur teks deskripsi, alamat, kontak, dan tautan media sosial yang tampil di bagian bawah setiap halaman website PT Citra Abadi Bermartabat.</p>
        </div>
        <div class="bw-pills">
            <?php if ($tgl): ?>
                <span class="bw-pill"><i class="bi bi-clock-history"></i>Terakhir diperbarui <?= html_escape($tgl) ?></span>
            <?php endif; ?>
            <span class="bw-pill warn" id="chipDirty" role="status" aria-live="polite">
                <i class="bi bi-pencil-fill"></i>Belum disimpan
            </span>
        </div>
    </header>

    <?php if ($this->session->flashdata('sukses')): ?>
        <div class="alert alert-success alert-dismissible fade show js-auto-alert" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i><?= html_escape($this->session->flashdata('sukses')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('gagal')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-x-circle-fill me-1"></i><?= html_escape($this->session->flashdata('gagal')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    <?php endif; ?>
    <?php if (validation_errors()): ?>
        <div class="alert alert-danger" id="serverError" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-1"></i>Perbaiki isian berikut:<?= validation_errors() ?>
        </div>
    <?php endif; ?>

    <?= form_open('admin/footer/simpan', ['id' => 'formFooter', 'novalidate' => 'novalidate']) ?>

    <div class="bw-grid">

        <!-- ===== KIRI: Panel isian ===== -->
        <div>
            <div class="panel">

                <!-- Seksi 01: Profil perusahaan -->
                <section class="sec">
                    <div class="sec-h">
                        <span class="sec-n">01</span>
                        <div>
                            <h2>Profil Perusahaan</h2>
                            <p>Deskripsi singkat dan teks hak cipta di baris paling bawah.</p>
                        </div>
                    </div>

                    <div class="fld">
                        <div class="fld-top">
                            <label for="deskripsi">Deskripsi perusahaan</label>
                            <span class="fld-meta"><span class="chg">Diubah</span><span class="fld-count"></span></span>
                        </div>
                        <textarea name="deskripsi" id="deskripsi" class="inp" rows="4" maxlength="1000"
                            placeholder="Contoh: Pionir modernisasi penggilingan gabah padi dan suplai beras curah higienis..."
                            data-label="Deskripsi" data-target="pvDesc"
                            data-awal="<?= html_escape($v('deskripsi')) ?>"
                            required><?= set_value('deskripsi', $v('deskripsi')) ?></textarea>
                        <div class="fld-err"></div>
                    </div>

                    <div class="fld">
                        <div class="fld-top">
                            <label for="copyright">Teks copyright</label>
                            <span class="fld-meta"><span class="chg">Diubah</span><span class="fld-count"></span></span>
                        </div>
                        <input type="text" name="copyright" id="copyright" class="inp" maxlength="255"
                            placeholder="© 2025 PT Citra Abadi Bermartabat. Seluruh Hak Cipta Dilindungi Undang-Undang."
                            data-label="Copyright" data-single="1" data-target="pvCopy"
                            data-awal="<?= html_escape($v('copyright')) ?>"
                            value="<?= set_value('copyright', $v('copyright')) ?>"
                            required>
                        <div class="fld-err"></div>
                    </div>
                </section>

                <!-- Seksi 02: Lokasi & Kontak -->
                <section class="sec">
                    <div class="sec-h">
                        <span class="sec-n">02</span>
                        <div>
                            <h2>Lokasi &amp; Kontak</h2>
                            <p>Alamat pabrik, nomor telepon, dan email perusahaan.</p>
                        </div>
                    </div>

                    <div class="fld">
                        <div class="fld-top">
                            <label for="alamat">Alamat lengkap</label>
                            <span class="fld-meta"><span class="chg">Diubah</span><span class="fld-count"></span></span>
                        </div>
                        <textarea name="alamat" id="alamat" class="inp" rows="3" maxlength="500"
                            placeholder="Jl. Derpoyudo, Gedong, Kec. Karanganyar..."
                            data-label="Alamat" data-target="pvAlamat"
                            data-awal="<?= html_escape($v('alamat')) ?>"><?= set_value('alamat', $v('alamat')) ?></textarea>
                        <div class="fld-err"></div>
                    </div>

                    <div class="fld">
                        <div class="fld-top">
                            <label for="telepon">Nomor telepon / WhatsApp</label>
                            <span class="fld-meta"><span class="chg">Diubah</span><span class="fld-count"></span></span>
                        </div>
                        <div class="inp-wrap">
                            <i class="bi bi-telephone-fill inp-icon"></i>
                            <input type="text" name="telepon" id="telepon" class="inp" maxlength="40"
                                placeholder="+62 812-3456-7890"
                                data-label="Telepon" data-single="1" data-target="pvTelp"
                                data-awal="<?= html_escape($v('telepon')) ?>"
                                value="<?= set_value('telepon', $v('telepon')) ?>">
                        </div>
                        <div class="fld-err"></div>
                    </div>

                    <div class="fld">
                        <div class="fld-top">
                            <label for="email">Email</label>
                            <span class="fld-meta"><span class="chg">Diubah</span><span class="fld-count"></span></span>
                        </div>
                        <div class="inp-wrap">
                            <i class="bi bi-envelope-fill inp-icon"></i>
                            <input type="email" name="email" id="email" class="inp" maxlength="150"
                                placeholder="info@citraabadibermartabat.com"
                                data-label="Email" data-single="1" data-target="pvEmail"
                                data-awal="<?= html_escape($v('email')) ?>"
                                value="<?= set_value('email', $v('email')) ?>">
                        </div>
                        <div class="fld-err"></div>
                    </div>
                </section>

                <!-- Seksi 03: Media Sosial -->
                <section class="sec">
                    <div class="sec-h">
                        <span class="sec-n">03</span>
                        <div>
                            <h2>Media Sosial</h2>
                            <p>Isi URL lengkap atau nomor WhatsApp. Kosongkan jika tidak digunakan.</p>
                        </div>
                    </div>

                    <div class="fld">
                        <div class="fld-top">
                            <label for="instagram_url">Instagram</label>
                            <span class="fld-meta"><span class="chg">Diubah</span></span>
                        </div>
                        <div class="inp-wrap">
                            <i class="bi bi-instagram inp-icon"></i>
                            <input type="text" name="instagram_url" id="instagram_url" class="inp" maxlength="255"
                                placeholder="https://instagram.com/citraabadibermartabat"
                                data-label="Instagram" data-single="1" data-target="pvIg"
                                data-awal="<?= html_escape($v('instagram_url')) ?>"
                                value="<?= set_value('instagram_url', $v('instagram_url')) ?>">
                        </div>
                        <div class="fld-err"></div>
                    </div>

                    <div class="fld">
                        <div class="fld-top">
                            <label for="facebook_url">TikTok</label>
                            <span class="fld-meta"><span class="chg">Diubah</span></span>
                        </div>
                        <div class="inp-wrap">
                            <i class="bi bi-tiktok inp-icon"></i>
                            <input type="text" name="facebook_url" id="facebook_url" class="inp" maxlength="255"
                                placeholder="https://tiktok.com/@ptcab"
                                data-label="TikTok" data-single="1" data-target="pvTt"
                                data-awal="<?= html_escape($v('facebook_url')) ?>"
                                value="<?= set_value('facebook_url', $v('facebook_url')) ?>">
                        </div>
                        <div class="fld-err"></div>
                    </div>

                    <div class="fld">
                        <div class="fld-top">
                            <label for="youtube_url">LinkedIn</label>
                            <span class="fld-meta"><span class="chg">Diubah</span></span>
                        </div>
                        <div class="inp-wrap">
                            <i class="bi bi-linkedin inp-icon"></i>
                            <input type="text" name="youtube_url" id="youtube_url" class="inp" maxlength="255"
                                placeholder="https://linkedin.com/company/cab"
                                data-label="LinkedIn" data-single="1" data-target="pvLi"
                                data-awal="<?= html_escape($v('youtube_url')) ?>"
                                value="<?= set_value('youtube_url', $v('youtube_url')) ?>">
                        </div>
                        <div class="fld-err"></div>
                    </div>
                </section>

                <!-- Bar aksi -->
                <div class="act">
                    <div class="act-state" id="barState" role="status" aria-live="polite">
                        <span class="dot"></span><span id="barTxt">Belum ada perubahan</span>
                    </div>
                    <div class="act-btns">
                        <button type="button" class="btn-x ghost" id="btnReset" disabled>
                            <i class="bi bi-arrow-counterclockwise"></i><span>Batalkan perubahan</span>
                        </button>
                        <button type="submit" class="btn-x save" id="btnSimpan">
                            <i class="bi bi-check2-circle"></i><span>Simpan perubahan</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="bw-kbd">Pintasan: <kbd>Ctrl</kbd> + <kbd>S</kbd> untuk menyimpan</div>
        </div>

        <!-- ===== KANAN: Pratinjau footer ===== -->
        <aside class="prev" aria-label="Pratinjau footer">
            <div class="prev-bar">
                <span class="prev-t"><span class="live"></span>Pratinjau langsung</span>
            </div>
            <div class="canvas">
                <div class="fp">
                    <div class="fp-grid">
                        <!-- Kolom 1: Logo + deskripsi -->
                        <div>
                            <div class="fp-logo">
                                <div class="fp-logo-box">CAB</div>
                                <div class="fp-brand">Citra Abadi<br>Bermartabat</div>
                            </div>
                            <p class="fp-desc" id="pvDesc"><?= html_escape($v('deskripsi')) ?: '<span class="fp-empty">Deskripsi perusahaan</span>' ?></p>
                        </div>

                        <!-- Kolom 2: Lokasi -->
                        <div>
                            <div class="fp-col-title"><i class="bi bi-geo-alt-fill"></i>Lokasi Pabrik &amp; Gudang</div>
                            <div class="fp-item">
                                <i class="bi bi-geo-alt"></i>
                                <span id="pvAlamat"><?= html_escape($v('alamat')) ?: '<span class="fp-empty">Alamat belum diisi</span>' ?></span>
                            </div>
                            <div class="fp-item">
                                <i class="bi bi-telephone"></i>
                                <span id="pvTelp"><?= html_escape($v('telepon')) ?: '<span class="fp-empty">Telepon belum diisi</span>' ?></span>
                            </div>
                            <div class="fp-item">
                                <i class="bi bi-envelope"></i>
                                <span id="pvEmail"><?= html_escape($v('email')) ?: '<span class="fp-empty">Email belum diisi</span>' ?></span>
                            </div>
                        </div>

                        <!-- Kolom 3: Media sosial -->
                        <div>
                            <div class="fp-col-title"><i class="bi bi-share-fill"></i>Contact Media Sosial</div>
                            <div class="fp-social">
                                <div class="fp-social-item"><i class="bi bi-whatsapp"></i><span id="pvTelp2"><?= html_escape($v('telepon')) ?: '<span class="fp-empty">-</span>' ?></span></div>
                                <div class="fp-social-item"><i class="bi bi-instagram"></i><span id="pvIg"><?= $v('instagram_url') ? html_escape($v('instagram_url')) : '<span class="fp-empty">Instagram belum diisi</span>' ?></span></div>
                                <div class="fp-social-item"><i class="bi bi-tiktok"></i><span id="pvTt"><?= $v('facebook_url') ? html_escape($v('facebook_url')) : '<span class="fp-empty">TikTok belum diisi</span>' ?></span></div>
                                <div class="fp-social-item"><i class="bi bi-linkedin"></i><span id="pvLi"><?= $v('youtube_url') ? html_escape($v('youtube_url')) : '<span class="fp-empty">LinkedIn belum diisi</span>' ?></span></div>
                            </div>
                        </div>

                        <!-- Kolom 4: Peta -->
                        <div>
                            <div class="fp-col-title"><i class="bi bi-map-fill"></i>Lokasi PT CAB</div>
                            <div class="fp-map">
                                <div><i class="bi bi-map" style="font-size:1.6rem;display:block;margin-bottom:6px;opacity:.5"></i>Peta ditampilkan<br>di halaman publik</div>
                            </div>
                        </div>
                    </div>

                    <!-- Copyright bar -->
                    <div class="fp-copy" id="pvCopy">
                        <?= html_escape($v('copyright')) ?: '<span class="fp-empty">Teks copyright belum diisi</span>' ?>
                    </div>
                </div>
            </div>
            <p style="font-size:.78rem;color:var(--mut);margin:10px 4px 0;display:flex;align-items:center;gap:6px">
                <i class="bi bi-info-circle"></i>Peta Google Maps dan badge NIB/HALAL diatur terpisah di halaman publik.
            </p>
        </aside>

    </div>

    <?= form_close() ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var form      = document.getElementById('formFooter');
    var btnSimpan = document.getElementById('btnSimpan');
    var btnReset  = document.getElementById('btnReset');
    var chipDirty = document.getElementById('chipDirty');
    var barState  = document.getElementById('barState');
    var barTxt    = document.getElementById('barTxt');
    var fields    = Array.prototype.slice.call(form.querySelectorAll('.inp'));
    var submitting = false;

    var awal = {};
    fields.forEach(function (f) { awal[f.name] = f.getAttribute('data-awal') || ''; });

    function bersih(f) {
        if (f.dataset.single) { f.value = f.value.replace(/[\r\n]+/g, ' '); }
    }
    function tinggi(f) {
        if (f.tagName !== 'TEXTAREA') return;
        f.style.height = 'auto';
        f.style.height = f.scrollHeight + 2 + 'px';
    }
    function hitung(f) {
        var c = f.closest('.fld').querySelector('.fld-count');
        if (!c) return;
        var max = parseInt(f.getAttribute('maxlength'), 10), n = f.value.length;
        c.textContent = n + '/' + max;
        c.classList.toggle('near', n >= max * 0.9 && n < max);
        c.classList.toggle('full', n >= max);
    }
    function pratinjau(f) {
        var tid = f.getAttribute('data-target');
        if (!tid) return;
        var el = document.getElementById(tid);
        if (!el) return;
        var val = f.value.trim();
        el.innerHTML = val || ('<span class="fp-empty">' + (f.getAttribute('placeholder') || '—') + '</span>');

        /* Sinkron telepon ke dua tempat pratinjau */
        if (f.name === 'telepon') {
            var el2 = document.getElementById('pvTelp2');
            if (el2) el2.innerHTML = val || '<span class="fp-empty">-</span>';
        }
    }
    function validasi(f, tampil) {
        var ok = f.value.trim() !== '' || !f.hasAttribute('required');
        f.classList.toggle('is-invalid', tampil && !ok);
        var er = f.closest('.fld').querySelector('.fld-err');
        if (er) er.textContent = ok ? '' : ((f.getAttribute('data-label') || 'Kolom ini') + ' wajib diisi.');
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
        bersih(f); tinggi(f); hitung(f);
        f.addEventListener('input', function () {
            bersih(f); tinggi(f); hitung(f); pratinjau(f); perbarui();
            if (f.classList.contains('is-invalid')) validasi(f, true);
        });
        f.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && f.dataset.single) e.preventDefault();
        });
        f.addEventListener('blur', function () {
            f.value = f.value.trim();
            tinggi(f); hitung(f); pratinjau(f); perbarui();
            if (f.value !== awal[f.name] || f.classList.contains('is-invalid')) validasi(f, true);
        });
    });
    perbarui();
    window.addEventListener('resize', function () { fields.forEach(tinggi); });

    /* Batalkan — klik dua kali */
    var resetTimer = null;
    var resetLabel = btnReset.querySelector('span');
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
            if (er) er.textContent = '';
            tinggi(f); hitung(f); pratinjau(f);
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
            if (!validasi(f, true) && !salah) salah = f;
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

    /* Ctrl+S */
    document.addEventListener('keydown', function (e) {
        if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 's') {
            e.preventDefault();
            if (form.requestSubmit) form.requestSubmit(btnSimpan); else btnSimpan.click();
        }
    });

    /* Auto-close alert sukses */
    document.querySelectorAll('.js-auto-alert').forEach(function (el) {
        setTimeout(function () { bootstrap.Alert.getOrCreateInstance(el).close(); }, 4000);
    });
    var se = document.getElementById('serverError');
    if (se) se.scrollIntoView({ behavior: 'smooth', block: 'center' });
});
</script>
<?php include(APPPATH . 'views/layout/foot.php'); ?>
