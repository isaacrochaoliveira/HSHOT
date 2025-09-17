<?php 
@session_start();
?>
<style>
    .cap{
        width: 100px;
        height: 100px;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }

    .cap:hover{
        background-color: #e0e0e0;
        transform: translateY(-5px);
    }
</style>
<h1>Pagina de Leitura</h1>
<p>Organize sua jornada de leitura biblica com zelo e dedicação.</p>
<hr>
<div class="d-flex flex-wrap gap-5">
<?php 
for ($i = 1; $i <= 66; $i++) {
    ?>
    <div class="cap">
        <p>Gen</p>
    </div>
    <?php
}
?>
</div>