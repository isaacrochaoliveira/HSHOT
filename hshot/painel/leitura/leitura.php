<?php

require_once 'db/connect.php';
require_once 'db/autenticator.php';
@session_start();
?>
<div class="d-flex flex-wrap">
    <div class="w-75">
        <?php 
        if (!(isset($_GET['livro']))) {
            ?>
            <div class="mst_li">
                <div class="d-flex flex-wrap gap-2">
                    <?php require_once 'painel/leitura/code/listar_livros.php'; ?>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="mst_li">
                <div class="d-flex flex-wrap gap-2">
                    <?php require_once 'painel/leitura/code/listar_capitulos.php'; ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="w-25">
        <?php 
            require_once 'painel/leitura/code/mostrar_info.php';    
        ?>
    </div>
</div>