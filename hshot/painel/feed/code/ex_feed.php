<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$id = $_POST['id'];
$id_com = $_POST['id_com'];
$pull = $_POST['pull'];

$sql = $pdo->query("SELECT * FROM comunidades WHERE id_com = '$id_com'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    if ($res[0]['status_com'] == 'Ativo') {
        if ($pull == 'no pull') {
            echo "$id;ERRO! Comunidade em estado ativo, não havendo a possibilidade de edição!";
            exit();
        } else {
            $pdo->query("DELETE FROM feed_comunidades WHERE id_fc = '$id'");
            echo "0;Postagem excluída com Sucess!";
        }
    } else {
        if ($pull == 'pull') {
            $pdo->query("DELETE FROM feed_comunidades WHERE id_fc = '$id'");
            echo "0;Postagem excluída com Sucesso!";
        }
        exit();
    }
} else {
    echo "0;ERRO! Comunidade não encontrada!";
}