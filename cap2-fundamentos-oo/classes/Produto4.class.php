<?php
class Produto
{
    public $Codigo;
    public $Descricao;
    public $Quantidade;
    private $Preco;
    const MARGEM = 10;
    
    # m�todo construtor de um Produto
    function __construct($Codigo, $Descricao, $Quantidade, $Preco)
    {
        $this->Codigo    = $Codigo;
        $this->Descricao = $Descricao;
        $this->Quantidade= $Quantidade;
        $this->Preco     = $Preco;
    }
    
    # intercepta a chamada � m�todos
    function __call($metodo, $parametros)
    {
        echo "Voc� executou o m�todo: {$metodo}<br>\n";
        foreach ($parametros as $key => $parametro)
        {
            echo "\tPar�metro $key: $parametro<br>\n";
        }
    }
}
?>