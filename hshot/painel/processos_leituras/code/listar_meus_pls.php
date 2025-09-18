<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$sql = $pdo->query("SELECT * FROM processo_leitura WHERE IP_mem = '$_SESSION[IP_mem]' ORDER BY id_pl DESC");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Livro</th>
            <th scope="col">Título</th>
            <th scope="col">Descrição</th>
            <th scope="col">Data Início</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<?php
?>