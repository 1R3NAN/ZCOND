<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $sql_update = "UPDATE relatorios SET titulo='$titulo', descricao='$descricao' WHERE id='$id'";
    $resultado_update = mysqli_query($conexao, $sql_update);
    }
    header('Location: relatorio.php');

?>