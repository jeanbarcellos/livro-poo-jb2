<?php
include_once 'app.widgets/TElement.class.php';

// inicia o documento html
$html = new TElement('html');

// instncia seção head
$head= new TElement('head');
$html->add($head); // adiciona ao html

// define o título da página
$title= new TElement('title');
$title->add('Titulo da pagina');
$head->add($title); // adiciona ao head

// inicia o body do html
$body = new TElement('body');
$body->bgcolor='#ffffdd';
$html->add($body); // adiciona ao html


// exibe o html com todos seus elementos filhos
$html->show();

