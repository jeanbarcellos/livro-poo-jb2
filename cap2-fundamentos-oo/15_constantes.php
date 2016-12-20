<?php
class Biblioteca
{
    const Nome = "GTK ";
}

class Aplicacao extends Biblioteca
{
    // declara��o das constantes
    const Ambiente = "Gnome Desktop ";
    const Versao    = "3.8 ";
    
    /* m�todo construtor
     * acessa as constantes internamente
     */
    function __construct($Nome)
    {
        echo parent::Nome . self::Ambiente . self::Versao . $Nome . "<br>\n";
    }
}

// acessa as constantes externamente
echo Biblioteca::Nome . Aplicacao::Ambiente . Aplicacao::Versao . "<br>\n";
new Aplicacao('Dia');
new Aplicacao('Gimp');
?>