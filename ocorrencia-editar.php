<?php
if(!empty($_GET['registro_id']))
{
    include_once('config.php');

    $registro_id =$_GET['registro_id'];

    $sqlSelect = "SELECT * FROM ocorrencias WHERE registro_id=$registro_id";
    $result = mysqli_query($conexao, $sqlSelect);

    if($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc()) { 
            
            $sujeito = $row['sujeito'];
            $funcao = $row['funcao'];
            $solicitante = $row['solicitante'];
            $descricao = $row['descricao'];
        }
    }
    else
    {
        header('Location: ocorrencia.php');
    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ocorrencia.css">
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
        <form class="conteudo-3" action="ocorrencia.php" method="POST" autocomplete="off">
            <br>
            <h1>Ocorrência</h1>
            <br>
            <div class="formulario">
                <label>Nome do Sujeito</label>
                <input class="titulo" type="text" name="sujeito" value="<?php echo $sujeito ?>"/>
                <label>Nº Apartamento / Função funcionário</label>
                <input class="titulo" type="text" name="funcao" value="<?php $funcao ?>"/>
                <label>Nome do Solicitante</label>
                <input class="titulo" type="text" name="solicitante" value="<?php $solicitante ?>"/>
                <label>Descrição</label>
                <input class="info" type="text" name="descricao" value="<?php $descricao ?>"/>
            </div>
        </form>
    </main>
</body>
</html>