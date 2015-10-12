<?php
include_once 'classes/Fornecedor1.class.php';
include_once 'classes/Produto2.class.php';

// instancia Fornecedor
$fornecedor = new Fornecedor;
$fornecedor->Codigo      = 848;
$fornecedor->RazaoSocial= 'Bom Gosto Alimentos S.A.';
$fornecedor->Endereco    = 'Rua Ipiranga';
$fornecedor->Cidade      = 'Po�os de Caldas';

// instancia Produto
$produto = new Produto;
$produto->Codigo      = 462;
$produto->Descricao = 'Doce de P�ssego';
$produto->Preco       = 1.24;
$produto->Fornecedor = $fornecedor;

// imprime atributos
echo 'C�digo      : ' . $produto->Codigo . "<br>\n";
echo 'Descri��o   : ' . $produto->Descricao . "<br>\n";
echo 'C�digo      : ' . $produto->Fornecedor->Codigo . "<br>\n";
echo 'Raz�o Social: ' . $produto->Fornecedor->RazaoSocial . "<br>\n";
?>
