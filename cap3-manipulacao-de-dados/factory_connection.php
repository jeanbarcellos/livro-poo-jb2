<?php

ini_set('default_charset', 'utf-8');

/**
 * função __autoload()
 * Carrega uma classe quando ela é necessária,
 * ou seja, quando ela é instancia pela primeira vez.
 */
function __autoload($classe) {
    if (file_exists("app.ado/{$classe}.class.php")) {
        include_once "app.ado/{$classe}.class.php";
    }
}

// cria instrução de SELECT
$sql = new TSqlSelect;
$sql->setEntity('famosos'); // define o nome da entidade
$sql->addColumn('codigo'); // acrescenta colunas à consulta
$sql->addColumn('nome');
$criteria = new TCriteria; // cria critério de seleção de dados
$criteria->add(new TFilter('codigo', '=', '1')); // obtém a pessoa de código "1"
$sql->setCriteria($criteria); // atribui o critério de seleção de dados
#echo $sql->getInstruction() . "<br>";


echo "Conexão MySQL <br>";

### MySQL ----------------------------------------------------------------------
try {
    // abre conexão com a base my_livro (mysql)
    $conn = TConnection::open();

    // executa a instrução SQL - utilizando os mtodos PDO
    $result = $conn->query($sql->getInstruction()); # query PDO

    if ($result) {
        $row = $result->fetch(PDO::FETCH_ASSOC); # fetch PDO
        // exibe os dados resultantes
        echo $row['codigo'] . ' - ' . $row['nome'] . "<br>\n";
    }
    
    // fecha a conexão
    $conn = null;
    
} catch (PDOException $e) {
    // exibe a mensagem de erro
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}


echo "<br>Conexão PostgreSQL <br>";

## PostgreSQL ------------------------------------------------------------------
try {

    // abre conexão com a base pg_livro (postgres)
    $conn = TConnection::open('pg_livro');

    // executa a instrução SQL
    $result = $conn->query($sql->getInstruction()); # query PDO

    if ($result) {
        $row = $result->fetch(PDO::FETCH_ASSOC); # fetch PDO
        // exibe os dados resultantes
        echo $row['codigo'] . ' - ' . $row['nome'] . "<br>\n";
    }
    
    // fecha a conexão
    $conn = NULL;
    
} catch (Exception $e) {

    // exibe a mensagem de erro
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}



