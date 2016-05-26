<?php
function __autoload($classe) {
    if (file_exists("app.ado/{$classe}.class.php")) {
        include_once "app.ado/{$classe}.class.php";
    }
}

// cria uma instrução de INSERT
$sql = new TSqlInsert;

// define o nome da entidade (tabela)
$sql->setEntity('aluno');

// atribui o valor de cada coluna
$sql->setRowData('id', 3);
$sql->setRowData('nome', 'Pedro Cardoso');
$sql->setRowData('fone', '(88) 4444-7777');
$sql->setRowData('nascimento', '1985-04-12');
$sql->setRowData('sexo', 'M');
$sql->setRowData('serie', 4);
$sql->setRowData('mensalidade', 280.40);

// processa a instrução SQL
echo "<pre>";
echo $sql->getInstruction();


