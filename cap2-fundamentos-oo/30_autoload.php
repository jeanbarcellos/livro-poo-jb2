<?php
# fun��o de carga auto�tica
function __autoload($classe)
{
    # busca classe no diret�rio de classes...
    include_once "classes/{$classe}.class.php";
}

# instanciando novo Produto
$bolo = new Produto(500, 'Bolo de Fub�', 4, 4.12);
echo 'C�digo: ' . $bolo->Codigo . "<br>\n";
echo 'Nome:     ' . $bolo->Descricao . "<br>\n";
?>