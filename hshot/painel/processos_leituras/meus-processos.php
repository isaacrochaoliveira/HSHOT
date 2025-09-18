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
    <div class="meus_pl">

    </div>
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

<div class="modal fade" id="ModalNaoFinalizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Finalização de Processo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="arvo-regular">Detectamos que seu processo de leitura está em andamento. Capítulos ainda Restantes!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
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

<div class="modal fade" id="ModalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Informações Processo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="arvo-regular-italic">Algumas informações sobre o seu Processo de Leitura</p>
                <hr>
                <div class="info-content"></div>
            </div>
            <div class="modal-footer">
                <input type="text" id="idInfo_PL" hidden>
                <a href="#" title="Detalhes de Cada Capítulo" class="f-20"><i class="fa-solid fa-book-bible"></i></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalInserirCap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Inserir Capítulos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="arvo-regular">Informe a quantidade de Capítulos e a Data à qual foram lidos</p>
                <div class="form-group my-2">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="quant_cap" placeholder="Quantidade de Capítulos">
                        <label for="quant_cap">Quantidade de Capítulos*</label>
                    </div>
                </div>
                <div class="form-group my-2">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="data_cap" placeholder="Data dos Capítulos">
                        <label for="data_cap">Data dos Capítulos*</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="text" id="idInsCap_PL" hidden>
                <input type="text" id="idLivro" hidden>
                <button type="button" class="btn btn-primary" id="btnInsCap_PL">Inserir</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalDestacarVers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Destacar Versículo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="arvo-regular">Informe o versículo que deseja destacar</p>
                <div class="d-flex flex-wrap">
                    <div class="col-md-7">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="livroReadOnlyDesc" placeholder="Salmos" readonly>
                                <label for="#">Livro</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mx-2">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="capitulo_destacar" placeholder="Capítulo" max="150" min="1">
                                <label for="capitulo_destacar">Capítulo</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="versiculo_destacar" placeholder="MT *:20" min="1">
                                <label for="versiculo_destacar">Versículo</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="text" id="idLivro" hidden>
                <button type="button" class="btn btn-primary" id="btnInsCap_PL">Inserir</button>
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

<script>
    $('#btnFin_PL').click(function() {
        var id = $('#idFin_PL').val();
        var data_fim = $('#data_fim_pl').val();
        var obs_fin = $('#obs_fin_pl').val();
        var status_pl = $('#status_pl').val();

        if (data_fim == "") {
            alert("Preencha a data de término");
            return false;
        }

        $.ajax({
            url: "painel/processos_leituras/code/finalizar_pl.php",
            method: "post",
            data: {
                id: id,
                data_fim: data_fim,
                obs_fin: obs_fin,
                status_pl: status_pl
            },
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    });
</script>

<script>
    function infoPL(id) {
        $.ajax({
            url: "painel/processos_leituras/code/mostrar_info.php",
            method: "post",
            data: {
                id: id
            },
            success: function(data) {
                $('.info-content').html(data);
            }
        });
    }
</script>

<script>
    $('#btnInsCap_PL').click(function() {
        var idLivro = $('#idLivro').val();
        var id = $('#idInsCap_PL').val();
        var quant_cap = $('#quant_cap').val();
        var data_cap = $('#data_cap').val();

        if (quant_cap == "" || quant_cap <= 0) {
            alert("Preencha a quantidade de capítulos");
            return false;
        }
        if (quant_cap > 7) {
            alert("A quantidade não permitida.");
            return false;
        }
        if (data_cap == "") {
            alert("Preencha a data dos capítulos");
            return false;
        }

        $.ajax({
            url: "painel/processos_leituras/code/inserir_cap.php",
            method: "post",
            data: {
                idLivro: idLivro,
                id: id,
                quant_cap: quant_cap,
                data_cap: data_cap
            },
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    });
</script>