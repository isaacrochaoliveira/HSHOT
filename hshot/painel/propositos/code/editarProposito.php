<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$id_mp = $_POST['id_mp'];
$nome_mp = $_POST['nome_mp'];
$desc_mp = $_POST['desc_mp'];
$baseBiblica_mp = $_POST['baseBiblica_mp'];
$dataCriacao_mp = $_POST['dataCriacao_mp'];
$dataAcabar_mp = $_POST['dataAcabar_mp'];

$sql = $pdo->query("SELECT * FROM meus_propositos WHERE nome_mp = '$nome_mp' AND IP_mp = '$_SESSION[IP_mem]'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    echo "Um Próposito com esse nome já criado!";
    exit();
}

$sql = $pdo->query("UPDATE meus_propositos VALUES (nome_mp, desc_mp, dataCriacao_mp, dataAcabar_mp, baseBiblica_mp, IP_mp) VALUES ('$nome_mp', '$desc_mp', '$dataCriacao_mp', '$dataAcabar_mp', '$baseBiblica_mp', '$_SESSION[IP_mem]') WHERE id_mp = '$id_mp'");
echo "Sucesso!";