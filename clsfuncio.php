<?php

class clsfuncio {
    private $NomeFun;
    private $Email;
    private $CPF;
    private $Celular;

    // Getters and Setters
    public function getNomeFun() {
        return $this->NomeFun;
    }

    public function setNomeFun($Nf) {
        $this->NomeFun = $Nf;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($Em) {
        $this->Email = $Em;
    }

    public function getCPF() {
        return $this->CPF;
    }

    public function setCPF($cpf) {
        $this->CPF = $cpf;
    }

    public function getCelular() {
        return $this->Celular;
    }

    public function setCelular($Ce) {
        $this->Celular = $Ce;
    }

    // Incluir Funcionário
    public function Incluir() {
        include "conexao.php";
        try {
            $Comando = $conexao->prepare("INSERT INTO Funcionario (NomeFun, Email, CPF, Celular) VALUES (?, ?, ?, ?)");
            $Comando->bindParam(1, $this->NomeFun);
            $Comando->bindParam(2, $this->Email);
            $Comando->bindParam(3, $this->CPF);
            $Comando->bindParam(4, $this->Celular);

            if ($Comando->execute()) {
                $Retorno = "Gravação com sucesso";
            } else {
                $Retorno = "Erro ao gravar os dados";
            }
        } catch (PDOException $Erro) {
            $Retorno = "Erro: " . $Erro->getMessage();
        }
        return $Retorno;
    }

    // Excluir Funcionário
    public function Excluir() {
        include "conexao.php";
        try {
            $Comando = $conexao->prepare("DELETE FROM Funcionario WHERE CPF = ?");
            $Comando->bindParam(1, $this->CPF);

            if ($Comando->execute()) {
                $Retorno = "Excluído com sucesso";
            } else {
                $Retorno = "Erro ao excluir os dados";
            }
        } catch (PDOException $Erro) {
            $Retorno = "Erro: " . $Erro->getMessage();
        }
        return $Retorno;
    }
}

 

?>

