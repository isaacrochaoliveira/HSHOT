<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$ident = AUTENT();
$id_pl = $_POST['id'] ?? '';

if ($id_pl) {
    // Verificar se o processo de leitura pertence ao usuário logado
    $sql = $pdo->query("SELECT * FROM processo_leitura WHERE id_pl = '$id_pl' AND id_mem_pl = '$ident'");
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (count($res) > 0) {
        // Processo de leitura encontrado, proceder com a exclusão
        $sql_del = $pdo->query("DELETE FROM processo_leitura WHERE id_pl = '$id_pl'  AND id_mem = '$ident'");
        $sql_del = $pdo->query("DELETE FROM pl_inserircap WHERE id_pl = '$id_pl' AND id_mem_ic = '$ident'");
        $sql_del = $pdo->query("DELETE FROM versiculos_destacados WHERE id_pl = '$id_pl' AND id_mem_vd = '$ident'");
        echo "Processo de leitura excluído com sucesso.";
    } else {
        echo "Processo de leitura não encontrado ou você não tem permissão para excluí-lo.";
    }
} else {
    echo "ID do processo de leitura não fornecido.";
}

?>