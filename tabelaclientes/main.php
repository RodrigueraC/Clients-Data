<?php
session_start();
include_once("conexao.php");
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
    <h2 class="tituloprincipal">Listagem dos clientes</h2>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }

        $result_usuarios = "SELECT * FROM clientes";
        $resutado_usuarios = mysqli_query($conn, $result_usuarios);

        while($row_clientes = mysqli_fetch_assoc($resutado_usuarios)){
            echo " ID: " . $row_clientes['codigo'] . "<br>";
            echo " NOME: " . $row_clientes['nome'] . "<br>";
            echo " DATA DE NASCIMENTO: " . $row_clientes['dia'] . "<br>";
            echo " CPF: " . $row_clientes['cpf'] . "<br>";
            echo " TELEFONE: " . $row_clientes['telefone'] . "<br>";
            echo " EMAIL: " . $row_clientes['email'] . "<br>";
            echo "<a href='editar.php?codigo=" . $row_clientes['codigo'] . "'>Editar</a><br>";
            echo "<a href='processaremover.php?codigo=" . $row_clientes['codigo'] . "'>Remover</a><br><hr>";
        }
    ?>

</body>
</html>