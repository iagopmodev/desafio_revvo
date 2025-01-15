<?php  
require_once 'Connection.php';  
require_once 'vendor/autoload.php'; 
require_once 'src/core/core.php'; 
require_once 'src/Routes/routes.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);  
$dotenv->load();  


handleCors();