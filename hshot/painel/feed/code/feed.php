<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$id = $_POST['id'];

$sql = $pdo->query("SELECT * FROM feed_comunidades WHERE id_com = '$id'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    echo "Olá";
} else {
    echo "Olá, Mundo!";
}