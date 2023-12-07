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
    
        $nome = $_POST['nome'];
        $apartamento = $_POST['apartamento'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $data = $_POST['data'];
    
    
        $sql_code = "INSERT INTO pessoas(nome, apartamento, telefone, email, cpf, rg, data )
        VALUES('$nome','$apartamento','$telefone', '$email', '$cpf', '$rg', '$data')";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOND</title>
    <link rel="stylesheet" href="morador-edit.css">
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
        </div>
        <div class="conteudo-2">    
            <br>
            <div class="condominios">
                <div class="predio">
                    <img src="./imagem/cinza.png">
                    <div class="texto2"><h4>Adicionar nome</h4><h4>Adicionar nome</h4></div>
                </div>
                <input class="botao"type="submit" name="submit" id="submit" value="criar">
            </div>
            <br>
            <div class="condominios">
                <div class="predio">
                    <img src="./imagem/cinza.png">
                    <div class="texto2"><h4>Adicionar nome</h4><h4>Adicionar nome</h4></div>
                </div>
                <input class="botao"type="submit" name="submit" id="submit" value="criar">
            </div>
            <br>
            <div class="condominios">
                <div class="predio">
                    <img src="./imagem/cinza.png">
                    <div class="texto2"><h4>Adicionar nome</h4><h4>Adicionar nome</h4></div>
                </div>
                <input class="botao"type="submit" name="submit" id="submit" value="criar">
            </div>
            <br>
            <div class="condominios">
                <div class="predio">
                    <img src="./imagem/cinza.png">
                    <div class="texto2"><h4>Adicionar nome</h4><h4>Adicionar nome</h4></div>
                </div>
                <input class="botao"type="submit" name="submit" id="submit" value="criar">
            </div>
            <br>
            <div class="condominios">
                <div class="predio">
                    <img src="./imagem/cinza.png">
                    <div class="texto2"><h4>Adicionar nome</h4><h4>Adicionar nome</h4></div>
                </div>
                <input class="botao"type="submit" name="submit" id="submit" value="criar">
            </div>
            <br>
            <div class="condominios">
                <div class="predio">
                    <img src="./imagem/cinza.png">
                    <div class="texto2"><h4>Adicionar nome</h4><h4>Adicionar nome</h4></div>
                </div>
                <input class="botao"type="submit" name="submit" id="submit" value="criar">
            </div>
            <br>
            <div class="condominios">
                <div class="predio">
                    <img src="./imagem/cinza.png">
                    <div class="texto2"><h4>Adicionar nome</h4><h4>Adicionar nome</h4></div>
                </div>
                <input class="botao"type="submit" name="submit" id="submit" value="criar">
            </div>
        </div>
        <div class="conteudo-3">
            <br>
            <h1>Moradores</h1>
            <br>
        <form class="formulario" action="reserva.php" method="POST" autocomplete="off">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" autocomplete="off" required maxlength="30"/>
                    <label>Blocos/Apartamentos</label>
                    <input type="text" name="apartamento" autocomplete="off" required maxlength="4"/>
                    <label>Telefone</label>
                    <input type="text" name="telefone" autocomplete="off" required maxlength="14"/>
                    <label>E-mail</label>
                    <input type="text" name="email" autocomplete="off" required maxlength="30"/>
                    <label>CPF</label>
                    <input type="text" name="cpf" autocomplete="off" required maxlength="11"/>
                    <label>RG</label>
                    <input type="text" name="rg" autocomplete="off" required maxlength="9"/>
                    <label>Data nascimento</label>
                    <input type="date" name="data" id="data">
                    <div class="isso">
                        <input class="botaoo"type="submit" name="submit" id="submit" value="criar">
                    </div>
        </form>
    </main>
</body>
</html>