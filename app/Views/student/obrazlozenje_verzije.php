<?php
$this->extend('layout');
$this->section('sidebar');
echo view('student/menu');
$this->endSection();

$this->section('content');
?>

<div class="container col-sm-12 col-xs-12 mt-3">
    <button class="btn btn-secondary col-sm-2" id="button1" onClick="student()">Верзија
        студента</button>
    <button class="btn btn-secondary col-sm-2" id="button2" onClick="mentor()">Верзија
        ментора</button>
    <button class="btn btn-secondary col-sm-2" id="button3" onClick="rukovodilac()">Верзија
        руководиоца</button>
    <button class="btn btn-secondary col-sm-3" id="button3" onClick="studentska_sluzba()">Верзија
        студентске службе</button>
</div>


<div x-data="{ open: false }" class="mt-3">
    <button x-on:click="open = !open" class="btn btn-primary" id="student" hidden>Верзија
        студента</button>
    <div class="container" x-show="open" x-cloak>
        <h4 class="mt-4">Верзија студента</h4>
        <br>
        <form>
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
                            <?php $prijava_ime = $student_prijava['ime_prezime'] ?? '' ?>
                            value="<?= $prijava_ime ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="indeks">Број индекса</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.indeks')) : ?>is-invalid<?php endif ?>"
                            name="indeks" aria-describedby="indeks" placeholder="Број индекса"
                            <?php $prijava_indeks = $student['indeks'] ?? '' ?>
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
                                <?php if ($m['id'] == $student['id_modul']) : ?> selected
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
                            <?php $obrazlozenje_predmet = $student['predmet'] ?? '' ?>
                            value="<?= $obrazlozenje_predmet ?>">

                    </div>

                    <br>
                    <div class="form-group">
                        <label for="oblast">Област мастер рада</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.oblast')) : ?>is-invalid<?php endif ?>"
                            name="oblast" aria-describedby="oblast" placeholder="Област мастер рада"
                            <?php $obrazlozenje_oblast = $student['oblast_rada'] ?? '' ?>
                            value="<?= $obrazlozenje_oblast ?>">
                    </div>

                    <br>
                    <div class="form-group mb-3">
                        <label for="pcmm">Предмет, циљ и методе мастер рада:</label>
                        <textarea type="text" rows="6"
                            class="form-control <?php if (session('errors.pcmm')) : ?>is-invalid<?php endif ?>"
                            name="pcmm" aria-describedby="pcmm"
                            placeholder="Предмет, циљ и методе мастер рада:"
                            <?php $obrazlozenje_pcmm = $student['predmet_cilj_metode'] ?? '' ?>><?= $obrazlozenje_pcmm ?></textarea>
                    </div>

                </div>
                <div class="col-sm-6 col-xs-12">

                    <div class="form-group mb-3">
                        <label for="sorm">Садржај и очекивани резултати мастер рада:</label>
                        <textarea type="text" rows="7"
                            class="form-control <?php if (session('errors.sorm')) : ?>is-invalid<?php endif ?>"
                            name="sorm" aria-describedby="sorm"
                            placeholder="Садржај и очекивани резултати мастер рада:"
                            <?php $obrazlozenje_sorm = $student['sadrzaj_ocekivani_rezultat'] ?? '' ?>><?= $obrazlozenje_sorm ?></textarea>
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
        </form>
    </div>
</div>


<div x-data="{ open: false }" class="mt-3">
    <button x-on:click="open = !open" class="btn btn-primary" id="mentor" hidden>Верзија
        ментора</button>
    <div class="container" x-show="open" x-cloak>
        <h4 class="mt-4">Верзија ментора</h4>
        <br>
        <form>
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
                            <?php $prijava_ime = $mentor_prijava['ime_prezime'] ?? '' ?>
                            value="<?= $prijava_ime ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="indeks">Број индекса</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.indeks')) : ?>is-invalid<?php endif ?>"
                            name="indeks" aria-describedby="indeks" placeholder="Број индекса"
                            <?php $prijava_indeks = $mentor['indeks'] ?? '' ?>
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
                                <?php if ($m['id'] == $mentor['id_modul']) : ?> selected
                                <?php endif ?>>
                                <?= $m['naziv'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="predmet">Предмет</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.predmet')) : ?>is-invalid<?php endif ?>"
                            name="predmet" aria-describedby="predmet" placeholder="Предмет"
                            <?php $obrazlozenje_predmet = $mentor['predmet'] ?? '' ?>
                            value="<?= $obrazlozenje_predmet ?>">

                    </div>

                    <br>
                    <div class="form-group">
                        <label for="oblast">Област мастер рада</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.oblast')) : ?>is-invalid<?php endif ?>"
                            name="oblast" aria-describedby="oblast" placeholder="Област мастер рада"
                            <?php $obrazlozenje_oblast = $mentor['oblast_rada'] ?? '' ?>
                            value="<?= $obrazlozenje_oblast ?>">
                    </div>

                    <br>
                    <div class="form-group mb-3">
                        <label for="pcmm">Предмет, циљ и методе мастер рада:</label>
                        <textarea type="text" rows="6"
                            class="form-control <?php if (session('errors.pcmm')) : ?>is-invalid<?php endif ?>"
                            name="pcmm" aria-describedby="pcmm"
                            placeholder="Предмет, циљ и методе мастер рада:"
                            <?php $obrazlozenje_pcmm = $mentor['predmet_cilj_metode'] ?? '' ?>><?= $obrazlozenje_pcmm ?></textarea>
                    </div>

                </div>
                <div class="col-sm-6 col-xs-12">

                    <div class="form-group mb-3">
                        <label for="sorm">Садржај и очекивани резултати мастер рада:</label>
                        <textarea type="text" rows="7"
                            class="form-control <?php if (session('errors.sorm')) : ?>is-invalid<?php endif ?>"
                            name="sorm" aria-describedby="sorm"
                            placeholder="Садржај и очекивани резултати мастер рада:"
                            <?php $obrazlozenje_sorm = $mentor['sadrzaj_ocekivani_rezultat'] ?? '' ?>><?= $obrazlozenje_sorm ?></textarea>
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
        </form>
    </div>
</div>


<div x-data="{ open: false }" class="mt-3">
    <button x-on:click="open = !open" class="btn btn-primary" id="rukovodilac" hidden>Верзија
        руководиоца</button>
    <div class="container" x-show="open" x-cloak>
        <h4 class="mt-4">Верзија руководиоца</h4>
        <br>
        <form>
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
                            <?php $prijava_ime = $rukovodilac_prijava['ime_prezime'] ?? '' ?>
                            value="<?= $prijava_ime ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="indeks">Број индекса</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.indeks')) : ?>is-invalid<?php endif ?>"
                            name="indeks" aria-describedby="indeks" placeholder="Број индекса"
                            <?php $prijava_indeks = $rukovodilac['indeks'] ?? '' ?>
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
                                <?php if ($m['id'] == $rukovodilac['id_modul']) : ?> selected
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
                            <?php $obrazlozenje_predmet = $rukovodilac['predmet'] ?? '' ?>
                            value="<?= $obrazlozenje_predmet ?>">

                    </div>

                    <br>
                    <div class="form-group">
                        <label for="oblast">Област мастер рада</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.oblast')) : ?>is-invalid<?php endif ?>"
                            name="oblast" aria-describedby="oblast" placeholder="Област мастер рада"
                            <?php $obrazlozenje_oblast = $rukovodilac['oblast_rada'] ?? '' ?>
                            value="<?= $obrazlozenje_oblast ?>">
                    </div>

                    <br>
                    <div class="form-group mb-3">
                        <label for="pcmm">Предмет, циљ и методе мастер рада:</label>
                        <textarea type="text" rows="6"
                            class="form-control <?php if (session('errors.pcmm')) : ?>is-invalid<?php endif ?>"
                            name="pcmm" aria-describedby="pcmm"
                            placeholder="Предмет, циљ и методе мастер рада:"
                            <?php $obrazlozenje_pcmm = $rukovodilac['predmet_cilj_metode'] ?? '' ?>><?= $obrazlozenje_pcmm ?></textarea>
                    </div>

                </div>
                <div class="col-sm-6 col-xs-12">

                    <div class="form-group mb-3">
                        <label for="sorm">Садржај и очекивани резултати мастер рада:</label>
                        <textarea type="text" rows="7"
                            class="form-control <?php if (session('errors.sorm')) : ?>is-invalid<?php endif ?>"
                            name="sorm" aria-describedby="sorm"
                            placeholder="Садржај и очекивани резултати мастер рада:"
                            <?php $obrazlozenje_sorm = $rukovodilac['sadrzaj_ocekivani_rezultat'] ?? '' ?>><?= $obrazlozenje_sorm ?></textarea>
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
        </form>
    </div>
</div>


<div x-data="{ open: false }" class="mt-3">
    <button x-on:click="open = !open" class="btn btn-primary" id="studentska_sluzba" hidden>Верзија
        студентске службе</button>
    <div class="container" x-show="open" x-cloak>
        <h4 class="mt-4">Верзија студентске службе</h4>
        <br>
        <form>
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
                            <?php $prijava_ime = $studentska_sluzba_prijava['ime_prezime'] ?? '' ?>
                            value="<?= $prijava_ime ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="indeks">Број индекса</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.indeks')) : ?>is-invalid<?php endif ?>"
                            name="indeks" aria-describedby="indeks" placeholder="Број индекса"
                            <?php $prijava_indeks = $studentska_sluzba['indeks'] ?? '' ?>
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
                                <?php if ($m['id'] == $studentska_sluzba['id_modul']) : ?> selected
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
                            <?php $obrazlozenje_predmet = $studentska_sluzba['predmet'] ?? '' ?>
                            value="<?= $obrazlozenje_predmet ?>">

                    </div>

                    <br>
                    <div class="form-group">
                        <label for="oblast">Област мастер рада</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.oblast')) : ?>is-invalid<?php endif ?>"
                            name="oblast" aria-describedby="oblast" placeholder="Област мастер рада"
                            <?php $obrazlozenje_oblast = $studentska_sluzba['oblast_rada'] ?? '' ?>
                            value="<?= $obrazlozenje_oblast ?>">
                    </div>

                    <br>
                    <div class="form-group mb-3">
                        <label for="pcmm">Предмет, циљ и методе мастер рада:</label>
                        <textarea type="text" rows="6"
                            class="form-control <?php if (session('errors.pcmm')) : ?>is-invalid<?php endif ?>"
                            name="pcmm" aria-describedby="pcmm"
                            placeholder="Предмет, циљ и методе мастер рада:"
                            <?php $obrazlozenje_pcmm = $studentska_sluzba['predmet_cilj_metode'] ?? '' ?>><?= $obrazlozenje_pcmm ?></textarea>
                    </div>

                </div>
                <div class="col-sm-6 col-xs-12">

                    <div class="form-group mb-3">
                        <label for="sorm">Садржај и очекивани резултати мастер рада:</label>
                        <textarea type="text" rows="7"
                            class="form-control <?php if (session('errors.sorm')) : ?>is-invalid<?php endif ?>"
                            name="sorm" aria-describedby="sorm"
                            placeholder="Садржај и очекивани резултати мастер рада:"
                            <?php $obrazlozenje_sorm = $studentska_sluzba['sadrzaj_ocekivani_rezultat'] ?? '' ?>><?= $obrazlozenje_sorm ?></textarea>
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
        </form>
    </div>
</div>


<script>
function student() {
    document.getElementById('student').click();
};

function mentor() {
    document.getElementById('mentor').click();
};

function rukovodilac() {
    document.getElementById('rukovodilac').click();
};

function studentska_sluzba() {
    document.getElementById('studentska_sluzba').click();
};
</script>

<?php $this->endSection(); ?>