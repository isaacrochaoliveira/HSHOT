<div class="modal fade" id="subirComunidade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title anton-regular fs-5" id="exampleModalLabel">Cadastro de Comunidade</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_comunidade" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="text" id="nome_com" placeholder="Nome da Comunidade..." class="form-control">
                                    <label for="nome_com">Nome da Comunidade</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <div class="form-floating">
                                    <textarea cols="10" rows="10" class="form-control" placeholder="Descrição..." id="desc_com"></textarea>
                                    <label for="desc_com">Descrição da Comunidade</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="criacaoComunidade" placeholder="Data de Criação" value="<?php echo date('Y-m-d') ?>" disabled>
                                    <label for="criacaoComunidade">Data de Criação</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <img src="<?php echo URL ?>/imagens/versiculo-do-dia.jpg" alt="Foto da Comunidade" width="450px" id="target">
                            <div class="my-2">
                                <input type="file" id="imagem_comunidade" name="imagem_comunidade" class="form-control" onchange="carregarImg()">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="btnCComunidade">Criar</button>
                    <button class="btn btn-primary d-none spinner-criar" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        <span role="status">Carregando...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once 'db/connect.php';
require_once 'db/autenticator.php';
@session_start();
?>
<div class="container">
    <div class="d-flex flex-wrap">
        <div class="col-md-6">
            <h3 class="anton-regular f-36">Participe de comunidades</h3>
            <p class="arvo-regular">Participe ou crie suas próprias comunidades para troca de experiências e tudo mais...</p>
        </div>
        <div class="col-md-6 mx-auto my-auto">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#subirComunidade">Subir Comunidade</button>
        </div>
    </div>
    <hr>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'painel/comunidade/code/rules.php',
            method: 'post',
            data: {},
            success: function(response) {
                $(".rules").html(response);
            }
        })
    })
</script>

<script>
    function carregarImg() {
        var target = document.getElementById('target');
        var file = document.querySelector("#imagem_comunidade").files[0];

        var arquivo = file['name'];
        resultado = arquivo.split(".", 2);

        var reader = new FileReader();

        reader.onloadend = function() {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }
</script>

<!-- <script>
    $(document).ready(function() {
        $("#btnCComunidade").click(function() {
            var nome = $('#nome_com').val();
            var desc = $('#desc_com').val();
            $.ajax({
                beforeSend: function() {
                    $('#btnCComunidade').addClass('d-none');
                    $('.spinner-criar').removeClass('d-none');
                    setInterval(function() {
                        $.ajax({
                            url: 'painel/comunidade/code/criarComunidade.php',
                            method: 'post',
                            data: {
                                nome: nome,
                                desc: desc
                            },
                            success: function(response) {
                                alert(response);
                            }
                        })
                    }, 5000)
                }
            })
        })
    })
</script> -->

<script type="text/javascript">
    $("#form_comunidade").submit(function() {
        var pag = "<?= $pag ?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            beforeSend: function() {
                $('#btnCComunidade').addClass('d-none');
                $('.spinner-criar').removeClass('d-none');
                setInterval(function() {
                    $.ajax({
                        url: 'painel/comunidade/code/criarComunidade.php',
                        type: 'POST',
                        data: formData,
                        success: function(mensagem) {
                            alert(mensagem);
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        xhr: function() { // Custom XMLHttpRequest
                            var myXhr = $.ajaxSettings.xhr();
                            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                                myXhr.upload.addEventListener('progress', function() {
                                    /* faz alguma coisa durante o progresso do upload */
                                }, false);
                            }
                            return myXhr;
                        }
                    });
                }, 5000)
            }
        })
    });
</script>