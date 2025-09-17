<?php

require_once 'db/connect.php';
require_once 'db/autenticator.php';
@session_start();
?>
<div class="d-flex flex-wrap">
    <div class="w-75">
        <?php
        if (!(isset($_GET['livro']))) {
        ?>
            <div class="mst_li">
                <div class="d-flex flex-wrap gap-2">
                    <?php require_once 'painel/leitura/code/listar_livros.php'; ?>
                </div>
            </div>
    </div>
<?php
        } else {
?>
    <div class="mst_li">
        <div class="d-flex flex-wrap gap-2">
            <?php require_once 'painel/leitura/code/listar_capitulos.php'; ?>
        </div>
    </div>
<?php
        }
?>
</div>
<div class="w-25">
    <?php
    require_once 'painel/leitura/code/mostrar_info.php';
    ?>
</div>
</div>



<div class="modal fade" id="abrirProcesso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Confirmação
                    <div class="spinner-border text-secondary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Você tem certeza que deseja abrir este processo?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Abrir</button>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.spinner-border').hide();
    });
    $(document).on('click', '.btn-primary', function() {
        $('.spinner-border').show();
    });
</script>