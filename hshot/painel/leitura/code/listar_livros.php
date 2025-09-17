<?php 

require_once '../../../db/connect.php';

$sql = $pdo->query("SELECT * FROM livros;");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($res); $i++) {
    if ($i < 39) {
        $cor = "00B356";
    } else {
        $cor = '0098B3';
    }
    ?>
    <div class="cap" style="background-color: #<?php echo $cor; ?>">
        <p><?php echo $res[$i]['nome_livro']; ?></p>
    </div>
    <?php
}