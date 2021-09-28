<?php if (session()->has('message')) : ?>
<div class="alert alert-success">
    <?= session('message') ?>
</div>
<?php endif ?>

<?php if (session()->has('message_danger')) : ?>
<div class="alert alert-danger">
    <?= session('message') ?>
</div>
<?php endif ?>

<?php if (session()->has('message_warning')) : ?>
<div class="alert alert-warning">
    <?= session('message') ?>
</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
<div class="alert alert-danger">
    <?= session('error') ?>
</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
<ul class="alert alert-danger">
    <?php foreach (session('errors') as $error) : ?>
    <li><?= $error ?></li>
    <?php endforeach ?>
</ul>
<?php endif ?>