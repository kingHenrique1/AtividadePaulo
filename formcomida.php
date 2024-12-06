<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cinema.css">
</head>
<body>

<form action="contrcomida.php" method="get">
<h1>Escolha o que deseja comer</h1>

<h2>Pipoca</h2>
<label for="Pipoca">Escolha seu tipo de pipoca</label><br>
<input type="radio" value="pipoca doce R$35,00" name="Pipoca" id="Pipoca">pipoca doce - R$35,00<br>
<input type="radio" value="pipoca Salgada R$30,00" name="Pipoca" id="Pipoca">pipoca salgada - R$30,00<br>




<h2>Refrigerante</h2>
<label for="Refrigerante">Escolha o refri de preferencia</label><br>
<input type="radio" value="CocaCola - R$7,00" name="Refrigerante" id="Refrigerante">CocaCola - R$7,00<br>
<input type="radio" value="Guaraná R$6,50" name="Refrigerante" id="Refrigerante">Pepsi - R$6,50<br>




<h2>Chocolate</h2>
<label for="Chocolate">Escolha o chocolate de sua preferencia</label><br>
<input type="radio" value="Ao leite - R$4,50" name="Chocolate" id="Chocolate">Ao leite - R$4,50<br>
<input type="radio" value="Amargo R$5,50" name="Chocolate" id="Chocolate">Amargo R$5,50<br>



   <input type="submit" value="Incluir" name="Incluir" id="Incluir">
<input type="submit" value="Excluir" name="Excluir" id="Excluir"><br>





  </form>
</body>
</html>