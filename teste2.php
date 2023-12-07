<?php

session_start(); //Iniciar a sessao

// Limpar o buffer
ob_start(); 

// Incluir a conexao com o banco de dados
include_once('config.php');


// Receber os dados formulario
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados);

// Verificar se o usuario clicou no botao
if(!empty($dados['submit'])){

    //Ler os do do formulario
    foreach($dados['id'] as $chave => $id){

        // Criar a QUERY editar no BD
        $query_relatorios = "UPDATE relatorios SET titulo=:titulo, descricao=:descricao WHERE id=:id";
         
        // Preparar a QUERY
        $edit_relatorios = $conexao->query($query_relatorios);

        // Substituir os links pelos valores que vem do formulario
        $edit_relatorios->$mysqli_result::bindParam(':nome', $dados['titulo'][$chave]);
        $edit_relatorios->$mysqli_result::bindParam(':email', $dados['descricao'][$chave]);

    }

}else{
     // Variavel global com a mensagem de sucesso
     $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não editado com sucesso!</p>";

     // Redirecionar o usuario para a pagina inicial
     header("Location: index.php");
}