<?php
#inclui classe cachorro
include_once 'classes/Cachorro.class.php';

$toto = new Cachorro('Tot�');
$toto->Nascimento = '3 de mar�o'; // atribui��o inv�lida
$toto->Nascimento = '10/04/2005'; // atribui��o correta
?>
