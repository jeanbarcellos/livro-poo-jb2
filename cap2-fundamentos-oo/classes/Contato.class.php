<?php
class Contato
{
    public $Nome;
    public $Telefone;
    public $Email;
    
    # grava informa��es de contato
    function SetContato($Nome, $Telefone, $Email)
    {
        $this->Nome = $Nome;
        $this->Telefone = $Telefone;
        $this->Email = $Email;
    }
    
    # obt�m informa��es de contato
    function GetContato()
    {
        return "Nome: {$this->Nome}, Telefone: {$this->Telefone}, Email: {$this->Email}";
    }
}
?>