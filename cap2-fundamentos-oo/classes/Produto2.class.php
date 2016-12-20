<?php
class Produto
{
    public $Codigo;
    public $Descricao;
    public $Preco;
    public $Quantidade;
    
    function ImprimeEtiqueta()
    {
        echo 'Código:    '. $this->Codigo ."<br>\n";
        echo 'Descrição: '. $this->Descricao ."<br>\n";
    }
}
?>