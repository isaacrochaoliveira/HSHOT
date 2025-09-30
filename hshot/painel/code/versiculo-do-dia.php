<?php

require_once '../../db/connect.php';
require_once '../../db/autenticator.php';
@session_start();

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$hora = date('H');
mktime (0, 0, 0, date("m")  , date("d")+1, date("Y"));

$sql = $pdo->query("SELECT * FROM versiculo_do_dia;");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
$count = count($res);
$rand = random_int(0, $count-1);
?>
<div class="text-center">
    <div class="my-3">
        <span class="f-40 bg-primary rounded p-1"><i class="fa-solid fa-lightbulb" style="color: white"></i></span>
    </div>
    <h5 class="anton-regular f-36">Versículo do Dia</h5>
    <p class="arvo-regular f-16"><?php echo $hora?></p>
    <!-- <p class="arvo-regular f-16"><?php echo $res[$rand]['vers_vdd']?></p> -->
    <small class="referencia arvo-regular-italic"><?= $res[$rand]['ref_vdd']?></small>
</div>