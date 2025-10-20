<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$id = $_POST['id'];;

$sql = $pdo->query("SELECT * FROM comunidades WHERE id_com = '$id'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    if ($res[0]['status_com'] == 'Ativo') {
        echo "ERRO! Comunidade em estado ativo, não havendo a possibilidade de edição!";
        exit();
    } else {
        $pdo->query("DELETE FROM feed_comunidades WHERE id_fc = '$id'");
        echo "Postagem excluída com Sucess!";
        exit();
    }
} else {
    echo "ERRO! Comunidade não encontrada!";
}