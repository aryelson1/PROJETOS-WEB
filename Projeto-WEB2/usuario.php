<?php
session_start();
require ('banco.php');

$banco = new Banco_eventos();
$link = $banco->conecta_mysql();

$f = $_GET['funcao'];

if($f == 1){
    $usuario = $_GET['usuario'];
    $email = $_GET['email'];
    $senha = $_GET['senha'];
    adicionar($link,$usuario,$email,$senha);
}

if($f == 2){
    $email = $_GET['email'];
    $senha = $_GET['senha'];
    validar($link,$email,$senha);

}

if($f == 3){
    $email = $_SESSION['email'];
    remover($link,$email);
}

if($f == 4){
    sair();
}
function validar($link,$email,$senha){
    $consulta = "SELECT * FROM usuario where email = '$email' AND senha = '$senha'";
    $teste_email = mysqli_fetch_array(mysqli_query($link,$consulta));
    if (isset($teste_email)){
        $_SESSION['email'] = $email;
        header("location:index.php?erro=4");
    }else{
        header("location:index.php?erro=-12");
    }
}

function adicionar ($link, $usuario, $email, $senha ){

    $consulta = "SELECT * FROM usuario where email = '$email'";
    $teste_email = mysqli_fetch_array(mysqli_query($link,$consulta));
    if(!isset($teste_email['email']) && $usuario != "" && $email != "" && $senha != ""){
        $consulta = "INSERT INTO `usuario`( `nome`, `email`, `senha`) VALUES ('$usuario','$email','$senha')";
        mysqli_query($link,$consulta);
        header("location:index.php?erro=1");

    }else{
        header("location:index.php?erro=-122");
    }


}

function remover($link , $email){
    $consulta = "DELETE FROM `usuario` WHERE email = '$email'";
    mysqli_query($link,$consulta);
    $_SESSION['email'] = '';
    header("location:index.php");
}

function sair(){
    $_SESSION['email'] = '';
    header("location:index.php");
}
?>