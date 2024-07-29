<?php
class GerenciadorCarros
{
    private $arquivoJson = 'dados.json';
    private $carros = [];

    public function __construct()
    {
        // Carrega os dados do JSON se o arquivo existir
        if (file_exists($this->arquivoJson)) {
            $this->carros = json_decode(file_get_contents($this->arquivoJson), true);
        }
    }

    public function adicionarCarro($marca, $modelo, $ano, $cor, $caminhoFoto)
    {
        // Cria um novo array com os dados do carro
        $novoCarro = [
            'marca' => $marca,
            'modelo' => $modelo,
            'ano' => $ano,
            'cor' => $cor,
            'foto' => $caminhoFoto // Inclui o caminho da foto
        ];

        // Adiciona o novo carro ao array de carros
        $this->carros[] = $novoCarro;

        // Salva os dados atualizados no arquivo JSON
        $this->salvarJson();
    }

    private function salvarJson()
    {
        // Converte o array de carros para JSON e salva no arquivo
        file_put_contents($this->arquivoJson, json_encode($this->carros, JSON_PRETTY_PRINT));
    }

    public function getCarros()
    {
        // Retorna o array de carros
        return $this->carros;
    }

    // Outros métodos para atualizar, deletar carros, etc.
}
?>
