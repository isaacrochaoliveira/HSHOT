<?php

require_once '../../db/connect.php';
require_once '../../db/autenticator.php';
@session_start();

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$data_inicial = strtotime('2025-09-25');
$data_final = strtotime('2025-10-02');

$diferença = $data_final - $data_inicial;

$sql = $pdo->query("SELECT * FROM versiculo_do_dia;");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
$count = count($res);

if (($data_final - $data_inicial) == 604800) {
    echo "Olá";
}
// if ($diferença == 86400) {
//     $a = random_int(0, $count-1);
// } else {
//     if ($diferença == 0) {
//         $b = $a;
//     }
// }

?>
<div class="text-center">
    <div class="my-3">
        <span class="f-40 bg-primary rounded p-1"><i class="fa-solid fa-lightbulb" style="color: white"></i></span>
    </div>
    <h5 class="anton-regular f-36">Versículo do Dia</h5>
    <p class="arvo-regular f-16"><?php echo $diferença?></p>
    <!-- <p class="arvo-regular f-16"><?php echo $res[$a]['vers_vdd']?></p> -->
    <!-- <small class="referencia arvo-regular-italic"><?= $res[$a]['ref_vdd']?></small> -->
</div>