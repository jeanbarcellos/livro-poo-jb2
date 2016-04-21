<?php 
/*
 * classe TTransaction
 * esta classe provê os métodos necessários manipular transações
 */
final class TTransaction
{
    private static $conn;    // conexão ativa #PDO
    private static $logger;  // objeto de LOG

    /*
     * método __construct()
     * Está declarado como private para impedir que se crie instâncias de TTransaction
     */
    private function __construct() {}

    
    /*
     * método open()
     * Abre uma transação e uma conexão ao BD
     * @param $database = nome do banco de dados
     */
    public static function open($database)
    {
        // verifica se a variavel self::close() está vazia
        if (empty(self::$conn))
        {
        // abre uma conexão e armazena na propriedade estática $conn
            self::$conn = TConnection::open($database);
            
            // inicia a transação
            self::$conn->beginTransaction(); # PDO
        }
    }

    
    /*
     * método get()
     * retorna a conexão ativa da transação
     */
    public static function get()
    {
        // retorna a conexão ativa
        return self::$conn;
    }
    

    /*
     * método rollback()
     * desfaz todas operações realizadas na transação e fecha a conexão
     */
    public static function rollback()
    {
        if (self::$conn)
        {
            // desfaz as operações realizadas durante a transação e fecha
            self::$conn->rollBack(); #P DO
            self::$conn = NULL; # fecha a conexão
        }
    }
    
    
    /*
     * método close()
     * aplica todas operações realizadas e fecha a transação
     */
    public static function close()
    {
        if (self::$conn)
        {
            // aplica as operações realizadas durante a transação
            self::$conn->commit(); # PDO
            self::$conn = NULL; # fecha a conexão
        }
    }

    
    /*
     * método setLogger()
     * define qual estratégia (algoritmo de LOG será usado)
     */
    public static function setLogger(TLogger $logger)
    {
        self::$logger = $logger;
    }
    
    
    /*
     * método log()
     * armazena uma mensagem no arquivo de LOG
     * baseada na estratégia ($logger) atual
     */
    public static function log($message)
    {
        // verifica existe um logger
        if (self::$logger)
        {
            self::$logger->write($message);
        }
    }

}
?>