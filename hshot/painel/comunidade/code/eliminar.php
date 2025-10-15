<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$id = $_POST['id'];
$id_mem = $_SESSION['usuario']['id_membro'];
$sql = $pdo->query("SELECT * FROM comunidades WHERE id_com = '$id' AND id_mem = '$id_mem'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    if ($res[0]['status_com'] == 'Ativo') {
        echo "Comunidade Ativa! Não havendo a possibilidade de eliminação!";
        exit();
    } else {
        $pdo->query("DELETE FROM comunidades WHERE id_com = '$id' AND id_mem = '$id_mem'");
        if ($res[0]['imagem_com'] != 'versiculo-do-dia.jpg') {
            @unlink('../../img/produtos/'.$res[0]['imagem_com']);
        }
        echo "Comunidade Excluída com Sucesso!";
    }
} else {
    echo "Comunidade não encontrada para a eliminação!";
    exit();
}