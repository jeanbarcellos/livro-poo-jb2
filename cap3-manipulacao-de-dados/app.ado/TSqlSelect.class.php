<?php

/*
 * classe TSqlSelect
 * Esta classe provê meios para manipulação de uma instrução de SELECT no banco de dados
 */

final class TSqlSelect extends TSqlInstruction {

    private $columns; // array de colunas a serem retornadas.

    /**
     * método addColumn
     * adiciona uma coluna a ser retornada pelo SELECT
     * @param $column = coluna da tabela
     */

    public function addColumn($column) {
        // adiciona a coluna no array
        $this->columns[] = $column;
    }

    /**
     * método getInstruction()
     * retorna a instrução de SELECT em forma de string.
     */
    public function getInstruction() {
        // monta a instrução de SELECT
        $this->sql = "SELECT ";

        // monta string com os nomes de colunas
        $this->sql .= implode(', ', $this->columns);

        // adiciona na cláusula FROM o nome da tabela
        $this->sql .= "\n  FROM {$this->entity} \n";

        // obtém a cláusula WHERE do objeto criteria.
        if ($this->criteria) {
            $expression = $this->criteria->dump();

            if ($expression) {
                $this->sql .= " WHERE $expression \n";
            }

            // obtém as propriedades do critério
            $order = $this->criteria->getProperty('order');
            $limit = $this->criteria->getProperty('limit');
            $offset = $this->criteria->getProperty('offset');

            // obtém a ordenação do SELECT
            if ($order) {
                $this->sql .= " ORDER BY $order \n";
            }
            // obtém o limite da consulta
            if ($limit) {
                $this->sql .= " LIMIT $limit \n";
            }
            if ($offset) {
                $this->sql .= " OFFSET $offset \n";
            }
            #$this->sql .= ";";
        }

        return $this->sql;
    }

}

?>