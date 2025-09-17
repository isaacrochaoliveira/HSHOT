<?php 
@session_start();
?>

    <h3>Ministério de leitura</h3>
    <p>Selecione um dos planos de leitura abaixo para começar sua jornada espiritual.</p>
<hr>
<div class="mst_li">
    <div class="d-flex flex-wrap gap-1">

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $.ajax({
            url: "painel/leitura/code/listar_livros.php",
            method: "POST",
            data: {},
            success: function(data) {
                $(".mst_li .d-flex").html(data);
            }
        })    
    });
</script>
