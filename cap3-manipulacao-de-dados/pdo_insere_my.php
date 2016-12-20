<?php
#$conn = mysql_connect('localhost', 'root', 'inter1909');
#mysql_select_db('livro', $conn);

try
{
    // instancia objeto PDO, conectando no mysql
    $conn = new PDO('mysql:host=localhost; port=3306; dbname=livro; charset=utf8', 'root', 'inter1909');
    #mysql_set_charset('utf8', $conn);

    
    // executa uma série de instruções SQL
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (1, 'Érico Veríssimo')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (7, 'Mário Quintana')");/**/
    
    // fecha a conexão
    $conn = null;
}
catch (PDOException $e)
{
    // caso ocorra uma exceção, exibe na tela
    print "Erro!: " . $e->getMessage() . "\n";
    die();
}
?>