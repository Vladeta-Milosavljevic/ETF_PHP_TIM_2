<?php
$link = [
    'Насловна' => 'stsluzba/home',
    'Избор студента' => 'stsluzba/izbor_studenta',
    'Oдлука комисије' => 'stsluzba/odluka',
];
?>
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Корисник
            </div>
            <div class="nav-link" href="index.html">
                <?= user()->username; ?>
            </div>
            <div class="sb-sidenav-menu-heading">Операције
            </div>
            <?php foreach ($link as $text => $url) : ?>
            <li class="nav-item mx-0 mx-lg-1">
                <?= anchor($url, $text, ['class' => 'nav-link']) ?>
            </li>
            <?php endforeach; ?>

            <div class="sb-sidenav-menu-heading">Статус пријаве
            </div>

            <div class="sb-sidenav-menu-heading">Операције
            </div>
            <a class="nav-link" href="index.html">
                Пријава теме
            </a>
            <div class="sb-sidenav-menu-heading">Брисање теме
            </div>
            <a class="nav-link" href="index.html">
                Размислите прво
            </a>
        </div>
    </div>
</nav>