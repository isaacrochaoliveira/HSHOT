<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$today = date('d/m/Y');

$sql = $pdo->query("SELECT * FROM meus_propositos WHERE IP_mp = '$_SESSION[IP_mem]'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) == 0) {
    echo "Nenhum Registro Encontrado...";
    exit();
} else {
?>
    <div class="d-flex flex-wrap">
        <?php
        for ($i = 0; $i < count($res); $i++) {
            $id_mp = $res[$i]['id_mp'];
            $nome_mp = $res[$i]['nome_mp'];
            $desc_mp = $res[$i]['desc_mp'];
            $baseBiblica_mp = $res[$i]['baseBiblica_mp'];
            $dataCriacao_mp = $res[$i]['dataCriacao_mp'];
            $dataAcabar_mp = $res[$i]['dataAcabar_mp'];
            $status_mp = $res[$i]['status_mp'];
            $id_pl = $res[$i]['id_pl_mp'];

            $dataCriacao_mp = date('d/m/Y', strtotime($dataCriacao_mp));
            $dataAcabar_mp = date('d/m/Y', strtotime($dataAcabar_mp));

        ?>
            <div class="w-25 my-2">
                <div class="card" style="width: 26rem;">
                    <img src="<?= URL . 'imagens/arvore-com-a-presenca.jpg' ?>" class="" alt="Arvore pegando fogo com a presençade Deus">
                    <div class="card-body">
                        <ul class="list-group list-group-flush f-14">
                            <li class="list-group-item">Criado no dia <?php echo $dataCriacao_mp ?> com prazo até <mark style="background-color: yellow;"><strong><?php echo $dataAcabar_mp ?></strong></mark></li>
                        </ul>
                        <h5 class="card-title arvo-regular-italic f-36"><?= $nome_mp ?></h5>
                        <span class="anton-regular f-14"><?php echo $baseBiblica_mp ?></span>
                        <div class="d-flex flex-wrap">
                            <div class="col-md-11">
                                <p class="card-text arvo-regular f-16"><?php echo $desc_mp ?></p>
                            </div>
                            <div class="col-md-1">
                                <a href="#" class="bg-primary text-white rounded p-2" data-bs-toggle="modal" data-bs-target="#ModalQuestion" onclick="document.getElementById('id_pl_mp').value = '<?php echo $id_mp ?>'"><i class="fa-solid fa-question"></i></a href="#">
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex flex-wrap justify-content-around">
                            <button class="btn btn-primary" onclick="editProposito(<?=$id_mp?>)"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                            <?php 
                                if ($status_mp == 'Desligado') {
                                    ?>
                                        <button class="btn btn-success"><i class="fa-solid fa-turn-up"></i> Ligar</button>
                                    <?php
                                } else {
                                    ?>
                                        <button class="btn btn-danger"><i class="fa-solid fa-turn-down"></i> Desligar</button>
                                    <?php
                                }
                            ?>
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Lixo</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-75 my-2">
                <?php
                $sql_pl = $pdo->query("SELECT * FROM processo_leitura WHERE id_pl = '$id_pl'");
                $res_pl = $sql_pl->fetchAll(PDO::FETCH_ASSOC);
                if (count($res_pl) == 0) {
                ?>
                    <div class="alert alert-primary" role="alert">
                        Este propósito não está vinculado com nenhum processo de leitura
                    </div>
                <?php
                } else {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Livro</th>
                                <th scope="col">Título</th>
                                <th scope="col">Desc/Obser</th>
                                <th scope="col" width="200">Inicio / Fim</th>
                                <th scope="col" width="200">Total de Capítulos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($c = 0; $c < count($res_pl); $c++) {
                                $id_pl = $res_pl[$c]['id_pl'];
                                $id_l = $res_pl[$c]['id_l'];
                                $titulo_pl = $res_pl[$c]['titulo_pl'];
                                $desc_pl = $res_pl[$c]['desc_pl'];
                                $data_ini = $res_pl[$c]['data_ini_pl'];
                                $data_fim = $res_pl[$c]['data_fim_pl'];
                                $status_pl = $res_pl[$c]['status_pl'];

                                // Buscar o nome do livro com base no id_l
                                $sql_livro = $pdo->query("SELECT nome_livro FROM livros WHERE id_l = '$id_l'");
                                $res_livro = $sql_livro->fetchAll(PDO::FETCH_ASSOC);
                                $nome_l = count($res_livro) > 0 ? $res_livro[0]['nome_livro'] : 'Livro não encontrado';

                                $sql_caps = $pdo->query("SELECT * FROM capitulos WHERE id_c = '$id_l'");
                                $res_caps = $sql_caps->fetchAll(PDO::FETCH_ASSOC);
                                $total_caps = $res_caps[0]['quant_c'];
                            ?>
                                <tr>
                                    <td><?php echo $nome_l; ?></td>
                                    <td><?php echo $titulo_pl; ?></td>
                                    <td><?php echo $desc_pl; ?></td>
                                    <td><?php echo $data_ini . ' / ' . $data_fim; ?></td>
                                    <td><?php echo $total_caps ?> Capítulos</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
