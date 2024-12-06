<?php

class clscomida{
    private $Pipoca;
    private $Refrigerante;
    private $Chocolate;
    

   


public function getPipoca()
{
    return $this->Pipoca;
}
public function setPipoca($Pi)
{
    $this->Pipoca = $Pi;
}
//
public function getRefrigerante()
{
    return $this->Refrigerante;
}
public function setRefrigerante($Re)
{
    $this->Refrigerante = $Re;
}
//
public function getChocolate()
{
    return $this->Chocolate;
}
public function setChocolate($Ch)
{
    $this->Chocolate = $Ch;
}
//



public function Incluir()

{
    include "conexao.php";

    try{
        $Comando=$conexao->prepare("insert into Comida (Pipoca, Refrigerante, Chocolate) values(?,?,?)");
        $Comando->bindParam(1,$this->Pipoca);
        $Comando->bindParam(2,$this->Refrigerante);
        $Comando->bindParam(3,$this->Chocolate);
        

    if ($Comando->execute())
    {
        $Retorno = "Gravacao com sucesso";
    }
    } catch (PDOException $Erro) {
        $Retorno = "Erro" . $Erro->getMessage();
    }
    return $Retorno;
}

public function Excluir()

{
    include "conexao.php";

    try{
        $Comando=$conexao->prepare("insert into Comida (Pipoca, Refrigerante, Chocolate) values(?,?,?)");
        $Comando->bindParam(1,$this->Pipoca);
        $Comando->bindParam(2,$this->Refrigerante);
        $Comando->bindParam(3,$this->Chocolate);
        

    if ($Comando->execute())
    {
        $Retorno = "Gravacao com sucesso";
    }
    } catch (PDOException $Erro) {
        $Retorno = "Erro" . $Erro->getMessage();
    }
    return $Retorno;
}
}
