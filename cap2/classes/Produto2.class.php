<?php
class Produto
{
    public $Codigo;
    public $Descricao;
    public $Preco;
    public $Quantidade;
    
    function ImprimeEtiqueta()
    {
        echo 'C�digo:    '. $this->Codigo ."<br>\n";
        echo 'Descri��o: '. $this->Descricao ."<br>\n";
    }
}
?>