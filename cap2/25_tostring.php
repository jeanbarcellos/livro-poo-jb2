<?php
class Cachorro
{
    private $Nascimento;
    
    # m�todo construtor
    function __construct($nome)
    {
        $this->nome = $nome;
    }
    
    # tostring, executado sempre que o objeto for impresso
    function __tostring()
    {
        return $this->nome;
    }
}
$toto = new Cachorro('Tot�');
$vava = new Cachorro('Daba');
echo $toto;
echo "<br>\n";
echo $vava;
echo "<br>\n";
?>