<?php
/*
 * função __autoload()
 * Carrega uma classe quando ela é necessária,
 * ou seja, quando ela é instancia pela primeira vez.
 */
function __autoload($classe)
{
    if (file_exists("app.ado/{$classe}.class.php"))
    {
        include_once "app.ado/{$classe}.class.php";
        #echo "app.ado/{$classe}.class.php <br>";
    }
}

try
{
    // abre uma transação
    TTransaction::open('pg_livro');

    // cria uma instrução de INSERT
    $sql = new TSqlInsert;
    $sql->setEntity('famosos'); // define o nome da entidade
    $sql->setRowData('codigo', 8);// atribui o valor de cada coluna
    $sql->setRowData('nome', 'Galileu');
    #echo $sql->getInstruction() . "<br>";

    // obtém a conexão ativa
    $conn = TTransaction::get();
    // executa a instrução SQL
    $result = $conn->Query($sql->getInstruction()); #PDO


    // cria uma instrução de UPDATE
    $sql = new TSqlUpdate;
    $sql->setEntity('famosos'); // define o nome da entidade   
    $sql->setRowData('nome', 'Galileu Galilei'); // atribui o valor de cada coluna
    $criteria = new TCriteria; // cria critério de seleção de dados
    $criteria->add(new TFilter('codigo', '=', '8')); // obtém a pessoa de código "8"
    $sql->setCriteria($criteria);// atribui o critério de seleção de dados
    #echo $sql->getInstruction() . "<br>";

    // obtém a conexão ativa
    $conn = TTransaction::get();
    // executa a instrução SQL
    $result = $conn->Query($sql->getInstruction());

    // fecha a transação, aplicando todas operações
    TTransaction::close();
}
catch (Exception $e)
{
    // exibe a mensagem de erro
    echo $e->getMessage();
    
    // desfaz operações realizadas durante a transação
    TTransaction::rollback();

}