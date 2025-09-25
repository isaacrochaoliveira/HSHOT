<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if (!isset($_SESSION['IP_mem'])) {
    echo "<script>window.location='../../index.php'</script>";
}

$id_mp = $_POST['id_mp'];

$sql = $pdo->query("SELECT * FROM meus_propositos WHERE id_mp = '$id_mp'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($res) == 0) {
    echo "Propósito de Deseja excluir não localizado!";
    exit();
} else {
    if (count($res) == 1) {
        $id_pl = $res[0]['id_pl_mp'];
        if (isset($id_pl) && ($id_pl != 0)) {
            $sql = $pdo->query("SELECT * FROM processo_leitura WHERE id_pl = '$id_pl'");
            $res = $sql->fetchAll(PDO::FETCH_ASSOC);
            if ($res[0]['status_pl'] == 'Aberto') {
                echo "Não foi possível a exclusão pois o Processo de Leitura vinculado não está terminado!";
                exit();
            }
        }
    }
}

$pdo->query("DELETE FROM meus_propositos WHERE id_mp = '$id_mp'");
echo "Sucesso!";