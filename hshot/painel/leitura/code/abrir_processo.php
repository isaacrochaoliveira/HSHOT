<?php 

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$ident = AUTENT();

if(isset($_POST['nome_org'])){
    $id_l = $_POST['id_l'];
    $nome_org = $_POST['nome_org'];
    $desc_org = $_POST['desc_org'];
    $data_ini = $_POST['data_ini'];
    $status_pl = $_POST['status_pl'];

    $sql = $pdo->query("SELECT * FROM processo_leitura WHERE id_l = '$id_l' AND id_mem_pl = '$ident'");
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);
    if(count($res) > 0){
        echo 'Já existe um Processo de Leitura com esse Livro com o Título "' . $res[0]['titulo_pl'] . '".';
        exit();
    }

    $query = $pdo->prepare("INSERT INTO processo_leitura (id_l, titulo_pl, desc_pl, data_ini_pl, status_pl, id_mem_pl) VALUES (:id_l, :nome, :descricao, :data_inicio, :status, :id_mem_pl)");
    $query->bindValue(":id_l", $id_l);
    $query->bindValue(":nome", $nome_org);
    $query->bindValue(":descricao", $desc_org);
    $query->bindValue(":data_inicio", $data_ini);
    $query->bindValue(":status", $status_pl);
    $query->bindValue(":id_mem_pl", $ident);
    $query->execute();

    echo 'Processo aberto com sucesso!';
} else {
    echo 'Erro ao abrir o processo. Tente novamente.';
}

?>