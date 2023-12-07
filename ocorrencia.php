<?php
if(isset($_POST['submit']))
{
    include_once('config.php');

    $sujeito = $_POST['sujeito'];
    $funcao = $_POST['funcao'];
    $solicitante = $_POST['solicitante'];
    $descricao = $_POST['descricao'];


    $sql_code = "INSERT INTO ocorrencias(sujeito, funcao, solicitante, descricao)
    VALUES('$sujeito','$funcao','$solicitante','$descricao')";
    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
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
            <div class="ata" id="ata">
                    <?php
                    
                    include_once('config.php');
                    // Defina a consulta para selecionar os dados em ordem crescente
                    $sql = "SELECT * FROM ocorrencias ORDER BY registro_id ASC";

                    // Execute a consulta utilizando o método query()
                    $result = $conexao->query($sql);

                    // Verifique se a consulta foi bem-sucedida
                    if (!$result) {
                        die("Falha na consulta: " . $conexao->error);
                    }

                    // Defina o limite de divs
                    $limite_divs = 7;

                    // Defina o contador de divs
                    $contador_divs = 0;

                    // Percorra os resultados da consulta utilizando o método fetch_assoc()
                    while ($row = $result->fetch_assoc()) {
                        // Extraia os dados de cada linha
                        
                        $registro_id  =   $row['registro_id'];
                        $sujeito = $row['sujeito'];
                        $funcao = $row['funcao'];
                        $solicitante = $row['solicitante'];
                        $descricao = $row['descricao'];

                        // Adicione os dados às divs
                        echo "<div class='ata' id='ata'>";
                        echo "<div class='condominios'>";
                        echo "<div class='predio'>";
                        echo "<div class='texto2'>";
                        echo "<h4>$row[registro_id] $row[sujeito]</h4>";
                        echo "</div>";
                        echo "</div>";
                        echo " <a class='entrar' href='ocorrencia-editar.php?id=$row[registro_id]' title='EXIBIR'>ENTRAR</a> ";
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
                    $result->close();
                ?>
            </div>
        <form class="conteudo-3" action="ocorrencia.php" method="POST" autocomplete="off">
            <br>
            <h1>Ocorrência</h1>
            <br>
            <div class="formulario">
                <label>Nome do Sujeito</label>
                <input class="titulo" type="text" name="sujeito" autocomplete="off" required maxlength="50"/>
                <label>Nº Apartamento / Função funcionário</label>
                <input class="titulo" type="text" name="funcao" autocomplete="off" required maxlength="50"/>
                <label>Nome do Solicitante</label>
                <input class="titulo" type="text" name="solicitante" autocomplete="off" required maxlength="50"/>
                <label>Descrição</label>
                <input class="info" type="text" name="descricao" autocomplete="off" required maxlength="500"/>
                <div class="botão">
                    <input class="botao"type="submit" name="submit" id="submit" value="criar">
                </div>
            </div>
        </form>
    </main>
</body>
</html>