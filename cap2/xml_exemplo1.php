<?php
// interpreta o documento XML
$xml = simplexml_load_file('xml/paises.xml');

// exibe as informa��es do objeto criado
var_dump($xml);
?>