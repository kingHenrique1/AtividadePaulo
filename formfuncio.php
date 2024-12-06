<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Consulta</title>
    <link rel="stylesheet" type="text/css" href="adicionando.css" media="screen" />
</head>
<body onload="consultar()">
    <?php include "index.php"; ?>
	
<h2>Cadastro do Funcionario</h2>

<!-- Botão para abrir o modal de cadastro -->
<button id="abrindoModalBtn">Clique para Inserir Dados</button>

<!-- Modal de Cadastro -->
<div id="meuModalCadastro" class="modal">
    <div class="modal-content">
        <span class="close" id="fecharModalCadastroBtn">&times;</span>
        <h5>Cadastro de Funcionário</h5>
        <input id="NomeFun" placeholder="Nome do Funcionário" /><br>    
        <input id="Email" placeholder="Email" /><br>
        <input id="CPF" placeholder="CPF" maxlength="11" /><br>
        <input id="Celular" placeholder="Celular" maxlength="11" /><br>
        <button onclick="cadastrarFuncionario()">Cadastrar</button>
        <p id="resultadoCadastro"></p>
    </div>
</div>



<script>
    // Função para consultar e exibir os dados cadastrados
    function consultar() {
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", "contrfuncio.php?Consultar");
        xhttp.send();

        xhttp.onload = function() {
            var resposta = JSON.parse(this.responseText);
            var organizar = "<table><thead><tr><th>Nome</th><th>Email</th><th>CPF</th><th>Celular</th><th>Ações</th></tr></thead><tbody>";
            for (var i = 0; i < resposta.length; i++) {
                organizar += "<tr><td>" + resposta[i].NomeFun + "</td>" +
                    "<td>" + resposta[i].Email + "</td>" +
                    "<td>" + resposta[i].CPF + "</td>" +
                    "<td>" + resposta[i].Celular + "</td>" +
                    "<td>" +
                    "<button class='action-button' onclick='atualizar(" + resposta[i].CPF + ")'>Atualizar</button>" +
                    "<button class='delete-button' onclick='apagar(" + resposta[i].CPF + ")'>Apagar</button>" +
                    "</td></tr>";
            }
            organizar += "</tbody></table>";
            document.getElementById('resultado').innerHTML = organizar;
        }
    }

    // Função para cadastrar um novo funcionário
    function cadastrarFuncionario() {
        var nome = document.getElementById("NomeFun").value;
        var email = document.getElementById("Email").value;
        var cpf = document.getElementById("CPF").value;
        var celular = document.getElementById("Celular").value;

        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "contrfuncio.php?Incluir", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        var data = "NomeFun=" + encodeURIComponent(nome) +
            "&Email=" + encodeURIComponent(email) +
            "&CPF=" + encodeURIComponent(cpf) +
            "&Celular=" + encodeURIComponent(celular);

        xhttp.send(data);

        xhttp.onload = function() {
            document.getElementById("resultadoCadastro").innerHTML = this.responseText;
        }
        consultar();
    }

    // Função para abrir o modal de cadastro
    var modalCadastro = document.getElementById("meuModalCadastro");
    var btnCadastro = document.getElementById("abrindoModalBtn");
    var spanCadastro = document.getElementById("fecharModalCadastroBtn");

    btnCadastro.onclick = function() {
        modalCadastro.style.display = "block";
    }

    // Função para fechar o modal de cadastro
    spanCadastro.onclick = function() {
        modalCadastro.style.display = "none";
    }

    // Função para fechar a modal de cadastro se clicar fora dela
    window.onclick = function(event) {
        if (event.target == modalCadastro) {
            modalCadastro.style.display = "none";
        }
    }

    // Função para exibir os dados de um funcionário para atualizar
    function atualizar(cpf) {
        // Buscar os dados desse funcionário
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", "contrfuncio.php?Consultar");
        xhttp.send();

        xhttp.onload = function() {
            var resposta = JSON.parse(this.responseText);
            for (var i = 0; i < resposta.length; i++) {
                if(cpf == resposta[i].CPF){
                    // Preencher os campos do formulário com os dados do funcionário
                    document.getElementById("NomeFun").value = resposta[i].NomeFun;
                    document.getElementById("Email").value = resposta[i].Email;
                    document.getElementById("CPF").value = resposta[i].CPF;
                    document.getElementById("Celular").value = resposta[i].Celular;
                }
            }
            // Exibir o modal de atualização
            var modalAtualizacao = document.getElementById("meuModalAtualizacao");
            modalAtualizacao.style.display = "block";
        };
    }

    // Função para salvar as atualizações
    function salvarAtualizacao() {
        var nome = document.getElementById("NomeFun").value;
        var email = document.getElementById("Email").value;
        var cpf = document.getElementById("CPF").value;
        var celular = document.getElementById("Celular").value;

        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "contrfuncio.php?Atualizar", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        var data = "NomeFun=" + encodeURIComponent(nome) +
            "&Email=" + encodeURIComponent(email) +
            "&CPF=" + encodeURIComponent(cpf) +
            "&Celular=" + encodeURIComponent(celular);

        xhttp.send(data);
        consultar();
        xhttp.onload = function() {
            document.getElementById("resultadoAtualizacao").innerHTML = this.responseText;
            consultar();
        }

        // Fechar a modal após salvar
        var modalAtualizacao = document.getElementById("meuModalAtualizacao");
        modalAtualizacao.style.display = "none";
    }

    // Função para fechar o modal de atualização
    var modalAtualizacao = document.getElementById("meuModalAtualizacao");
    var spanAtualizacao = document.getElementById("fecharModalAtualizacaoBtn");

    spanAtualizacao.onclick = function() {
        modalAtualizacao.style.display = "none";
    }

    // Função para fechar o modal de atualização se clicar fora dela
    window.onclick = function(event) {
        if (event.target == modalAtualizacao) {
            modalAtualizacao.style.display = "none";
        }
    }

    // Função para apagar um funcionário
    function apagar(cpf) {
        var r = confirm("Você confirma que deseja apagar os dados?");
        if (r == true) {
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", "contrfuncio.php?Apagar", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            var data = "CPF=" + encodeURIComponent(cpf);
            xhttp.send(data);

            xhttp.onload = function() {
                document.getElementById("resultadoacao").innerHTML = this.responseText;
                consultar();
            }
        } else {
            document.getElementById("resultadoacao").innerHTML = "Saindo...";
            consultar();
        }
    }
    function cadastrarFuncionario() {
    var nome = document.getElementById("NomeFun").value;
    var email = document.getElementById("Email").value;
    var cpf = document.getElementById("CPF").value;
    var celular = document.getElementById("Celular").value;

    // Verificar se todos os campos estão preenchidos
    if (!nome || !email || !cpf || !celular) {
        alert("Por favor, preencha todos os campos.");
        return;
    }

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "contrfuncio.php?Incluir", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var data = "NomeFun=" + encodeURIComponent(nome) +
        "&Email=" + encodeURIComponent(email) +
        "&CPF=" + encodeURIComponent(cpf) +
        "&Celular=" + encodeURIComponent(celular);

    xhttp.send(data);

    xhttp.onload = function() {
        document.getElementById("resultadoCadastro").innerHTML = this.responseText;
    }
    consultar();
}

</script>
</body>
</html>
