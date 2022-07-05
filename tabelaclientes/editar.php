<?php
session_start();
include_once("conexao.php");
$codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM clientes WHERE codigo = '$codigo'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
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
    <h2 class="tituloprincipal">Editar clientes</h2>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
    ?>

    <form method="POST" action="processaeditar.php">
        <input type="hidden" name="codigo" value="<?php echo $row_usuario['codigo'];?>"><br><br>

        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome'];?>"><br><br>

        <label>Data: </label>
        <input type="date" name="dia" placeholder="Digite a data de nascimento" value="<?php echo $row_usuario['dia'];?>"><br><br>

        <label>CPF: </label>
        <input type="text" name="cpf" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})" placeholder="Digite o CPF" value="<?php echo $row_usuario['cpf'];?>"><br><br>
        
        <label>Telefone: </label>
        <input type="tel" name="telefone" placeholder="Digite o numero de telefone" value="<?php echo $row_usuario['telefone'];?>"><br><br>

        <label>Email: </label>
        <input type="email" name="email" placeholder="Digite o email" value="<?php echo $row_usuario['email'];?>"><br><br>

        <input type="submit" value="Editar">
    </form>

</body>
</html>