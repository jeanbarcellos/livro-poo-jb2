<?php
/*
 * função __autoload()
 * carrega uma classe quando ela é necessária,
 * ou seja, quando ela é instancia pela primeira vez.
 */
function __autoload($classe) {
    if (file_exists("app.ado/{$classe}.class.php")) {
        include_once "app.ado/{$classe}.class.php";
    }
}

class Aluno extends TRecord {
    const TABLENAME = 'aluno';
}

class Turma extends TRecord {
    const TABLENAME = 'turma';
}

class Inscricao extends TRecord {
    const TABLENAME = 'inscricao';
}


// obtém objetos do banco de dados
try
{
    TTransaction::open(); // inicia transação com o banco 'pg_livro'    

    // instancia um repositório para Turma
    $repository = new TRepository('Turma');
    
    // Primeiro exemplo, 
    // Lista todas turmas em andamento no turno Tarde
    $criteria = new TCriteria; // cria um critério de seleção    
    //$criteria->add(new TFilter('turno', '=', 'T')); // filtra por turno
    $criteria->add(new TFilter('encerrada', '=', FALSE)); // filtra por encerrada

    // retorna todos objetos que satisfazem o critério
    $turmas = $repository->load($criteria);    

    // verifica se retornou alguma turma
    if ($turmas){
        echo "Turmas retornadas <br>\n";

        // percorre todas turmas retornadas
        foreach ($turmas as $turma) {
            echo "ID : " . $turma->id . "<br>";
            echo "Dia : " . $turma->dia_semana . "<br>";
            echo "Sala : " . $turma->sala . "<br>";
            echo "Turno: " . $turma->turno . "<br>";
            echo "Professor: " . $turma->professor . "<br>";
            echo "<br>\n";
        }
    }

    // finaliza a transação
    TTransaction::close();
}
catch (Exception $e) // em caso de exceção
{
    echo '<b>Erro</b>' . $e->getMessage(); // exibe a mensagem gerada pela exceção

    TTransaction::rollback(); // desfaz todas alterações no banco de dados
}