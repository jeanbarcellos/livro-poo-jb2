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

// INSERT
$sqlInsert = new TSqlInsert; # Instanciando o objeto de Inser SQL
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
