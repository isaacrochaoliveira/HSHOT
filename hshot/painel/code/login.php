<?php

require_once '../../db/connect.php';
@session_start();

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

$sql = $pdo->query("SELECT * FROM membros WHERE email_mem = '$email'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    $hash = $res[0]['senha_mem'];
    if (password_verify($_POST['senha'], $hash)) {

        if (!isset($_SESSION['usuario']['id'])) {
            $_SESSION['usuario'] = $res[0];
            $_SESSION['email'] = $email;
        }

        echo "Sucesso!";
    } else {
        echo "Email e/ou Senha Inválida";
    }
} else {
    echo "Email e/ou Senha Inválidas!";
}
