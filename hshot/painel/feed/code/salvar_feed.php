<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$id = $_POST['id'];
$pensamento = $_POST['think'];
$titulo = $_POST['titulo'];
$data = date('Y-m-d');

$sql = $pdo->query("SELECT * FROM comunidades WHERE id_com = '$id'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    $pdo->query("INSERT INTO feed_comunidades SET id_com = '$id', titulo_feed = '$titulo', pensamento = '$pensamento', data = '$data'");
} else {
    echo "ERRO! Comunidade não encontrada!";
    exit();
}