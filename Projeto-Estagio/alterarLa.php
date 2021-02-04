<?php


require_once("banco.php");
$banco = new Banco_bateria();
$link = $banco -> conecta_mysql();

$id = $_GET['id'];

date_default_timezone_set('America/sao_Paulo');
$data = date('Y-m-d H-m-s');

$idp = "UPDATE `lavagem` SET `data`= '$data' WHERE numero_bateria = '$id'";

$resultado_pesquisa2 = mysqli_query($link, $idp);

header("location:layoutReserva.php?erro=007");

//errou = 0: deu tudo certo! bateria removida com sucesso!. e manda um msg.
//errou = 1: senha do ADM incorreta ou bip invalido.
//ERROU = 2: Erro interno no banco de dados

?>