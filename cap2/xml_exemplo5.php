<?php
// interpreta o documento XML
$xml = simplexml_load_file('xml/paises2.xml');

// altera��o de propriedades
$xml->populacao = '220 milhoes';
$xml->religiao = 'cristianismo';
$xml->geografia->clima = 'temperado';

// adiciona novo nodo
$xml->addChild('presidente', 'Chapolin Colorado');

// exibindo o novo XML
echo $xml->asXML();

// grava no arquivo paises2.xml
file_put_contents('xml/paises2.xml', $xml->asXML());
?>