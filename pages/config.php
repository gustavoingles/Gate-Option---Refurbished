<?php 
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'dados_cadastro';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    //if ($conexao->connect_errno){
    //    print "Erro";
    //} else {
    //    print "Conexão efetuada com sucesso";
    //}
?>