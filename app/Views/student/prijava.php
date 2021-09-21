<?php
$this->extend('layout');
$this->section('sidebar');
echo view('student/menu');
$this->endSection();

$this->section('content');
?>

<h1 class="mt-4">Пријава</h1>
<br>

<div class="container">
    <form action="<?= route_to('movies/create') ?>" method="post">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <?= view('Myth\Auth\Views\_message_block') ?>
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="ime">Име и презиме студента</label>
                    <input type="text"
                        class="form-control <?php if (session('errors.ime')) : ?>is-invalid<?php endif ?>"
                        name="ime" aria-describedby="ime" placeholder="Име и презиме студента"
                        value="<?= old('ime') ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="index">Број индекса</label>
                    <input type="text"
                        class="form-control <?php if (session('errors.index')) : ?>is-invalid<?php endif ?>"
                        name="index" aria-describedby="index" placeholder="Број индекса"
                        value="<?= old('index') ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="ipms">Изборно подручје мастер студија</label>
                    <input type="text"
                        class="form-control <?php if (session('errors.ipms')) : ?>is-invalid<?php endif ?>"
                        name="ipms" aria-describedby="ipms"
                        placeholder="Изборно подручје мастер студија" value="<?= old('ipms') ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="rukovodilac">Име и презиме руководиоца рада</label>
                    <input type="text"
                        class="form-control <?php if (session('errors.rukovodilac')) : ?>is-invalid<?php endif ?>"
                        name="rukovodilac" aria-describedby="rukovodilac"
                        placeholder="Име и презиме руководиоца рада"
                        value="<?= old('rukovodilac') ?>">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios"
                        id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Руководилац рада је ангажован на изборном подручју мастер студија
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios"
                        id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Руководилац рада није ангажован на изборном подручју мастер студија али је
                        кандидат код њега положио предмет
                    </label>
                </div>
                <div class="form-group">
                    <input type="text"
                        class="form-control <?php if (session('errors.predmet')) : ?>is-invalid<?php endif ?>"
                        name="predmet" aria-describedby="predmet"
                        placeholder="Kандидат је положио предмет" value="<?= old('predmet') ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="naslov_sr">Наслов мастер рада на српском језику (написан
                        ћирилицом)</label>
                    <input type="text"
                        class="form-control <?php if (session('errors.naslov_sr')) : ?>is-invalid<?php endif ?>"
                        name="naslov_sr" aria-describedby="naslov_sr"
                        placeholder="Наслов мастер рада на српском језику (написан ћирилицом)"
                        value="<?= old('naslov_sr') ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="naslov_en">Наслов мастер рада на енглеском језику </label>
                    <input type="text"
                        class="form-control <?php if (session('errors.naslov_en')) : ?>is-invalid<?php endif ?>"
                        name="naslov_en" aria-describedby="naslov_en"
                        placeholder="Наслов мастер рада на енглеском језику"
                        value="<?= old('naslov_en') ?>">
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">

                <div class="form-group">
                    <label for="komisija">Предлог Комисије за преглед и оцену </label>

                    <input type="text"
                        class="form-control <?php if (session('errors.clan1')) : ?>is-invalid<?php endif ?>"
                        name="clan1" aria-describedby="komisija" placeholder="Руководилац рада"
                        value="<?= old('clan1') ?>">
                    <br>
                    <input type="text"
                        class="form-control <?php if (session('errors.clan2')) : ?>is-invalid<?php endif ?>"
                        name="clan2" aria-describedby="komisija" placeholder="Други члан комисије"
                        value="<?= old('clan2') ?>">
                    <br>
                    <input type="text"
                        class="form-control <?php if (session('errors.clan3')) : ?>is-invalid<?php endif ?>"
                        name="clan3" aria-describedby="komisija" placeholder="Трећи члан комисије"
                        value="<?= old('clan3') ?>">
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
<br>
<button type="submit" class="btn btn-primary btn-block">Пошаљите пријаву</button>

<?php $this->endSection(); ?>