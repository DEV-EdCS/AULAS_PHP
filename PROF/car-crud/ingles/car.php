<?php
// Classe Car que representa um carro
class Car {
    private $brand;
    private $model;
    private $year;
    private $color;

    // Construtor da classe
    public function __construct($brand, $model, $year, $color) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
    }

    // Getters para acessar as propriedades do carro
    public function getBrand() {
        return $this->brand;
    }

    public function getModel() {
        return $this->model;
    }

    public function getYear() {
        return $this->year;
    }

    public function getColor() {
        return $this->color;
    }
}
?>
