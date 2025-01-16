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
        if (empty($dados)) {
            $input = file_get_contents('php://input');
            $dados = json_decode($input, true);
        }

        if (empty($dados) || !isset($id) || 
            !isset($dados['NOME'], $dados['DESCRICAO'], $dados['DURACAO'], $dados['PRECO'])) {
            throw new Exception('Dados inválidos');
        }

        $dados = [
            "ID" => $id,
            "NOME" => $dados['NOME'],
            "DESCRICAO" => $dados['DESCRICAO'],
            "DURACAO" => (int)$dados['DURACAO'],
            "PRECO" => (float)$dados['PRECO']
        ];

        return $this->cursosModel->editarCurso($id, $dados);
    }
    public function deletarCurso($id) {
        return $this->cursosModel->deletarCurso($id);
    }
    public function criarCurso($dados) {
        return $this->cursosModel->criarCurso($dados);
    }
}
