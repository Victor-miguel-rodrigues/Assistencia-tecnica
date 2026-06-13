<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <section>
            <h3>NavBar</h3>
    </section>

    <section>
            <h2>Conteudo principal</h2>

            <ul>
                <li><a href="src/view/Clientes.php">Clientes</a></li>
                <li>Ordem de serviços</li>
                <li>Ver tudo</li>
            </ul>

            <?php
                include_once "cadastrar_cliente.php";
            ?>
    </section>

    <section>
          <h3>footer</h3>
    </section>
</body>
</html>