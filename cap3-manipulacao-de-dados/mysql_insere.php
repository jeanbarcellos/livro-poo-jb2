<?php
// abre conex�o com o MySQL
$conn = mysql_connect('localhost', 'root', 'rootpass');

// seleciona o banco de dados ativo
mysql_select_db('livro', $conn);

// insere v�rios registros
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (1, '�rico Ver�ssimo')", $conn);
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon')",     $conn);
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')",  $conn);
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna')",    $conn);
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')", $conn);
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')", $conn);
mysql_query("INSERT INTO famosos (codigo, nome) VALUES (7, 'M�rio Quintana')",  $conn);/**/

// fecha a conex�o
mysql_close($conn);
?>