<?php

// inclui as classes necessárias
include_once 'app.widgets/TElement.class.php';
include_once 'app.widgets/TTable.class.php';
include_once 'app.widgets/TTableRow.class.php';
include_once 'app.widgets/TTableCell.class.php';
include_once 'app.widgets/TImage.class.php';
include_once 'app.widgets/TParagraph.class.php';

// dados
$dados[] = array(1, 'Maria do Rosário', 'http://www.maria.com.br', 'Itaqui');
$dados[] = array(2, 'Pedro Cardoso', 'http://www.pedro.com.br', 'Maçambará');
$dados[] = array(3, 'João de Barro', 'http://www.joao.com.br', "Porto Alegre");
$dados[] = array(3, 'Joana Pereira', 'http://www.joana.com.br', "Uruguaiana");
$dados[] = array(3, 'Erasmo Carlos', 'http://www.erasmo.com.br', "Florianópolis");


// instancia objeto tabela com borda de 1 pixel
$tabela = new TTable;
$tabela->border = 1;
$tabela->width = '100%';

// adiciona o cabecalho
$th = $tabela->addRow();
$th->bgcolor = '#F00';
$th->addCell('ID');
$th->addCell('Nome');
$th->addCell('E-mail');
$th->addCell('Cidade');


foreach($dados as $pessoa){
    
    $row = $tabela->addRow();
    
    $cel1 = $row->addCell($pessoa[0]);
    $cel1->align = 'center';
    
    $cel2 = $row->addCell($pessoa[1]);
    
    $cel2 = $row->addCell($pessoa[2]);
    
    $cel4 = $row->addCell($pessoa[3]);
    
    
}


// exibe a tabela
$tabela->show();