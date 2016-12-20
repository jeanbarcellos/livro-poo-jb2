<?php
class Cachorro
{
    private $Nascimento;
    
    # m�todo construtor
    function __construct($nome)
    {
        $this->nome = $nome;
    }
    
    # intercepta atribui��o
    function __set($propriedade, $valor)
    {
        if ($propriedade == 'Nascimento')
        {
            # verifica se valor � dividido em
            # 3 partes separadas por '/'
            if (count(explode('/', $valor))==3)
            {
                echo "Dado '$valor', atribuido � '$propriedade'<br>\n";
                $this->$propriedade = $valor;
            }
            else
            {
                echo "Dado '$valor', n�o atribuido � '$propriedade'<br>\n";
            }
        }
        else
        {
            $this->$propriedade = $valor;
        }
    }
}
?>