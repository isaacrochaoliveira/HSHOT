<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$sql = $pdo->query("SELECT * FROM regras_comunidade");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    ?>
    <div class="d-flex flex-wrap">
    <?php
    for ($i = 0; $i < count($res); $i++) {
        $rule = $res[$i]['regra_rc'];
        ?>
            <div class="col-md-5 rule my-2">
                <p><?php echo $rule?></p>
            </div>
            <?php
    }
    ?>
    </div>
    <?php
}
