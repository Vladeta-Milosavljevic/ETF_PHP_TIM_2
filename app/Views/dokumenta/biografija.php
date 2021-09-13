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
    <title>Биографија</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Maстер студије</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="prijava.php">Пријава</a>
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
                        <div class="card-header">Биографија</div>
                        <div class="card-body">
                            <form name="my-form" onsubmit="return validform()"
                                action="" method="">

                                <div class="form-group row mb-4">
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


                                <div class="form-group row mb-4">
                                    <label for="headline"
                                        class="col-md-12 col-form-label text-md-center bio"><b>БИОГРАФИЈА</b></label>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12" align="center">
                                        <textarea rows="9" id="text_space"
                                            class="form-control textarea-bio"></textarea>
                                    </div>
                                </div>

                                <p>&nbsp;</p>

                                <div
                                    class="form-group row mb-0 signature-space">
                                    <div class="col-4"></div>
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <label for="full_name"
                                            class="col-md-12 col-form-label text-md-left">(потпис
                                            студента)</label>
                                    </div>
                                </div>

                                <div
                                    class="form-group row mb-0 signature-space">
                                    <div class="col-4"></div>
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <p
                                            class="col-md-12 col-form-label text-md-left">
                                            _______________________</p>
                                    </div>
                                </div>

                                <div
                                    class="form-group row mb-0 signature-space">
                                    <div class="col-4"></div>
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <label for="full_name"
                                            class="col-md-12 col-form-label text-md-left">Дипл.
                                            инж. Име Презиме</label>
                                    </div>
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

</body>

</html>