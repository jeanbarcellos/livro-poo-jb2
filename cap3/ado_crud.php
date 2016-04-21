<?php
$scripts = "";

/*
 * função __autoload()
 * carrega uma classe quando ela é necessária, ou seja, quando ela é instancia pela primeira vez.
 */
function __autoload($classe)
{
    if (file_exists("app.ado/{$classe}.class.php"))
    {
        include_once "app.ado/{$classe}.class.php";
        $scripts .= "app.ado/{$classe}.class.php <br>";
    }
}

echo "<pre>";

// INSERT
$sqlInsert = new TSqlInsert;
$sqlInsert->setEntity('aluno');
$sqlInsert->setRowData('id', 3);
$sqlInsert->setRowData('nome', 'Pedro Cardoso');
$sqlInsert->setRowData('fone', '(88) 4444-7777');
$sqlInsert->setRowData('nascimento', '1985-04-12');
$sqlInsert->setRowData('sexo', 'M');
$sqlInsert->setRowData('serie', 4);
$sqlInsert->setRowData('mensalidade', 280.40);

echo $sqlInsert->getInstruction();
echo "<br>\n";



// UPDATE
$sqlUpdate = new TSqlUpdate;

$sqlUpdate->setEntity('aluno');

$sqlUpdate->setRowData('nome', 'Pedro Cardoso da Silva');
$sqlUpdate->setRowData('rua', 'Machado de Assis');
$sqlUpdate->setRowData('fone', '(88) 3433-2323');

$criteria = new TCriteria;
$criteria->add(new TFilter('id', '=', 3));

$sqlUpdate->setCriteria($criteria);

// processa a instrução SQL
echo $sqlUpdate->getInstruction();
echo "<br>\n";




//  DELETE
$sql = new TSqlDelete;

$sql->setEntity('aluno');

$criteria = new TCriteria;
$criteria->add(new TFilter('id', '=', 3));

$sql->setCriteria($criteria);

// processa a instrução SQL
echo $sql->getInstruction();
echo "<br>\n";




// SELECT
$sql = new TSqlSelect;

$sql->setEntity('aluno');

$sql->addColumn('nome');
$sql->addColumn('fone');

$criteria = new TCriteria;
$criteria->add(new TFilter('nome', 'LIKE', 'maria%'));
$criteria->add(new TFilter('cidade','LIKE ', 'Porto%'));
$criteria->setProperty('ORDER', 'nome');
$criteria->setProperty('OFFSET', 0);
$criteria->setProperty('LIMIT', 10);

$sql->setCriteria($criteria);

// processa a instrução SQL
echo $sql->getInstruction();
echo "<br>\n";








#echo "$scripts";