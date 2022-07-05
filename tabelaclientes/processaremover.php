<?php
session_start();
include_once("conexao.php");
$codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);

$result_usuario = "DELETE FROM clientes WHERE codigo = '$codigo'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<p>Cliente removido com sucesso</p> <br>";
    header("Location: main.php");
}else {
    header("Location: main.php");
}
?>