<?php
class Estagiario extends Funcionario
{
    /* m�todo GetSalario sobreescrito
     * retorna o $Sal�rio com 12% de b�nus.
     */
    function GetSalario()
    {
        return $this->Salario * 1.12;
    }
}
?>