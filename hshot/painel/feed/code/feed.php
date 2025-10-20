<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$id = $_POST['id'];

$sql = $pdo->query("SELECT * FROM feed_comunidades WHERE id_com = '$id'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
?>
    <div class="d-flex flex-wrap gap-2 justify-content-center">
        <?php
        for ($i = 0; $i < count($res); $i += 1) {
            $titulo = $res[$i]['titulo_feed'] ?? '...';
            $pensamento = $res[$i]['pensamento'];
            $data = date('d/m/Y', strtotime($res[$i]['data']));
        ?>
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <div class="d-flex">
                        <h5 class="card-title arvo-regular" style="width: 95%;"><?php echo $titulo ?></h5>
                        <a href="#" onclick="excluir_feed(<?=$id?>)" class="text-danger"><i class="fa-solid fa-trash"></i></a>
                    </div>
                    <h6 class="card-subtitle mb-2 text-body-secondary">&nbsp;</h6>
                    <p class="card-text"><strong><?php echo $pensamento ?></strong></p>
                    <hr>
                    <div class="d-flex flex-wrap flex-column gap-2 f-16">
                        <p class="my-0">Criado pelo Autor(a).</p>
                        <p class="my-0">Data de Criação: <?php echo $data ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
} else {
    echo "Olá, Mundo!";
}
