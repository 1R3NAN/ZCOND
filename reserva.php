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
        $area = $_POST['area'];
        $residencia = $_POST['residencia'];
        $solicitante = $_POST['solicitante'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $termino = $_POST['termino'];
        $aluguel = $_POST['aluguel'];
        $taxa = $_POST['taxa'];


        $sql_code = "INSERT INTO reservas(area, residencia, solicitante, data, horario, termino, aluguel, taxa)
        VALUES('$area','$residencia','$solicitante','$data','$horario', '$termino', '$aluguel', '$taxa')";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOND</title>
    <link rel="stylesheet" href="reserva.css">
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
            <h1>reserva área</h1>
            <br>
        <form class="formulario" action="reserva.php" method="POST" autocomplete="off">
            <label>Selecione a área</label>
            <select name="area">
                <option value="Salão de Festa">Salão de Festa</option>
                <option value="Salão de Jogos">Salão de Jogos</option>
                <option value="Sala de Cinema">Sala de Cinema</option>
                <option value="Piscina">Piscina</option>
            </select>
            <label>Residência</label>
            <input class="titulo" type="number" name="residencia" autocomplete="off" required maxlength="5"/>
            <label>Nome Solicitante</label>
            <input class="titulo" type="text" name="solicitante" autocomplete="off" required maxlength="30"/>
            <div class="opcoes">
                <div class="data">
                    <label>Data</label>
                    <input type="date" name="data" id="data">
                </div>
                <div class="hora">
                    <label>Horário</label>
                    <input type="time" name="horario" id="hora">
                </div>
                <div class="termino">
                        <label>Término</label>
                        <input type="time" name="termino" id="hora">
                </div>
            </div>
            <div class="pagamento">
                <div class="aluguel">
                    <label>Aluguel</label>
                    <input id="aluguel" type="number" name="aluguel" step="0.01" min="0.01" autocomplete="off" required maxlength="20"/>
                </div>
                <div class="taxa">
                    <label>Taxa</label>
                    <input id="data" type="number" name="taxa" step="0.01" min="0.01"autocomplete="off" required maxlength="20"/>
                </div>
            </div>
            <div class="isso">
                <input class="botao"type="submit" name="submit" id="submit" value="criar">
            </div>
        </form>
    </main>
</body>
</html>