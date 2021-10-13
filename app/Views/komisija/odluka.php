<?php
$this->extend('layout');
$this->section('sidebar');
$link = [
    'Насловна' => 'komisija/home',
    'Избор студента' => 'komisija/izbor_studenta',
];
?>

<link rel="stylesheet" href="style.css">

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Корисник
            </div>
            <a class="nav-link" href="index.html">
            </a>
            <div class="sb-sidenav-menu-heading">Статус пријаве
            </div>
            <?php foreach ($link as $text => $url) : ?>
            <li class="nav-item mx-0 mx-lg-1">
                <?= anchor($url, $text, ['class' => 'nav-link']) ?>
            </li>
            <?php endforeach; ?>
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

<h1 class="mt-4">Одредите одлуку о теми студента</h1>

<div class="container">
    <div class="row col-md-9 col-md-offset-2 custyle">
    
        <?php
        $con=mysqli_connect("localhost","root","","etfphpprojekat");
        $query = "SELECT *
                  FROM komisija join tema on (komisija.id_rad = tema.id) 
                  join prijava on (tema.id = prijava.id_rad) join users on (users.id = tema.id_student)"; 
        $result = mysqli_query($con, $query);
        echo "<table>"; 
        ?>
        <table class="table table-striped custab">
        <thead>
            <tr style="width:120%">
                <th class="text-center" style="width:5%">ID пред. комисије</th>
                <th class="text-center" style="width:5%">ID студента</th>
                <th class="text-center" style="width:20%">Аутор</th>
                <th class="text-center" style="width:30%">Назив теме</th>
                <th class="text-center" style="width:10%">Измене</th>
            </tr>
        </thead>
        <?php
        while($row = mysqli_fetch_array($result)){  
             
        echo "<tr>";
        echo "<td class='text-center'>" . $row['id_pred_kom'] . "</td>";
        echo "<td class='text-center'>" . $row['id'] . "</td>";
        echo "<td class='text-center'>" . $row['autor'] . "</td>";
        echo "<td class='text-center'>" . $row['naslov'] . "</td>";
        
        ?>       
        <td class="text-center">        
            <?php
            echo anchor('komisija/izbor_studenta/', 'измени', ['class' => 'btn btn-outline-dark ml-2']);
            ?>
        </td>

        <?php 
        echo "</tr>"; }
        echo "</table>";
        ?>
    </div>
</div>


<?php $this->endSection(); ?>