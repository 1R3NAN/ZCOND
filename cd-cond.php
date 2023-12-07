<?php
session_start();
    include_once('config.php');
    // print_r($_SESSION);

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true) and (!isset($_SESSION['nome_fundador']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['fundador']);
        
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];
    
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuario WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
        $_session["nome_empresa"] = $nome_empresa;
        $_session["nome_fundador"] = $nome_fundador;
    }
    else
    {
        $sql = "SELECT * FROM usuario ORDER BY id DESC";
    }
    
    $sql2 = "SELECT * FROM usuario WHERE  email_empresa = \"$logado\"";
   
    $result2 = $conexao->query($sql2);

    $row = $result2->fetch_assoc();
    
if(isset($_POST['submit']))
{

    include_once('config.php');
    
    $nome_condominio = $_POST['nome_condominio'];
    $fundador_condominio = $_POST['fundador_condominio'];
    $cpf = $_POST['cpf'];
    $cnpj = $_POST['cnpj'];
    $cep = $_POST['cep'];
    $apartamentos = $_POST['apartamentos'];

    $sql_code = "INSERT INTO condominios(nome_condominio, fundador_condominio, cpf, cnpj, cep, apartamentos) 
    VALUES('$nome_condominio','$fundador_condominio', '$cpf', '$cnpj', '$cep','$apartamentos')";
    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOND</title>
    <link rel="stylesheet" href="cadas-cond.css">
</head>
<body>
    <main>
        <div class="menu">
            <img class= "logo" src="./imagem/logo nova.png" height="65px" width="170px">
            <style>.logo{margin: 10px; margin-top: 20px;}</style>
            <div class="lista">
                <ul>
                <br>
                        <div class="inicio"><img class="icon" src="/PROJETO/imagem/house.png"><a class="inicio" href="pagina-inicial.php"><li>Início</li></a></div>
                        
                        <div class="relatorio"><img class="icon" src="/PROJETO/imagem/relatorio.png"><a class="relatorio" href="relatorio.php"><li>Relatório</li></a></div>

                        <div class="reservas"><img class="icon" src="/PROJETO/imagem/cadeado.png"><a class="reservas" href="reserva.php"><li>Reservas</li></a></div>
                    
                        <div class="documentos"><img class="icon" src="/PROJETO/imagem/notas.jpg"><a class="documentos" href="documento.php"><li>Documentos</li></a></div>
                    
                        <div class="ocorrencias"><img class="icon" src="/PROJETO/imagem/telefone.png"><a class="ocorrencias" href="ocorrencia.php"><li>Ocorrências</li></a></div>
                    
                        <div class="registro"><img class="icon" src="/PROJETO/imagem/usuario.png"><a class="registro" href="moradores.php"><li>Moradores</li></a></div>
                        
                        <div class="condominiu"><img class="icon" src="/PROJETO/imagem/pessoas.png"><a class="condominiu" href="funcionarios.php"><li>Funcionários</li></a></div>
                </ul>
            </div>
        </div>
        <a class='exibir' href='pagina-inicial.php' title='Editar'>VOLTAR</a><style>.exibir{
            margin-top: 10px;
            margin-left: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #FFF;
            background-color: rgba(13, 131, 240, 0.90);
            border-radius: 10px;
            border: none;
            text-transform: uppercase;
            text-align: center;
            width: 85px;
            height: 50px;
            padding-left: 20px;
            }
            .exibir:hover{
            opacity: 0.8;
            }
            </style>

        <form action="cd-cond.php" method="POST" class="cadastramento">
            <br> 
            <div class="título">
                <h1>cadastramento</h1>
            </div>
            <div class="cadastro">
                <div class="registro1">
                    <label>Nome do condomínio</label>
                    <input type="text" name="nome_condominio" autocomplete="off" required maxlength="30"/>
                    <label>Blocos/Apartamentos</label>
                    <input type="text" name="apartamentos" autocomplete="off" required maxlength="4"/>
                    <label>CNPJ</label>
                    <input type="text" name="cnpj" autocomplete="off" required maxlength="14"/>
                    <label>CEP</label>
                    <input type="text" name="cep" autocomplete="off" required maxlength="8"/>
                    <label>Nome do Fundador</label>
                    <input type="text" name="nome_fundador" autocomplete="off" required maxlength="30"/>
                    <label>CPF</label>
                    <input type="text" name="cpf" autocomplete="off" required maxlength="11"/>
                    <div clas="isso">
                        <input type="submit" name="submit" id="submit">
                    </div>
                </div>
            </div>

        </form>
    </main>
</body>
</html>