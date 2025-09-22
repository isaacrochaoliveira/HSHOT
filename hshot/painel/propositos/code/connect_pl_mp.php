<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$id_pl = $_POST['id_pl'];
$id_mp = $_POST['id_mp'];

$sql = $pdo->query("SELECT * FROM processo_leitura WHERE id_pl = '$id_pl'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) == 0) {
    echo "Processo deLeitura não encontrado!";
    exit();
}
$sql = $pdo->query("SELECT * FROM meus_propositos WHERE id_mp = '$id_mp'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if ($res[0]['id_pl_mp'] != "0") {
    echo "Cada Propósito pode contar com 1 (Uma) Leitura";
    exit();
}

$sql = $pdo->query("UPDATE meus_propositos SET id_pl_mp = '$id_pl' WHERE id_mp = '$id_mp' AND IP_mp = '$_SESSION[IP_mem]'");
echo "Sucesso";