<?php
$this->extend('layout');
$this->section('sidebar');
echo view('student/menu');
$this->endSection();

$this->section('content');
?>

<h1 class="mt-4">Биографија</h1>
<br>

<div class="container">
    <form action="<?= route_to('student/biografija_sacuvaj') ?>" method="post">
        <div class="row">
            <?= view('Myth\Auth\Views\_message_block') ?>
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="biografija">Унесите вашу биографију</label>
                <textarea type="text" rows="10"
                    class="form-control mb-3 <?php if (session('errors.biografija')) : ?>is-invalid<?php endif ?>"
                    name="tekst" aria-describedby="biografija" placeholder="Унесите вашу биографију"
                    value="<?= old('biografija') ?>"></textarea>
            </div>

            <h3 class="mt-6">Коментари</h3>
            <div class="form-group">
                <label for="komentari"></label>
                <textarea type="text" rows="12"
                    class="form-control <?php if (session('errors.komentari')) : ?>is-invalid<?php endif ?>"
                    name="komentari" aria-describedby="komentari" placeholder="Коментари"
                    value="<?= old('komentari') ?>"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Пошаљите биографију</button>
    </form>
</div>
<br>


<?php $this->endSection(); ?>