<?php 

$pegar_ip = $_SERVER["REMOTE_ADDR"];

$pegar_ip = filter_var($pegar_ip, FILTER_VALIDATE_IP);

$sql = $pdo->query("SELECT * FROM membros WHERE IP_membro = '$pegar_ip'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if(count($res) > 0){
    echo "Usuario autenticado com sucesso!";
    header("Location: hshot/home.php");
    exit;
} else {
    header("Location: https://hshot.com.br");
    exit();
}

?>