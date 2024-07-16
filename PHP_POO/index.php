<?php 
// Define a classe bandas

class GenerosMetal { // Propriedades de classe podem ser definidas como públicas, privadas ou protegidas.
 
    /*   
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private'; */

    //Declara os gêneros de Metal
    public $nuMetal;
    public $heavyMetal;
    public $powerMetal;

    public function ouvir() {
        // imprimindo a msg que inclui os estilos de Metal
        echo "São bandas do Metal o $this->nuMetal, $this->heavyMetal, $this->powerMetal."; /*$this->metodo() chama o metodo() da classe usada para instanciar o objeto que está sendo executado (que pode ser uma subclasse da classe onde a chamada é feita). Você pode descobrir que classe é essa usando get_class($this).*/
    }
}
//Criando uma nova instância da classe GenerosMetal
$rock = new GenerosMetal();
// Atribuindo o valor "Slipknot" à propriedade 'GenerosMetal' do objeto $rock
$rock->nuMetal = "Slipknot";
// Atribuindo o valor "Iron Maiden" à propriedade 'heavMetal' do objeto $rock
$rock->heavyMetal = "Iron Maiden";
// Atribuindo o valor "Angra" à propriedade 'powerMetal' do objeto $rock
$rock->powerMetal = "Angra";
// Chamando o método 'ouvir' do objeto $meuCarro, que imprimirá a mensagem "Dirigindo o Toyota Corolla"
$rock->ouvir(); // São bandas de Metal como Slipknot, Iron Maiden, Angra.
?>