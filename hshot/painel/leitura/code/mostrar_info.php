<?php

require_once 'db/connect.php';
@session_start();
if (!(isset($_GET['livro']))) {
    echo "Nenhum livro selecionado";
} else {
    $livro = $_GET['livro'];

    $sql = $pdo->query("SELECT * FROM livros WHERE id_l = '$livro';");
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);

    ?>
        <h4 class="arvo-regular"><?php echo $res[0]['nome_livro']; ?></h4>
        <h1 class="anton-regular"><?php echo $res[0]['testa_livro']; ?></h1>
    <?php
}
    