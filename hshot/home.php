<?php 
require_once 'db/connect.php';
require_once 'db/autenticator.php';
@session_start();

$pag = "";

if(isset($_GET['pag'])){
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
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Arvo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="py-3 mb-4 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center menu-header">
            <a href="/" class="d-flex text-center text-decoration-none anton-regular">
                HSHOT
            </a>
        </div>
        <nav class="py-2">
            <div class="container d-flex flex-wrap">
                <ul class="nav me-auto text-white">
                    <li class="nav-item"><a href="home.php" class="nav-link text-white px-2 active" aria-current="page">Painel</a></li>
                    <li class="nav-item"><a href="home.php?pag=leitura" class="nav-link text-white px-2">Leitura</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white px-2">Pricing</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white px-2">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white px-2">Perfil</a></li>
                </ul>
                <ul class="nav">
                    <li class="nav-item"><a href="#" class="nav-link text-white px-2">Login</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white px-2">Sign up</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <section class="p-3">
        <?php 
            if($pag == "leitura"){
                require_once 'painel/leitura/leitura.php';
            }else{
                require_once 'painel/home.php';
            }
        ?>
    </section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</html>