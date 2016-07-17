<?php

// inclui as classes necessárias
include_once 'app.widgets/TElement.class.php';
include_once 'app.widgets/TTable.class.php';
include_once 'app.widgets/TTableRow.class.php';
include_once 'app.widgets/TTableCell.class.php';
include_once 'app.widgets/TParagraph.class.php';

// instancia objeto tabela com borda de 1 pixel
$tabela = new TTable;
$tabela->border = 1;

// acrescenta uma linha na tabela
$linha1 = $tabela->addRow();
$linha1->addCell(1);
$linha1->addCell("Pafuncio da Silva Sauro");

// acrescenta uma linha na tabela
$linha2 = $tabela->addRow();
$linha2->addCell(2);
$linha2->addCell('Este é o logo do GIMP');

// acrescenta uma linha na tabela
$linha3 = $tabela->addRow();
$linha3->addCell(3);
$linha3->addCell('texto em duas colunas');

$linha4 = $tabela->addRow();
$celula = $linha4->addCell("-teste-");
$celula->colspan = 2;
        
// exibe a tabela
$tabela->show();
