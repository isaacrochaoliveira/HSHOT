<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$id_PL = $_POST['id'];
if ($id_PL == '') {
    echo "ID do processo não fornecido.";
    exit;
}

$sql = $pdo->query("SELECT * FROM pl_inserircap WHERE id_pl = '$id_PL' AND IP_mem_ic = '$_SESSION[IP_mem]'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) == 0) {
    echo "<p>Até o momento, não registramos inserção de capítulos</p>";
} else {
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Livro</th>
                <th scope="col">Capítulos</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            for ($i = 0; $i < count($res); $i++) {
                $id_l = $res[$i]['id_l'];
                $data_ic = $res[$i]['data_ic'];
                $quant_c = $res[$i]['quant_ic'];

                $sql_livro = $pdo->query("SELECT * FROM livros WHERE id_l = '$id_l'");
                $res_livro = $sql_livro->fetchAll(PDO::FETCH_ASSOC);
                $nome_livro = $res_livro[0]['nome_livro'];

                $data_ic = date('d/m/Y', strtotime($data_ic));
                ?>
                <tr>
                    <td><?php echo $nome_livro ?></td>
                    <td><?php echo $quant_c ?> Capítulo(s)</td>
                    <td><?php echo $data_ic ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}