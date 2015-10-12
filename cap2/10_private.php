<?php
# carrega a classe
include_once 'classes/Funcionario1.class.php';

$pedro = new Funcionario;
$pedro->Salario = 'Oitocentos e setenta e seis';

/*
Fatal error: Cannot access private property Funcionario::$Salario in D:\Google Drive\www\livro-php-poo\livro-poo-jb2\cap2\private.php on line 6

*/
?>
