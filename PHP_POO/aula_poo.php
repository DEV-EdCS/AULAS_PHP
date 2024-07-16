<?php
// Definindo a classe Carro
class Carro {
    //Declaração de propriedade pública para a marca do carro
    public $marca;

    // Declaração de propriedade pública para o modelo do carro
    public $modelo;
    // Método público para simular a ação de dirigir
    public function dirigir() {
        // Imprimindo uma mensagem que inclui a marca e o modelo do carro
        echo "Dirigindo o $this->marca $this->modelo $this->cor $this->material";
    }
}
//Criando uma nova instância da classe Carro
$meuCarro = new Carro();
// Atribuindo o valor "Toyota" à propriedade 'marca' do objeto $meuCarro
$meuCarro->marca = "Toyota";
// Atribuindo o valor "Corolla" à propriedade 'modelo' do objeto $meuCarro
$meuCarro->modelo = "Corolla";
// Chamando o método 'dirigir' do objeto $meuCarro, que imprimirá a mensagem "Dirigindo o Toyota Corolla"
$meuCarro->cor = "Amarelo";
$meuCarro->material = "Feito de Metal";
$meuCarro->dirigir(); // Saída: Dirigindo o Toyota Corolla Amarelo
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>