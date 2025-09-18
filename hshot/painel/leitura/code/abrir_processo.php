<?php 

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

if(isset($_POST['nome_org'])){
    $id_l = $_POST['id_l'];
    $nome_org = $_POST['nome_org'];
    $desc_org = $_POST['desc_org'];
    $data_ini = $_POST['data_ini'];
    $status_pl = $_POST['status_pl'];

    $sql = $pdo->query("SELECT * FROM processo_leitura WHERE id_l = '$id_l' AND IP_mem = '$_SESSION[IP_mem]'");
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);
    if(count($res) > 0){
        echo 'Já existe um Processo de Leitura com esse Livro com o Título "' . $res[0]['titulo_pl'] . '".';
        exit();
    }

    $query = $pdo->prepare("INSERT INTO processo_leitura (id_l, titulo_pl, desc_pl, data_ini_pl, status_pl, IP_mem) VALUES (:id_l, :nome, :descricao, :data_inicio, :status, :ip_mem)");
    $query->bindValue(":id_l", $id_l);
    $query->bindValue(":nome", $nome_org);
    $query->bindValue(":descricao", $desc_org);
    $query->bindValue(":data_inicio", $data_ini);
    $query->bindValue(":status", $status_pl);
    $query->bindValue(":ip_mem", $_SESSION['IP_mem']);
    $query->execute();

    echo 'Processo aberto com sucesso!';
} else {
    echo 'Erro ao abrir o processo. Tente novamente.';
}

?>