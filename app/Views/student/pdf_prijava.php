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
                <div class="form-group row mb-0 text-center">
                    <label for="headline" class="col-md-12 col-form-label text-md-center"
                        style="font-family: Times New Roman, Times, serif; font-size: 18px;"><u><i><b>Пријава
                                    теме за израду мастер рада</b></u></i></label>
                </div>
            </div>




            <div class="row tekst">
                <div class="col-4 p-1 linija-g  linija-l linija-do linija-de">Име и
                    презиме
                    студента:</div>
                <div class="col-8 p-1 linija-g linija-do linija-de"><?= $prijava['ime_prezime'] ?>
                </div>
            </div>

            <div class="row tekst ">
                <div class="col-4 p-1 linija-l linija-de linija-do">Број индекса:
                </div>
                <div class="col-8 p-1 linija-de linija-do"><?= $prijava['indeks'] ?></div>
            </div>

            <div class="row tekst">
                <div class="col-4 p-1 linija-l linija-de linija-do">Изборно подручје
                    мастер
                    студија:</div>
                <div class="col-8 p-1 linija-de linija-do"><?= $prijava['izborno_podrucje_MS'] ?>
                </div>
            </div>

            <div class="row tekst">
                <div class="col-4 p-1 linija-l linija-de linija-do">Име и презиме
                    руководиоца
                    рада:</div>
                <div class="col-8 p-1 linija-de linija-do">
                    <?= $mentor['username'] ?>
                </div>
            </div>

            <div class="row tekst">
                <div class="col-1 p-1 text-center linija-l linija-de linija-do">
                    <?php if (!$prijava['ruk_predmet']) : ?>
                    <i class="fa fa-check" aria-hidden="true"></i>
                    <?php endif ?>
                </div>
                <div class="col-11 p-1 linija-de linija-do">Руководилац
                    рада је ангажован на изборном подручју мастер
                    студија</div>
            </div>

            <div class="row tekst">
                <div class="col-1 p-1 pb-3 text-center linija-l linija-de linija-do">
                    <?php if ($prijava['ruk_predmet']) : ?>
                    <i class="fa fa-check" aria-hidden="true"></i>
                    <?php endif ?>
                </div>
                <div class="col-11 p-1 pb-3 linija-de linija-do">Руководилац
                    рада није ангажован на изборном подручју мастер студија али
                    је кандидат код
                    њега положио предмет:
                    <?= $prijava['ruk_predmet'] ?? '' ?>
                </div>
            </div>

            <div class="row tekst">
                <div class="col-12 p-1 linija-l linija-de linija-do">Наслов мастер
                    рада на
                    српском језику (написан ћирилицом)</div>
            </div>
            <div class="row tekst">
                <div class="col-12 p-2 linija-l linija-de linija-do"><?= $prijava['naslov'] ?></div>
            </div>

            <div class="row tekst">
                <div class="col-12 p-1 linija-l linija-de linija-do">Наслов мастер
                    рада на
                    енглеском језику</div>
            </div>
            <div class="row tekst">
                <div class="col-12 p-2 linija-l linija-de linija-do"><?= $prijava['naslov_eng'] ?>
                </div>
            </div>

            <div class="row tekst">
                <div class="col-12 p-1 linija-l linija-de linija-do">Предлог
                    Комисије за
                    преглед и оцену</div>
            </div>

            <div class="row tekst">
                <div class="col-3 p-1 linija-l linija-do">1. Руководилац
                    рада</div>
                <div class="col-9 p-1 linija-de linija-do">
                    <?= $mentor['username'] ?>
                </div>
            </div>
            <div class="row tekst">
                <div class="col-1 p-1 linija-l linija-do ">2.</div>
                <div class="col-11 p-1 linija-de linija-do ">

                    <?= $clan2['username'] ?>

                </div>
            </div>
            <div class="row tekst">
                <div class="col-1 p-1 linija-l linija-do">3.</div>
                <div class="col-11 p-1 linija-de linija-do">
                    <?= $clan3['username'] ?>
                </div>
            </div>

            <div class="row tekst">
                <div class="col-2 p-1 linija-l  linija-do">
                    У Београду</div>
                <div class="col-2  p-1  linija-do"><?= $prijava['datum'] ?></div>
                <div class="col-1  p-1  linija-do">године</div>
                <div class="col-7 p-1  linija-de linija-do"></div>
            </div>

            <div class="row tekst">
                <div class="col-4 p-1 text-center linija-l linija-do">Кандидат
                </div>
                <div class="col-4 p-1 text-center linija-l linija-do">Руководилац
                    рада</div>
                <div class="col-4 p-1 text-center linija-l linija-de linija-do">
                    Руководилац изборног подручја</div>
            </div>

            <div class="row tekst">
                <div class="col-4 p-3 text-center linija-l linija-do">
                </div>
                <div class="col-4 p-3 text-center linija-l linija-do"></div>
                <div class="col-4 p-3 text-center linija-l linija-de linija-do">
                </div>
            </div>


            <div class="form-group row  mb-0 tekst"
                style="font-family: Times New Roman, Times, serif;">
                <label for="text_between_two_tables" class="col-sm-12 col-form-label mb-0"
                    style="font: bold">
                    <span><b>ПРИЛОЗИ</b></span></br>
                    <span>-образложење теме (са потписима предложеног
                        Руководиоца израде рада и кандидата)</span></br>
                    <span>-биографски подаци кандидата (са потписом
                        кандидата)</span>
                </label>
            </div>

            <div class="row tekst">
                <div class="col-12 p-1 linija-l linija-g linija-de linija-do">
                    ЗАКЉУЧАК КОМИСИЈЕ ЗА СТУДИЈЕ II СТЕПЕНА</div>
            </div>


            <div class="row tekst">
                <div class="col-1 p-1 text-center linija-l linija-de linija-do">
                </div>
                <div class="col-11  p-1 linija-de linija-do">Прихвата се</div>
            </div>
            <div class="row tekst">
                <div class="col-1 p-1 text-center linija-l linija-de linija-do">
                </div>
                <div class="col-11  p-1 linija-de linija-do">Одбија се</div>
            </div>
            <div class="row tekst">
                <div class="col-1 p-1 text-center linija-l linija-de linija-do">
                </div>
                <div class="col-11  p-1 linija-de linija-do">Прихвата се уз
                    сугестије</div>
            </div>

            <div class="row tekst">
                <div class="col-12 p-1 linija-l  linija-de linija-do ">
                    Образложење и сугестије</div>
            </div>

            <div class="row tekst">
                <div class="col-12 p-4 linija-l  linija-de "></div>
            </div>

            <div class="row tekst">
                <div class="col-2 p-1 linija-l linija-g  linija-do">
                    У Београду</div>
                <div class="col-2 p-1 linija-g  linija-do"></div>
                <div class="col-1 p-1 linija-g linija-do linija-de">године</div>
                <div class="col-7 p-1 linija-g  linija-de"></div>

            </div>

            <div class="row tekst">
                <div class="col-5 p-1 linija-l linija-do linija-de">
                    Председник Комисије</div>
                <div class="col-7  linija-do  linija-de"></div>
            </div>

            <div class="form-group row tekst mb-0">
                <label for="ending_form" class="col-md-2 col-form-label text-md-left"
                    style="font-family: Times New Roman, Times, serif; color: gray">Формулар
                    М01</label>
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