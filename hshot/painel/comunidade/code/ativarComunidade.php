<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$id_membro = $_SESSION['usuario']['id_membro'];
$id = $_POST['id'];

$sql = $pdo->query("SELECT * FROM comunidades WHERE id_com = '$id' AND id_mem = '$id_membro'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    if ($res[0]['status_com'] == 'Inativo') {
        $pdo->query("UPDATE comunidades SET status_com = 'Ativo' WHERE id_com = '$id' AND id_mem = '$id_membro'");
        echo "Comunidade Ativada com Sucesso!";
    } else {
        $pdo->query("UPDATE comunidades SET status_com = 'Inativo' WHERE id_com = '$id' AND id_mem = '$id_membro'");
        echo "Comunidade Inativada com Sucesso!";
    }
}