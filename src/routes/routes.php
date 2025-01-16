<?php
require 'vendor/autoload.php';
require 'src/core/core.php';
require 'src/controllers/CursosController.php';
require_once 'src/core/core.php'; 
$pdo = require 'Connection.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable((__DIR__ . '/../../'));
$dotenv->load();

handleCors();

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$cursosController = new CursosController($pdo);

if($path === '/listarCursos' || preg_match('/^\/listarCursos\/(\d+)$/', $path, $matches)) {
    $id = isset($matches[1]) ? $matches[1] : null;
    $resultado = $cursosController->exibirCursos($id);
    echo json_encode($resultado);
    exit();
}

if($method === 'POST' && preg_match( '/^\/editarCurso\/(\d+)$/', $path, $matches)) {
    $id = $matches[1];
    $dados = $_POST;
    $resultado = $cursosController->editarCurso($id, $dados);
    echo json_encode(['message' => 'Curso atualizado com sucesso', 'curso' => $resultado]);
    exit();
}

if(preg_match('/^\/deletarCurso\/(\d+)$/', $path, $matches) && $method === 'DELETE') {
    $id = $matches[1];
    $resultado = $cursosController->deletarCurso($id);
    echo json_encode(['message' => 'Deletado com sucesso']);
    exit();
}

if($path === '/criarCurso') {
    $dados = $_POST;
    $resultado = $cursosController->criarCurso($dados);
    echo json_encode(['message' => 'Curso criado com sucesso']);
}

http_response_code(404);
echo json_encode(['message' => 'Rota não encontrada']);