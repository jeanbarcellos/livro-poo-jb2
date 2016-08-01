<?php
/**
 * função __autoload()
 * carrega uma classe quando ela é necessária, ou seja, quando ela é instancia pela primeira vez.
 */

function __autoload($classe) {
    if (file_exists("app.ado/{$classe}.class.php")) {
        include_once "app.ado/{$classe}.class.php";
    }
}

// cria critério de seleção de dados
$criteria = new TCriteria;
$criteria->add(new TFilter('nome', 'LIKE', 'maria%'));
$criteria->add(new TFilter('cidade', 'LIKE ', 'Porto%'));

// define o ordenamento da consulta
$criteria->setProperty('ORDER', 'nome');

// define o intervalo de consulta
$criteria->setProperty('OFFSET', 0);
$criteria->setProperty('LIMIT', 10);

// cria instrução de SELECT
$sql = new TSqlSelect;

// define a entidade
$sql->setEntity('aluno');

// acrescenta colunas à consulta
$sql->addColumn('nome');
$sql->addColumn('fone');

// define o critério de seleção de dados
$sql->setCriteria($criteria);

// processa a instrução SQL
echo "<pre>";
echo $sql->getInstruction();
echo "<br>\n";
