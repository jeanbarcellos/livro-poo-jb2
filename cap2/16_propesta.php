<?php
class Aplicacao
{
    static $Quantidade;
    
    /* m�todo Construtor
     * incrementa a $Quantidade de Aplica��es
     */
    function __construct($Nome)
    {
        // incrementa propriedade est�tica
        self::$Quantidade ++;
        $i = self::$Quantidade ;
        echo "Nova Aplica��o nr. $i: $Nome<br>\n";
    }
}
# cria novos objetos
new Aplicacao('Dia');
new Aplicacao('Gimp');
new Aplicacao('Gnumeric');
new Aplicacao('Abiword');
new Aplicacao('Evolution');
echo 'Quantidade de Aplica��es = ' . Aplicacao::$Quantidade . "<br>\n";
?>