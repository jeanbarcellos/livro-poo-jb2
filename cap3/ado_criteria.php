<?php 
// carrega as classes necessárias
include_once "app.ado/TExpression.class.php";
include_once "app.ado/TCriteria.class.php";
include_once "app.ado/TFilter.class.php";

// EXEMPLO 1
// aqui vemos um exemplo de critério utilizando o operador lógico OR
// a idade deve ser menor que 16 OU maior que 60
//  SQL: SELECT * FROM tabela WHERE idade < 16 OR idade > 60;
$criteria = new TCriteria;
$criteria->add(new TFilter('idade', '<', 16), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('idade', '>', 60), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo " <br>\n<br>\n";



// EXEMPLO 2
// aqui vemos um exemplo de critério utilizando o operador lógico AND
// juntamente com os operadores de conjunto IN (dentro do conjunto) e NOT IN (fora do conjunto)
// a idade deve estar dentro do conjunto (24,25,26) e deve estar fora do conjunto (10)
//  SQL: SEELECT * FROM tabela WHERE idade IN (24,25,26) AND idade NOT IN (10);
$criteria2 = new TCriteria;
$criteria2->add(new TFilter('idade', 'IN', array(24,25,26)));
$criteria2->add(new TFilter('idade','NOT IN', array(10)));
echo $criteria2->dump();
echo " <br>\n<br>\n";


// EXEMPLO 3
// aqui vemos um exemplo de critério utilizando o operador de comparação LIKE
// o nome deve iniciar por "pedro" ou deve iniciar por "maria"
//  SQL: SELECT * FROM tabela WHERE nome LIKE 'pedro%' OR nome LIKE 'maria%';
$criteria3 = new TCriteria;
$criteria3->add(new TFilter('nome', 'LIKE', 'pedro%'), TExpression::OR_OPERATOR);
$criteria3->add(new TFilter('nome', 'LIKE', 'maria%'), TExpression::OR_OPERATOR);
echo $criteria3->dump();
echo " <br>\n<br>\n";


// EXEMPLO 4
// aqui vemos um exemplo de critério utilizando os operadores "=" e IS NOT
// neste caso, o telefone não pode conter valor nulo (IS NOT NULL)
// e o sexo deve ser feminino (sexo='F')
//  SQL: SELECT * FROM tabela WHERE  telefone IS NOT NULL AND sexo = 'F');
$criteria4 = new TCriteria;
$criteria4->add(new TFilter('telefone', 'IS NOT', NULL));
$criteria4->add(new TFilter('sexo', '=', 'F'));
echo $criteria4->dump();
echo " <br>\n<br>\n";


// EXEMPLO 5
// aqui vemos o uso dos operadores de comparação IN e NOT IN juntamente com
// conjuntos de strings. Neste caso, a UF deve estar entre (RS, SC e PR) E
// não deve estar entre (AC e PI).
//   SQL: SELECT * FROM tabela WHERE uf IN ('RS','SC','PR') AND uf NOT IN ('AC','PI');
$criteria5 = new TCriteria;
$criteria5->add(new TFilter('uf', 'IN', array('RS', 'SC', 'PR')));
$criteria5->add(new TFilter('uf', 'NOT IN', array('AC', 'PI')));
echo $criteria5->dump();
echo " <br>\n<br>\n<br>\n";




/*// EXEMPLO 6
// neste caso temos o uso de um critério composto
// o primeiro critério aponta para sexo='F'
// (sexo feminino) e idade > 18 (maior de idade)
$criteria6a = new TCriteria;
$criteria6a->add(new TFilter('sexo', '=', 'F'));
$criteria6a->add(new TFilter('idade', '>', '18'));
echo $criteria6a->dump();
echo " <br>\n<br>\n";

// o segundo critério aponta para sexo=M (masculino)
// e idade < 16 (menor de idade)
$criteria6b = new TCriteria;
$criteria6b->add(new TFilter('sexo', '= ', 'M'));
$criteria6b->add(new TFilter('idade', '<', '16'));
echo $criteria6b->dump();
echo " <br>\n<br>\n";

// SELECT * FROM tabela
//  WHERE (sexo = 'F' AND idade > 18)
//     OR (sexo = 'M' AND idade < 16)

// agora juntamos os dois critérios utilizando o operador lógico OR (ou). O resultado
// deve conter "mulheres maiores de 18" OU "homens menores de 16"
$criteria6 = new TCriteria;
$criteria6->add($criteria6a, TExpression::OR_OPERATOR);
$criteria6->add($criteria6b, TExpression::OR_OPERATOR);
echo $criteria6->dump();
echo " <br>\n<br>\n";*/




// EXEMPLO 6
// neste caso temos o uso de um critério composto
// o primeiro critério aponta para sexo='F'
// (sexo feminino) e idade > 18 (maior de idade)
// o segundo critério aponta para sexo=M (masculino)
// e idade < 16 (menor de idade)
// SELECT * FROM tabela
//  WHERE (sexo = 'F' AND idade > 18)
//     OR (sexo = 'M' AND idade < 16)

$criteria6a = new TCriteria;
$criteria6a->add(new TFilter('sexo', '=', 'F'));
$criteria6a->add(new TFilter('idade', '>', '18'));

$criteria6b = new TCriteria;
$criteria6b->add(new TFilter('sexo', '= ', 'M'));
$criteria6b->add(new TFilter('idade', '<', '16'));

$criteria6 = new TCriteria;
$criteria6->add($criteria6a, TExpression::OR_OPERATOR);
$criteria6->add($criteria6b, TExpression::OR_OPERATOR);

echo $criteria6->dump();
echo " <br>\n<br>\n";




?>