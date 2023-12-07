<?php
if(!empty($_GET['id']))
{
    include_once('config.php');

    $id =$_GET['id'];

    $sql = "SELECT * FROM relatorios WHERE id=$id";
    $result = mysqli_query($conexao, $sql);

    if($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc()) { 
            
            $titulo = $row['titulo'];
            $descricao = $row['descricao'];
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
    <link rel="stylesheet" href="editar-relatorio.css">
    <link rel="shortcut icon" href="./imagem/favicon.png">
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
        <a class='exibir' href='relatorio.php' title='Editar'>VOLTAR</a>
    </div>
        <div class="conteudo-3">
            <br>
            <h1>relatório</h1>
            <br>
            <form class="formulario" action="relatorio.php" method="POST" autocomplete="off">
                <label>Título</label>
                <input class="titulo" type="text" name="titulo" value="<?php echo $titulo ?>" autocomplete="off" required maxlength="20"/>
                <label>Descrição</label>
                <input class="info" type="text" name="descricao" value="<?php echo $descricao ?>" autocomplete="off" required maxlength="500"/>
                <input type="hidden" name="id"value="<?php echo $id ?>">
                <input class="botao" type="submit" name="submit" id="update">
            </form>
        </div>
        
    </main>
</body>
</html>