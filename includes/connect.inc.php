<?php

$dsn = "mysql:host=localhost;dbname=login_db"; 
$dbusername = "root";
$dbupassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbupassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    echo "Connection failed: {$th->getMessage()}";
}