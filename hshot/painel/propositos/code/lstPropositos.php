<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$sql = $pdo->query("SELECT * FROM meus_propositos WHERE IP_mp = '$_SESSION[IP_mem]'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) == 0) {
    echo "Nenhum Registro Encontrado...";
    exit();
} else {
    for ($i = 0; $i < count($res); $i++) {
        $nome_mp = $res[$i]['nome_mp']
    }
}