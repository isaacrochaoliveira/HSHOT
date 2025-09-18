<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}
$id_PL = $_POST['id'] ?? '';
if ($id_PL == '') {
    echo "ID do processo não fornecido.";
    exit;
}

$sql = $pdo->query("SELECT * FROM versiculos_destacados WHERE id_pl = '$id_PL' AND IP_mem_vd = '$_SESSION[IP_mem]' ORDER BY id_vd DESC");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) == 0) {
    echo "<p class='arvo-regular'>Nenhum versículo destacado encontrado para este processo.</p>";
} else {
    $sql_pl = $pdo->query("SELECT * FROM processo_leitura WHERE id_pl = '$id_PL' AND IP_mem = '$_SESSION[IP_mem]'");
    $res_pl = $sql_pl->fetchAll(PDO::FETCH_ASSOC);
    $livro_n = $res_pl[0]['id_l'] ?? '';

    $sql_livro = $pdo->query("SELECT * FROM livros WHERE id_l = '$livro_n'");
    $res_livro = $sql_livro->fetchAll(PDO::FETCH_ASSOC);
    $nome_livro = $res_livro[0]['nome_livro'] ?? 'Livro não encontrado';

    $capitulo = $res[0]['cap_vd'] ?? '';
    $versiculo = $res[0]['vers_cs'] ?? '';
    $versiculo_texto = $res[0]['versiculo_ic'] ?? '';
    $pensamento = $res[0]['pensamento_ic'] ?? '';
?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title anton-regular"><?php echo $nome_livro ?> <?php echo $capitulo . ":". $versiculo?></h5>
            <p class="card-text"><mark><?php echo $pensamento?></mark></p>
        </div>
    </div>
<?php
}
