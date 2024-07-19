<?php 
// Classe Livro que representa um livro
class Livro {
    private $titulo;
    private $sinopse;
    private $editora;
    private $ano;
    private $isbn;
    private $cadastrado;
    private $estado;
    // private $caminhoCapa;

    // Construtor de classe
    public function _construct($titulo, $sinopse, $editora, $ano, $isbn, $cadastrado, $estado, $caminhoCapa) {
        $this->titulo = $titulo;
        $this->sinopse = $sinopse;
        $this->editora = $editora;
        $this->ano = $ano;
        $this->isbn = $isbn;
        $this->cadastrado = $cadastrado;
        $this->estado = $estado;
        // $this->caminhoCapa = $caminhoCapa;
    }

    // Getters para acessar as propriedade do livro
    public function getTitulo() {
        return $this->titulo;
    }

    public function getSinopse() {
        return $this->sinopse;
    }

    public function getEditora() {
        return $this->editora;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getISBN() {
        return $this->isbn;
    }

    public function getCadastrado() {
        return $this->cadastrado;
    }

    public function getEstado() {
        return $this->estado;
    }

    /*public function getcaminhoCapa() {
        return $this->caminhoCapa;
    }*/
}
?>