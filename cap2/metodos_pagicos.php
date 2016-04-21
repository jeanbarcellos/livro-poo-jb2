<?php 
# inclui classe cachorro
include_once "classes/Funcionario_.class.php";

$jean = new Funcionario_("Jean Silva de Barcellos");

# __set()
$jean->Nascimento = "18 de dezenbro"; // atribuição inválida
$jean->Nascimento = "18/12/1989"; // atribuição inválida
$jean->Salario = 1000; // atribuição inválida

echo "<br><br>";
 



# __get()
echo $jean->Salario;

echo "<br><br>";


echo "<br><br>";
echo $jean->Aniversario(1);

echo "<br><br>";


# __ clone
$jean->Idade = 25;
$junior = clone $jean;
echo "Nome:  " . $jean->Nome . "<br>\n";
echo "Idade: " . $jean->Idade . " anos <br>\n";
echo "Nome:  " . $junior->Nome . "<br>\n";
echo "Idade: " . $junior->Idade . " anos <br>\n";

echo "<br><br>";





echo "<br><br>";

# __toString() 
echo $jean;
echo "<br>";


?>