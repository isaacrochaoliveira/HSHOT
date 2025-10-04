<?php
require_once 'db/connect.php';
require_once 'db/autenticator.php';
@session_start();

?>
<div class="">
    <h1 class="anton-regular">Criador de Próposito</h1>
    <p class="arvo-regular">Se Comprometa com seu Pai, e Ele se compromete com você</p>
    <div class="d-flex flex-wrap gap-2">
        <div>
            <button class="btn btn-primary arvo-regular AddPr">Adcionar <i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="">
            <input type="text" id="search_mpInput" class="form-control" placeholder="Pesquisar p/ Nome" oninput="search_mp()">
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
                    <span role="status">Carregando...</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalediPr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Modo de Edição</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="d-flex flex-wrap">
                        <div class="col-md-7 mx-1">
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="enome_mp" placeholder="Coloque um nome">
                                    <label for="nome_mp">Nome(*)</label>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <div class="form-floating">
                                    <textarea id="edesc_mp" cols="50" rows="100" class="form-control"></textarea>
                                    <label for="desc_mp">Dê uma descrição à seu propósito</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mx-1">
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="ebaseBiblica_mp" placeholder="Base Biblica">
                                    <label for="baseBiblica_mp">Base Biblica (EX: Gênesis 1:1)</label>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="edataCriacao_mp" placeholder="*****" readonly>
                                    <label for="dataCriacao_mp">Data de Criação</label>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="edataAcabar_mp" placeholder="*****">
                                    <label for="dataAcabar_mp">Data para Acabar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="text" id="InputMPEdit" hidden>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="EdtPro">Editar Propósito</button>
                <button class="btn btn-primary buttonSpinner d-none" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                    <span role="status">Carregando...</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Ainda Você Pode:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="f-20 arvo-regular">Essa é uma página destianada a:</p>
                <ul>
                    <li>
                        Conectar o seu propósito com o seu processo de leitura <a href="" data-bs-toggle="modal" data-bs-target="#ModalConectPL" onclick="pesquisarPL()">clicando aqui</a>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <input type="text" id="id_pl_mp" hidden>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalConectPL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Escolha o seu processo:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="meus_pl">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalLixoMp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 anton-regular" id="exampleModalLabel">Confirmação:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="arvo-regular f-20">Tem certeza que deseja excluir o propósito?</p>
            </div>
            <div class="modal-footer">
                <input type="text" id="inputlixomp" hidden>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button class="btn btn-danger" onclick="mplixo()">Confirmar</button>
            </div>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="location.reload();">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#ModalExplic").modal('show');
    })
</script>

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
            var dataAcabar_mp = $('#dataAcabar_mp').val();

            if (nome_mp == "") {
                alert('Campo Nome Obrigatório');
            }

            $.ajax({
                beforeSend: function() {
                    $('.buttonSpinner').removeClass('d-none');
                    $('#slvPro').addClass('d-none');
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
                                if (data.trim() == 'Sucesso!') {
                                    location.reload();
                                } else {
                                    $('.msg-from-system').text(data);
                                    $('#ModalMSG').modal('show');
                                }
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
        $("#EdtPro").click(function() {
            var nome_mp = $('#enome_mp').val();
            var desc_mp = $('#edesc_mp').val();
            var baseBiblica_mp = $('#ebaseBiblica_mp').val();
            var dataCriacao_mp = $('#edataCriacao_mp').val();
            var dataAcabar_mp = $('#edataAcabar_mp').val();
            var id_mp = $('#InputMPEdit').val();

            $.ajax({
                beforeSend: function() {
                    $('.buttonSpinner').removeClass('d-none');
                    $('#EdtPro').addClass('d-none');
                    setInterval(function() {
                        $.ajax({
                            url: 'painel/propositos/code/editarProposito.php',
                            method: 'post',
                            data: {
                                id_mp: id_mp,
                                nome_mp: nome_mp,
                                desc_mp: desc_mp,
                                baseBiblica_mp: baseBiblica_mp,
                                dataCriacao_mp: dataCriacao_mp,
                                dataAcabar_mp: dataAcabar_mp
                            },
                            success: function(data) {
                                if (data.trim() == 'Sucesso!') {
                                    location.reload();
                                } else {
                                    $('.msg-from-system').text(data);
                                    $('#ModalMSG').modal('show');
                                }
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
            success: function(data) {
                $('.meus_propositos').html(data);
            }
        })
    })
</script>

<script>
    function pesquisarPL() {
        $.ajax({
            url: "painel/propositos/code/listar_meus_pls.php",
            method: "post",
            data: {
                pesq: ""
            },
            success: function(data) {
                $('.meus_pl').html(data);
            }
        });
    }
</script>

<script>
    function ConnectPL(id_pl) {
        var id_mp = $('#id_pl_mp').val();
        $.ajax({
            beforeSend: function() {
                $(".spinner_connect").removeClass('d-none');
                $('.connect_left').addClass('d-none');
                setInterval(function() {
                    $.ajax({
                        url: 'painel/propositos/code/connect_pl_mp.php',
                        method: 'post',
                        data: {
                            id_pl: id_pl,
                            id_mp: id_mp
                        },
                        success: function(msg) {
                            if (msg.trim() == 'Sucesso!') {
                                location.reload();
                            } else {
                                $('.msg-from-system').text(data);
                                $('#ModalMSG').modal('show');
                            }
                        }
                    })
                }, 5000)
            }
        })
    }
</script>

<script>
    function editProposito(id_mp) {
        $.ajax({
            url: 'painel/propositos/code/pegar_dados.php',
            method: 'post',
            data: {
                id_mp: id_mp
            },
            success: function(data) {
                var dat = data.split(';');
                if (dat[0] != 'Propóosito não encontrado!') {
                    $('#InputMPEdit').val(id_mp)
                    $('#enome_mp').val(dat[0])
                    $('#edesc_mp').val(dat[1]);
                    $('#ebaseBiblica_mp').val(dat[2]);
                    $('#edataCriacao_mp').val(dat[3]);
                    $('#edataAcabar_mp').val(dat[4]);
                    $('#ModalediPr').modal('show');
                } else {
                    $('.msg-from-system').text(data);
                    $('#ModalMSG').modal('show');
                }
            }
        })
    }
</script>

<script>
    function modalLixoMp(id_mp) {
        $('#inputlixomp').val(id_mp);
        $("#ModalLixoMp").modal('show');
    }
</script>

<script>
    function mplixo() {
        var id_mp = $('#inputlixomp').val();
        $.ajax({
            url: 'painel/propositos/code/lixo.php',
            method: 'post',
            data: {
                id_mp: id_mp
            },
            success: function(data) {
                if (data.trim() == 'Sucesso!') {
                    location.reload();
                } else {
                    $('.msg-from-system').text(data);
                    $('#ModalMSG').modal('show');
                }
            }
        })
    }
</script>

<script>
    function AtulizarStatus_mp(id_mp) {
        $.ajax({
            url: 'painel/propositos/code/atualizar_status.php',
            method: 'post',
            data: {
                id_mp: id_mp
            },
            success: function(data) {
                $('.msg-from-system').text(data);
                $('#ModalMSG').modal('show');
            }
        })
    }
</script>

<script>
    function search_mp() {
        var seached = $('#search_mpInput').val();
        $(document).ready(function() {
        $.ajax({
            url: 'painel/propositos/code/lstPropositos.php',
            method: 'post',
            data: {
                nome:seached
            },
            success: function(data) {
                $('.meus_propositos').html(data);
            }
        })
    })
    }
</script>