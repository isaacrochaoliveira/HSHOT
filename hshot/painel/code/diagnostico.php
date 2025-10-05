<?php

require_once '../../db/connect.php';
require_once '../../db/autenticator.php';
@session_start();

$ident = AUTENT();

$total_capitulos = 0;

$sql = $pdo->query("SELECT * FROM processo_leitura WHERE id_mem_pl = '$ident'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
$id_pl = $res[0]['id_pl'] ?? 0;
$total_processos = count($res);

$sql_fin = $pdo->query("SELECT * FROM processo_leitura WHERE id_mem_pl = '$ident' AND status_pl = 'Finalizado'");
$res_fin = $sql_fin->fetchAll(PDO::FETCH_ASSOC);
$total_processos_finalizados = count($res_fin);

$sql_fin = $pdo->query("SELECT * FROM processo_leitura WHERE id_mem_pl = '$ident' AND status_pl = 'Aberto'");
$res_fin = $sql_fin->fetchAll(PDO::FETCH_ASSOC);
$total_processos_abertos = count($res_fin);

$sql_ver = $pdo->query("SELECT * FROM versiculos_destacados WHERE id_mem_vd = '$ident' AND id_pl = '$id_pl'");
$res_ver = $sql_ver->fetchAll(PDO::FETCH_ASSOC);
$versiculos_destacados = count($res_ver);

$sql_cap = $pdo->query("SELECT * FROM pl_inserircap WHERE id_mem_ic = '$ident' AND id_pl = '$id_pl'");
$res_cap = $sql_cap->fetchAll(PDO::FETCH_ASSOC);
if (count($res_cap) > 0) {
    for ($c = 0; $c < count($res_cap); $c++) {
        $total_capitulos += $res_cap[$c]['quant_ic'];
    }
}

?>
<div class="d-flex flex-wrap gap-1 justify-content-around">
    <?php
        for ($i = 0; $i < 5; $i++) {
            $read_more = 'http://localhost/HSHOT/hshot/home.php?pag=processos';
            switch ($i) {
                case 0:
                    $titulo_widget = 'Total de Processos';
                    $valor = $total_processos;
                    $bg = 'primary';
                    break;
                case 1:
                    $titulo_widget = 'Processos Abertos';
                    $valor = $total_processos_abertos;
                    $bg = 'success';
                    break;
                case 2:
                    $titulo_widget = 'Processos Finalizados';
                    $valor = $total_processos_finalizados;
                    $bg = 'info';
                    break;
                case 3:
                    $titulo_widget = 'Versículos Destacados';
                    $valor = $versiculos_destacados;
                    $bg = 'warning';
                    break;
                case 4:
                    $titulo_widget = 'Capítulos Lídos';
                    $valor = $total_capitulos;
                    $bg = 'dark';
                    break;
            }
        ?>
            <div class="col-6 col-lg-3">
                <!-- small box -->
                <div class="small-box text-bg-<?=$bg?>">
                    <div class="inner">
                        <h3><?=$valor?></h3>
                        <p><?php echo $titulo_widget ?></p>
                    </div>
                    <svg
                        class="small-box-icon"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                            d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"></path>
                        <path
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                            d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"></path>
                    </svg>
                    <a
                        href="<?php echo $read_more ?>"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        Saiba Mais <i class="fa-solid fa-right-long"></i>
                    </a>
                </div>
            </div>

        <?php
        }
    ?>
</div>
