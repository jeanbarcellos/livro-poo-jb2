<?php
function Abrir($file = null)
{
    if (!$file)
    {
        throw new Exception('Falta o par�metro com o nome do arquivo');
    }
    if (!file_exists($file))
    {
        throw new Exception('Arquivo n�o existente');
    }
    if (!$retorno = @file_get_contents($file))
    {
        throw new Exception('Imposs�vel ler o arquivo');
    }
    
    return $retorno;
    
}


// abrindo um arquivo
// tratamento de exce��es
try
{
    $arquivo = Abrir('/tmp/arquivo.dat');
    echo $arquivo;
}
// captura o erro
catch (Exception $excecao)
{
    $mensagem =  "Arquvio ". $excecao->getFile() ." : linha " . $excecao->getLine() . " # no. ". $excecao->getCode() ." : " . $excecao->getMessage() . "\n";
    
    // escreve no log todo tipo de erro
    $log = fopen('erros.txt', 'a'); # abre o arquivo e posiciona o ponteiro no final
    fwrite($log, $mensagem); # escreve
    fclose($log); # fecha

    echo $mensagem;

}
?>