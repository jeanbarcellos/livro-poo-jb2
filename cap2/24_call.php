<?php
# inclui classe Produto
include_once 'classes/Produto4.class.php';

# criando novo produto com o pre�o R$ 345.67
$produto = new Produto(1, 'Pendrive 512Mb', 1, 345.67);

# executando m�todo Vender, passando 10 unidades.
echo $produto->Vender(10);
?>
