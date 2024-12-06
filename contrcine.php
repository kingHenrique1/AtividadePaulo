<?php

include_once "clscine.php";

$cls = new clscine();

$Filme = filter_input(INPUT_GET, "Filme", FILTER_SANITIZE_SPECIAL_CHARS);


$cls->setFilme($Filme);




if (isset($_GET["Adicionar"]))
{
    echo $cls->Adicionar();
}




















