<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$id = $_POST['id'] ?? '';
if ($id == '') {
    echo "ID do processo não fornecido.";
    exit;
}
$sql = $pdo->query("SELECT * FROM processo_leitura WHERE id_pl = '$id' AND IP_mem = '$_SESSION[IP_mem]'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) == 0) {
    echo "Processo não encontrado ou você não tem permissão para visualizá-lo.";
} else {
    $id_pl = $res[0]['id_pl'];
    $id_l = $res[0]['id_l'];
    $titulo_pl = $res[0]['titulo_pl'];
    $desc_pl = $res[0]['desc_pl'];
    $data_ini = $res[0]['data_ini_pl'];
    $data_fim = $res[0]['data_fim_pl'];
    $status_pl = $res[0]['status_pl'];

    // Buscar o nome do livro com base no id_l
    $sql_livro = $pdo->query("SELECT nome_livro FROM livros WHERE id_l = '$id_l'");
    $res_livro = $sql_livro->fetchAll(PDO::FETCH_ASSOC);
    $nome_l = count($res_livro) > 0 ? $res_livro[0]['nome_livro'] : 'Livro não encontrado';

    $sql_caps = $pdo->query("SELECT * FROM capitulos WHERE id_c = '$id_l'");
    $res_caps = $sql_caps->fetchAll(PDO::FETCH_ASSOC);
    $caps = $res_caps[0]['quant_c'];

    $data_ini = date('d/m/Y', strtotime($data_ini));
    $data_fim = $data_fim ? date('d/m/Y', strtotime($data_fim)) : '---';

    echo "<h4 class='arvo-regular'>Processo de Leitura ID: $id_pl</h4>";
    echo "<p><strong>Livro:</strong> $nome_l</p>";
    echo "<p><strong>Título:</strong> $titulo_pl</p>";
    echo "<p><strong>Descrição/Observações:</strong> $desc_pl</p>";
    echo "<p><strong>Data de Início:</strong> $data_ini</p>";
    echo "<p><strong>Data de Término:</strong> $data_fim</p>";
    echo "<p><strong>Capítulos Restantes:</strong> $caps Capítulos</p>";
    echo "<p><strong>Status:</strong> $status_pl</p>";
}
