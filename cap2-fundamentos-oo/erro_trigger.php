<?php
function Abrir($file = null)
{
    if (!$file)
    {
        trigger_error('Falta o par�metro com o nome do Arquivo tch�1', E_USER_NOTICE); # Not�cia
        return false;
    }
    
    if (!file_exists($file))
    {
        trigger_error('Arquivo n�o existente tch�2', E_USER_ERROR); # Erro
        return false;
    }
    
    if (!$retorno = @file_get_contents($file))
    {
        trigger_error('Imposs�vel ler o arquivo tch�3', E_USER_WARNING); # Aten��o
        return false;
    }
    
    return $retorno;
}


// fun��o para manipular o erro
function manipula_erro($numero, $mensagem, $arquivo, $linha, $context)
{
    $mensagem = "Arquivo $arquivo : linha $linha # no. $numero : $mensagem\n";
    
    // escreve no log todo tipo de erro
    $log = fopen('erros.txt', 'a'); # abre o arquivo e posiciona o ponteiro no final
    fwrite($log, $mensagem); # escreve
    fclose($log); # fecha
    
    ////--->>> exibir na tela
    
    // se for uma warning
    if ($numero == E_USER_WARNING)
    {
        echo $mensagem;
    }
    
    // se for um erro fatal
    else if ($numero == E_USER_ERROR)
    {
        echo $mensagem;
        die;
    }
    
}



// define a fun��o manipula_erro como manipuladora dos erros ocorridos
set_error_handler('manipula_erro');

// abrindo um arquivo
$arquivo = Abrir('/tmp/arquivo.dat');
echo $arquivo;

/*
error_handler
A fun��o do usu�rio precisa aceitar dois par�metros: o c�digo de erro, e uma string descrevendo o erro. Ent�o tem tr�s par�metros opcionais que podem ser dados: o nome do arquivo no qual o erro aconteceu, o n�mero da linha na qual o erro aconteceu, e o contexto no qual o erro aconteceu (uma matriz que aponta para a tabela de s�mbolos ativos no ponto em que o erro aconteceu). A fun��o pode ser mostrada como:

handler ( int $errno , string $errstr [, string $errfile [, int $errline [, array $errcontext ]]] )
errno
O primeiro par�metro, errno, cont�m o n�vel de erro que aconteceu, como um inteiro.
errstr
O segundo par�metro, errstr, cont�m a mensagem de erro, como uma string.
errfile
O terceiro par�metro � opcional, errfile, o qual cont�m o nome do arquivo no qual o erro ocorreu, como uma string.
errline
O quarto par�metro � opcional, errline, o qual cont�m o n�mero da linha na qual o erro ocorreu, como um inteiro.
errcontext
O quinto par�metro � opcional, errcontext, o qual � uma matriz que aponta para a tabela de s�mbolos ativos no ponto aonde o erro ocorreu. Em outras palavras, errcontext ir� conter uma matriz de cada v�riavel que exista no escopo aonde o erro aconteceu. O manipulador de erro do usu�rio n�o deve modificar o contexto de erro.

*/
?>