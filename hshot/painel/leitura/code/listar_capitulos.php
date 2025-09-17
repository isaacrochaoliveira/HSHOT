<?php

require_once 'db/connect.php';

$cap = addslashes($_GET['livro']);

$sql = $pdo->query("SELECT * FROM capitulos WHERE id_c = '$cap';");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
$total = $res[0]['quant_c'];
for ($i = 1; $i < $total + 1; $i++) {
?>
    <a href="home.php?pag=leitura&livro=<?php echo $i; ?>" class="cap_a">
        <div class="cap">
            <p><?php echo $i ?></p>
        </div>
    </a>
<?php
}
