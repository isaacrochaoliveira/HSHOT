<?php 

$pegar_ip = $_SERVER["REMOTE_ADDR"];

$pegar_ip = filter_var($pegar_ip, FILTER_VALIDATE_IP);

try {
    $pdo->query("INSERT INTO membros SET IP_membro = '$pegar_ip'");
} catch (PDOException $e) {
    echo "Erro ao inserir IP: " . $e->getMessage(); 
}


?>