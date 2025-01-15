<?php
require 'vendor/autoload.php';
require 'src/core/core.php';
require 'src/controllers/CursosController.php';
$pdo = require 'Connection.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable((__DIR__ . '/../../'));
$dotenv->load();

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$cursosController = new CursosController($pdo);

if($path === '/listarCursos') {
    $id = null;
    $resultado = $cursosController->exibirCursos($id);
    echo json_encode($resultado);
    exit();
}