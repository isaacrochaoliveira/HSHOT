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
            
            ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title arvo-regular"><?php echo $titulo ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">&nbsp;</h6>
                    <p class="card-text"><strong><?php echo $pensamento?></strong></p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
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
