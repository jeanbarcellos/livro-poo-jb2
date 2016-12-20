<?php

// inclui as classes necessárias
include_once 'app.widgets/TElement.class.php';
include_once 'app.widgets/TImage.class.php';

// instancia objeto imagem
$gnome = new TImage('app.images/gnome.png');
$gnome->show(); // exibe objeto imagem

// instancia objeto imagem
$gimp = new TImage('app.images/gimp.png');
$gimp->show(); // exibe objeto imagem
