<?php 

@session_start();

define('URL', 'http://localhost/HSHOT/');


$pegar_ip = $_SERVER["REMOTE_ADDR"];

$pegar_ip = filter_var($pegar_ip, FILTER_VALIDATE_IP);

$sql = $pdo->query("SELECT * FROM membros WHERE IP_mem = '$pegar_ip'");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
if(count($res) > 0){

    $_SESSION['usuario'] = $res[0];
    $_SESSION['IP_mem'] = $pegar_ip;

} else {
    $pdo->query("INSERT INTO membros SET IP_membro = '$pegar_ip'");
}

?>