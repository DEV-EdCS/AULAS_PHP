<?php
// Classe CarManager para gerenciar o CRUD dos carros
class CarManager {
    private $cars = [];
    private $file = 'data.json';

    // Construtor da classe, carrega os dados do arquivo JSON
    public function __construct() {
        if (file_exists($this->file)) {
            $data = file_get_contents($this->file);
            $this->cars = json_decode($data, true) ?? [];
        }
    }

    // Adiciona um novo carro e salva no arquivo JSON
    public function addCar($car) {
        $this->cars[] = [
            'brand' => $car->getBrand(),
            'model' => $car->getModel(),
            'year' => $car->getYear(),
            'color' => $car->getColor()
        ];
        $this->saveData();
    }

    // Remove um carro pelo índice e salva no arquivo JSON
    public function deleteCar($index) {
        if (isset($this->cars[$index])) {
            array_splice($this->cars, $index, 1);
            $this->saveData();
        }
    }

    // Retorna a lista de carros
    public function getCars() {
        return $this->cars;
    }

    // Salva os dados no arquivo JSON
    private function saveData() {
        file_put_contents($this->file, json_encode($this->cars, JSON_PRETTY_PRINT));
    }
}
?>
