<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dbHost = $_ENV['DB_HOST'];
$dbPort = $_ENV['DB_PORT'];
$dbDatabase = $_ENV['DB_DATABASE'];
$dbUserName = $_ENV['DB_USERNAME'];
$dbPassword = $_ENV['DB_PASSWORD'];

try {
    $pdo = new PDO(dsn: "mysql:host=$dbHost;port=$dbPort;dbname=$dbUserName;password=$dbPassword");
    $pdo->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);    
    return $pdo;
} catch(PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
    exit();    
}