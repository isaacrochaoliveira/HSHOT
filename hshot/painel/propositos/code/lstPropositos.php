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
    <div class="d-flex flex-wrap gap-3">
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

            $sql_pl = $pdo->query("SELECT * FROM processo_leitura WHERE id_pl = '$id_pl'");
            $res_pl = $sql_pl->fetchAll(PDO::FETCH_ASSOC);

            if ($id_pl != 0) {
                $id_pl = $res_pl[0]['id_pl'];
                $id_l = $res_pl[0]['id_l'];
                $titulo_pl = $res_pl[0]['titulo_pl'];
                $desc_pl = $res_pl[0]['desc_pl'];
                $data_ini = $res_pl[0]['data_ini_pl'];
                $data_fim = $res_pl[0]['data_fim_pl'];
                $status_pl = $res_pl[0]['status_pl'];

                // Buscar o nome do livro com base no id_l
                $sql_livro = $pdo->query("SELECT nome_livro FROM livros WHERE id_l = '$id_l'");
                $res_livro = $sql_livro->fetchAll(PDO::FETCH_ASSOC);
                $nome_l = count($res_livro) > 0 ? $res_livro[0]['nome_livro'] : 'Livro não encontrado';

                $sql_caps = $pdo->query("SELECT * FROM capitulos WHERE id_c = '$id_l'");
                $res_caps = $sql_caps->fetchAll(PDO::FETCH_ASSOC);
                $total_caps = $res_caps[0]['quant_c'];
            } else {
                $titulo_pl = '<desconhecido>';
            }
        ?>
            <div class="card" style="width: 26rem;">
                <ul class="list-group list-group-flush f-14">
                    <li class="list-group-item">Vinculado ao Processo: <?php echo $titulo_pl ?></li>
                    <li class="list-group-item">Criado no dia <?php echo $dataCriacao_mp ?> com prazo até <mark style="background-color: yellow;"><strong><?php echo $dataAcabar_mp ?></strong></mark></li>
                </ul>
                <img src="<?= URL . 'imagens/arvore-com-a-presenca.jpg' ?>" class="" alt="Arvore pegando fogo com a presençade Deus">
                <div class="aks">
                </div>
                <div class="card-body">
                    <h5 class="card-title arvo-regular-italic f-24"><strong><?= $nome_mp ?></strong></h5>
                    <span class="anton-regular f-14"><?php echo $baseBiblica_mp ?></span>
                    <p class="card-text arvo-regular f-16"><?php echo $desc_mp ?></p>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-gear"></i> Configurações
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalQuestion" onclick="document.getElementById('id_pl_mp').value = '<?php echo $id_mp ?>'"><i class="fa-solid fa-question"></i> Conectar</a>
                            </li>
                            <li onclick="editProposito(<?= $id_mp ?>)"><a class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> Editar</a></li>
                            <li>
                                <?php
                                if ($status_mp == 'Desligado') {
                                ?>
                                    <a href="#" class="dropdown-item"><i class="fa-solid fa-turn-up"></i> Ligar</a>
                                <?php
                                } else {
                                ?>
                                    <a href="#" class="dropdown-item"><i class="fa-solid fa-turn-down"></i> Desligar</a>
                                <?php
                                }
                                ?>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item"></a>
                            </li>
                            <li onclick="modalLixoMp(<?php echo $id_mp ?>)"><a class="dropdown-item" href="#"><i class="fa-solid fa-trash"></i> Lixo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
