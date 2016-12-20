<?php
class Fornecedor
{
    public $Codigo;
    public $RazaoSocial;
    public $Endereco;
    public $Cidade;
    public $Contato;
    
    # m�todo construtor
    function __construct()
    {
        // instancia novo Contato
        $this->Contato = new Contato;
    }
    
    # grava contato
    function SetContato($Nome, $Telefone, $Email)
    {
        // delega chamada de m�todo
        $this->Contato->SetContato($Nome, $Telefone, $Email);
    }
    
    # retorna contato
    function GetContato()
    {
        // delega chamada de m�todo
        return $this->Contato->GetContato();
    }
}
?>