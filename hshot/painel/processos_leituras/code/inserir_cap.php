<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();
if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$idLivro = $_POST['idLivro'];
$id = $_POST['id'];
$quant = $_POST['quant_cap'];
$data = $_POST['data_cap'];

if ($quant == "" || $data == "") {
    echo "Preencha todos os campos";
    exit();
}

$sql = $pdo->query("SELECT * FROM processo_leitura WHERE id_pl = '$id'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);

if (count($res) == 0) {
    echo "Processo não encontrado";
    exit();
}

$pdo->query("INSERT INTO pl_inserircap (id_l, id_pl, quant_ic, data_ic, IP_mem_ic) VALUES ('$idLivro', '$id', '$quant', '$data', '$_SESSION[IP_mem]')");
echo "Capítulos inseridos com sucesso";