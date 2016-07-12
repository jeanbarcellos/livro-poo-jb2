<?php

/*
 * função __autoload()
 * carrega uma classe quando ela é necessária,
 * ou seja, quando ela é instancia pela primeira vez.
 */
function __autoload($classe) {
    if (file_exists("app.widgets/{$classe}.class.php")) {
        include_once "app.widgets/{$classe}.class.php";
    }
}

// cria o formulário
$form = new TForm('form_pessoas');

// cria a tabela para organizar o layout
$table = new TTable;
$table->border = 1;
$table->bgcolor = '#f2f2f2';

// adiciona a tabela no formulário
$form->add($table);

// cria duas outras tabelas
$table1 = new TTable;
$table2 = new TTable;

// cria uma série de campos de entrada de dados
$codigo = new TEntry('codigo');
$codigo->setSize(70);

$nome = new TEntry('nome');
$nome->setSize(140);

$endereco = new TEntry('endereco');
$endereco->setSize(140);

$telefone = new TEntry('telefone');
$telefone->setSize(140);

$cidade = new TCombo('cidade');
$cidade->setSize(140);

$items = array();
$items['1'] = 'Porto Alegre';
$items['2'] = 'Lajeado';
$cidade->addItems($items);


// define quais são os campos do formulário
$form->setFields(array($codigo, $nome, $cidade, $telefone, $endereco, $telefone));

//$form->add($codigo);
//$form->add($nome);
//$form->add($cidade);
//$form->add($telefone);
//$form->add($endereco);
//$form->add($telefone);


// exibe o formulário
$form->show();