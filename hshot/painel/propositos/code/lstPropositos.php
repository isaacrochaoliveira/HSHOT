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
    <div class="d-flex flex-wrap gap-2">
        <?php
        for ($i = 0; $i < count($res); $i++) {
            $nome_mp = $res[$i]['nome_mp'];
            $desc_mp = $res[$i]['desc_mp'];
            $baseBiblica_mp = $res[$i]['baseBiblica_mp'];
            $dataCriacao_mp = $res[$i]['dataCriacao_mp'];
            $dataAcabar_mp = $res[$i]['dataAcabar_mp'];

            $dataCriacao_mp = date('d/m/Y', strtotime($dataCriacao_mp));
            $dataAcabar_mp = date('d/m/Y', strtotime($dataAcabar_mp));

            if ($dataAcabar_mp == $today) {
                $status = 'bg-danger text-danger';
            } else {
                $status = 'bg-success text-success';
            }
        ?>
            <div class="card" style="width: 26rem;">
                <div class="<?= $status ?>">
                    Olá
                </div>
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
                            <a href="#" class="bg-primary text-white rounded p-2" data-bs-toggle="modal" data-bs-target="#ModalQuestion"><i class="fa-solid fa-question"></i></a href="#">
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
