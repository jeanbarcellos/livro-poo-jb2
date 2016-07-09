<?php

// inclui as classes necessárias
include_once 'app.widgets/TStyle.class.php';
include_once 'app.widgets/TElement.class.php';
include_once 'app.widgets/TPanel.class.php';
include_once 'app.widgets/TImage.class.php';
include_once 'app.widgets/TParagraph.class.php';

// instancia novo painel
$painel = new TPanel(400, 300);

// coloca objeto parágrafo na posição 10,10
$texto1 = new TParagraph('isso é um teste, x:10,y:10');
$painel->put($texto1, 10, 10);

// coloca objeto parágrafo na posição 200,200
$texto2 = new TParagraph('outro teste, x:200,y:200');
$painel->put($texto2, 200, 200);

// coloca objeto imagem na posição 10,180
$texto3 = new TImage('app.images/gnome.png');
$painel->put($texto3, 10, 180);

// coloca objeto imagem na posição 240,10
$texto4 = new TImage('app.images/gimp.png');
$painel->put($texto4, 240, 10);

$painel->show();
