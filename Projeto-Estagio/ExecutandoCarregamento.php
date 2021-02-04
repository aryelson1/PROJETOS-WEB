<?php
require('banco.php');

$banco = new Banco_bateria();
$link = $banco->conecta_mysql();


$dado = $_GET['object'];
$dados = split(":", $dado);

$sql = "SELECT * FROM usuarios where senha = '$dados[2]' ";
$resultado_pesquisa = mysqli_query($link, $sql);
$array_resultado = mysqli_fetch_array($resultado_pesquisa);


$sql1 = "SELECT * FROM entrada_bateria where id_bateria = $dados[1] ";
$resultado = mysqli_fetch_array(mysqli_query($link, $sql1));

$sql2 = "SELECT * FROM entrada_bateria where numero_carregador = $dados[0] and status = 'CARREGANDO' ";
$resultado1 = mysqli_fetch_array(mysqli_query($link, $sql2))['numero_carregador'];

//MONTANDO DATA
date_default_timezone_set('America/sao_Paulo');
$date = date('Y-m-d H-i-s');

if ($resultado_pesquisa) {
    if ($resultado1 == $dados[0]) {
        header("location:layoutReserva.php?erro=504");
    } else if (isset($array_resultado['senha'])) {
        $con = "update `entrada_bateria` set `numero_carregador`= $dados[0] , `status`= 'CARREGANDO', status_agua = '$resultado[status_agua]'  where id_bateria = $dados[1] ";
        mysqli_query($link, $con);
        $historico = "UPDATE historico SET finalizou_repouso = '$array_resultado[nome]', data_finalizacao_repouso = '$date' WHERE numero_bateria = '$dados[1]' and finalizou_repouso   = '-'";
        mysqli_query($link, $historico);
	

 	$historico = "UPDATE historico SET  alterou_agua = 'NAO VERIFICADO' WHERE numero_bateria = '$dados[1]' and alterou_agua = '-'";
        mysqli_query($link, $historico);
        header("location:layoutReserva.php");
    } else {
        header('location:layoutReserva.php?erro=505');
    }
}


?>





