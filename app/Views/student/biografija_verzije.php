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
                <?= view('Myth\Auth\Views\_message_block') ?>
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="biografija">Унесите вашу биографију</label>
                    <textarea type="text" rows="10"
                        class="form-control mb-3 <?php if (session('errors.biografija')) : ?>is-invalid<?php endif ?>"
                        name="tekst" aria-describedby="biografija"
                        placeholder="Унесите вашу биографију"
                        <?php $biografija_tekst = $student['tekst'] ?? '' ?>><?= $biografija_tekst ?></textarea>
                </div>

                <h3 class="mt-6">Коментари</h3>
                <div class="form-group">
                    <label for="komentari"></label>
                    <textarea type="text" rows="12"
                        class="form-control <?php if (session('errors.komentari')) : ?>is-invalid<?php endif ?> mb-3"
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
                <?= view('Myth\Auth\Views\_message_block') ?>
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="biografija">Унесите вашу биографију</label>
                    <textarea type="text" rows="10"
                        class="form-control mb-3 <?php if (session('errors.biografija')) : ?>is-invalid<?php endif ?>"
                        name="tekst" aria-describedby="biografija"
                        placeholder="Унесите вашу биографију"
                        <?php $biografija_tekst = $mentor['tekst'] ?? '' ?>><?= $biografija_tekst ?></textarea>
                </div>

                <h3 class="mt-6">Коментари</h3>
                <div class="form-group">
                    <label for="komentari"></label>
                    <textarea type="text" rows="12"
                        class="form-control <?php if (session('errors.komentari')) : ?>is-invalid<?php endif ?> mb-3"
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
                <?= view('Myth\Auth\Views\_message_block') ?>
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="biografija">Унесите вашу биографију</label>
                    <textarea type="text" rows="10"
                        class="form-control mb-3 <?php if (session('errors.biografija')) : ?>is-invalid<?php endif ?>"
                        name="tekst" aria-describedby="biografija"
                        placeholder="Унесите вашу биографију"
                        <?php $biografija_tekst = $rukovodilac['tekst'] ?? '' ?>><?= $biografija_tekst ?></textarea>
                </div>

                <h3 class="mt-6">Коментари</h3>
                <div class="form-group">
                    <label for="komentari"></label>
                    <textarea type="text" rows="12"
                        class="form-control <?php if (session('errors.komentari')) : ?>is-invalid<?php endif ?> mb-3"
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
                <?= view('Myth\Auth\Views\_message_block') ?>
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="biografija">Унесите вашу биографију</label>
                    <textarea type="text" rows="10"
                        class="form-control mb-3 <?php if (session('errors.biografija')) : ?>is-invalid<?php endif ?>"
                        name="tekst" aria-describedby="biografija"
                        placeholder="Унесите вашу биографију"
                        <?php $biografija_tekst = $studentska_sluzba['tekst'] ?? '' ?>><?= $biografija_tekst ?></textarea>
                </div>

                <h3 class="mt-6">Коментари</h3>
                <div class="form-group">
                    <label for="komentari"></label>
                    <textarea type="text" rows="12"
                        class="form-control <?php if (session('errors.komentari')) : ?>is-invalid<?php endif ?> mb-3"
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