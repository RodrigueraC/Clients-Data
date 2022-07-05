<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adsomos</title>
</head>
<body>

    <a href="cadastro.php">Cadastrar clientes</a><br>
    <a href="main.php">Listar clientes</a><br>
    <a href="remover.php">Remover clientes</a><br>
    <h2 class="tituloprincipal">Cadastro clientes</h2>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
    ?>

    <form method="POST" action="processacadastro.php">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Digite o nome completo"><br><br>

        <label>Data: </label>
        <input type="date" name="dia" placeholder="Digite a data de nascimento"><br><br>

        <label>CPF: </label>
        <input type="text" name="cpf" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})" placeholder="Digite o CPF"><br><br>
        
        <label>Telefone: </label>
        <input type="tel" name="telefone" placeholder="Digite o numero de telefone"><br><br>

        <label>Email: </label>
        <input type="email" name="email" placeholder="Digite o email"><br><br>

        <input type="submit" value="Cadastrar">
    </form>

</body>
</html>