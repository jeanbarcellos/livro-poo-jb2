<?php
class ContaCorrente extends Conta
{
    public $Limite;
    
    /* m�todo construtor (sobrescrito)
     * agora, tamb�m inicializa a vari�vel $Limite
     */
    function __construct($Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo, $Limite)
    {
        // chamada do m�todo construtor da classe-pai.
        parent::__construct($Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo);
        $this->Limite = $Limite;
    }
    
    /* m�todo Retirar (sobrescrito)
     * verifica se a $quantia retirada est� dentro do limite.
     */
    function Retirar($quantia)
    {
        // imposto sobre movimenta��o financeira
        $cpmf = 0.05;
        if ( ($this->Saldo + $this->Limite) >= $quantia )
        {
            // Executa m�todo da classe-pai.
            parent::Retirar($quantia);
            // Debita o Imposto
            parent::Retirar($quantia * $cpmf);
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