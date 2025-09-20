<?php
require_once 'db/connect.php';
require_once 'db/autenticator.php';
@session_start();

if (!($_SESSION['IP_mem'])) {
    echo "<script>href.location = 'home.php'</script>";
}
?>
<div class="text-center">
    <h1 class="anton-regular">Criador de Próposito</h1>
    <p class="arvo-regular">Se Comprometa com seu Pai, e Ele se compromete com você</p>
    <div class="d-flex flex-wrap gap-3">
        <div class="mx-auto">
            <p class="btn btn-primary arvo-regular AddPr">Adcionar <i class="fa-solid fa-plus"></i></p>
        </div>
    </div>
</div>
<hr>
<div class="d-flex flex-wrap gap-2">
    <div class="meus_propositos">

    </div>
</div>

<div class="modal fade" id="ModalExplic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Explicação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="f-20 arvo-regular">Essa é uma página destianada a:</p>
                <ul>
                    <li>
                        Criar e Editar seus própositos de Oração ou Jejum
                    </li>
                    <li>
                        Organizar para não se perder nem se esquecer
                    </li>
                    <li>
                        Ativar e Desativar segundo seu propósito
                    </li>
                    <li>
                        Colocar em prática o que te empurra pra perto de Deus
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalAddPr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Criar Propósito</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="d-flex flex-wrap">
                        <div class="col-md-7 mx-1">
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nome_mp" placeholder="Coloque um nome">
                                    <label for="nome_mp">Nome(*)</label>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <div class="form-floating">
                                    <textarea id="desc_mp" cols="50" rows="100" class="form-control"></textarea>
                                    <label for="desc_mp">Dê uma descrição à seu propósito</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mx-1">
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="baseBiblica_mp" placeholder="Base Biblica">
                                    <label for="baseBiblica_mp">Base Biblica (EX: Gênesis 1:1)</label>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="dataCriacao_mp" placeholder="*****">
                                    <label for="dataCriacao_mp">Data de Criação</label>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="dataAcabar_mp" placeholder="*****">
                                    <label for="dataAcabar_mp">Data para Acabar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="slvPro">Salvar Propósito</button>
                <button class="btn btn-primary buttonSpinner d-none" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        $("#ModalExplic").modal('show');
    })
</script> -->

<script>
    $(document).ready(function() {
        $('.AddPr').click(function() {
            $('#ModalAddPr').modal('show');
        })
    })
</script>

<script>
    $(document).ready(function() {
        $("#slvPro").click(function() {
            var nome_mp = $('#nome_mp').val();
            var desc_mp = $('#desc_mp').val();
            var baseBiblica_mp = $('#baseBiblica_mp').val();
            var dataCriacao_mp = $('#dataCriacao_mp').val();
            var dataAcabar_mp =  $('#dataAcabar_mp').val();

            if (nome_mp == "") {
                alert('Campo Nome Obrigatório');
            }

            $.ajax({
                beforeSend: function() {
                    $('.buttonSpinner').removeClass('d-none');
                    setInterval(function() {
                        $.ajax({
                            url: 'painel/propositos/code/salvarProposito.php',
                            method: 'post',
                            data: {
                                nome_mp: nome_mp,
                                desc_mp: desc_mp,
                                baseBiblica_mp: baseBiblica_mp,
                                dataCriacao_mp: dataCriacao_mp,
                                dataAcabar_mp: dataAcabar_mp
                            },
                            success: function(data) {
                                window.reload();
                            }
                        })
                    }, 5000)
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'painel/propositos/code/lstPropositos.php',
            method: 'post',
            data: {
                IP: <?=$_SESSION['IP_mem']?>
            },
            success: function(data) {
                $('.meus_propositos').html(data);
            }
        })
    })
</script>