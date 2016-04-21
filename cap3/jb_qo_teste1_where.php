<?php
/*
 * função __autoload()
 * carrega uma classe quando ela é necessária, ou seja, quando ela é instancia pela primeira vez.
 */
function __autoload($classe)
{
    if (file_exists("app.ado/{$classe}.class.php"))
    {
        include_once "app.ado/{$classe}.class.php";
    }
}

echo "<pre>";

# EXEMPLO 1
# aqui vemos um exemplo de critério utilizando o operador lógico OR
# a idade deve ser menor que 16 OU maior que 60
# SQL: SELECT * FROM tabela WHERE idade < 16 OR idade > 60;
$where = new TCriteria;
$where->add(new TFilter('idade', '<', 16), TExpression::OR_OPERATOR);
$where->add(new TFilter('idade', '>', 60), TExpression::OR_OPERATOR);
echo $where->dump();
echo " <br>\n<br>\n";
