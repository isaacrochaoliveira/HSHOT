<?php
require_once 'db/connect.php';
require_once 'db/autenticator.php';
require_once 'db/logoff.php';
@session_start();

$pag = "";

if (isset($_GET['pag'])) {
    $pag = $_GET['pag'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSHOT - Sistema para Leitura</title>
    <link rel="stylesheet" href="estilo/style.css">
    <link rel="stylesheet" href="painel/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous"
        media="print"
        onload="this.media='all'" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Arvo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo/css/adminlte.css" />
    <script src="estilo/js/adminlte.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <header class="py-3 mb-4 border-bottom">
        <?php 
            if (AUTENT()) {
                ?>
                <nav class="py-2">
                    <div class="container d-flex flex-wrap">
                        <ul class="nav me-auto text-white">
                            <li class="nav-item"><a href="home.php" class="nav-link text-white px-2 active" aria-current="page">Painel <i class="fa-solid fa-chart-line"></i></a></li>
                            <li class="nav-item"><a href="home.php?pag=leitura" class="nav-link text-white px-2">Leitura <i class="fa-solid fa-book-bible"></i></a></li>
                            <li class="nav-item"><a href="home.php?pag=propositos" class="nav-link text-white px-2">Propósitos <i class="fa-solid fa-person-praying"></i></a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white px-2">FAQs</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white px-2">Perfil <i class="fa-regular fa-user"></i></a></li>
                        </ul>
                        <ul class="nav">
                            <?php
                            if (AUTENT()) {
                            ?>
                                <li class="nav-item"><a href="http://localhost/HSHOT/hshot/home.php?pag=logoff" class="btn btn-danger px-2">SAIR/LOGOFF <i class="fa-solid fa-right-from-bracket"></i></a></li>
                            <?php
                            } else {
                            ?>
                                <li class="nav-item"><a href="home.php?pag=login" class="nav-link text-white px-2">Login/Registro</a></li>

                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </nav>
                <?php
            }
        ?>
    </header>
    <section class="p-3">
        <?php
        if ($pag == "leitura") {
            require_once 'painel/leitura/leitura.php';
        } else if ($pag == "processos") {
            require_once 'painel/processos_leituras/meus-processos.php';
        } else if ($pag == "propositos") {
            require_once('painel/propositos/propositos.php');
        } else if ($pag == 'login') {
            require_once("painel/login.php");
        } else if ($pag == 'logoff') {
            LOGOFF();
        } else {
            require_once 'painel/home.php';
        }
        ?>
    </section>
</body>

</html>