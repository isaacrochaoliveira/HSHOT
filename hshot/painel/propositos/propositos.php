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
            <p class="btn btn-primary arvo-regular">Adcionar <i class="fa-solid fa-plus"></i></p>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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