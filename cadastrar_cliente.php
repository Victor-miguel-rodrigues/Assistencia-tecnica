<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Formulario de cadastro de cliente</h1>
        <form action="src/controllers/clienteController.php" method="post">
            <label for="NomeCliente">Nome do cliente</label><br>
            <input type="text" name="NomeCliente" id="NomeCliente"><br>
            <label for="cpf">CPF do cliente</label><br>
            <input type="text" name="cpf" id="cpf"><br><br>
            <label for="">Endereço :</label>
            <label for="rua">rua</label>
            <input type="text" name="rua" id="rua"> 
            <label for="bairro"> bairro</label>
            <input type="text" name="bairro" id="bairro">
            <label for="numero">numero</label>
            <input type="number" name="numero" id="numero"> <br>
            <label for="telefone">telefone</label><br>
            <input type="tel" name="telefone" id="telefone"><br>
            <label for="email">email</label><br>
            <input type="email" name="email" id="">
            <br>
            <br>

            <input type="submit" name="Enviar" value="criar cliente">
        </form>
</body>
</html>