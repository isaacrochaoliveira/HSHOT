<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$id_membro = $_SESSION['usuario']['id_membro'];

$sql = $pdo->query("SELECT * FROM comunidades WHERE id_mem = '$id_membro';");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
?>
    <div class="d-flex flex-wrap">
        <?php
        for ($i = 0; $i < count($res); $i++) {
            $id_com = $res[$i]['id_com'];
            $nome_com = $res[$i]['nome_com'];
            $desc_com  = $res[$i]['desc_com'];
            $status_com = $res[$i]['status_com'];
            $dataCriaçao_com = $res[$i]['dataCriacao_com'];
            $imagem_com = $res[$i]['imagem_com'];

            if ($status_com == 'Inativo') {
                $border_color = 'red';
            } else {
                $border_color = 'blue';
            }

        ?>
            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 540px; border-right: 5px solid <?php $border_color ?>">
                    <div class="d-flex flex-wrap align-item-center">
                        <div class="f-24 text-success">
                            <a href="#" class="f-24 text-success" onclick="ativarComunidade(<?php echo $id_com ?>)"><i class="fa-solid fa-toggle-on"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo URL . 'imagens/comunidades/' . $imagem_com?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $nome_com?></h5><br>
                                <p class="card-text"><?php echo $desc_com?></p>
                                <p class="card-text"><small class="text-body-secondary"></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
} else {
    echo "<p class='arvo-regular f-20'>Sem Comunidades por agora!</p>";
}
