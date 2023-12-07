<?php
if(isset($_POST['submit']))
{

    
    include_once('config.php');
    
    $nome_empresa = $_POST['nome-empresa'];
    $nome_fundador = $_POST['nome-fundador'];
    $cpf_fundador = $_POST['cpf'];
    $cnpj_empresa = $_POST['cnpj'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    /*$result = mysqli_query($conexao, "INSERT INTO usuario(nome_empresa, nome_fundador, cpf_fundador, cnpj_empresa, email_empresa, telefone, senha) 
    VALUES('$nome_empresa','$nome_fundador', '$cpf_fundador', '$cnpj_empresa', '$email_empresa', '$telefone', '$senha')");*/

    $sql_code = "INSERT INTO condominios(nome_empresa, nome_fundador, cpf_fundador, cnpj_empresa, email, telefone, endereco) 
    VALUES('$nome_empresa','$nome_fundador', '$cpf_fundador', '$cnpj_empresa', '$email', '$telefone', '$endereco')";
    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOND</title>
    <link rel="shortcut icon" href="./imagem/favicon.png">
    <link rel="stylesheet" href="header2.css">
    <link rel="stylesheet" href="painel.css">
    <link rel="stylesheet" href="cadas-cond.css">
</head>
<body>
    <iframe src="header2.html"></iframe>
    <main>  
        <div class="lasanha">
            <div class="painel">
                <div class="foto">
                    <label class="picture" for="picture__input" tabIndex="0">
                        <span class="picture__image"></span>
                    </label>
                    <input type="file" name="picture__input" id="picture__input">
    
                </div> 
                <div class="texto">
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
            <div class="hamburguer">
            <h1>registro condomínios</h1>
            <br>
            
            <form action="cadas-cond.php" method="POST" autocomplete="off">
                <input class="caixa" type="text" name="nome-empresa" placeholder="Nome da Empresa" autocomplete="off" required maxlength="30"/>
                <br>
                <input class="caixa" type="text" name="nome-fundador" placeholder="Nome do Fundador" autocomplete="off" required maxlength="30"/>
                <br>
                <input class="caixa" type="text" name="cpf" placeholder="CPF" autocomplete="off" required maxlength="11"/>
                <br>
                <input class="caixa" type="text" name="cnpj" placeholder="CNPJ" autocomplete="off" required maxlength="14"/>
                <br>
                <input class="caixa" type="text" name="email" placeholder="Digite seu e-mail..." autocomplete="off" required maxlength="64"/>
                <br>
                <input class="caixa" type="text" name="telefone" placeholder="Telefone..." autocomplete="off" required maxlength="21"/>
                <br>
                <input class="caixa" type="text" name="endereco" placeholder="Digite o seu endereço" autocomplete="off"/>
                <br>
            
                <input type="submit" name="submit" id="submit">
            </form>       
        </div>
    </main>
</body>
</html>