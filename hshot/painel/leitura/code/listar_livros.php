<?php

require_once 'db/connect.php';

$sql = $pdo->query("SELECT * FROM livros;");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < 39; $i++) {
?>
    <a href="home.php?pag=leitura&livro=<?php echo $res[$i]['id_l']; ?>" class="cap_a">
        <div class="cap">
            <?php
            if ($i < 39) {
            ?>
                <p><?php echo $res[$i]['nome_livro']; ?></p>
            <?php
            } else {
            ?>
                <p><?php echo $res[$i]['nome_livro']; ?></p>
            <?php
            }
            ?>
        </div>
    </a>
<?php
}
