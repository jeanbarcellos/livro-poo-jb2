<?php
include_once 'classes/Pessoa2.class.php';
include_once 'classes/Conta4.class.php';
include_once 'classes/ContaPoupanca.class.php';

$carlos = new Pessoa(10, "Carlos da Silva", 1.85, 25, 72,"Ensino Médio", 650.00);
$conta = new ContaPoupanca(6677, "CC.1234.56", "10/07/02", $carlos, 9876, 500.00, '10/07');

/*
Fatal error: Class ContaPoupanca contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Conta::Transferir) in D:\Google Drive\www\livro-php-poo\livro-poo-jb2\cap2\classes\ContaPoupanca.class.php on line 34

Erro fatal: Classe ContaPoupanca contém um método abstrato e deve, portanto, ser declarada abstrata ou implementar as restantes métodos ( Conta :: Transferir ) em D: \ do Google Drive \ www \ Livro -php -poo \ Livro -poo - JB2 \ cap2 \ Classes \ ContaPoupanca.class.php na linha 34

*/
?>
