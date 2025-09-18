<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$id = $_POST['id'] ?? '';
$capitulo = $_POST['capitulo'] ?? '';
$versiculo = $_POST['versiculo'] ?? '';
$versiculo_texto = $_POST['versiculo_texto'] ?? '';
$desc_destacar = $_POST['desc_destacar'] ?? '';

if ($id == '') {
    echo "Erro: Nenhum processo selecionado!";
    exit();
}

if ($capitulo == '' || $capitulo <= 0) {
    echo "Erro: Capítulo inválido!";
    exit();
}

if ($versiculo == '' || $versiculo <= 0) {
    echo "Erro: Versículo inválido!";
    exit();
}

if ($versiculo_texto == '') {
    echo "Erro: Texto do versículo não pode estar vazio!";
    exit();
}

if ($desc_destacar == '') {
    echo "Erro: Descrição do destaque não pode estar vazio!";
    exit();
}

// Verificar se o processo de leitura existe
$sql = $pdo->query("SELECT * FROM processo_leitura WHERE id_pl = '$id' AND IP_mem = '$_SESSION[IP_mem]'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) == 0) {
    echo "Erro: Processo de leitura não encontrado!";
    exit();
}

// Inserir o versículo destacado na tabela de destaques
$sql_insert = $pdo->prepare("INSERT INTO versiculos_destacados (id_pl, cap_vd, vers_cs, versiculo_ic, pensamento_ic, IP_mem_vd) VALUES (:id_pl, :capitulo, :versiculo, :versiculo_texto, :desc_destacar, :IP_mem_dv)");
$sql_insert->bindValue(':id_pl', $id);
$sql_insert->bindValue(':capitulo', $capitulo);
$sql_insert->bindValue(':versiculo', $versiculo);
$sql_insert->bindValue(':versiculo_texto', $versiculo_texto);
$sql_insert->bindValue(':desc_destacar', $desc_destacar);
$sql_insert->bindValue(':IP_mem_dv', $_SESSION['IP_mem']);
$sql_insert->execute();
echo "Versículo destacado com sucesso!";