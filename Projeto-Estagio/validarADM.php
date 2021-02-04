<?php

session_start();

require_once("banco.php");

$senha = $_GET['senhaAdmin'];

$dados = split("_",$senha);

//echo "$nome $senha $email";
$banco = new Banco_bateria();
$link = $banco -> conecta_mysql();

$senha = $dados[0];


$s = "select * from administradores where senha = '$senha' ";

$resultado_pesquisa = mysqli_query($link, $s);
if ($resultado_pesquisa){
    $array_resultado = mysqli_fetch_array($resultado_pesquisa);
    if (isset($array_resultado['id'])) {
        if ($dados[1] == 1){
            $_SESSION['senha'] = $senha;
            header('location:Adicionar.php');
        }elseif ($dados[1] == 2){
            header('location:Remover.php');
        }elseif ($dados[1] == 4){
            header('location:layoutReserva.php?erro=4444');
        } else{
            header('location:Listar.php');
        }
    }

    else {
        header('location:layoutReserva.php?erro=100');
    }

} else {
    header('location:layoutReserva.php?erro=100');
}

?>