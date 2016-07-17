<?php

// inclui as classes necessárias
include_once 'app.widgets/TElement.class.php';
include_once 'app.widgets/TTable.class.php';
include_once 'app.widgets/TTableRow.class.php';
include_once 'app.widgets/TTableCell.class.php';
include_once 'app.widgets/TParagraph.class.php';


$celula = new TTableCell("Celula 1");
$celula->show();
$celula2 = new TTableCell("Celula 2");
$celula2->show();

$linha = new TTableRow();
$linha->show();

