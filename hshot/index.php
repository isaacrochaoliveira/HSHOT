<?php
    require_once 'db/connect.php';  
    require_once 'db/autenticator.php';
    require_once 'db/get_IP.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSHOT - Sistema para Leitura</title>
    <link rel="stylesheet" href="estilo/style.css">
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
                    <li class="nav-item"><a href="#" class="nav-link text-white px-2 active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white px-2">Features</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white px-2">Pricing</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white px-2">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white px-2">About</a></li>
                </ul>
                <ul class="nav">
                    <li class="nav-item"><a href="#" class="nav-link text-white px-2">Login</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white px-2">Sign up</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <section id="section-home_login">
        <div class="container">
            <h1 class="anton-regular text-center">Sistema para Leitura Bíblica</h1>
            <p class="text-center arvo-regular">Organize e acompanhe sua leitura da Bíblia de forma eficiente.</p>
            <p class="arvo-regular text-center">(OBS) É importante que você acesse esse sistema de uma mesma rede, pois usamos seu endereço IP para autenticação.</p>
            <div class="d-flex justify-content-center">
                <a href="#" class="me-2 btn-login">Login</a>
                <a href="#" class="btn-signup">Sign up</a>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2025 HSHOT. Todos os direitos reservados.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>