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
                            <?php $prijava_ime = $student['ime_prezime'] ?? '' ?>
                            value="<?= $prijava_ime ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="indeks">Број индекса</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.indeks')) : ?>is-invalid<?php endif ?>"
                            name="indeks" aria-describedby="indeks" placeholder="Број индекса"
                            <?php $prijava_indeks =  $student['indeks'] ?? '' ?>
                            value="<?= $prijava_indeks ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="ipms">Изборно подручје мастер студија</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.ipms')) : ?>is-invalid<?php endif ?>"
                            name="ipms" aria-describedby="ipms"
                            placeholder="Изборно подручје мастер студија"
                            <?php $prijava_ipms = $student['izborno_podrucje_MS'] ?? '' ?>
                            value="<?= $prijava_ipms ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="rukovodilac">Име и презиме руководиоца рада (ментора)</label>
                        <select
                            class="form-control <?php if (session('errors.rukRada')) : ?>is-invalid<?php endif ?>"
                            id="rukRada" name="rukRada">
                            <?php foreach ($mentor_ime as $m) : ?>
                            <option value="<?= $m['id'] ?>"
                                <?php if ($m['id'] == $tema['id_mentor']) : ?>
                                selected<?php endif; ?>>
                                <?= $m['username'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="izbor"
                            onclick="rukPredmet()" id="izbor1" value="option1"
                            <?php if (!$student['ruk_predmet']) : ?> checked <?php endif ?>>
                        <label class="form-check-label" for="izbor1">
                            Руководилац рада је ангажован на изборном подручју мастер студија
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="izbor"
                            onclick="rukPredmet()" id="izbor2" value="option2"
                            <?php if ($student['ruk_predmet']) : ?> checked <?php endif ?>>
                        <label class="form-check-label" for="izbor2">
                            Руководилац рада није ангажован на изборном подручју мастер студија али
                            је
                            кандидат код њега положио предмет
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="text" id='predmet' <?php if (!$student['ruk_predmet']) : ?>
                            disabled <?php endif ?>
                            class="form-control <?php if (session('errors.predmet')) : ?>is-invalid<?php endif ?>"
                            name="predmet" aria-describedby="predmet"
                            placeholder="Kандидат је положио предмет"
                            <?php $prijava_predmet = $student['ruk_predmet'] ?? '' ?>
                            value="<?= $prijava_predmet ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="naslov_sr">Наслов мастер рада на српском језику (написан
                            ћирилицом)</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.naslov_sr')) : ?>is-invalid<?php endif ?>"
                            name="naslov_sr" aria-describedby="naslov_sr"
                            placeholder="Наслов мастер рада на српском језику (написан ћирилицом)"
                            <?php $prijava_naslov_sr = $student['naslov'] ?? '' ?>
                            value="<?= $prijava_naslov_sr ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="naslov_en">Наслов мастер рада на енглеском језику </label>
                        <input type="text"
                            class="form-control <?php if (session('errors.naslov_en')) : ?>is-invalid<?php endif ?>"
                            name="naslov_en" aria-describedby="naslov_en"
                            placeholder="Наслов мастер рада на енглеском језику"
                            <?php $prijava_naslov_en = $student['naslov_eng'] ?? '' ?>
                            value="<?= $prijava_naslov_en ?>">
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
                            <?php foreach ($mentor_ime as $m) : ?>
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
                            <?php foreach ($mentor_ime as $m) : ?>
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
                            <?php $prijava_date = $student['datum'] ?? '' ?> name="date"
                            placeholder="Date" value="<?= $prijava_date ?>">
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
                            <?php $prijava_ime = $mentor['ime_prezime'] ?? '' ?>
                            value="<?= $prijava_ime ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="indeks">Број индекса</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.indeks')) : ?>is-invalid<?php endif ?>"
                            name="indeks" aria-describedby="indeks" placeholder="Број индекса"
                            <?php $prijava_indeks =  $mentor['indeks'] ?? '' ?>
                            value="<?= $prijava_indeks ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="ipms">Изборно подручје мастер студија</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.ipms')) : ?>is-invalid<?php endif ?>"
                            name="ipms" aria-describedby="ipms"
                            placeholder="Изборно подручје мастер студија"
                            <?php $prijava_ipms = $mentor['izborno_podrucje_MS'] ?? '' ?>
                            value="<?= $prijava_ipms ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="rukovodilac">Име и презиме руководиоца рада (ментора)</label>
                        <select
                            class="form-control <?php if (session('errors.rukRada')) : ?>is-invalid<?php endif ?>"
                            id="rukRada" name="rukRada">
                            <?php foreach ($mentor_ime as $m) : ?>
                            <option value="<?= $m['id'] ?>"
                                <?php if ($m['id'] == $tema['id_mentor']) : ?>
                                selected<?php endif; ?>>
                                <?= $m['username'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="izbor"
                            onclick="rukPredmet()" id="izbor1" value="option1"
                            <?php if (!$mentor['ruk_predmet']) : ?> checked <?php endif ?>>
                        <label class="form-check-label" for="izbor1">
                            Руководилац рада је ангажован на изборном подручју мастер студија
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="izbor"
                            onclick="rukPredmet()" id="izbor2" value="option2"
                            <?php if ($mentor['ruk_predmet']) : ?> checked <?php endif ?>>
                        <label class="form-check-label" for="izbor2">
                            Руководилац рада није ангажован на изборном подручју мастер студија али
                            је
                            кандидат код њега положио предмет
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="text" id='predmet' <?php if (!$mentor['ruk_predmet']) : ?>
                            disabled <?php endif ?>
                            class="form-control <?php if (session('errors.predmet')) : ?>is-invalid<?php endif ?>"
                            name="predmet" aria-describedby="predmet"
                            placeholder="Kандидат је положио предмет"
                            <?php $prijava_predmet = $mentor['ruk_predmet'] ?? '' ?>
                            value="<?= $prijava_predmet ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="naslov_sr">Наслов мастер рада на српском језику (написан
                            ћирилицом)</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.naslov_sr')) : ?>is-invalid<?php endif ?>"
                            name="naslov_sr" aria-describedby="naslov_sr"
                            placeholder="Наслов мастер рада на српском језику (написан ћирилицом)"
                            <?php $prijava_naslov_sr = $mentor['naslov'] ?? '' ?>
                            value="<?= $prijava_naslov_sr ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="naslov_en">Наслов мастер рада на енглеском језику </label>
                        <input type="text"
                            class="form-control <?php if (session('errors.naslov_en')) : ?>is-invalid<?php endif ?>"
                            name="naslov_en" aria-describedby="naslov_en"
                            placeholder="Наслов мастер рада на енглеском језику"
                            <?php $prijava_naslov_en = $mentor['naslov_eng'] ?? '' ?>
                            value="<?= $prijava_naslov_en ?>">
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
                            <?php foreach ($mentor_ime as $m) : ?>
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
                            <?php foreach ($mentor_ime as $m) : ?>
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
                            <?php $prijava_date = $mentor['datum'] ?? '' ?> name="date"
                            placeholder="Date" value="<?= $prijava_date ?>">
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
                            <?php $prijava_ime = $rukovodilac['ime_prezime'] ?? '' ?>
                            value="<?= $prijava_ime ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="indeks">Број индекса</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.indeks')) : ?>is-invalid<?php endif ?>"
                            name="indeks" aria-describedby="indeks" placeholder="Број индекса"
                            <?php $prijava_indeks =  $rukovodilac['indeks'] ?? '' ?>
                            value="<?= $prijava_indeks ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="ipms">Изборно подручје мастер студија</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.ipms')) : ?>is-invalid<?php endif ?>"
                            name="ipms" aria-describedby="ipms"
                            placeholder="Изборно подручје мастер студија"
                            <?php $prijava_ipms = $rukovodilac['izborno_podrucje_MS'] ?? '' ?>
                            value="<?= $prijava_ipms ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="rukovodilac">Име и презиме руководиоца рада (ментора)</label>
                        <select
                            class="form-control <?php if (session('errors.rukRada')) : ?>is-invalid<?php endif ?>"
                            id="rukRada" name="rukRada">
                            <?php foreach ($mentor_ime as $m) : ?>
                            <option value="<?= $m['id'] ?>"
                                <?php if ($m['id'] == $tema['id_mentor']) : ?>
                                selected<?php endif; ?>>
                                <?= $m['username'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="izbor"
                            onclick="rukPredmet()" id="izbor1" value="option1"
                            <?php if (!$rukovodilac['ruk_predmet']) : ?> checked <?php endif ?>>
                        <label class="form-check-label" for="izbor1">
                            Руководилац рада је ангажован на изборном подручју мастер студија
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="izbor"
                            onclick="rukPredmet()" id="izbor2" value="option2"
                            <?php if ($rukovodilac['ruk_predmet']) : ?> checked <?php endif ?>>
                        <label class="form-check-label" for="izbor2">
                            Руководилац рада није ангажован на изборном подручју мастер студија али
                            је
                            кандидат код њега положио предмет
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="text" id='predmet' <?php if (!$rukovodilac['ruk_predmet']) : ?>
                            disabled <?php endif ?>
                            class="form-control <?php if (session('errors.predmet')) : ?>is-invalid<?php endif ?>"
                            name="predmet" aria-describedby="predmet"
                            placeholder="Kандидат је положио предмет"
                            <?php $prijava_predmet = $rukovodilac['ruk_predmet'] ?? '' ?>
                            value="<?= $prijava_predmet ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="naslov_sr">Наслов мастер рада на српском језику (написан
                            ћирилицом)</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.naslov_sr')) : ?>is-invalid<?php endif ?>"
                            name="naslov_sr" aria-describedby="naslov_sr"
                            placeholder="Наслов мастер рада на српском језику (написан ћирилицом)"
                            <?php $prijava_naslov_sr = $rukovodilac['naslov'] ?? '' ?>
                            value="<?= $prijava_naslov_sr ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="naslov_en">Наслов мастер рада на енглеском језику </label>
                        <input type="text"
                            class="form-control <?php if (session('errors.naslov_en')) : ?>is-invalid<?php endif ?>"
                            name="naslov_en" aria-describedby="naslov_en"
                            placeholder="Наслов мастер рада на енглеском језику"
                            <?php $prijava_naslov_en = $rukovodilac['naslov_eng'] ?? '' ?>
                            value="<?= $prijava_naslov_en ?>">
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
                            <?php foreach ($mentor_ime as $m) : ?>
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
                            <?php foreach ($mentor_ime as $m) : ?>
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
                            <?php $prijava_date = $rukovodilac['datum'] ?? '' ?> name="date"
                            placeholder="Date" value="<?= $prijava_date ?>">
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
                            <?php $prijava_ime = $studentska_sluzba['ime_prezime'] ?? '' ?>
                            value="<?= $prijava_ime ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="indeks">Број индекса</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.indeks')) : ?>is-invalid<?php endif ?>"
                            name="indeks" aria-describedby="indeks" placeholder="Број индекса"
                            <?php $prijava_indeks =  $studentska_sluzba['indeks'] ?? '' ?>
                            value="<?= $prijava_indeks ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="ipms">Изборно подручје мастер студија</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.ipms')) : ?>is-invalid<?php endif ?>"
                            name="ipms" aria-describedby="ipms"
                            placeholder="Изборно подручје мастер студија"
                            <?php $prijava_ipms = $studentska_sluzba['izborno_podrucje_MS'] ?? '' ?>
                            value="<?= $prijava_ipms ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="rukovodilac">Име и презиме руководиоца рада (ментора)</label>
                        <select
                            class="form-control <?php if (session('errors.rukRada')) : ?>is-invalid<?php endif ?>"
                            id="rukRada" name="rukRada">
                            <?php foreach ($mentor_ime as $m) : ?>
                            <option value="<?= $m['id'] ?>"
                                <?php if ($m['id'] == $tema['id_mentor']) : ?>
                                selected<?php endif; ?>>
                                <?= $m['username'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="izbor"
                            onclick="rukPredmet()" id="izbor1" value="option1"
                            <?php if (!$studentska_sluzba['ruk_predmet']) : ?> checked
                            <?php endif ?>>
                        <label class="form-check-label" for="izbor1">
                            Руководилац рада је ангажован на изборном подручју мастер студија
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="izbor"
                            onclick="rukPredmet()" id="izbor2" value="option2"
                            <?php if ($studentska_sluzba['ruk_predmet']) : ?> checked
                            <?php endif ?>>
                        <label class="form-check-label" for="izbor2">
                            Руководилац рада није ангажован на изборном подручју мастер студија али
                            је
                            кандидат код њега положио предмет
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="text" id='predmet'
                            <?php if (!$studentska_sluzba['ruk_predmet']) : ?> disabled
                            <?php endif ?>
                            class="form-control <?php if (session('errors.predmet')) : ?>is-invalid<?php endif ?>"
                            name="predmet" aria-describedby="predmet"
                            placeholder="Kандидат је положио предмет"
                            <?php $prijava_predmet = $studentska_sluzba['ruk_predmet'] ?? '' ?>
                            value="<?= $prijava_predmet ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="naslov_sr">Наслов мастер рада на српском језику (написан
                            ћирилицом)</label>
                        <input type="text"
                            class="form-control <?php if (session('errors.naslov_sr')) : ?>is-invalid<?php endif ?>"
                            name="naslov_sr" aria-describedby="naslov_sr"
                            placeholder="Наслов мастер рада на српском језику (написан ћирилицом)"
                            <?php $prijava_naslov_sr = $studentska_sluzba['naslov'] ?? '' ?>
                            value="<?= $prijava_naslov_sr ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="naslov_en">Наслов мастер рада на енглеском језику </label>
                        <input type="text"
                            class="form-control <?php if (session('errors.naslov_en')) : ?>is-invalid<?php endif ?>"
                            name="naslov_en" aria-describedby="naslov_en"
                            placeholder="Наслов мастер рада на енглеском језику"
                            <?php $prijava_naslov_en = $studentska_sluzba['naslov_eng'] ?? '' ?>
                            value="<?= $prijava_naslov_en ?>">
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
                            <?php foreach ($mentor_ime as $m) : ?>
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
                            <?php foreach ($mentor_ime as $m) : ?>
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
                            <?php $prijava_date = $studentska_sluzba['datum'] ?? '' ?> name="date"
                            placeholder="Date" value="<?= $prijava_date ?>">
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

        </form>
    </div>
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