<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$what_link = $_POST['what_link'];
$insta_link = $_POST['insta_link'];
$face_link = $_POST['face_link'];
$discord_link = $_POST['discord_link'];
$reddit_link = $_POST['reddit_link'];

$id = $_POST['id'];
$id_mem = $_SESSION['usuario']['id_membro'];

$sql = $pdo->query("SELECT * FROM comunidades WHERE id_com = '$id' AND id_mem = '$id_mem'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    if ($res[0]['status_com'] == 'Ativo') {
        echo "Comunidade Ativa! Não havendo a possíbilidade de edição!";
        exit();
    } else {
        $sql = $pdo->query("SELECT * FROM redessociascom WHERE id_com = '$id'");
        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($res) > 0) {
            $pdo->query("INSERT INTO redessociascom SET id_com = '$id', what_link = '$what_link', insta_link = '$insta_link', face_link = '$face_link', discord_link = '$discord_link', reddit_link = '$reddit_link'");
            echo "Links Atualizados com Sucesso!";
        } else {
            $pdo->query("INSERT INTO redessociascom SET id_com = '$id', what_link = '$what_link', insta_link = '$insta_link', face_link = '$face_link', discord_link = '$discord_link', reddit_link = '$reddit_link'");
            echo "Links inseridos com Sucesso!";
        }
        exit();
    }
} else {
    echo "ERRO! Comunidade não encontrada!";
}