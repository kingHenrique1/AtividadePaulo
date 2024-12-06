<?php

include_once "clscliente.php";

$cls = new clscliente();

$Nome = filter_input(INPUT_GET, "Nome", FILTER_SANITIZE_SPECIAL_CHARS);
$Idade = filter_input(INPUT_GET, "Idade");
$email = filter_input(INPUT_GET, "email", FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_GET, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);



$cls->setNome($Nome);
$cls->setIdade($Idade);
$cls->setemail($email);
$cls->setcpf($cpf);



if (isset($_GET["Incluir"]))
{
    echo $cls->Incluir();
}
else if (isset($_GET["Excluir"]))
{
    echo $cls->excluir();
}
