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
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $funcao = $_POST['funcao'];
        $admissao = $_POST['admissao'];
        $demissao = $_POST['demissao'];
        $dt_nasc = $_POST['dt_nasc'];
    
        $sql_code = "INSERT INTO funcionarios(nome, cpf, telefone, celular, email, estado, cidade, funcao, admissao, demissao, dt_nasc)
        VALUES('$nome','$cpf','$telefone','$celular', '$email','$estado','$cidade','$funcao','$admissao','$demissao','$dt_nasc')";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOND</title>
    <link rel="stylesheet" href="funcionarios.css">
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
            <h1>Funcionarios</h1>
            <br>
        <form class="formulario" action="reserva.php" method="POST" autocomplete="off">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" autocomplete="off" required maxlength="30"/>
                    <label>CPF</label>
                    <input type="text" name="cpf" autocomplete="off" required maxlength="11"/>
                    <label>Telefone</label>
                    <input type="text" name="telefone" autocomplete="off" required maxlength="14"/>
                    <label>E-mail</label>
                    <input type="text" name="email" autocomplete="off" required maxlength="30"/>
                    <label>Cidade</label>
                    <input type="text" name="cidade" autocomplete="off" required maxlength="30"/>
                    <label>Função</label>
                    <input type="text" name="cidade" autocomplete="off" required maxlength="30"/>
                    <div class="datas"> 
                        <div class="data1">
                            <label>Data Admissão</label>
                            <input type="date" name="admissao" id="data">
                            <label>Data Demissão</label>
                            <input type="date" name="demissao" id="data">
                        </div>
                        <div class="data2">
                            <label>Data nascimento</label>
                            <input type="date" name="dt_nasc" id="data">
                            <div class="isso">
                        <input class="botaoo"type="submit" name="submit" id="submit" value="criar">
                    </div>
                        </div>
                    </div>

        </form>
    </main>
</body>
</html>