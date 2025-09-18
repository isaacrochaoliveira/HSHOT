<?php

require_once 'db/connect.php';
require_once 'db/autenticator.php';
@session_start();

?>
<div class="container">
    <div class="d-flex wrap justify-content-between">
        <div class="col-md-6">
            <h3 class="anton-regular">Meus Processos de Leitura</h3>
        </div>
        <div class="col-md-3">
            <form action="#" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Pesquisar Título ou Descrição" aria-label="Pesquisar Processo" aria-describedby="button-addon2" id="pesq_pl" oninput="pesquisarPL()">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="meus_pl">

</div>

<div class="modal fade" id="ModalConfirmDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Exclusão de Processo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <small>Ação não poderá ser desfeita</small>
                <p class="arvo-regular f-20">Tem certeza que deseja excluir este processo?</p>
            </div>
            <div class="modal-footer">
                <input type="text" id="idDel_PL" hidden>
                <button type="button" class="btn btn-dark" id="btnDel_PL">Excluir</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalFinalizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Finalização de Processo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group my-2">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="data_fim_pl" placeholder="Data de Término">
                            <label for="data_fim_pl">Data de Término*</label>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Observações Finais" id="obs_fin_pl" style="height: 100px"></textarea>
                            <label for="obs_fin_pl">Observações Finais</label>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <div class="form-floating">
                            <select name="status_pl" id="status_pl" class="form-select">
                                <option value="Finalizado">Finalizado</option>
                            </select>
                            <label for="status_pl">Status*</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="text" id="idFin_PL" hidden>
                <button type="button" class="btn btn-danger" id="btnFin_PL">Finalizar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.spinner-border').hide();
    });
</script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "painel/processos_leituras/code/listar_meus_pls.php",
            method: "post",
            data: {},
            success: function(data) {
                $('.meus_pl').html(data);
            }
        });
    });
</script>

<script>
    function pesquisarPL() {
        var pesq = $('#pesq_pl').val();
        $.ajax({
            url: "painel/processos_leituras/code/listar_meus_pls.php",
            method: "post",
            data: {
                pesq: pesq
            },
            success: function(data) {
                $('.meus_pl').html(data);
            }
        });
    }
</script>

<script>
    $('#btnDel_PL').click(function() {
        var id = $('#idDel_PL').val();
        $.ajax({
            url: "painel/processos_leituras/code/excluir_pl.php",
            method: "post",
            data: {
                id: id
            },
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    });
</script>