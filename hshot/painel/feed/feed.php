<?php 
$id = addslashes($_GET['feed']);

$sql = $pdo->query("SELECT * FROM comunidades WHERE id_com = '$id'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) > 0) {
    $imagem = $res[0]['imagem_com'];
    $titulo = $res[0]['nome_com'];
    $descricao = $res[0]['desc_com'];
    $status = $res[0]['status_com'];

    $dataCriaçao_com = date('d/m/Y', strtotime($res[0]['dataCriacao_com']));
}

?>
<div class="container border">
    <div class="d-flex flex-wrap py-5">
        <div class="col-md-4">
            <a href="home.php?pag=comunidade" class="btn btn-secondary f-20"><i class="fa-solid fa-arrow-left"></i></a>
            <img src="<?=URL?>imagens/comunidades/<?php echo $imagem?>" alt="" class="img-thumbnail">
            <div>
                <h1 class="anton-regular"><?=$titulo?></h1>
                <hr>
                <p class="arvo-regular f-16"><?=$descricao?></p>
                <p class="arvo-regular f-16">Data de Criação: <u><?=$dataCriaçao_com?></u></p>
                <p class="arvo-regular">Atualmente a comunidade esta: <strong><u><?=$status?></u></strong></p>
                <hr>
                <h3>Área do Pensamento <i class="fa-solid fa-comment"></i></h3>
                <div class="form-group mb-3">
                    <div class="form-floating">
                        <textarea name="pensamento" id="pensamento" cols="30" rows="30" class="form-control" placeholder="No que você está pensamento hoje?"></textarea>
                        <label for="pensamento">No que você está pensando hoje?</label>
                    </div>
                </div>
                <button class="btn btn-danger">Cancelar <i class="fa-solid fa-xmark"></i></button>
                <button class="btn btn-success">Concluir <i class="fa-solid fa-check"></i></button>
            </div>
        </div>
        <div class="col-md-8">
            <div class="feed"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        feed();
    });
    function feed() {
        var id = "<?php echo $id ?>";
        $(document).ready(function() {
            $.ajax({
                url: 'painel/feed/code/feed.php',
                method: 'post',
                data: {
                    id: id
                },
                success: function(response) {
                    $('.feed').html(response);
                } 
            })
        })
    }
</script>