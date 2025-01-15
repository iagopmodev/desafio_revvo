<?php
require_once 'src/models/CursosModel.php';

class CursosController {
    private $pdo;
    protected $cursosModel;
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->cursosModel = new CursosModel($this->pdo);
    }
    public function exibirCursos($id = null) {
        return $this->cursosModel->listarCursos($id);
    }
    public function editarCurso($id, $dados) {
        return $this->cursosModel->editarCurso($id, $dados);
    }
    public function deletarCurso($id) {
        return $this->cursosModel->deletarCurso($id);
    }
    public function criarCurso($dados) {
        return $this->cursosModel->criarCurso($dados);
    }
}
