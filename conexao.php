<?php

$Bco = 'Cinema';
$Usuario = 'root';
$Senha = '';

try{
    $conexao = new PDO("mysql:host=localhost; dbname=Cinema", "$Usuario", "$Senha");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
}
catch(PDOException $erro)
{
    echo "Erro na conexao", $erro->getMessage();
}
//





