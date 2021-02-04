<?php

require_once("banco.php");

$d = $_GET['remover'];
$dados = split("_",$d);

$banco = new Banco_bateria();
$link = $banco -> conecta_mysql();



$s = "select * from estoque where id_estoque = '$dados[1]' ";
$resultado_pesquisa = mysqli_query($link, $s);
if ($resultado_pesquisa){
    $array_resultado = mysqli_fetch_array($resultado_pesquisa);
    $qnt = $array_resultado['quantidade'] - $dados[0];
    if($qnt >= 0){
    $con = "update estoque set quantidade = '$qnt' where id_estoque = $dados[1] ";
    mysqli_query($link, $con);
    header("location:layoutReserva.php?erro=765");
    }else{
        header("location:layoutReserva.php?erro=7651");
    }
} else {
    header('location:layoutReserva.php?erro=1122');
}


?>