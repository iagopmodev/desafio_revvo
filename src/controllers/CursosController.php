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
}
