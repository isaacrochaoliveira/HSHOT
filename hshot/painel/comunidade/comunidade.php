<div class="modal fade" id="subirComunidade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title anton-regular fs-5" id="exampleModalLabel">Cadastro de Comunidade</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" id="nome_com" placeholder="Nome da Comunidade..." class="form-control">
                                <label for="nome_com">Nome da Comunidade</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-floating">
                                <textarea name="10" id="10" class="form-control" placeholder="Descrição..."></textarea>
                                <label for="desc_com">Descrição da Comunidade</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rules">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
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