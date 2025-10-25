<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$id_membro = $_SESSION['usuario']['id_membro'];
$pag = $_POST['pag'];

if ($pag == 'minhas-comunidades') {
    $sql = $pdo->query("SELECT * FROM comunidades WHERE id_mem = '$id_membro';");
} else {
    $sql = $pdo->query("SELECT * FROM comunidades WHERE id_mem != '$id_membro';");
}
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
?>
    <div class="d-flex flex-wrap">
        <?php
        for ($i = 0; $i < count($res); $i++) {
            $id_com = $res[$i]['id_com'];
            $id_mem = $res[$i]['id_mem'];
            $nome_com = $res[$i]['nome_com'];
            $desc_com  = $res[$i]['desc_com'];
            $status_com = $res[$i]['status_com'];
            $dataCriaçao_com = $res[$i]['dataCriacao_com'];
            $imagem_com = $res[$i]['imagem_com'];

            if ($status_com == 'Inativo') {
                $border_color = '#ff0000';
                $toggle_onoff = 'fa-solid fa-toggle-off text-danger';
            } else {
                $border_color = '#0B5ED7';
                $toggle_onoff = 'fa-solid fa-toggle-on text-primary';
            }

        ?>
            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo URL . 'imagens/comunidades/' . $imagem_com ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $nome_com ?></h5><br>
                                <p class="card-text"><?php echo $desc_com ?></p>
                                <p class="card-text"><small class="text-body-secondary"></small></p>
                            </div>
                        </div>
                        <?php
                        if ($pag == 'minhas-comunidades') {
                        ?>
                            <hr>
                            <div class="d-flex flex-wrap align-items-center justify-content-center">
                                <div class="my-auto">
                                    <a href="#" class="text-decoration-none" style="color: <?php echo $border_color ?>;" onclick="ativarComunidade(<?php echo $id_com ?>)"><i class="<?php echo $toggle_onoff ?> f-24"></i> Ligar/Desligar</a>
                                    <a href="#" class="text-decoration-none text-danger" onclick="eliminar(<?php echo $id_com ?>)"><i class="fa-solid fa-xmark f-24"></i> Eliminar</a>
                                    <a href="#" class="text-decoration-none text-primary" onclick="LinksModal(<?php echo $id_com ?>)"><i class="fa-solid fa-link f-24"></i> Configurar Links</a>
                                    <a href="home.php?pag=feed&feed=<?= $id_com ?>" class="text-decoration-none text-primary"><i class="fa-solid fa-people-group f-24"></i> Feed</a>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                        <hr>
                            <div class="d-flex flex-wrap align-items-center justify-content-end">
                                <div class="my-auto" style="padding-right: 20px;">
                                    <a href="home.php?pag=feed&feed=<?= $id_com ?>" class="text-decoration-none text-primary"><i class="fa-solid fa-people-group f-24"></i> Feed</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
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
