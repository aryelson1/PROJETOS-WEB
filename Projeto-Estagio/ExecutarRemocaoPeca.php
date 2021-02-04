<?php

require_once("banco.php");
$banco = new Banco_bateria();
$link = $banco -> conecta_mysql();

$id = $_GET['id'];

$idp = "select * from estoque where id_estoque = '$id'";

$resultado_pesquisa2 = mysqli_query($link, $idp);

if ($resultado_pesquisa2) {
    $array_resultado2 = mysqli_fetch_array($resultado_pesquisa2);
    if (isset($array_resultado2['id_estoque'])) {
        $sql = "DELETE FROM estoque WHERE id_estoque = '$id'";
        mysqli_query($link, $sql);
        header('location:Remover.php?erro=4p');
    } else {
        header('location:Remover.php?erro=1');
    }
}else {
    header('location:Remover.php?erro=2');
}

//errou = 0: deu tudo certo! bateria removida com sucesso!. e manda um msg.
//errou = 1: senha do ADM incorreta ou bip invalido.
//ERROU = 2: Erro interno no banco de dados

?>