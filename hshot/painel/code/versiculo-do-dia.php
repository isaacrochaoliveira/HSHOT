<?php

require_once '../../db/connect.php';
require_once '../../db/autenticator.php';
@session_start();

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$sql = $pdo->query("SELECT * FROM versiculo_do_dia;");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
$count = count($res);

$a = random_int(0, $count-1);
$ref_vdd = $res[$a]['ref_vdd'];
$vers_vdd = $res[$a]['vers_vdd'];

$tomorrow = date('Y-m-d', strtotime('tomorrow'));

$sql_gf = $pdo->query("SELECT * FROM versiculo_grifado;");
$res_gf = $sql_gf->fetchAll(PDO::FETCH_ASSOC);
if (count($res_gf) == 0) {
    $pdo->query("INSERT INTO versiculo_grifado SET ref_gf = '$ref_vdd', vers_gf = '$vers_vdd', limite_gf  = '$tomorrow'");

} else {
    if (count($res_gf) == 1) {
        if ($res_gf[0]['limite_gf'] == date('Y-m-d')) {
            $pdo->query("DELETE FROM versiculo_grifado;");
            $pdo->query("INSERT INTO versiculo_grifado SET ref_gf = '$ref_vdd', vers_gf = '$vers_vdd', limite_gf  = '$tomorrow'");
        }
    }
}
$sql_gf = $pdo->query("SELECT * FROM versiculo_grifado;");
$res_gf = $sql_gf->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="text-center">
    <div class="my-3">
        <span class="f-40 bg-primary rounded p-1"><i class="fa-solid fa-lightbulb" style="color: white"></i></span>
    </div>
    <h5 class="anton-regular f-36">Versículo de Dia</h5>
    <p class="arvo-regular f-16"><?php echo $res_gf[0]['vers_gf']?></p>
    <small class="referencia arvo-regular-italic"><?= $res_gf[0]['ref_gf']?></small>
</div>