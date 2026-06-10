<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="src/controllers/clienteController.php" method="post">
        <label for="CPF">Informe o cpf do cliente</label>
        <input type="text" name="CPF" id="CPF">
        <input type="submit" name="logar" value="Buscar dados">
    </form>

    <?php
       if(isset($_GET['error']) and !empty($_GET['error'])){
           echo "Dados do cpf invalido";
       }
    ?>
</body>
</html>