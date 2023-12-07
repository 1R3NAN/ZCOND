!<?php

    if(isset($_POST['submit']))
    {
        // print_r($_POST['nome-empresa']);
        // print_r('<br>');
        // print_r($_POST['nome-fundador']);
        // print_r('<br>');
        // print_r($_POST['cpf']);
        // print_r('<br>');
        // print_r($_POST['cnpj']);
        // print_r('<br>');
        // print_r($_POST['e-mail']);
        // print_r('<br>');
        // print_r($_POST['telefone']);
        // print_r('<br>');
        // print_r($_POST['senha']);
        // print_r('<br>');
        
        include_once('config.php');

        $nome_empresa = $_POST['nome_empresa'];
        $nome_fundador = $_POST['nome_fundador'];
        $cpf_fundador = $_POST['cpf'];
        $cnpj_empresa = $_POST['cnpj'];
        $email_empresa = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];

        /*$result = mysqli_query($conexao, "INSERT INTO usuario(nome_empresa, nome_fundador, cpf_fundador, cnpj_empresa, email_empresa, telefone, senha) 
        VALUES('$nome_empresa','$nome_fundador', '$cpf_fundador', '$cnpj_empresa', '$email_empresa', '$telefone', '$senha')");*/

        $sql_code = "INSERT INTO usuario(nome_empresa, nome_fundador, cpf_fundador, cnpj_empresa, email_empresa, telefone, senha) 
        VALUES('$nome_empresa','$nome_fundador', '$cpf_fundador', '$cnpj_empresa', '$email_empresa', '$telefone', '$senha')";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
    }
?>