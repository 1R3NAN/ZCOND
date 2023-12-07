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

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    $sql_code = "INSERT INTO relatorios( titulo, descricao)
    VALUES('$titulo','$descricao')";
    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>   
    <link rel="stylesheet" href="relatorio.css">
</head>
<body>    
    <?php
    if (!empty($dados['relatorios'])) {
        // Recuperar os ID dos usuario e converter e uma string
        $valor_pesq = implode(", ", $dados['relatorios']);

        $query_relatorios = "SELECT id, titulo, descricao FROM relatorios WHERE id IN ($valor_pesq)";                   
        $result_relatorios = $conexao->query($query_relatorios);

        while ($row_relatorios = mysqli_fetch_assoc($result_relatorios)) {
            extract($row_usuario);

            echo "<form method='POST' action='proc_editar_usuarios.php'>";
            echo "<div class='conteudo-3'>";
            echo "<br>";
            echo "<h1>relatório</h1>";
            echo "<br>";
            echo "<form class='formulario' action='relatorio.php' method='POST' autocomplete='off'>";
            echo "<label>Título</label>";                
            echo "<input type='text' name='id' value='$titulo'>";
            echo "<label>Descrição</label>";
            echo "<input type='text' name='nome' value='$descricao'>";
            echo "<input class='botao type='submit name='submit' id='submit'>";
            echo "</form>";
            echo "</div>";
        }
    }
    ?>
</body>

</html>