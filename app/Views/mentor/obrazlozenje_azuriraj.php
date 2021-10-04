<?php
$this->extend('layout');
$this->section('sidebar');
echo view('mentor/menu');
$this->endSection();

$this->section('content');
?>

<h1 class="mt-4">Образложење</h1>
<br>

<div class="container">
    <form action="<?= route_to('mentor/obrazlozenje_azuriraj_sacuvaj') ?>" method="post">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <?= view('Myth\Auth\Views\_message_block') ?>
                <?= csrf_field() ?>
                <input name="tema_id" hidden value="<?= $tema['id'] ?>">
                <div class="form-group">
                    <label for="ime">Име и презиме студента</label>
                    <input type="text"
                        class="form-control <?php if (session('errors.ime')) : ?>is-invalid<?php endif ?>"
                        name="ime" aria-describedby="ime" placeholder="Име и презиме студента"
                        <?php $prijava_ime = old('ime') ?? $prijava['ime_prezime'] ?>
                        value="<?= $prijava_ime ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="indeks">Број индекса</label>
                    <input type="text"
                        class="form-control <?php if (session('errors.indeks')) : ?>is-invalid<?php endif ?>"
                        name="indeks" aria-describedby="indeks" placeholder="Број индекса"
                        <?php $prijava_indeks = old('indeks') ?? $prijava['indeks'] ?>
                        value="<?= $prijava_indeks ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="modul">Модул</label>
                    <select
                        class="form-control <?php if (session('errors.modul')) : ?>is-invalid<?php endif ?> mt-3"
                        id="modul" name="modul">
                        <?php foreach ($modul as $m) : ?>
                        <option value="<?= $m['id'] ?>"
                            <?php if ($m['id'] == $obrazlozenje['id_modul']) : ?> selected
                            <?php endif ?>><?= $m['naziv'] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="predmet">Предмет</label>
                    <input type="text"
                        class="form-control <?php if (session('errors.predmet')) : ?>is-invalid<?php endif ?>"
                        name="predmet" aria-describedby="predmet" placeholder="Предмет"
                        <?php $obrazlozenje_predmet = old('predmet') ?? $obrazlozenje['predmet'] ?>
                        value="<?= $obrazlozenje_predmet ?>">

                </div>

                <br>
                <div class="form-group">
                    <label for="oblast">Област мастер рада</label>
                    <input type="text"
                        class="form-control <?php if (session('errors.oblast')) : ?>is-invalid<?php endif ?>"
                        name="oblast" aria-describedby="oblast" placeholder="Област мастер рада"
                        <?php $obrazlozenje_oblast = old('oblast') ?? $obrazlozenje['oblast_rada'] ?>
                        value="<?= $obrazlozenje_oblast ?>">
                </div>

                <br>
                <div class="form-group mb-3">
                    <label for="pcmm">Предмет, циљ и методе мастер рада:</label>
                    <textarea type="text" rows="6"
                        class="form-control <?php if (session('errors.pcmm')) : ?>is-invalid<?php endif ?>"
                        name="pcmm" aria-describedby="pcmm"
                        placeholder="Предмет, циљ и методе мастер рада:"
                        <?php $obrazlozenje_pcmm = old('pcmm') ?? $obrazlozenje['predmet_cilj_metode'] ?>><?= $obrazlozenje_pcmm ?></textarea>
                </div>

            </div>
            <div class="col-sm-6 col-xs-12">

                <div class="form-group mb-3">
                    <label for="sorm">Садржај и очекивани резултати мастер рада:</label>
                    <textarea type="text" rows="7"
                        class="form-control <?php if (session('errors.sorm')) : ?>is-invalid<?php endif ?>"
                        name="sorm" aria-describedby="sorm"
                        placeholder="Садржај и очекивани резултати мастер рада:"
                        <?php $obrazlozenje_sorm = old('sorm') ?? $obrazlozenje['sadrzaj_ocekivani_rezultat'] ?>><?= $obrazlozenje_sorm ?></textarea>
                </div>

                <br>
                <h3 class="mt-6">Коментари</h3>
                <div class="form-group">
                    <label for="komentari"></label>
                    <textarea type="text" rows="12"
                        class="form-control <?php if (session('errors.komentari')) : ?>is-invalid<?php endif ?>"
                        name="komentari" aria-describedby="komentari" placeholder="Коментари"
                        value="<?= old('komentari') ?>"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Ажурирајте образложење</button>
    </form>
</div>
<br>


<?php $this->endSection(); ?>