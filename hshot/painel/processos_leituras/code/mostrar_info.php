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
    $total_caps = $res_caps[0]['quant_c'];

    $sql_caps_lidos = $pdo->query("SELECT * FROM pl_inserircap WHERE id_pl = '$id_pl' AND id_l = '$id_l' AND IP_mem_ic = '$_SESSION[IP_mem]'");
    $res_caps_lidos = $sql_caps_lidos->fetchAll(PDO::FETCH_ASSOC);
    $caps_lidos = 0;
    if (count($res_caps_lidos) > 0) {
        for ($cont = 0; $cont < count($res_caps_lidos); $cont++) {
            $caps_lidos += $res_caps_lidos[$cont]['quant_ic'] ?? 0;
        }
    }

    $data_ini = date('d/m/Y', strtotime($data_ini));
    $data_fim = $data_fim ? date('d/m/Y', strtotime($data_fim)) : '---';

    ?>
    <div class="d-flex flex-wrap">
        <div class="col-md-6">
            <p class="arvo-regular-italic"><strong class="arvo-regular">Livro:</strong> <?php echo $nome_l; ?></p>
            <p class="arvo-regular-italic"><strong class="arvo-regular">Título:</strong> <?php echo $titulo_pl; ?></p>
            <p class="arvo-regular-italic"><strong class="arvo-regular">Descrição/Observação:</strong> <?php echo $desc_pl; ?></p>
            <p class="arvo-regular-italic"><strong class="arvo-regular">Data Início:</strong> <?php echo $data_ini; ?></p>
            <p class="arvo-regular-italic"><strong class="arvo-regular">Data Fim:</strong> <?php echo $data_fim; ?></p>
            <p class="arvo-regular-italic"><strong class="arvo-regular">Status:</strong> <?php echo $status_pl; ?></p>
        </div>
        <div class="col-md-6">
            <p class="arvo-regular-italic"><strong class="arvo-regular">Total de Capítulos:</strong> <?php echo $total_caps; ?></p>
            <p class="arvo-regular-italic"><strong class="arvo-regular">Capítulos Lidos:</strong> <?php echo $caps_lidos; ?></p>
            <p class="arvo-regular-italic"><strong class="arvo-regular">Capítulos Restantes:</strong> <?php echo $total_caps - $caps_lidos; ?></p>
        </div>
    </div>
    <?php
}
