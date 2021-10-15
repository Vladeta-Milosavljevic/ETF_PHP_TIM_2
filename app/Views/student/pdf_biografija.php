<?php
$this->extend('layout');
$this->section('sidebar');
echo view('student/menu');
$this->endSection();

$this->section('content');
?>

<div id="element" style="font-family: Times New Roman, Times, serif;">
    <div class="cotainer col-11">
        <div class="row justify-content-center">

            <div class="form-group text-center row mb-0">
                <div>
                    <label for="name_phone_number" class="col-md-11 col-form-label text-md-center">
                        <span style="font-size: 11pt"><b>УНИВЕРЗИТЕТ У БЕОГРАДУ
                                - ЕЛЕКТРОТЕХНИЧКИ ФАКУЛТЕТ</b></span></br>
                        <span style="font-size: 10pt">Булевар краља Александра
                            73, 11000 Београд, Србија</span></br>
                        <span style="font-size: 10pt">Тел. 011/324-8464, Факс:
                            011/324-8681</span>
                    </label>
                </div>

                <div class="row tekst mb-2 mt-4">
                    <div class="col-12 p-1 " style="font-size: 16pt"><b>БИОГРАФИЈА</b>
                    </div>
                    <div class="col-1 p-1 ">
                    </div>
                    <div class="col-10 p-1  mt-2 text-break">
                        <?= $biografija['tekst'] ?>
                    </div>
                    <div class="col-1 p-1 ">

                    </div>
                </div>

                <div class="row tekst mb-3 mt-5">
                    <div class="col-8 p-1 "></div>
                    <div class="col-4 p-1 "><b>(потпис
                            студента)</b>
                    </div>

                </div>
                <div class="row tekst">
                    <div class="col-8 p-1 "></div>
                    <div class="col-4 p-1 linija-do ">
                    </div>
                </div>

                <div class="row tekst">
                    <div class="col-8 p-1 "></div>
                    <div class="col-4 p-1 ">Дипл.
                        инж. Име Презиме
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
</div>

<button class="btn btn-light mt-3" onclick="printDiv('element')">skini pdf</button>

<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
</script>

<?php $this->endSection(); ?>