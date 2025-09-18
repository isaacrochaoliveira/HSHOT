<?php

require_once 'db/connect.php';
@session_start();
if (!(isset($_GET['livro']))) {
    echo "Nenhum livro selecionado";
} else {
    ?>
    <p>
        <a href="javascript:history.go(-1)" class="btn btn-secondary">Voltar</a>
    </p>
    <?php
    $livro = $_GET['livro'];

    $sql = $pdo->query("SELECT * FROM livros WHERE id_l = '$livro';");
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
    <h4 class="arvo-regular"><?php echo $res[0]['nome_livro']; ?> <?php echo isset($_GET['cap']) ? $_GET['cap'] : ''; ?></h4>
    <h1 class="anton-regular"><?php echo $res[0]['testa_livro']; ?></h1>
    <hr>
    <?php
    if (isset($_GET['cap'])) {
    ?>
        <p class="arvo-regular f-20">Gostaria de marcar este capítulo como favorito?</p>
    <?php
    } else {
    ?>
        <p class="arvo-regular f-20">Gostaria de abrir um organização Biblica nesse Livro?</p>
        <div>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#abrirProcesso">Abrir Organização</button>
            <button class="btn btn-warning" id="vO">Ver Organização</button>
        </div>
    <?php
    }
    ?>
    
<?php
}

?>
