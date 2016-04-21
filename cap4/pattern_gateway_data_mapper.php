<?php
/*
 * class Produto
 * representa um Produto a ser vendido
 */
final class Produto
{
    private $descricao;   // descricao do produto
    private $estoque;     // estoque atual
    private $preco_custo; // pre�o de custo

    
    /*
     * m�todo construtor
     * define alguns valores iniciais
     * @param $descricao = descri�ao do produto
     * @param $estoque      = estoque atual
     * @param $preco_custo= preco de custo
     */
    public function __construct($descricao, $estoque, $preco_custo)
    {
        $this->descricao   = $descricao;
        $this->estoque     = $estoque;
        $this->preco_custo = $preco_custo;
    }
    
    
    /*
     * m�todo getDescricao
     * retorna a descricao do produto
     */
    public function getDescricao()
    {
        return $this->descricao;
    }
    
}

/*
 * classe Venda
 * representa uma Venda de Produtos
 */
final class Venda
{
    private $id;
    private $itens; // itens da cesta
    
    /*
     * m�todo construtor
     * instancia uma nova venda
     * @param $id = Identificador
     */
    function __construct($id)
    {
        $this->id = $id;
    }
    
    /*
     * m�todo getID
     * retorna o identificador
     */
    function getID()
    {
        return $this->id;
    }
    
    /*
     * m�todo addItem
     * adiciona um item na cesta
     * @param $quantidade = quantidade vendida
     * @param $produto    = objeto produto
     */
    public function addItem($quantidade, Produto $produto)
    {
        $this->itens[] = array($quantidade, $produto);
    }
    
    /*
     * m�todo getItems
     * retorna o array de itens da cesta
     */
    public function getItens()
    {
        return $this->itens;
    }
}

/*
 * class Venda Mapper
 * Implementa Data Mapper para a classe Venda
 */
final class VendaMapper
{
    public static function insert(Venda $venda)
    {
        $id = $venda->getID();
        date_default_timezone_set('America/Sao_Paulo');
        $date = date("Y-m-d");
        
        // insere a venda no banco de dados
        $sql = "INSERT INTO venda (id, data) values ('$id', '$date')";
        
        echo $sql . "<br>\n";
        
        // percorre os itens vendidos
        foreach ($venda->getItens() as $item)
        {
            $quantidade = $item[0];
            $produto    = $item[1];
            $descricao = $produto->getDescricao();
            
            // insere os itens da venda no banco de dados
            $sql = "INSERT INTO venda_items (ref_venda, produto, quantidade)".
                   " values ('$id', '$descricao', '$quantidade')";
                   
            echo $sql . "<br>\n";
        }
    }
}

// instancia objeto Venda
$venda= new Venda(1000);

// adiciona alguns produtos
$venda->addItem(3, new Produto('Vinho', 10, 15));
$venda->addItem(2, new Produto('Salame', 20, 20));
$venda->addItem(1, new Produto('Queijo', 30, 10));

// Data Mapper persiste a venda
VendaMapper::insert($venda);
?>