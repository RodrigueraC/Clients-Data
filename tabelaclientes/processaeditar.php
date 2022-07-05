<?php
session_start();
include_once("conexao.php");

$codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$dia = filter_input(INPUT_POST, 'dia', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$resut_usuario = "UPDATE clientes SET nome='$nome', dia='$dia', cpf='$cpf', telefone='$telefone', email='$email' WHERE codigo='$codigo'";
$resultado_usuario = mysqli_query($conn, $resut_usuario);

echo $resut_usuario;

if(mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<p>Cliente Editado com sucesso</p> <br>";
    header("Location: main.php");
}else {
    header("Location: editar.php");
}

?>