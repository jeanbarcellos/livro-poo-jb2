<?php
/*
 * classe Produto
 * implementa Active Record
 */
class Produto
{
    private $data;
    
    function __get($prop)
    {
        return $this->data[$prop];
    }
    
    function __set($prop, $value)
    {
        $this->data[$prop] = $value;
    }
    
    
    /*
     * m�todo insert
     * armazena o objeto na tabela de produtos
     */
    function insert()
    {
        // cria instru��o SQL de insert
        $sql = "INSERT INTO Produtos (id, descricao, estoque, preco_custo)" .
               " VALUES ('{$this->id}',       '{$this->descricao}', ".
               "         '{$this->estoque}', '{$this->preco_custo}')";
               
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa instru��o SQL
        $conn->exec($sql);
        unset($conn);
    }
    
    
    /*
     * m�todo update
     * altera os dados do objeto na tabela de Produtos
     */
    function update()
    {
        // cria instru��o SQL de UPDATE
        $sql = "UPDATE produtos set ".
               "   descricao    = '{$this->descricao}', " .
               "   estoque      = '{$this->estoque}', ".
               "   preco_custo = '{$this->preco_custo}' ".
               "   WHERE id     = '{$this->id}'";
               
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa instru��o SQL
        $conn->exec($sql);
        unset($conn);
    }
    
    /*
     * m�todo delete
     * deleta o objeto da tabela de Produtos
     */
    function delete()
    {
        
        // cria instru��o SQL de DELETE
        $sql = "DELETE FROM produtos where id='{$this->id}'";
        
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa instru��o SQL
        $conn->exec($sql);
        unset($conn);
    }
    
    
    /*
     * m�todo registraCompra
     * registra uma compra, atualiza custo e incrementa o estoque atual
     * @param $unidades     = unidades adquiridas
     * @param $preco_custo= novo preco de custo
     */
    public function registraCompra($unidades, $preco_custo)
    {
        $this->estoque       += $unidades;
        $this->preco_custo    = $preco_custo;
    }
    

    /*
     * m�todo registraVenda
     * registra uma venda e decrementa o estoque
     * @param $unidades     = unidades vendidas
     */
    public function registraVenda($unidades)
    {
        $this->estoque -= $unidades;
    }
    
    /*
     * m�todo calculaPrecoVenda
     * retorna o preco de venda, baseado em uma margem de 30% sobre o custo
     */
    public function calculaPrecoVenda()
    {
        return $this->preco_custo * 1.3;
    }
}



// instancia objeto Produto
$vinho= new Produto;
$vinho->id          = 7;
$vinho->descricao   = 'Vinho Cabernet';
$vinho->estoque     = 10;
$vinho->preco_custo = 10;

echo "Estoque Inicial: 10 intens<br />";
echo 'estoque:     ' . $vinho->estoque . "<br>\n";
echo 'preco_custo: ' . $vinho->preco_custo . "<br>\n";
echo 'preco_venda: ' . $vinho->calculaPrecoVenda() . "<br>\n";
echo "<br />";


$vinho->registraVenda(6);
$vinho->insert();

echo "Venda de 6 itens: <br />";
echo 'estoque:     ' . $vinho->estoque . "<br>\n";
echo 'preco_custo: ' . $vinho->preco_custo . "<br>\n";
echo 'preco_venda: ' . $vinho->calculaPrecoVenda() . "<br>\n";
echo "<br />";


$vinho->registraCompra(12, 20);
$vinho->update();

echo "Compra de 12 itens: <br />";
echo 'estoque:     ' . $vinho->estoque . "<br>\n";
echo 'preco_custo: ' . $vinho->preco_custo . "<br>\n";
echo 'preco_venda: ' . $vinho->calculaPrecoVenda() . "<br>\n";
echo "<br />";
?>