<?php
// FORMULÁRIO ESTRUTURADO, COM BANCO DE DADOS

/*
 * função __autoload()
 * carrega uma classe quando ela é necessária,
 * ou seja, quando ela é instancia pela primeira vez.
 */

function __autoload($classe) {
    $pastas = array('app.widgets', 'app.ado');
    foreach ($pastas as $pasta) {
        if (file_exists("{$pasta}/{$classe}.class.php")) {
            include_once "{$pasta}/{$classe}.class.php";
        }
    }
}

// cria classe para manipulação dos registros de pessoas
class Pessoa extends TRecord {

    const TABLENAME = 'pessoa';

}


// instancia um formulário
$form = new TForm('form_pessoas');

// instancia uma tabela
$table = new TTable;
$table->bgcolor = '#f0f0f0'; // define algumas propriedades da tabela
$table->style = 'border:2px solid grey';
$table->width = 400;

// adiciona a tabela ao formulário
$form->add($table);

// cria os campos do formulário ------------------------------------------------
$codigo = new TEntry('id');
$codigo->setSize(100); // define tamanho para campo código
$codigo->setEditable(FALSE); // define como somente leitura

// cria os campos do formulário ------------------------------------------------
$nome = new TEntry('nome');

// cria os campos do formulário ------------------------------------------------
$endereco = new TEntry('endereco');

// cria os campos do formulário ------------------------------------------------
$datanasc = new TEntry('datanasc');
$datanasc->setSize(100); // define tamanho para campo data de nascimento

// cria os campos do formulário ------------------------------------------------
$sexo = new TRadioGroup('sexo');
$items = array(); // cria um vetor com as opções de sexo
$items['M'] = 'Masculino';
$items['F'] = 'Feminino';
$sexo->addItems($items); // adiciona as opções ao radio button
$sexo->setValue('M');// define a opção ativa
$sexo->setLayout('horizontal'); // define a posição dos elementos

// cria os campos do formulário ------------------------------------------------
$linguas = new TCheckGroup('linguas');
$items2 = array();// cria um vetor com as opções de idiomas
$items2['E'] = 'Inglês';
$items2['S'] = 'Espanhol';
$items2['I'] = 'Italiano';
$items2['F'] = 'Francês';
$linguas->addItems($items2); // adiciona as opções ao check button
$linguas->setValue(array('E', 'I')); // define as opções ativas

// cria os campos do formulário ------------------------------------------------
$qualifica = new TText('qualifica');
$qualifica->setValue('<digite suas qualificações aqui>'); // define um valor padrão para o campo
$qualifica->setSize(240);

// -----------------------------------------------------------------------------

// adiciona uma linha para o campo código na tabela
$row = $table->addRow();
$row->addCell(new TLabel('Código:'));
$row->addCell($codigo);

// adiciona uma linha para o campo nome na tabela
$row = $table->addRow();
$row->addCell(new TLabel('Nome:'));
$row->addCell($nome);

// adiciona uma linha para o campo endereço na tabela
$row = $table->addRow();
$row->addCell(new TLabel('Endereço:'));
$row->addCell($endereco);

// adiciona uma linha para o campo data na tabela
$row = $table->addRow();
$row->addCell(new TLabel('Data Nascimento:'));
$row->addCell($datanasc);

// adiciona uma linha para o campo sexo na tabela
$row = $table->addRow();
$row->addCell(new TLabel('Sexo:'));
$row->addCell($sexo);

// adiciona uma linha para o campo línguas na tabela
$row = $table->addRow();
$row->addCell(new TLabel('Línguas:'));
$row->addCell($linguas);

// adiciona uma linha para o campo qualificações na tabela
$row = $table->addRow();
$row->addCell(new TLabel('Qualificações:'));
$row->addCell($qualifica);

// adiciona um botão de ação ao formulário ele irá executar a função onSave
$submit = new TButton('action1');
$submit->setAction(new TAction('onSave'), 'Salvar');
$row = $table->addRow();
$row->addCell(new TLabel(''));
$row->addCell($submit);

// define quais são os campos do formulário
$form->setFields(array($codigo, $nome, $endereco, $datanasc, $sexo, $linguas, $qualifica, $submit));

// -----------------------------------------------------------------------------


// instancia uma nova página
$page = new TPage;

// adiciona o formulário na página
$page->add($form);

// exibe a página e seu conteúdo
$page->show();

/*
 * função onSave
 * obtém os dados do formulário e salva na base de dados
 */

function onSave() {
    
    global $form;
    
    $pessoa = $form->getData('Pessoa');

    try {
        // inicia transação com o banco
        TTransaction::open();
        
        $pessoa->linguas = implode(' ', $pessoa->linguas);
        $pessoa->datanasc = conv_data_to_us($pessoa->datanasc);
        
        $pessoa->store();

        // finaliza a transação
        TTransaction::close();
        new TMessage('info', 'Dados armazenados com sucesso');
        
    } catch (Exception $e) { // em caso de exceção
        // exibe a mensagem gerada pela exceção
        new TMessage('error', '<b>Erro</b>' . $e->getMessage());

        // desfaz todas alterações no banco de dados
        TTransaction::rollback();
    }
}

/**
 * função onEdit
 * carrega os dados do registro no formulário
 * @param $param = parâmetros passados via URL ($_GET)
 */
function onEdit($param) {
    global $form;

    try {
        // inicia transação com o banco 'pg_livro'
        TTransaction::open();

        // obtém a pessoa a partir do parâmetro ID
        $pessoa = new Pessoa($param['id']);
        $pessoa->linguas = explode(' ', $pessoa->linguas);
        $pessoa->datanasc = conv_data_to_br($pessoa->datanasc);
        $form->setData($pessoa);

        // finaliza a transação
        TTransaction::close();
    } catch (Exception $e) { // em caso de exceção
        // exibe a mensagem gerada pela exceção
        new TMessage('error', '<b>Erro</b>' . $e->getMessage());

        // desfaz todas alterações no banco de dados
        TTransaction::rollback();
    }
}

/**
 * função conv_data_to_us
 * converte uma data do formato brasileiro para o americano
 * @param $data = data (dd/mm/aaaa) a ser convertida
 */
function conv_data_to_us($data) {
    $dia = substr($data, 0, 2);
    $mes = substr($data, 3, 2);
    $ano = substr($data, 6, 4);
    return "{$ano}-{$mes}-{$dia}";
}

/**
 * função conv_data_to_br
 * converte uma data do formato americano para o brasileiro
 * @param $data = data (yyyy-mm-dd) a ser convertida
 */
function conv_data_to_br($data) {
    $ano = substr($data, 0, 4);
    $mes = substr($data, 5, 2);
    $dia = substr($data, 8, 4);
    return "{$dia}/{$mes}/{$ano}";
}

?>
