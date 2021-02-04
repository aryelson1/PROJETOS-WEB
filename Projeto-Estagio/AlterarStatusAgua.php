<?php
require("banco.php");


$banco = new Banco_bateria();
$link = $banco->conecta_mysql();


$dados = $_GET['Valor'];

$valores = split("_", $dados);

// $valores 0 = Senha
// $valores 1 = Status Agua
// $valores 2 = ID Bateria

$sql = "SELECT * FROM usuarios where senha = '$valores[0]' ";
$resultado_pesquisa = mysqli_query($link, $sql);


//MONTANDO DATA
date_default_timezone_set('America/sao_Paulo');
$date = date('Y-m-d H-i-s');

if ($resultado_pesquisa){
	$array_resultado = mysqli_fetch_array($resultado_pesquisa);
    if (isset($array_resultado['senha'])){
        $sql = "UPDATE `entrada_bateria` SET status_agua = '$valores[1]' WHERE id_bateria = '$valores[2]'";
        mysqli_query($link, $sql);
        $historico = "UPDATE historico SET alterou_agua = '$array_resultado[nome]', data_alteracao_agua = '$date' WHERE numero_bateria = '$valores[2]' AND alterou_agua = '-' ";
        mysqli_query($link, $historico);
        header('location:layoutReserva.php');
    }else{
        header('location:layoutReserva.php?erro=506');
    }
}else{
        header('location:layoutReserva.php?erro=506');
    }




?>







