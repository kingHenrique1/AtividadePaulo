<?php

class clscliente{
    private $Nome;
    private $Idade;
    private $email;
    private $cpf;
 


public function getNome()
{
    return $this->Nome;
}
public function setNome($No)
{
    $this->Nome = $No;
}
//
public function getIdade()
{
    return $this->Idade;
}
public function setIdade($Id)
{
    $this->Idade = $Id;
}
//
public function getemail()
{
    return $this->email;
}
public function setemail($Em)
{
    $this->email = $Em;
}
//
public function getcpf()
{
    return $this->cpf;
}
public function setcpf($cp)
{
    $this->cpf = $cp;
}

//


public function Incluir()
{
    include "conexao.php";

    try{
        $Comando=$conexao->prepare("insert into Cliente (Nome, Idade, email, cpf) values(?,?,?,?)");
        $Comando->bindParam(1,$this->Nome);
        $Comando->bindParam(2,$this->Idade);
        $Comando->bindParam(3,$this->email);
        $Comando->bindParam(4,$this->cpf);
   

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
        $Comando=$conexao->prepare("insert into Cliente (Nome, Idade, email, cpf) values(?,?,?,?)");
        $Comando->bindParam(1,$this->Nome);
        $Comando->bindParam(2,$this->Idade);
        $Comando->bindParam(3,$this->email);
        $Comando->bindParam(4,$this->cpf);
     

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