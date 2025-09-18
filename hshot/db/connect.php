<?php 


$pdo = null;
try {
    $pdo = new PDO("mysql:host=localhost;dbname=hshot;charset=utf8mb4", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>