<?php
class Aplicacao
{
    /* m�todo Est�tico
     * l� o arquivo readme.txt
     */
    static function Sobre()
    {
        $fd = fopen('17_readme.txt', 'r');
        while ($linha = fgets($fd, 200))
        {
            echo $linha . '<br>';
        }
    }
}
echo "Informa��es sobre a aplica��o:<br>\n";
echo "=============================:<br>\n";
Aplicacao::Sobre();
?>