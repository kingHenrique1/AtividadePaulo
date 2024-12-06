<?php

class clscine{
    private $Filme;
    



public function getFilme()
{
    return $this->Filme;
}
public function setFilme($Fi)
{
    $this->Filme = $Fi;
}
//

//

public function Adicionar()
{
    include "conexao.php";

    try{
        $Comando=$conexao->prepare("insert into Cine (Filme) values(?)");
        $Comando->bindParam(1,$this->Filme);
     
     
    

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





































