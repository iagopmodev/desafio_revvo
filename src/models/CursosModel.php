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
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM CURSOS WHERE ID = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
    public function editarCurso($id, $dados) {
        // var_dump($dados['NOME']);
        $stmt = $this->pdo->prepare('UPDATE CURSOS SET NOME = :NOME, DESCRICAO = :DESCRICAO, DURACAO = :DURACAO, PRECO = :PRECO WHERE ID = :ID');
        $stmt->bindParam(':ID', $id, PDO::PARAM_INT);
        $stmt->bindParam(':NOME', $dados['NOME']);
        $stmt->bindParam(':DESCRICAO', $dados['DESCRICAO']);
        $stmt->bindParam(':DURACAO', $dados['DURACAO']);
        $stmt->bindParam(':PRECO', $dados['PRECO']);
        return $stmt->execute();
    }
}