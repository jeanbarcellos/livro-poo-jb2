<?php
# inclue classe XMLBase
include_once 'classes/XMLBase.class.php';

class Cachorro extends XMLBase
{
    # m�todo construtor
    function __construct($nome, $idade, $raca)
    {
        
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;
    }
}

$toto = new Cachorro('Tot�', 10, 'Fox Terrier');
$vava = new Cachorro('Daba', 8, 'D�lmata');
echo $toto->toXml();
echo $vava->toXml();
?>