<?php

require_once '../../db/connect.php';
@session_start();


$nome = $_POST['nome'];
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$senha = $_POST['senha'];

if (empty($nome)) {
    echo "Nome Vazio!";
    exit();
}

$sql = $pdo->query("SELECT * FROM membros WHERE email_mem = '$email'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    echo "E-mail já informado já cadastrado no sistema!";
    exit();
}

$codigo_hash = password_hash($senha, PASSWORD_DEFAULT);
$res = $pdo->query("INSERT INTO membros (nome_membro, email_mem, senha_mem) VALUES ('$nome', '$email', '$codigo_hash')");
echo "Agora acesse o sistema com suas credencias!";
