<?php
/*
 * classe ProdutoGateway
 * implementa Table Data Gateway
 */
class ProdutoGateway
{
    /*
     * m�todo insert
     * insere dados na tabela de Produtos
     * @param $id          = ID do produto
     * @param $descricao = descri�ao do produto
     * @param $estoque     = estoque atual
     * @param $preco_custo= preco de custo
     */
    function insert($id, $descricao, $estoque, $preco_custo)
    {
        // cria instru��o SQL de insert
        $sql = "INSERT INTO Produtos (id, descricao, estoque, preco_custo)" .
               " VALUES ('$id', '$descricao', '$estoque', '$preco_custo')";
               
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa instru��o SQL
        $conn->exec($sql);
        unset($conn);
    }
    
    /*
     * m�todo update
     * altera os dados na tabela de Produtos
     * @param $id          = ID do produto
     * @param $descricao   = descri�ao do produto
     * @param $estoque     = estoque atual
     * @param $preco_custo = preco de custo
     */
    function update($id, $descricao, $estoque, $preco_custo)
    {
        // cria instru��o SQL de UPDATE
        $sql = "UPDATE produtos set descricao = '$descricao', " .
               "   estoque = '$estoque', preco_custo = '$preco_custo' ".
               "   WHERE id = '$id'";
               
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa instru��o SQL
        $conn->exec($sql);
        unset($conn);
    }
    
    /*
     * m�todo delete
     * deleta um registro na tabela de Produtos
     * @param $id = ID do produto
     */
    function delete($id)
    {
        // cria instru��o SQL de DELETE
        $sql = "DELETE FROM produtos where id='$id'";
        
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        // executa instru��o SQL
        
        $conn->exec($sql);
        unset($conn);
    }
    
    /*
     * m�todo getObject
     * busca um registro da tabela de produtos
     * @param $id = ID do produto
     */
    function getObject($id)
    {
        // cria instru��o SQL de SELECT
        $sql = "SELECT * FROM produtos where id='$id'";
        
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa a consulta SQL
        $result = $conn->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        unset($conn);
        return $data;
    }
    
    /*
     * m�todo getObjects
     * lista todos registros da tabela de produtos
     */
    function getObjects()
    {
        // cria instru��o SQL de SELECT
        $sql = "SELECT * FROM produtos";
        
        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
        // executa a consulta SQL
        $result = $conn->query($sql);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        unset($conn);
        return $data;
    }
}


// instancia objeto ProdutoGateway
$gateway = new ProdutoGateway;

// insere alguns registros na tabela
$gateway->insert(1, 'Vinho', 10, 10);
$gateway->insert(2, 'Salame', 20, 20);
$gateway->insert(3, 'Queijo', 30, 30);

// efetua algumas altera��es
$gateway->update(1, 'Vinho', 20, 20);
$gateway->update(2, 'Salame', 40, 40);

// exclui o produto 3
$gateway->delete(3);

// exibe novamente os registros
echo "Lista de Produtos<br>\n";
print_r($gateway->getObjects());
?>