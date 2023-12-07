<?php
session_start();
include_once('config.php');

$logado = $_SESSION['email'];
if(!empty($_GET['search']))
{
    $data = $_GET['search'];
    $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
}
else
{
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
}
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>