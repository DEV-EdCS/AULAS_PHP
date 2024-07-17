<?php
// Classe Carro que representa um carro
class Carro {
    private $marca;
    private $modelo;
    private $ano;
    private $cor;

    // Construtor da classe
    public function __construct($marca, $modelo, $ano, $cor) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->cor = $cor;
    }

    // Getters para acessar as propriedades do carro
    public function getMarca() {
        return $this->marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getCor() {
        return $this->cor;
    }
}
?>
