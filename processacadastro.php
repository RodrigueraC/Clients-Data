<?php
session_start();
include_once("conexao.php");


$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$dia = filter_input(INPUT_POST, 'dia', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


// Checando cpf
$check_duplicate_cpf = "SELECT cpf FROM clientes
    WHERE cpf = '$cpf'";
$duplicate = mysqli_query($conn, $check_duplicate_cpf);
$count = mysqli_num_rows($duplicate);

if($count > 0){
    echo "<h1>Cpf já existente</h1>";
    echo "<a href='cadastro.php'>Retornar</a>";

    return false;
}

function mascara($valor, $formato) {
    $retorno = '';
    $posicao_valor = 0;
    for($i = 0; $i<=strlen($formato)-1; $i++) {
        if($formato[$i] == '#') {
            if(isset($valor[$posicao_valor])) {
 $retorno .= $valor[$posicao_valor++];
 }
        } else {
            $retorno .= $formato[$i];
        }
    }
    return $retorno;
}


//completando cadastro

$cpf = mascara($cpf, '###.###.###-##');
$telefone = mascara($telefone, '(##)#####-####');

$resut_usuario = "INSERT INTO clientes (nome, dia, cpf, telefone, email) VALUES ('$nome', '$dia', '$cpf', '$telefone', '$email')";
$resultado_usuario = mysqli_query($conn, $resut_usuario);

if(mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "Úsuario Cadastrado";
    header("Location: cadastro.php");
}else {
    header("Location: cadastro.php");
}