<?php
class Cachorro
{
    # m�todo construtor
    function __construct($nome, $idade, $raca)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;
    }
    
    # toXml, retorna o objeto no formato XML
    function toXml()
    {
        return
<<<XML
<cachorro>
	   <nome> {$this->nome} </nome>
	   <idade> {$this->idade} </idade>
	   <raca> {$this->raca} </raca>
</cachorro>
XML;
    }
}

$toto = new Cachorro('Tot�', 10, 'Fox Terrier');
$vava = new Cachorro('Daba', 8, 'D�lmata');
echo $toto->toXml();
echo $vava->toXml();
?>