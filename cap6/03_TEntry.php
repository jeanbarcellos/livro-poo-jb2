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

// cria uma série de rótulos de texto
$label1 = new TLabel('Código');
$label2 = new TLabel('Nome');
$label3 = new TLabel('Cidade');
$label4 = new TLabel('Endereço');
$label5 = new TLabel('Telefone');

$label1->show();
$codigo->show();

// exibe o formulário
$form->show();
