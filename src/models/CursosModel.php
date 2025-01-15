<?php
require_once 'Connection.php';
class CursosModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function listarCursos($id) {
        if($id === null) {
            $stmt = $this->pdo->query('SELECT * FROM CURSOS');
            $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cursos;
            // var_dump($retorno);
        }
    }
}