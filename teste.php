<?php
    include_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>teste</h1>
    <?php
// Execute uma consulta SQL para obter os dados desejados
$query = "SELECT * FROM usuario";
$resultado = mysqli_query($conexao, $query);

// Verifique se a consulta foi executada com sucesso
if ($resultado) {
    // Recupere os dados do resultado usando um loop
    while ($row = mysqli_fetch_assoc($resultado)) {
        // Exiba os dados conforme necessário
        echo "ID: " . $row['usuario_id'] . "<br>";
        echo "Nome: " . $row['nome_fundador'] . "<br>";
        // ... exiba outras colunas
        echo "<br>";
    }
} else {
    // Exiba uma mensagem de erro caso a consulta tenha falhado
    echo "Erro na consulta: " . mysqli_error($conexao);
}

// Feche a conexão com o banco de dados
mysqli_close($conexao);
    ?>
    
</body>
</html>