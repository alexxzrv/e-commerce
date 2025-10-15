<?php
session_start();

// Configuración de la base de datos
$host = "localhost";
$dbname = "e_commerce";
$username = "root";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>