<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$id_mp = $_POST['id_mp'];
$sql = $pdo->query("SELECT * FROM meus_propositos WHERE id_mp = '$id_mp'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    if ($res[0]['status_mp'] == 'Ligado') {
        $pdo->query("UPDATE meus_propositos SET status_mp = 'Desligado' WHERE id_mp = '$id_mp'");
        echo "Propósito " . $res[0]['nome_mp'] . " Desligado com Sucesso!";
        exit();
    } else {
        $pdo->query("UPDATE meus_propositos SET status_mp = 'Ligado' WHERE id_mp = '$id_mp'");
        echo "Propósito " . $res[0]['nome_mp'] . " Ligado com Sucesso!";
        exit();
    }
} else {
    echo "Propósito não localizado!";
    exit();
}