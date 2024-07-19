<?php
// Classe GerenciadorCarros para gerenciar o CRUD dos Livros
class GerenciadorLivros {
    private $livros = [];
    private $arquivo = 'dados.json';

    // Construtor da classe, carrega os dados do arquivo JSON
    public function _construct() {
        if (file_exists($this->arquivo)) {
            $dados = file_get_contents($this->arquivo);
            $this->livros = json_decode($dados, true) ?? [];
        }
    }

    // Adiciona um novo livro e salva no arquivo JSON
    public function adicionarLivro($livro) {
        $this->livros[] = [
            'titulo' => $livro->getTitulo(),
            'editora' => $livro->getEditora(),
            'ano' => $livro->getAno(),
            'isbn' => $livro->getISBN(),
            'cadastrado' => $livro->getCadastrado(),
            'estado' => $livro->getEstado(),
            /*'capa' => $livro->getcaminhoCapa(),*/
        ];
        $this->salvarDados();
    }

    // Remove um livro pelo índice e salva no arquivo JSON
    public function deletarLivro($indice) {
        if (isset($this->livros[$indice])) {
            array_splice($this->livros, $indice, 1);
            $this->salvarDados();
        }
    }

    // Retorna a lista de livros
    public function getLivros() {
        return $this->livros;
    }

    // Salva os dados no arquivo JSON
    private function salvarDados() {
        file_put_contents($this->arquivo, json_encode($this->livros, JSON_PRETTY_PRINT));
    }
};
?>