<?php
$this->extend('layout');
$this->section('sidebar');
?>
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Корисник
            </div>
            <a class="nav-link" href="index.html">
            </a>
            <div class="sb-sidenav-menu-heading">Статус пријаве
            </div>
            <a class="nav-link" href="index.html">
                Негде тамо далеко
            </a>
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

<?php $this->endSection(); ?>

<?php
$this->section('content');
?>

<h1 class="mt-4">Портал за рад са студентима</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Студентске пријаве</li>
</ol>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-dark text-white mb-4">
            <div class="card-body">Информације за студенте</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="https://www.etf.bg.ac.rs/sr/studiranje">Сазнајте више</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-dark text-white mb-4">
            <div class="card-body">Факултет</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="https://www.etf.bg.ac.rs/sr/fakultet">Сазнајте више</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-dark text-white mb-4">
            <div class="card-body">Студентска служба</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="https://www.etf.bg.ac.rs/sr/sluzbe">Сазнајте више</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-dark text-white mb-4">
            <div class="card-body">Упис</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="https://www.etf.bg.ac.rs/sr/upis">Сазнајте више</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->endSection(); ?>