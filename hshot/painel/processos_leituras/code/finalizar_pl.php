<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$ident = AUTENT();

$id = $_POST['id'] ?? '';
$data_fim = $_POST['data_fim'] ?? '';
$obs_fin = $_POST['obs_fin'] ?? '';
$status_pl = $_POST['status_pl'] ?? '';

if ($id == '') {
    echo "ID do processo não informado.";
    exit;
}

if ($data_fim == '') {
    echo "Data de término não informada.";
    exit;
}

if ($status_pl == '') {
    echo "Status não informado.";
    exit;
}
// Verificar se o processo pertence ao usuário logado
$sql = $pdo->query("SELECT * FROM processo_leitura WHERE id_pl = '$id' AND id_mem_pl = '$ident'");
if ($sql->rowCount() == 0) {
    echo "Processo não encontrado ou você não tem permissão para finalizar.";
    exit;
}
// Atualizar o processo
$sql = $pdo->prepare("UPDATE processo_leitura SET data_fim_pl = :data_fim, desc_pl = :obs_fin, status_pl = :status_pl WHERE id_pl = :id");
$sql->bindValue(':data_fim', $data_fim);
$sql->bindValue(':obs_fin', $obs_fin);
$sql->bindValue(':status_pl', $status_pl);
$sql->bindValue(':id', $id);
$sql->execute();
echo "Processo finalizado com sucesso.";