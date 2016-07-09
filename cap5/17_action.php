<?php

include_once 'app.widgets/TAction.class.php';

class Receptor {

    function acao($parameter) {
        echo "Ação executada com sucesso\n<br>";
    }

}

$action1 = new TAction(array(new Receptor, 'acao'));
$action1->setParameter('nome', 'pablo');
$action1->setParameter('opt', 'ins');
echo $action1->serialize();
echo "<br>\n";

$action2 = new TAction('strtoup');
$action2->setParameter('nome', 'pablo');
echo $action2->serialize();
