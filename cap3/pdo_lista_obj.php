<?php
ini_set('default_charset', 'utf-8');

try {
    // instancia objeto PDO, conectando no Postgresql
    $conn = new PDO('pgsql:dbname=livro;user=padrao;password=inter1909;host=localhost');

    // executa uma instrução SQL de consulta
    $result = $conn->query("SELECT codigo, nome FROM famosos");
    if ($result) {
        // percorre os resultados via fetch()
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
            // exibe os dados na tela, acessando o objeto retornado
            echo $row->codigo . " - " . $row->nome . "<br>\n";
        }
    }
    // fecha a conexão
    $conn = null;
} catch (PDOException $e) {
    print "Erro!: " . $e->getMessage() . "<br/>";
    die();
}
