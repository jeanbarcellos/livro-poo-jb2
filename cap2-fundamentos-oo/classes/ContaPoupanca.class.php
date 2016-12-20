<?php
final class ContaPoupanca extends Conta
{
    public $Aniversario;
    
    /* m�todo construtor (sobrescrito)
     * agora, tamb�m inicializa a vari�vel $Aniversario
     */
    function __construct($Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo, $Aniversario)
    {
        // chamada do m�todo construtor da classe-pai.
        parent::__construct($Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo);
        $this->Aniversario = $Aniversario;
    }
    
    /* m�todo Retirar (sobrescrito)
     * verifica se h� saldo para retirar tal $quantia.
     */
    function Retirar($quantia)
    {
        if ($this->Saldo >= $quantia)
        {
            // Executa m�todo da classe-pai.
            parent::Retirar($quantia);
        }
        else
        {
            echo "Retirada n�o permitida...\n";
            return false;
        }
        // retirada permitida
        return true;
    }
}
?>