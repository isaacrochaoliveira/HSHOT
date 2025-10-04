<?php

require_once '../../db/connect.php';
require_once '../../db/autenticator.php';
@session_start();

date_default_timezone_set('America/Sao_Paulo');

$sql = $pdo->query("SELECT * FROM versiculo_do_dia;");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
$count = count($res);

$tomorrow = date('Y-m-d', strtotime('tomorrow'));

$sql_gf = $pdo->query("SELECT * FROM versiculo_grifado;");
$res_gf = $sql_gf->fetchAll(PDO::FETCH_ASSOC);
if (count($res_gf) == 0) {

    $a = random_int(0, $count - 1);
    $ref_vdd = $res[$a]['ref_vdd'];
    $vers_vdd = $res[$a]['vers_vdd'];
    $pdo->query("INSERT INTO versiculo_grifado SET ref_gf = '$ref_vdd', vers_gf = '$vers_vdd', limite_gf  = '$tomorrow'");

    $a = random_int(0, $count - 1);
    $ref_vdd = $res[$a]['ref_vdd'];
    $vers_vdd = $res[$a]['vers_vdd'];
    $pdo->query("INSERT INTO versiculo_grifado SET ref_gf = '$ref_vdd', vers_gf = '$vers_vdd', limite_gf  = '$tomorrow'");
} else {
    if (count($res_gf) == 2) {
        for ($i = 0; $i < count($res_gf); $i++) {
            if ($res_gf[$i]['limite_gf'] == date('Y-m-d')) {
                $pdo->query("DELETE FROM versiculo_grifado;");

                $a = random_int(0, $count - 1);
                $ref_vdd = $res[$a]['ref_vdd'];
                $vers_vdd = $res[$a]['vers_vdd'];
                $pdo->query("INSERT INTO versiculo_grifado SET ref_gf = '$ref_vdd', vers_gf = '$vers_vdd', limite_gf  = '$tomorrow'");
            }
        }
    }
}
$sql_gf = $pdo->query("SELECT * FROM versiculo_grifado;");
$res_gf = $sql_gf->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="d-flex flex-wrap justify-content-around flex-items-center">
<?php
for ($i = 0; $i < count($res_gf); $i++) {
    if ($i % 2 == 0) {
        $image_orverlay = 'versiculo-do-dia.jpg';
    } else {
        $image_orverlay = 'arvore-com-a-presenca.jpg';
    }
?>
    <div class="col-md-12 col-lg-4">
        <div class="card mb-2 bg-gradient-dark">
            <img class="card-img-top" src="<?php echo URL ?>imagens/<?php echo $image_orverlay?>" alt="Dist Photo 1">
            <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h5 class="card-title text-primary text-white anton-regular">Versículo do Dia</h5>
                <p class="card-text text-white pb-2 pt-1 arvo-regular"><strong><?php echo $res_gf[$i]['vers_gf'] ?></strong></p>
                <a href="#" class="text-white arvo-regular-italic"><?php echo $res_gf[$i]['ref_gf'] ?></a>
            </div>
        </div>
    </div>
<?php
}
?>
</div>