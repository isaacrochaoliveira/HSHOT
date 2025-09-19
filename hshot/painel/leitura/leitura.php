<?php

require_once 'db/connect.php';
require_once 'db/autenticator.php';
@session_start();
?>
    <button class="btn btn-warning my-2" id="vO">Ver Processsos de Leitura</button>
<div class="d-flex flex-wrap">
    <div class="w-75">
        <?php
        ?>
            <div class="mst_li">
                <div class="d-flex flex-wrap gap-2">
                    <?php require_once 'painel/leitura/code/listar_livros.php'; ?>
                </div>
            </div>
    </div>
    <div class="w-25">
        <?php
        require_once 'painel/leitura/code/mostrar_info.php';
        ?>
    </div>
</div>



<div class="modal fade" id="abrirProcesso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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
                <form action="#" method="post" id="FormProcesso">
                    <div class="form-group">
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" id="titulo_pl" placeholder="Título da Organização">
                            <label for="titulo_pl">Nome da Organização*</label>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Descrição da Organização" id="desc_pl" style="height: 100px"></textarea>
                            <label for="desc_pl">Descrição</label>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="data_ini_pl" placeholder="Data de Início">
                            <label for="data_ini_pl">Data de Início*</label>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="data_fim_pl" placeholder="Data de Término" disabled>
                            <label for="data_fim_pl">Data de Término</label>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <div class="form-floating">
                            <select name="status_pl" id="status_pl" class="form-select">
                                <option value="Aberto">Aberto</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                            <label for="status_pl">Status*</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btn-ap">Abrir</button>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.spinner-border').hide();
    });
    $(document).ready(function() {
        $(".btn-ap").click(function() {
            var id_l = <?php echo isset($_GET['livro']) ? $_GET['livro'] : 'null'; ?>;
            var nome_org = $("#titulo_pl").val();
            var desc_org = $("#desc_pl").val();
            var data_ini = $("#data_ini_pl").val();
            var status_pl = $("#status_pl").val();

            if (nome_org == "") {
                alert("Preencha o nome da organização");
                return false;
            }
            if (data_ini == "") {
                alert("Coloque a data de hoje ou uma data futura");
                return false;
            }

            $.ajax({
                beforeSend: function() {
                    $('.spinner-border').show();
                    setInterval(function() {
                        $.ajax({
                            url: "painel/leitura/code/abrir_processo.php",
                            method: "post",
                            data: {
                                id_l: id_l,
                                nome_org: nome_org,
                                desc_org: desc_org,
                                data_ini: data_ini,
                                status_pl: status_pl
                            },
                            success: function(data) {
                                alert(data)
                                $('#abrirProcesso').modal('hide');
                                $('.spinner-border').hide();
                                $('#FormProcesso')[0].reset();
                                location.href = "home.php?pag=processos";
                            }
                        });
                    }, 5000);
                }
            });
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#vO').click(function() {
            window.location.href = 'home.php?pag=processos';
        });
    })
</script>