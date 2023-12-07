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






    if(!empty($_GET['condominio_id']))
    {
    include_once('config.php');

    $condominio_id =$_GET['condominio_id'];


    $sql_condominio = "SELECT * FROM condominios WHERE condominio_id=$condominio_id";
    $result_condominio = mysqli_query($conexao, $sql_condominio);


    if($result_condominio->num_rows > 0)
    {
        while ($row_condominio = $result_condominio->fetch_assoc()) { 
            
            $nome_condominio = $row_condominio['nome_condominio'];
            $fundador_condominio = $row_condominio['fundador_condominio'];
            $cpf = $row_condominio['cpf'];
            $cnpj = $row_condominio['cnpj'];
            $cep = $row_condominio['cep'];
            $apartamento = $apartamento['apartamento'];
        }
    }
    else
    {
        header('Location: relatorio.php');
    }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOND</title>
    <link rel="stylesheet" href="inicio-condominio.css">
    <link rel="shortcut icon" href="./imagem/favicon.png">
</head>
<body>
    <main>
        <div class="menu">
            <img class= "logo" src="./imagem/logo nova.png" height="80px" width="170px">
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
        <div class="conteudo-1">
            <div class="perfil">
                <div class="texto">
                    <h1>Olá</h1>
                    <h1><?php echo $row["nome_fundador"];?></h1>
                    <h2>Tenha um ótimo trabalho!</h2></div>
                    <img src="./imagem/image 13.png"><style>img{display:flex ; margin-left: 15px;}</style>
            </div>
            <div class="conteudo-2">
                <br>
                    <div class="condominios2">
                        <div class="predio">
                            <img class="ilustracao" src="./imagem/predio.png"><style>.ilustracao{display: flex;margin-left: 15px; height: 200px; 
                                margin-top: 10px;} </style>
                        </div>
                        <div class="info">
                            <div class="tab-1">
                                <br>
                                <p>Nome</p>
                                <p><?php echo $row_condominio['fundador_condominio']; ?></p>
                                <p>Fundador</p>
                                <p><?php  ?></p>
                                <p>CNPJ</p>
                                <p></p>
                            </div>    
                            <div class="tab-2">
                                <br>
                                <p>CEP</p>
                                <p></p>
                                <p>E-mail</p>
                                <p></p>
                                <p>Telefone</p>
                                <p></p>
                        </div>    
                    </div>
            </div>

            </div>
        </div>
        <div class="conteudo-3">
            <div class="zcond">
                <img class="logozcond"src="./imagem/zcond logo 2.png" width="300px"><style>.logozcond{margin: 0px; margin-top: 35px;}</style>
            </div>
            <div class="divs">
                <div class="div-1">
                    <br>
                    <p>Nome</p>
                    <p><?php echo $row["nome_fundador"]; ?></p>
                    <br>
                    <p>CPF</p>
                    <p><?php echo $row["cpf_fundador"]; ?></p>
                    <br>
                    <p>E-mail</p>
                    <p><?php echo $row["email_empresa"]; ?></p>
                    <br>
                    <p>Telefone</p>
                    <p><?php echo $row["telefone"];?></p>

                </div>
                <div class="div-2">
                    <br>
                    <p>Empresa</p>
                    <p><?php echo $row["nome_empresa"]; ?></p>
                    <br>
                    <p>CNPJ</p>
                    <p><?php echo $row["cnpj_empresa"]; ?></p>
                    <br>

                </div>

            </div>
        </div>
    </main>
</body>
</html>