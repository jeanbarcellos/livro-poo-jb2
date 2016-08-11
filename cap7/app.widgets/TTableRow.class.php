<?php

/**
 * classe TTableRow
 * reponsável pela exibição de uma linha de uma tabela
 */
class TTableRow extends TElement {

    /**
     * método construtor
     * instancia uma nova linha
     */
    public function __construct() {
        parent::__construct('tr');
    }

    /**
     * método addCell
     * agrega um novo objeto célula (TTableCell) à linha
     * @param $value = conteúdo da célula
     */
    public function addCell($value) {

        // instancia objeto célula
        $cell = new TTableCell($value);

        // armazena no array de celulas
        parent::add($cell);

        // retorna o objeto instanciado
        return $cell;
    }

}