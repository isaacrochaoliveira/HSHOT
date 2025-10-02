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
    ?>
    <div class="d-flex flex-wrap gap-3">
        <?php
            for ($i = 0; $i < count($res); $i+=1) {
                $sql_pl = $pdo->query("SELECT * FROM processo_leitura WHERE id_pl = '$id_PL' AND IP_mem = '$_SESSION[IP_mem]'");
                $res_pl = $sql_pl->fetchAll(PDO::FETCH_ASSOC);
                $livro_n = $res_pl[0]['id_l'] ?? '';
            
                $sql_livro = $pdo->query("SELECT * FROM livros WHERE id_l = '$livro_n'");
                $res_livro = $sql_livro->fetchAll(PDO::FETCH_ASSOC);
                $nome_livro = $res_livro[0]['nome_livro'] ?? 'Livro não encontrado';
            
                $capitulo = $res[$i]['cap_vd'] ?? '';
                $versiculo = $res[$i]['vers_cs'] ?? '';
                $versiculo_texto = $res[$i]['versiculo_ic'] ?? '';
                $pensamento = $res[$i]['pensamento_ic'] ?? '';

                
                ?>
                    <div class="card" style="width: 22rem;">
                        <div class="card-body">
                            <h5 class="card-title anton-regular"><?php echo $nome_livro ?> <?php echo $capitulo . ":". $versiculo?></h5><br>
                            <?php
                                if (($pensamento == '') || ($pensamento == 'Versículo Destacado') || (($pensamento == 'Versículo destacado'))) {
                                    ?>
                                        <p class="card-text arvo-regular-italic f-16"><?php echo $versiculo_texto ?></p>
                                    <?php
                                } else {
                                    ?>
                                        <p class="card-text arvo-regular f-16"><mark class="py-2 px-1" style="background-color: #7FC8E4; border-radius: 20px"><?php echo $pensamento?></mark></p>
                                    <?php
                                }
                                    ?>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
    <?php
}
