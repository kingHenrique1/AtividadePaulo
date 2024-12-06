<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cinema.css">
</head>
<body>

  <h1>Faça seu cadastro</h1>

<form action="contrcliente.php" method="get">
<label for="Nome">digite seu Nome</label>
<input type="text" name="Nome" id="Nome"><br>

<label for="Idade"> qual a sua idade</label>
<input type="number" name="Idade" id="Idade"><br>

<label for="email">digite seu email </label><br>
<input type="text" name="email" id="email"><br>

<label for="cpf">digite seu cpf</label><br>
<input type="text" name="cpf" id="cpf" maxlength="11"><br>

    


   <input type="submit" value="Incluir" name="Incluir" id="Incluir">
<input type="submit" value="Excluir" name="Excluir" id="Excluir"><br>





  </form>
</body>
</html>