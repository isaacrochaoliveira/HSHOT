<?php 

define('URL', 'http://localhost/HSHOT/');

@session_start();

if (!isset($_SESSION['id'])) {
    session_destroy();
    echo "Você aparentimente não tem acesso a essa página!";
}

?>