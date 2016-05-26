<?php
/*
 * classe TSqlUpdate
 * Esta classe provê meios para manipulação de uma instrução de UPDATE no banco de dados
 */
final class TSqlUpdate extends TSqlInstruction
{
    private $columnValues;
   
    /*
     * método setRowData()
     * Atribui valores à determinadas colunas no banco de dados que serão modificadas
     * @param $column = coluna da tabela
     * @param $value = valor a ser armazenado
     */
    public function setRowData($column, $value)
    {
        // verifica se é um dado escalar (string, inteiro,...)
        if (is_scalar($value))
        {
            // verifica se o dado é uma string e se não está fazia
            if (is_string($value) and (!empty($value)))
            {
                // adiciona \ em aspas
                $value = addslashes($value);
                // caso seja uma string
                $this->columnValues[$column] = "'$value'";
            }
            // verifica se o dado é um boolean
            elseif (is_bool($value))
            {
                // caso seja um boolean
                $this->columnValues[$column] = $value ? 'TRUE': 'FALSE';
            }
            elseif ($value!=='')
            {
                // caso seja outro tipo de dado
                $this->columnValues[$column] = $value;
            }
            else
            {
                // caso seja NULL
                $this->columnValues[$column] = "NULL";
            }
        }
    }

    
    /**
     * método getInstruction()
     * retorna a instrução de UPDATE em forma de string.
     */
    public function getInstruction()
    {
        // monta a string de UPDATE
        $this->sql  = "UPDATE {$this->entity} \n";
        
        // monta os pares: coluna=valor,...
        if ($this->columnValues)
        {
            foreach ($this->columnValues as $column => $value)
            {
                // cria um novo arrei com as colunas formatadas
                $set[] = "{$column}={$value}";
            }
        }
        
        $this->sql .= " SET " . implode(', ', $set) . "\n";
        
        // retorna a cláusula WHERE do objeto $this->criteria
        if ($this->criteria)
        {
            $expression = $this->criteria->dump();
            
            if ($expression)
            {
                $this->sql .= " WHERE $expression;";
            }
        }
        
        return $this->sql;
    }
}
