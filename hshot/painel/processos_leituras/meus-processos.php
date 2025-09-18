<?php 

require_once 'db/connect.php';
require_once 'db/autenticator.php';
@session_start();

?>
<div class="container">
    <h3 class="anton-regular">Meus Processos de Leitura</h3>
    
</div>
<div class="meus_pl">
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('.spinner-border').hide();
    });
</script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "painel/processos_leituras/code/listar_meus_pls.php",
            method: "post",
            data: {},
            success: function (data) {
                $('.meus_pl').html(data);
            }
        });
    });
</script>