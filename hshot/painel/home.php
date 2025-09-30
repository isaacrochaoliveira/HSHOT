<?php

require_once 'db/connect.php';
require_once 'db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

?>
<div class="container">
    <div class="row">
        <div class="col border p-4 info">
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box text-bg-danger">
            <div class="inner">
                <h3>65</h3>
                <p>Processos de Leituras</p>
            </div>
            <svg
                class="small-box-icon"
                fill="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true">
                <path
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                    d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"></path>
                <path
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                    d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"></path>
            </svg>
            <a
                href="#"
                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                More info <i class="bi bi-link-45deg"></i>
            </a>
        </div>
    </div>
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
            url: '',
            method: 'post',
            data: {},
            success: function(data) {
                
            }
        })
    })
</script>