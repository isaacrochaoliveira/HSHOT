<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$id = $_POST['id'];

$sql = $pdo->query("SELECT * FROM redessociascom WHERE id_com = '$id'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    $what_link = $res[0]['what_link'];
    $insta_link = $res[0]['insta_link'];
    $face_link = $res[0]['face_link'];
    $discord_link = $res[0]['discord_link'];
    $reddit_link = $res[0]['reddit_link'];

    echo "Datas;$what_link;$insta_link;$face_link;$discord_link;$reddit_link";
} else {
    echo "0";
    exit();
}