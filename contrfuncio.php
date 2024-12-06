<?php
include_once "clsfuncio.php";

// Criar uma instância da classe
$cls = new clsfuncio();

// Receber os dados do formulário via GET e sanitarizar
$NomeFun = filter_input(INPUT_POST, "NomeFun", FILTER_SANITIZE_SPECIAL_CHARS);
$Email = filter_input(INPUT_POST, "Email", FILTER_SANITIZE_SPECIAL_CHARS);
$CPF = filter_input(INPUT_POST, "CPF", FILTER_SANITIZE_SPECIAL_CHARS);
$Celular = filter_input(INPUT_POST, "Celular", FILTER_SANITIZE_SPECIAL_CHARS);

// Exibir os dados recebidos para depuração
echo "<pre>";
echo "NomeFun: $NomeFun<br>";
echo "Email: $Email<br>";
echo "CPF: $CPF<br>";
echo "Celular: $Celular<br>";
echo "</pre>";

// Verificar se as variáveis foram preenchidas corretamente
if ($NomeFun && $Email && $CPF && $Celular) {
    // Atribuindo os valores ao objeto
    $cls->setNomeFun($NomeFun);
    $cls->setEmail($Email);
    $cls->setCPF($CPF);
    $cls->setCelular($Celular);
} else {
    // Se algum dado estiver faltando, exibe uma mensagem de erro
    echo "Erro: Dados inválidos ou incompletos.";
    exit;
}

// Verificar o que foi solicitado e executar a ação correspondente
if (isset($_GET["Incluir"])) {
    echo $cls->Incluir();
} else if (isset($_GET["Excluir"])) {
    echo $cls->Excluir();
} else if (isset($_GET["Atualizar"])) 

?>

