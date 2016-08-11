<?php
//$id = pg_connect("host=localhost port=5432 dbname=livro user=padrao password=inter1909");
//$result = pg_query($id, "select * from cliente where id = '1'");
//$matriz = pg_fetch_all($result);
//var_dump($matriz);
    
function getNome($codigo) {

    // verifica a passagem do parâmetro
    if (!$codigo) {
        throw new SoapFault('Client', 'Parâmetro não preenchido');
    }

    // conecta ao banco de dados
//    $id = pg_connect("dbname=livro user=postgres");
    $id = pg_connect("host=localhost port=5432 dbname=livro user=padrao password=inter1909");
    if (!$id) {
        throw new SoapFault("Server", "Conexão não estabelecida");
    }
    
    // realiza consulta ao banco de dados        
    $result = pg_query($id, "select * from cliente where id = '$codigo'");
    $matriz = pg_fetch_all($result);
    
    if ($matriz == null) {
        throw new SoapFault("Server", "Cliente não encontrado");
    }
    
    // retorna os dados
    return $matriz[0];
}

// instancia servidor SOAP
$server = new SoapServer("exemplo.wsdl", array('encoding' => 'ISO-8859-1'));
$server->addFunction("getNome");
$server->handle();

//var_dump($server);