<?php 
// carrega as classes necessárias
include_once "app.ado/TExpression.class.php";
include_once "app.ado/TCriteria.class.php";
include_once "app.ado/TFilter.class.php";

// EXEMPLO 1
// aqui vemos um exemplo de critério utilizando o operador lógico OR
// a idade deve ser menor que 16 OU maior que 60
//  SQL: SELECT * FROM tabela WHERE idade < 16 OR idade > 60;

$critFilter1 = new TFilter('idade', '<', 16);  #echo $critFilter1->dump() . " <br>\n";
$critFilter2 = new TFilter('idade', '>', 60);  #echo $critFilter2->dump() . " <br>\n";

$criteria = new TCriteria;
$criteria->add($critFilter1, TExpression::OR_OPERATOR);
$criteria->add($critFilter2, TExpression::OR_OPERATOR);
echo $criteria->dump();
echo " <br>\n <br>\n";



// EXEMPLO 6
// neste caso temos o uso de um critério composto
// o primeiro critério aponta para sexo='F'
// (sexo feminino) e idade > 18 (maior de idade)
// o segundo critério aponta para sexo=M (masculino)
// e idade < 16 (menor de idade)
// SELECT * FROM tabela
//  WHERE (sexo = 'F' AND idade > 18)
//     OR (sexo = 'M' AND idade < 16)

### Filtro 1 e 2 do primero critério
$crit6aFilter1 = new TFilter('sexo', '=', 'F');
$crit6aFilter2 = new TFilter('idade', '>', '18');

$criteria6a = new TCriteria;
$criteria6a->add($crit6aFilter1);
$criteria6a->add($crit6aFilter2);
echo "Critério 1: " . $criteria6a->dump() . " <br>\n";

### Filtro 1 e 2 do segundo critério
$crit6bFilter1 = new TFilter('sexo', '= ', 'M');
$crit6bFilter2 = new TFilter('idade', '<', '16');

$criteria6b = new TCriteria;
$criteria6b->add($crit6bFilter1);
$criteria6b->add($crit6bFilter2);
echo "Critério 2: " . $criteria6b->dump() . " <br>\n";

echo "<br>\n";


$criteria6 = new TCriteria;
$criteria6->add($criteria6a, TExpression::OR_OPERATOR);
$criteria6->add($criteria6b, TExpression::OR_OPERATOR);

echo $criteria6->dump();
echo " <br>\n<br>\n";











?>