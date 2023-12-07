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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOND</title>
    <link rel="stylesheet" href="pagina-inicial.css">
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
                    <p>Codomínios</p>
                    <br>
                    <div class="condominios2">
                    <div class="predio2">
                        <div class="texto3"><h4>Adicionar nome</h4><h4>Adicionar nome</h4></div>
                    </div>
                    <a class='exibir' href='cd-cond.php' title='Editar'>CRIAR</a><style>.exibir{
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
            </div>
                <br>
                    <?php
                    // Defina a consulta para selecionar os dados em ordem crescente
                    $sql_condominio = "SELECT * FROM condominios ORDER BY condominio_id ASC";

                    // Execute a consulta utilizando o método query()
                    $result_condominio = $conexao->query($sql_condominio);

                    // Verifique se a consulta foi bem-sucedida
                    if (!$result_condominio) {
                        die("Falha na consulta: " . $conexao->error);
                    }

                    // Defina o limite de divs
                    $limite_divs = 4;

                    // Defina o contador de divs
                    $contador_divs = 0;

                    // Percorra os resultados da consulta utilizando o método fetch_assoc()
                    while ($row_condominio = $result_condominio->fetch_assoc()) {
                        // Extraia os dados de cada linha
                        
                        $condominio_id  =   $row_condominio['condominio_id'];
                        $nome_condominio = $row_condominio['nome_condominio'];
                        $fundador_condominio = $row_condominio['fundador_condominio'];

                        // Adicione os dados às divs
                        echo "<div class='ata' id='ata'>";
                        echo "<div class='condominios'>";
                        echo "<div class='predio'>";
                        echo "<div class='texto2'>";
                        echo "<h4>$row_condominio[condominio_id] $row_condominio[nome_condominio]</h4>";
                        echo "<h4>$row_condominio[fundador_condominio]</h4>";
                        echo "</div>";
                        echo "</div>";
                        echo " <a class='entrar' href='inicio-condominio.php?id=$row_condominio[condominio_id]' title='Editar'>ENTRAR</a> ";
                        echo "</div>";
                        echo "</div>";
                        echo "<br>";

                        // Incremente o contador de divs
                        $contador_divs++;

                        // Verifique se o limite foi atingido
                        if ($contador_divs >= $limite_divs) {
                            break;
                        }
                    }

                    // Libere o resultado da consulta
                    $result_condominio->close();
                ?>
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