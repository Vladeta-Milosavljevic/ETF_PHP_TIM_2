<?php
$link = [
    'Насловна' => 'student/home',
    'Пријава' => 'student/prijava',
    'Образложење' => 'student/obrazlozenje',
    'Биографија' => 'student/biografija',
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
            <a class="nav-link" href="index.html">
                Негде тамо далеко
            </a>
            <div x-data="{ open: false }">
                <a x-on:click="open = !open" class="nav-link">Проследите тему ментору</a>

                <div x-show="open" class="nav-link">
                    <li class="nav-item mx-0 mx-lg-1">
                        <?= anchor('student/prosledi_mentoru', 'Потврдите', ['class' => 'nav-link']) ?>
                    </li>
                </div>
            </div>

            <div class="sb-sidenav-menu-heading">Брисање теме
            </div>
            <div class="sb-sidenav-menu-heading">Размислите прво
            </div>


            <div x-data="{ open: false }">
                <a x-on:click="open = !open" class="nav-link">Обришите пријављену тему</a>

                <div x-show="open" class="nav-link">
                    <li class="nav-item mx-0 mx-lg-1">
                        <?= anchor('student/brisanje_teme', 'Јесте ли сигурни?', ['class' => 'nav-link']) ?>
                    </li>
                </div>
            </div>
        </div>
    </div>
</nav>