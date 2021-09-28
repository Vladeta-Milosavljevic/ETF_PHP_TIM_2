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
    <form action="<?= route_to('student/prijava_azuriraj_sacuvaj') ?>" method="post">
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
                        value="<?= $prijava['ime_prezime'] ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="indeks">Број индекса</label>
                    <input type="text"
                        class="form-control <?php if (session('errors.indeks')) : ?>is-invalid<?php endif ?>"
                        name="indeks" aria-describedby="indeks" placeholder="Број индекса"
                        value="<?= $prijava['indeks'] ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="ipms">Изборно подручје мастер студија</label>
                    <input type="text"
                        class="form-control <?php if (session('errors.ipms')) : ?>is-invalid<?php endif ?>"
                        name="ipms" aria-describedby="ipms"
                        placeholder="Изборно подручје мастер студија"
                        value="<?= $prijava['izborno_podrucje_MS'] ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="rukovodilac">Име и презиме руководиоца рада (ментора)</label>
                    <select
                        class="form-control <?php if (session('errors.rukRada')) : ?>is-invalid<?php endif ?>"
                        id="rukRada" name="rukRada">
                        <?php foreach ($mentor as $m) : ?>
                        <option value="<?= $m['id'] ?>"
                            <?php if ($m['id'] == $tema['id_mentor']) : ?> selected<?php endif; ?>>
                            <?= $m['username'] ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="izbor" onclick="rukPredmet()"
                        id="izbor1" value="option1" checked>
                    <label class="form-check-label" for="izbor1">
                        Руководилац рада је ангажован на изборном подручју мастер студија
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="izbor" onclick="rukPredmet()"
                        id="izbor2" value="option2">
                    <label class="form-check-label" for="izbor2">
                        Руководилац рада није ангажован на изборном подручју мастер студија али је
                        кандидат код њега положио предмет
                    </label>
                </div>
                <div class="form-group">
                    <input type="text" id='predmet' disabled
                        class="form-control <?php if (session('errors.predmet')) : ?>is-invalid<?php endif ?>"
                        name="predmet" aria-describedby="predmet"
                        placeholder="Kандидат је положио предмет"
                        value="<?= $prijava['ruk_predmet'] ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="naslov_sr">Наслов мастер рада на српском језику (написан
                        ћирилицом)</label>
                    <input type="text"
                        class="form-control <?php if (session('errors.naslov_sr')) : ?>is-invalid<?php endif ?>"
                        name="naslov_sr" aria-describedby="naslov_sr"
                        placeholder="Наслов мастер рада на српском језику (написан ћирилицом)"
                        value="<?= $prijava['naslov'] ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="naslov_en">Наслов мастер рада на енглеском језику </label>
                    <input type="text"
                        class="form-control <?php if (session('errors.naslov_en')) : ?>is-invalid<?php endif ?>"
                        name="naslov_en" aria-describedby="naslov_en"
                        placeholder="Наслов мастер рада на енглеском језику"
                        value="<?= $prijava['naslov_eng'] ?>">
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">

                <div class="form-group">
                    <label for="komisija">Предлог Комисије за преглед и оцену </label>
                    <br>

                    <label for="clan1" class="mt-3">Руководилац рада је први члан</label>
                    <br>

                    <label for="clan2" class="mt-3">Други члан комисије</label>
                    <select
                        class="form-control <?php if (session('errors.clan2')) : ?>is-invalid<?php endif ?> mt-3"
                        id="clan2" name="clan2">
                        <?php foreach ($mentor as $m) : ?>
                        <option value="<?= $m['id'] ?>"
                            <?php if ($m['id'] == $komisija['id_clan_2']) : ?>
                            selected<?php endif; ?>><?= $m['username'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label for="clan3">Трећи члан комисије</label>
                    <select
                        class="form-control <?php if (session('errors.clan3')) : ?>is-invalid<?php endif ?>"
                        id="clan3" name="clan3">
                        <?php foreach ($mentor as $m) : ?>
                        <option value="<?= $m['id'] ?>"
                            <?php if ($m['id'] == $komisija['id_clan_3']) : ?>
                            selected<?php endif; ?>><?= $m['username'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                </div>

                <div class="form-group">
                    <label for="date">Датум</label>
                    <input type="date"
                        class="form-control <?php if (session('errors.date')) : ?>is-invalid<?php endif ?>"
                        name="date" placeholder="Date" value="<?= $prijava['datum'] ?>">
                </div>
                <br>
                <h3 class="mt-6">Коментари</h3>
                <div class="form-group">
                    <label for="komentari"></label>
                    <textarea type="text" rows="12"
                        class="form-control <?php if (session('errors.komentari')) : ?>is-invalid<?php endif ?> mb-3"
                        name="komentari" aria-describedby="komentari" placeholder="Коментари"
                        value="<?= old('komentari') ?>"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Ажурирајте пријаву</button>
    </form>
</div>




<script>
function rukPredmet() {
    var izbor2 = document.getElementById("izbor2");
    var predmet = document.getElementById("predmet");
    predmet.disabled = izbor2.checked ? false : true;
    predmet.value = "";
    if (!predmet.disabled) {
        predmet.focus();
    }
}
</script>
<?php $this->endSection(); ?>