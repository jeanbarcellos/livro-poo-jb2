<?php

try {
    // instancia objeto PDO, conectando no Postgresql
    $conn = new PDO('pgsql:dbname=livro; user=padrao; password=inter1909; host=localhost');

    // executa uma instru��o SQL de consulta
    $result = $conn->query("SELECT codigo, nome FROM famosos");
    
    if ($result) {
        // percorre os resultados via itera��o
        foreach ($result as $row) {
            // exibe os resultados
            echo $row['codigo'] . ' - ' . $row['nome'] . "<br>\n";
        }
    }
    // fecha a conex�o
    $conn = null;
} catch (PDOException $e) {
    echo "Erro!: " . $e->getMessage() . "<br/>";
    die();
}