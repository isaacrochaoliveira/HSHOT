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
<div class="border-style">
    <div class="d-flex flex-wrap py-5">
        <div class="col-md-3">
            <a href="home.php?pag=comunidade" class="btn btn-secondary f-20"><i class="fa-solid fa-arrow-left"></i></a>
            <img src="<?= URL ?>imagens/comunidades/<?php echo $imagem ?>" alt="" class="img-thumbnail">
            <div>
                <h1 class="anton-regular"><?= $titulo ?></h1>
                <hr>
                <p class="arvo-regular f-20"><strong><?= $descricao ?></strong></p>
                <p class="arvo-regular f-16">Data de Criação: <u><?= $dataCriaçao_com ?></u></p>
                <p class="arvo-regular">Ativo desde de: <?= $dataCriaçao_com ?></p>
                <p class="arvo-regular">Atualmente a comunidade esta: <strong><u><?= $status ?></u></strong></p>
                <hr>
                <h3>Área do Pensamento <i class="fa-solid fa-comment"></i></h3>
                <div class="form-group mb-2">
                    <div class="form-floating">
                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo a publicação">
                        <label for="titulo">Título</label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="form-floating">
                        <textarea name="pensamento" id="pensamento" cols="30" rows="30" class="form-control" placeholder="No que você está pensamento hoje?"></textarea>
                        <label for="pensamento">No que você está pensando hoje?</label>
                    </div>
                </div>
                <button class="btn btn-danger" onclick="$('#pensamento').val(''); $('#titulo').val('')">Cancelar <i class="fa-solid fa-xmark"></i></button>
                <button class="btn btn-success" onclick="salvar_publicacao()">Concluir <i class="fa-solid fa-check"></i></button>
            </div>
        </div>
        <div class="col-md-9">
            <div class="feed"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalMSG" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Mensagem:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="msg-from-system">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    var id = "<?php echo $id ?>";
    $(document).ready(function() {
        feed();
    });

    function feed() {
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

    function salvar_publicacao() {
        var pensamento = $('#pensamento').val();
        var titulo = $('#titulo').val();
        $(document).ready(function() {
            $.ajax({
                url: 'painel/feed/code/salvar_feed.php',
                method: 'post',
                data: {
                    id: id,
                    think: pensamento,
                    titulo:titulo
                },
                success: function(response) {
                    if (response != '') {
                        $('#ModalMSG').modal('show');
                        $('.msg-from-system').text(response);
                    }
                    $('#pensamento').val();
                    feed();
                }
            })
        })
    }
    function excluir_feed(id) {
        var resp = confirm('Você tem certeza que deseja realmente excluir essa postagem');
        if (resp) {
            $(document).ready(function() {
                $.ajax({
                    url: 'painel/feed/code/ex_feed.php',
                    method: 'post',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $('#ModalMSG').modal('show');
                        $('.msg-from-system').text(response);
                        if (response == 'ERRO! Comunidade em estado ativo, não havendo a possibilidade de edição!') {
                            $('.msg-from-system').html('<p>ERRO! Comunidade em estado ativo, não havendo a possibilidade de edição ou você pode <a href="#">forçar exclução...</a></p>');    
                        }
                        feed();
                    }
                })
            })
        }
    }
</script>