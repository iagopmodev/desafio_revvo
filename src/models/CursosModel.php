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
        $stmt = $this->pdo->prepare('UPDATE CURSOS SET NOME = :NOME, DESCRICAO = :DESCRICAO, DURACAO = :DURACAO, PRECO = :PRECO WHERE ID = :ID');
        $stmt->bindParam(':ID', $id, PDO::PARAM_INT);
        $stmt->bindParam(':NOME', $dados['NOME']);
        $stmt->bindParam(':DESCRICAO', $dados['DESCRICAO']);
        $stmt->bindParam(':DURACAO', $dados['DURACAO']);
        $stmt->bindParam(':PRECO', $dados['PRECO']);
        $stmt->execute();

        return $this->listarCursos($id);
    }
    public function deletarCurso($id) {
        $stmt = $this->pdo->prepare('DELETE FROM CURSOS WHERE ID = :ID');
        $stmt->bindParam(':ID', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function criarCurso($dados) {
        $stmt = $this->pdo->prepare('INSERT INTO CURSOS (NOME, DESCRICAO, DURACAO, PRECO) VALUES (:NOME, :DESCRICAO, :DURACAO, :PRECO)');
        $stmt->bindParam(':NOME', $dados['NOME']);
        $stmt->bindParam(':DESCRICAO', $dados['DESCRICAO']);
        $stmt->bindParam(':DURACAO', $dados['DURACAO']);
        $stmt->bindParam(':PRECO', $dados['PRECO']);
        $stmt->execute();
    }
}