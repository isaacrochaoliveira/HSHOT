<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$nome = $_POST['nome_com'];
$desc = $_POST['desc_com'];
$hoje = date('Y-m-d');

$nome_img = preg_replace('/[ -]+/', '-', @$_FILES['imagem_comunidade']['name']);
$caminho = '../../../imagens/comunidades/' . $nome_img;
if (@$_FILES['imagem_comunidade']['name'] == "") {
    $imagem = "versiculo-do-dia.jpg";
} else {
    $imagem = $nome_img;
}

$imagem_temp = @$_FILES['imagem']['tmp_name'];
$ext = pathinfo($imagem, PATHINFO_EXTENSION);
if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif') {
    move_uploaded_file($imagem_temp, $caminho);
} else {
    echo 'Extensão de Imagem não permitida!';
    exit();
}

if (empty($nome)) {
    echo 'Campo "nome" vázio';
    exit();
}

$pdo->query("INSERT INTO comunidades SET nome_com = '$nome', desc_com = '$desc', dataCriacao_com = '$hoje', imagem_com = '$imagem'");
echo "Sucesso!";
