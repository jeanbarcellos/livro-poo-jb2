<?php
function Abrir($file = null)
{
    if (!$file)
    {
        trigger_error('Falta o parвmetro com o nome do Arquivo tchк1', E_USER_NOTICE); # Notнcia
        return false;
    }
    
    if (!file_exists($file))
    {
        trigger_error('Arquivo nгo existente tchк2', E_USER_ERROR); # Erro
        return false;
    }
    
    if (!$retorno = @file_get_contents($file))
    {
        trigger_error('Impossнvel ler o arquivo tchк3', E_USER_WARNING); # Atenзгo
        return false;
    }
    
    return $retorno;
}


// funзгo para manipular o erro
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



// define a funзгo manipula_erro como manipuladora dos erros ocorridos
set_error_handler('manipula_erro');

// abrindo um arquivo
$arquivo = Abrir('/tmp/arquivo.dat');
echo $arquivo;

/*
error_handler
A funзгo do usuбrio precisa aceitar dois parвmetros: o cуdigo de erro, e uma string descrevendo o erro. Entгo tem trкs parвmetros opcionais que podem ser dados: o nome do arquivo no qual o erro aconteceu, o nъmero da linha na qual o erro aconteceu, e o contexto no qual o erro aconteceu (uma matriz que aponta para a tabela de sнmbolos ativos no ponto em que o erro aconteceu). A funзгo pode ser mostrada como:

handler ( int $errno , string $errstr [, string $errfile [, int $errline [, array $errcontext ]]] )
errno
O primeiro parвmetro, errno, contйm o nнvel de erro que aconteceu, como um inteiro.
errstr
O segundo parвmetro, errstr, contйm a mensagem de erro, como uma string.
errfile
O terceiro parгmetro й opcional, errfile, o qual contйm o nome do arquivo no qual o erro ocorreu, como uma string.
errline
O quarto parвmetro й opcional, errline, o qual contйm o nъmero da linha na qual o erro ocorreu, como um inteiro.
errcontext
O quinto parвmetro й opcional, errcontext, o qual й uma matriz que aponta para a tabela de sнmbolos ativos no ponto aonde o erro ocorreu. Em outras palavras, errcontext irб conter uma matriz de cada vбriavel que exista no escopo aonde o erro aconteceu. O manipulador de erro do usuбrio nгo deve modificar o contexto de erro.

*/
?>