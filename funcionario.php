<?php
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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOND</title>
    <link rel="stylesheet" href="funcionario.css">

</head>
<body>
    <main>
        <div class="menu">
            <img class= "logo" src="./imagem/logo2.png" height="65px" width="170px">
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
        
        <form action="funcionario.php" method="POST" method="POST" autocomplete="off" class="cadastramento">
            <div class="título">
                <br>
                <h1>funcionário</h1>
            </div>
            <div class="cadastro">
                <div class="registro1">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" autocomplete="off" required maxlength="30"/>
                    <label>CPF</label>
                    <input type="number" name="cpf" autocomplete="off" required maxlength="4"/>
                    <label>Telefone</label>
                    <input type="number" name="telefone" autocomplete="off" required maxlength="14"/>
                    <label>Celular</label>
                    <input type="number" name="celular" autocomplete="off" required maxlength="8"/>
                    <label>E-mail</label>
                    <input type="text" name="email" autocomplete="off" required maxlength="30"/>
                </div>  
                <div class="registro2">
                    <label>Estado</label>
                    <input type="text" name="estado" autocomplete="off" required maxlength="3"/>
                    <label>Cidade</label>
                    <input type="text" name="cidade" autocomplete="off" required maxlength="31"/>
                    <label>Função</label>
                    <input type="text" name="funcao" autocomplete="off" required maxlength="20"/>
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
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" id="submit">
        </form>
    </main>
</body>
</html>