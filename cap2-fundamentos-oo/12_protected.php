<?php
# carrega as classes
include 'classes/Funcionario2.class.php';
include 'classes/Estagiario.class.php';

$pedrinho = new Estagiario;
$pedrinho->SetSalario(248);
echo 'O Sal�rio do Pedrinho � R$: ' . $pedrinho->GetSalario() . "\n";
?>
