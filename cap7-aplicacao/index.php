<?php

function __autoload($classe) {
    $pastas = array('app.widgets', 'app.ado', 'app.model', 'app.control');

    foreach ($pastas as $pasta) {
        if (file_exists("{$pasta}/{$classe}.class.php")) {
            include_once "{$pasta}/{$classe}.class.php";
        }
    }
}

class TApplication {

    static public function run() {

        $template = file_get_contents('template.html');
        
        $content = '';

        if ($_GET) {
            $class = $_GET['class'];

            // verifica se a classe existe
            // caso exista, exibe
            if (class_exists($class)) {
                                
                $pagina = new $class; // instancia a classe
                
                ob_start(); // Ativa o buffer interno
                
                $pagina->show(); // Armazena o conteudo da página para o buffer
                
                $content = ob_get_contents(); // copia o conteudo do buffer interno para a variavel $content
                
                ob_end_clean(); // Limpa (apaga) o buffer de saída e desativa o buffer de saída
                
            } 
            else if (function_exists($method)) {
                call_user_func($method, $_GET);
            }
        }

        echo str_replace('#CONTENT#', $content, $template);
    }

}

TApplication::run();

/*
  Esta função irá ativar o buffer de saída. Enquanto o buffer de saída estiver ativo, 
não é enviada a saída do script (outros que não sejam cabeçalhos), 
ao invés a saída é guardada em um buffer interno.

O conteúdo deste buffer interno pode ser copiado em uma variável usando ob_get_contents(). 
Para enviar o que esta no buffer interno, use ob_end_flush(). 
Alternativamente, ob_end_clean() irá silenciosamente descartar o conteúdo do buffer. 
*/