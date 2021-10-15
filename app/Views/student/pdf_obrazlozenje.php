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

                <div class="row tekst mt-4">
                    <div class="col-1 p-1 pl-0 ml-0 linija-do text-start"><b>Кандидат</b>
                    </div>
                    <div class="col-3 linija-do p-1 "><?= $prijava['ime_prezime'] ?>
                    </div>
                    <div class="col-8 linija-do p-1 ">
                    </div>
                </div>

                <div class="row tekst mt-2">
                    <div class="col-2 p-1  linija-do text-start "><b>Број индекса</b>
                    </div>
                    <div class="col-3 p-1  linija-do text-start"><?= $prijava['indeks'] ?>
                    </div>
                    <div class="col-1 p-1  linija-do"><b>Модул</b>
                    </div>
                    <div class="col-3 p-1  linija-do"><?= $modul['naziv'] ?>
                    </div>
                    <div class="col-3 p-1  linija-do">
                    </div>
                </div>

                <div class="row tekst  mt-2">
                    <div class="col-12  p-3 "><b>КОМИСИЈИ
                            ЗА СТУДИЈЕ II СТЕПЕНА АКАДЕМСКИХ
                            СТУДИЈА</b>

                    </div>

                    <div class="row tekst mb-2 mt-2">
                        <div class="col-2 p-1  text-start"><b>Предмет:</b>
                        </div>
                        <div class="col-10 p-1 ">
                        </div>
                        <div class="col-1 p-1 ">
                        </div>
                        <div class="col-6 p-1 text-start">Пријава
                            теме за израду мастер рада под
                            насловом:
                        </div>
                        <div class="col-5 p-1">
                        </div>
                        <div class="col-12 p-1 text-break"><?= $obrazlozenje['predmet'] ?>
                        </div>
                    </div>

                    <div class="row tekst mb-2">
                        <div class="col-3 p-1  text-start"><b>Област
                                мастер рада:</b>
                        </div>
                        <div class="col-9 p-1 ">
                        </div>
                        <div class="col-1 p-1 ">
                        </div>
                        <div class="col-6 p-1 mt-2 text-start">Наведена
                            тема мастер рада припада
                            области:
                        </div>
                        <div class="col-5 p-1 ">
                        </div>
                        <div class="col-12 p-1 mt-2 text-break"><?= $obrazlozenje['oblast_rada'] ?>
                        </div>
                    </div>

                    <div class="row tekst mb-2">
                        <div class="col-12 p-1 text-start"><b>Предмет,
                                циљ и методе мастер рада:</b>
                        </div>
                        <div class="col-1 p-1 ">
                        </div>
                        <div class="col-10 p-1 text-start mt-2 text-break">
                            <?= $obrazlozenje['predmet_cilj_metode'] ?>
                        </div>
                        <div class="col-1 p-1 ">

                        </div>
                    </div>

                    <div class="row tekst mb-2 mt-2">
                        <div class="col-12 p-1 text-start"><b>Садржај
                                и очекивани резултати мастер
                                рада:</b>
                        </div>
                        <div class="col-2 p-1 ">
                        </div>
                        <div class="col-8 p-1 mt-2 text-start text-break">
                            <?= $obrazlozenje['sadrzaj_ocekivani_rezultat'] ?>
                        </div>
                        <div class="col-2 p-1 ">
                        </div>
                    </div>


                    <div class="row tekst">
                        <div class="col-3 p-1 "><b>Предложени
                                ментор: </b>
                        </div>
                        <div class="col-3 p-1 "></div>
                        <div class="col-2 p-1 "></div>
                        <div class="col-4 p-1 "><b>Кандидат:</b>
                        </div>

                    </div>
                    <div class="row tekst mb-3">
                        <div class="col-3 p-1 "><b>(потпис
                                ментора) </b>
                        </div>
                        <div class="col-3 p-1 "></div>
                        <div class="col-2 p-1 "></div>
                        <div class="col-4 p-1 "><b>(потпис
                                студента)</b>
                        </div>

                    </div>
                    <div class="row tekst">
                        <div class="col-3 p-1 linija-do">
                        </div>
                        <div class="col-3 p-1 "></div>
                        <div class="col-2 p-1 "></div>
                        <div class="col-4 p-1 linija-do ">
                        </div>
                    </div>

                    <div class="row tekst">
                        <div class="col-3 p-1 ">Др
                            Име Презиме, звање
                        </div>
                        <div class="col-3 p-1 "></div>
                        <div class="col-2 p-1 "></div>
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