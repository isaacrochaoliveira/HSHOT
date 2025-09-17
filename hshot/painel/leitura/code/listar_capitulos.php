<?php

require_once 'db/connect.php';

$liv = addslashes($_GET['livro']);

if (isset($_GET['cap']) && $_GET['cap'] != "") {
    $cap = $_GET['cap'];
}

$sql = $pdo->query("SELECT * FROM capitulos WHERE id_c = '$liv';");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
$total = $res[0]['quant_c'];
for ($i = 1; $i < $total + 1; $i++) {
    if (isset($cap)) {
        $active = "#0098B3";
    }
?>
    <a href="home.php?pag=leitura&livro=<?php echo $liv; ?>&cap=<?php echo $i; ?>" class="cap_a">
        <div class="cap" style="background-color: <?php echo isset($active) && $cap == $i ? $active : ''; ?>;">
            <p><?php echo $i ?></p>
        </div>
    </a>
<?php
}
