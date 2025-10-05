<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$sql = $pdo->query("SELECT * FROM comunidades;");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    ?>
    <div class="d-flex flex-wrap gap-2">
    <?php
    for ($i = 0; $i < count($res); $i++) {
        $nome_com = $res[$i]['nome_com'];
        $desc_com  = $res[$i]['desc_com'];
        $status_com = $res[$i]['status_com'];
        $dataCriaçao_com = $res[$i]['dataCriacao_com'];
        $imagem_com = $res[$i]['imagem_com'];

?>
        <div class="col-md-6">
            <div class="card mb-3" style="max-width: 440px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
?>
    </div>
<?php
    }
} else {
    echo "<p class='arvo-regular f-20'>Sem Comunidades por agora!</p>";
}
