<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Портал за пријаву испита</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css"
        rel="stylesheet" />
    <?php
    helper('html');
    helper('auth');
    echo link_tag('css/style.css');
    echo link_tag('css/styles.css');
    ?>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="sb-nav">
    <nav class="sb-topnav navbar navbar-expand-sm navbar-dark bg-dark">

        <!-- Navbar Brand-->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <div class="navbar-brand navbar-nav ps-3">Пријава мастер тема</div>
            </li>
        </ul>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <div class="navbar-brand navbar-nav ps-3" hidden></div>
            </li>
        </ul>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <?php
                $options = [];

                if (logged_in()) {

                    $options[user()->username . ', одјава'] = 'logout';
                } else {
                    $options['Пријавите се'] = 'login';
                }

                foreach ($options as $text => $url) : ?>
            <li class="nav-item mx-0 mx-lg-1">
                <?= anchor($url, $text, ['class' => 'nav-link py-3 px-0 px-lg-3 rounded']); ?>
            </li>
            <?php endforeach; ?>
            </li>
        </ul>
        <!-- Sidebar Toggle-->

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?= $this->renderSection('sidebar') ?>
        </div>
        <div id="layoutSidenav_content" class="container">
            <main>
                <div class="container-fluid px-4">
                    <?php $this->renderSection('content'); ?>
                </div>
            </main>

            <br>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; PHP тим 2
                            2021</div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
        crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous">
    </script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
</body>

</html>