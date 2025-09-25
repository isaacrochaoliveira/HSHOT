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
    $nome_mp = $res[0]['nome_mp'];
    $desc_mp = $res[0]['desc_mp'];
    $baseBiblica_mp = $res[0]['baseBiblica_mp'];
    $dataCriacao_mp = $res[0]['dataCriacao_mp'];
    $dataAcabar_mp = $res[0]['dataAcabar_mp'];

    echo "$nome_mp;$desc_mp;$baseBiblica_mp;$dataCriacao_mp;$dataAcabar_mp";
} else {
    echo "Propóosito não encontrado!;0";
}
