<?php
function __autoload($classe) {
    if (file_exists("app.ado/{$classe}.class.php")) {
        include_once "app.ado/{$classe}.class.php";
    }
}

class Aluno extends TRecord {

    const TABLENAME = 'aluno';

}

class Curso extends TRecord {

    const TABLENAME = 'curso';

}


try
{
    TTransaction::open();

    $record = new Aluno;

    $aluno = $record->load(3);

    TTransaction::close();

    var_dump($aluno);
}
catch (Exception $e) // em caso de exceção
{
    echo '<b>Erro:</b> ' . $e->getMessage();

    TTransaction::rollback();
}
