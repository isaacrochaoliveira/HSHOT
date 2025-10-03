<?php

require_once 'db/connect.php';
require_once 'db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

?>
<div class="p-4 info">

</div>
<div class="diag">

</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'painel/code/versiculo-do-dia.php',
            method: 'post',
            data: {},
            success: function(data) {
                $('.info').html(data)
            }
        })
    })
</script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'painel/code/diagnostico.php',
            method: 'post',
            data: {},
            success: function(data) {
                $('.diag').html(data)
            }
        })
    })
</script>