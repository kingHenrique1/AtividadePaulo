<?php

include_once "clscomida.php";

$cls = new clscomida();

$Pipoca = filter_input(INPUT_GET, "Pipoca", FILTER_SANITIZE_SPECIAL_CHARS);
$Refrigerante = filter_input(INPUT_GET, "Refrigerante", FILTER_SANITIZE_SPECIAL_CHARS);
$Chocolate = filter_input(INPUT_GET, "Chocolate", FILTER_SANITIZE_SPECIAL_CHARS);




$cls->setPipoca($Pipoca);
$cls->setRefrigerante($Refrigerante);
$cls->setChocolate($Chocolate);




if (isset($_GET["Incluir"]))
{
    echo $cls->Incluir();
}
else if (isset($_GET["Excluir"]))
{
    echo $cls->excluir();
}