<?php
$this->extend('layout');
$this->section('sidebar');
echo view('student/menu');
$this->endSection();

$this->section('content');
?>

<h1 class="mt-4">Студентски портал</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Овај портал је намењен студентима за пријаву испита на мастер академским студијама</li>
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
<div>Налог - Студент</div>
<?= view('Myth\Auth\Views\_message_block') ?>

<?php $this->endSection(); ?>