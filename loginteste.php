<?php
session_start();
    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        //Acessa
        include_once('config.php');
        $email_empresa = $_POST['email'];
        $senha = $_POST['senha'];

        //print_r('E-mail: ' . $email_empresa);
        //print_r('<br>')
        //print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM usuario WHERE email_empresa = '$email_empresa' and senha = '$senha'";
        $result = $conexao->query($sql);

        //print_r($sql);
        //print_r($result);
        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION ['email']);
            unset($_SESSION ['senha']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['id'] = $usuario_id;
            $_SESSION['nome_fundador'] = $nome_fundador;
            $_SESSION['email'] = $email_empresa;
            $_SESSION['senha'] = $senha;
            header('Location: pagina-inicial.php');
        }
    }
?>