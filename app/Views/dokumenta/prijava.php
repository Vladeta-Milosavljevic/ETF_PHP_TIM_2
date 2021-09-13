<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js">
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>

<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600"
        rel="stylesheet" type="text/css">
    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
        crossorigin="anonymous">
    <?php
    helper('html');
    helper('auth');
    echo link_tag('css/style.css');
    echo link_tag('css/styles.css');
    ?>

    <!-- Datepicker
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://www.eyecon.ro/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">  -->

    <title>Пријава</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Мастер студије</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="biografija.php">Биографија</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="obrazlozenje_teme.php">Образложење теме</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <main class="my-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Пријава</div>
                        <div class="card-body">
                            <form name="my-form" onsubmit="return validform()"
                                action="" method="">

                                <div class="form-group row mb-0">
                                    <div class="col-md-2">
                                        <img src="ETF.png"
                                            alt="elektrotehnicki fakultet"
                                            width="50%" class="img">
                                    </div>
                                    <div class="col-md-9">
                                        <label for="name_phone_number"
                                            class="col-md-11 col-form-label text-md-center">
                                            <span
                                                class="headline-university"><b>УНИВЕРЗИТЕТ
                                                    У БЕОГРАДУ - ЕЛЕКТРОТЕХНИЧКИ
                                                    ФАКУЛТЕТ</b></span></br>
                                            <span class="adress-tel">Булевар
                                                краља Александра 73, 11000
                                                Београд, Србија</span></br>
                                            <span class="adress-tel">Тел.
                                                011/324-8464, Факс:
                                                011/324-8681</span>
                                        </label>
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <label for="headline"
                                        class="col-md-12 col-form-label text-md-center app-theme"><u><i><b>Пријава
                                                    теме за израду мастер
                                                    рада</b></u></i></label>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="full_name"
                                        class="col-md-4 col-form-label text-md-left solid">Име
                                        и презиме студента:</label>
                                    <div class="col-md-8 solid">
                                        <input type="text" id="full_name"
                                            class="form-control noborder"
                                            name="full-name">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label for="index_number"
                                        class="col-md-4 col-form-label text-md-left solid">Број
                                        индекса:</label>
                                    <div class="col-md-8 solid">
                                        <input type="text" id="index_number"
                                            class="form-control noborder"
                                            name="index-number">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label for="work_area"
                                        class="col-md-4 col-form-label text-md-left solid">Изборно
                                        подручје мастер студија:</label>
                                    <div class="col-md-8 solid">
                                        <input type="text" id="work_area"
                                            class="form-control noborder"
                                            name="work-area">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label for="manager_name"
                                        class="col-md-4 col-form-label text-md-left solid">Име
                                        и презиме руководиоца рада:</label>
                                    <div class="col-md-8 solid">
                                        <input type="text" id="manager_name"
                                            class="form-control noborder">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-1 solid">
                                        <input type="checkbox" id="text_1"
                                            class="check">
                                    </div>
                                    <label for="text_1"
                                        class="col-md-7 col-form-label text-md-left solid-br">Руководилац
                                        рада је ангажован на изборном подручју
                                        мастер студија</label>
                                    <div class="col-md-4 solid-bl">
                                        <input type="text" id="text_1"
                                            class="form-control noborder">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-1 solid-bb">
                                        <input type="checkbox" id="text_2"
                                            class="check">
                                    </div>
                                    <label for="text_2"
                                        class="col-md-11 col-form-label text-md-left solid-bb">Руководилац
                                        рада није ангажован на изборном подручју
                                        мастер студија али је кандидат </label>
                                </div>

                                <!-- JavaScript for checkbox - only one can be checked -->
                                <script>
                                $(document).ready(function() {
                                    $('input:checkbox').click(
                                function() {
                                        $('input:checkbox').not(
                                            this).prop(
                                            'checked', false
                                            );
                                    });
                                });
                                </script>



                                <div class="form-group row mb-0">

                                    <div class="col-md-1 solid-bt">
                                        <!-- <input type="text" id="text_2" class="form-control noborder;"> -->
                                    </div>

                                    <label for="text_2"
                                        class="col-md-3 col-form-label text-md-left solid-bt-br">код
                                        њега положио предмет:</label>

                                    <div class="col-md-8 solid-bt-bl">
                                        <input type="text" id="text_2"
                                            class="form-control noborder"
                                            name="username">
                                    </div>

                                </div>



                                <div class="form-group row mb-0">
                                    <label for="work_headline"
                                        class="col-md-12 col-form-label text-md-left solid">Наслов
                                        мастер рада на српском језику (написан
                                        ћирилицом)</label>

                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 solid">
                                        <textarea rows="2" id="text_space"
                                            class="form-control noborder-padding"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label for="work_headline_eng"
                                        class="col-md-12 col-form-label text-md-left solid">Наслов
                                        мастер рада на енглеском језику</label>

                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 solid">
                                        <textarea rows="2" id="text_space"
                                            class="form-control noborder-padding"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label for="suggestion"
                                        class="col-md-12 col-form-label text-md-left solid">Предлог
                                        Комисије за преглед и оцену</label>

                                </div>


                                <div class="form-group row mb-0 solid">
                                    <label for="place_1"
                                        class="col-0 col-form-label ml-1 text-md-left">1.
                                        Руководилац рада</label>
                                    <div class="col-md-9">
                                        <input type="text" id="place_1"
                                            class="form-control noborder"
                                            name="username">
                                    </div>
                                </div>

                                <div class="form-group row mb-0 solid">
                                    <label for="place_2"
                                        class="col-0 col-form-label ml-1 text-md-left">2.</label>
                                    <div class="col-md-11">
                                        <input type="text" id="place_2"
                                            class="form-control noborder"
                                            name="username">
                                    </div>
                                </div>

                                <div class="form-group row mb-0 solid">
                                    <label for="place_3"
                                        class="col-0 col-form-label ml-1 text-md-left">3.</label>
                                    <div class="col-md-11">
                                        <input type="text" id="place_3"
                                            class="form-control noborder"
                                            name="username">
                                    </div>
                                </div>

                                <div class="form-group row mb-0 solid">
                                    <label for="city"
                                        class="col-md-2 col-form-label text-md-left">У
                                        Београду</label>
                                    <div class="well">
                                        <input type="date" id="date"
                                            class="form-control">
                                    </div>
                                    <label for="city"
                                        class="col-md-5 col-form-label text-md-left">године</label>
                                    <div class="col-md-2">
                                        <input type="text" id="city"
                                            class="form-control noborder"
                                            name="username">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label for="user_name"
                                        class="col-md-4 col-form-label text-md-center solid">Кандидат</label>
                                    <label for="user_name"
                                        class="col-md-4 col-form-label text-md-center solid">Руководилац
                                        рада</label>
                                    <label for="user_name"
                                        class="col-md-4 col-form-label text-md-center solid">Руководилац
                                        изборног подручја</label>

                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-4 solid">
                                        <input type="text" id="user_name"
                                            class="form-control noborder-text-center"
                                            name="username">
                                    </div>
                                    <div class="col-md-4 solid">
                                        <input type="text" id="user_name"
                                            class="form-control noborder-text-center"
                                            name="username">
                                    </div>
                                    <div class="col-md-4 solid">
                                        <input type="text" id="user_name"
                                            class="form-control noborder-text-center"
                                            name="username">
                                    </div>
                                </div>


                                <div class="form-group row mb-0 my-form">
                                    <label for="text_between_two_tables"
                                        class="col-sm-12 col-form-label mb-0">
                                        <span><b>ПРИЛОЗИ</b></span></br>
                                        <span>-образложење теме (са потписима
                                            предложеног Руководиоца израде рада
                                            и кандидата)</span></br>
                                        <span>-биографски подаци кандидата (са
                                            потписом кандидата)</span>
                                    </label>
                                </div>

                                <div class="form-group row mb-0 my-form">
                                    <label for="final"
                                        class="col-md-12 col-form-label text-md-left solid"><i><b>ЗАКЉУЧАК
                                                КОМИСИЈЕ ЗА СТУДИЈЕ II
                                                СТЕПЕНА</b></i></label>

                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-1 solid">
                                        <input type="radio" id="radio"
                                            class="form-control noborder">
                                    </div>
                                    <label for="radio"
                                        class="col-md-11 col-form-label text-md-left solid">Прихвата
                                        се</label>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-1 solid">
                                        <input type="radio" id="radio"
                                            class="form-control noborder">
                                    </div>
                                    <label for="radio"
                                        class="col-md-11 col-form-label text-md-left solid">Одбија
                                        се</label>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-1 solid">
                                        <input type="radio" id="radio"
                                            class="form-control noborder">
                                    </div>
                                    <label for="radio"
                                        class="col-md-11 col-form-label text-md-left solid">Прихвата
                                        се уз сугестије</label>
                                </div>

                                <!-- JavaScript for radio - only one can be checked -->
                                <script>
                                $(document).ready(function() {
                                    $('input:radio').click(function() {
                                        $('input:radio').not(
                                            this).prop(
                                            'checked', false
                                            );
                                    });
                                });
                                </script>

                                <div class="form-group row mb-0">
                                    <label for="explanation"
                                        class="col-md-12 col-form-label text-md-left solid">Образложење
                                        и сугестије</label>

                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 solid">
                                        <textarea rows="2" id="explanation"
                                            class="form-control noborder-padding"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label for="city"
                                        class="col col-form-label text-md-left solid-width">У
                                        Београду</label>
                                    <div class="col-2 solid-width70">
                                        <input type="text" id="date"
                                            class="form-control noborder"
                                            name="username">
                                    </div>
                                    <label for="city"
                                        class="col col-form-label text-md-right solid-width"
                                        style="border-left:none;">године</label>
                                    <div class="col-md-7 solid-bb">
                                        <!-- <input type="text" id="city" class="form-control noborder" name="username"> -->
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label for="president_commission"
                                        class="col-md-5 col-form-label text-md-left solid">Председник
                                        Комисије</label>
                                    <div class="col-md-7 solid-bt">
                                        <input type="text"
                                            id="president_commission"
                                            class="form-control noborder"
                                            name="username">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label for="ending_form"
                                        class="col-md-2 col-form-label text-md-left my-form-gray">Формулар
                                        М01</label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="button-green">
                                <b>Потврди</b>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="button-red">
                                <b>Назад</b>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
    </script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://www.eyecon.ro/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> -->

</body>

</html>