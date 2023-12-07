<?php

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

        $nome_empresa = $_POST['nome-empresa'];
        $nome_fundador = $_POST['nome-fundador'];
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOND</title>
    <link href="header.css" rel="stylesheet">
    <link rel="stylesheet" href="cadastramento.css">
    <link rel="shortcut icon" href="./imagem/favicon.png">
</head>
<body>
    <iframe src="header.html"></iframe>

    <main>
        <div class="hamburguer">
            <h1>FAÇA O SEU <span style="color:#0D83F0E5;">CADASTRAMENTO</span></h1>
            <br>
            
            <form action="cadastramento.php" method="POST" autocomplete="off">
                <input class="caixa" type="text" name="nome-empresa" placeholder="Nome da Empresa" autocomplete="off" required maxlength="30"/>
                <br>
                <input class="caixa" type="text" name="nome-fundador" placeholder="Nome do Fundador" autocomplete="off" required maxlength="30"/>
                <br>
                <input class="caixa" type="text" name="cpf" placeholder="CPF" autocomplete="off" required maxlength="11"/>
                <br>
                <input class="caixa" type="text" name="cnpj" placeholder="CNPJ" autocomplete="off" required maxlength="14"/>
                <br>
                <input class="caixa" type="text" name="email" placeholder="Digite seu e-mail..." autocomplete="off" required maxlength="40"/>
                <br>
                <input class="caixa" type="text" name="telefone" placeholder="Telefone..." autocomplete="off" required maxlength="13"/>
                <br>
                <input class="caixa" type="text" name="senha" placeholder="Digite sua senha..." autocomplete="off"  maxlength="30"/>
                <br>
            
                <input type="submit" name="submit" id="submit">
            </form>       
        </div>
    </main>
</body>
</html>