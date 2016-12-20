﻿<?php
/*
 * função __autoload()
 * Carrega uma classe quando ela é necessária,
 * ou seja, quando ela é instancia pela primeira vez.
 */

function __autoload($classe) {
    if (file_exists("app.ado/{$classe}.class.php")) {
        include_once "app.ado/{$classe}.class.php";
    }
}

try {
    // abre uma TRANSAÇÃO
    TTransaction::open('my_livro');

    // define a estratégia de LOG
    TTransaction::setLogger(new TLoggerHTML('tmp/arquivo.html'));

    // escreve mensagem de LOG
    TTransaction::log("Inserindo registro William Wallace");

    // cria uma instrução de INSERT
    $sql = new TSqlInsert;
    $sql->setEntity('famosos'); // define o nome da entidade (tabela)
    $sql->setRowData('codigo', 9); // atribui o valor de cada coluna
    $sql->setRowData('nome', 'William Wallace');

    // obtém a conexão ativa
    $conn = TTransaction::get();

    // executa a instrução SQL
    $result = $conn->Query($sql->getInstruction());

    // escreve mensagem de LOG
    TTransaction::log($sql->getInstruction());

    // define a estratégia de LOG
    TTransaction::setLogger(new TLoggerXML('tmp/arquivo.xml'));

    // escreve mensagem de LOG
    TTransaction::log("Inserindo registro Albert Einstein");

    // cria uma instrução de INSERT
    $sql = new TSqlInsert;
    $sql->setEntity('famosos'); // define o nome da entidade
    $sql->setRowData('codigo', 10);
    $sql->setRowData('nome', 'Albert Einstein'); // atribui o valor de cada coluna
    // obtém a conexão ativa
    $conn = TTransaction::get();

    // executa a instrução SQL
    $result = $conn->Query($sql->getInstruction());

    // escreve mensagem de LOG
    TTransaction::log($sql->getInstruction());

    // fecha a transação, aplicando todas as operações
    TTransaction::close();
} catch (Exception $e) {
    // exibe a mensagem de erro
    echo $e->getMessage();

    // desfaz operações realizadas durante a transação
    TTransaction::rollback();
}