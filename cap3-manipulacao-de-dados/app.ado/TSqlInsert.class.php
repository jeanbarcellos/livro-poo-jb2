<?php 
/**
 * classe TSqlInsert
 * 
 * Esta classe provê meios para manipulação de uma instrução de INSERT no banco de dados
 */
final class TSqlInsert extends TSqlInstruction
{
    private $columnValues;

    /**
     * método setRowData()
     * Atribui valores à determinadas colunas no banco de dados que serão inseridas
     * @param $column = coluna da tabela
     * @param $value = valor a ser armazenado
     * 
     */
    public function setRowData($column, $value)
    {
        // verifica se é o dado escalar (integer, float, string ou boolean)
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
            // verifica se o valor não está vazio
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
    

    /*
     * método setCriteria()
     * não existe no contexto desta classe, logo, irá lançar um erro ser for executado
     */
    public function setCriteria(TCriteria $criteria)
    {
        // lança o erro "Não é possível chamar setCriteria"
        throw new Exception("Cannot call setCriteria from " . __CLASS__);
    }

    
    /*
     * método getInstruction()
     * retorna a instrução de INSERT em forma de string.
     */
    public function getInstruction()
    {
        // monta a string de INSERT
        $this->sql  = "INSERT INTO {$this->entity} ";

        // monta uma string contendo os nomes de colunas
        $columns = implode(', ', array_keys($this->columnValues));
        
        $this->sql .= "($columns) \n";
        
        // monta uma string contendo os valores
        $values = implode(', ', array_values($this->columnValues));
        
        $this->sql .= " VALUES ({$values});";
        
        return $this->sql;
    }

}

