<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'zcond';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    //  if($conexao->connect_errno)
    //  {
    //    echo "Erro";
    //  }
    //  else
    //  {
    //    echo "Achei ez dms";
    //  }

?>