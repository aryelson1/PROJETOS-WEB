<?php
require("banco.php");


$banco = new Banco_bateria();
$link = $banco->conecta_mysql();


$dados = $_GET['Valor'];

$valores = split("_", $dados);

// $valores 0 = Status Agua
// $valores 1 = Tempo Carregamento
// $valores 2 = ID Bateria

$sql = "SELECT * FROM usuarios where senha = '$valores[0]' ";
$resultado_pesquisa = mysqli_query($link, $sql);
$array_resultado = mysqli_fetch_array($resultado_pesquisa);

//MONTANDO DATA
date_default_timezone_set('America/sao_Paulo');
$date = date('Y-m-d H-i-s');


if ($resultado_pesquisa){
    if (isset($array_resultado['senha'])){
        $sql = "UPDATE `entrada_bateria` SET `tempo_de_carregamento`=  '$valores[1]',`status`='CARREGADA' WHERE id_bateria = '$valores[2]'";
        mysqli_query($link, $sql);
        $historico = "UPDATE historico SET finalizou_carregamento = '$array_resultado[nome]', data_finalizacao = '$date' WHERE numero_bateria = '$valores[2]' and finalizou_carregamento = '-' ";
        mysqli_query($link, $historico);
        header('location:layoutReserva.php');
    }else{
        header('location:layoutReserva.php?erro=1000');
    }
}




?>







