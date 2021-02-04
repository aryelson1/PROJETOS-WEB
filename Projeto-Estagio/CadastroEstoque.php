<?php

session_start();
require_once("banco.php");

$senhaAdmin = $_SESSION['senha'];
$descricao = $_POST['descricao'];
$quant = $_POST['quant'];


$banco = new Banco_bateria();
$link = $banco -> conecta_mysql();

$s = "select * from estoque where descricao = '$descricao'";
$resultado_pesquisa = mysqli_query($link, $s);


if ($resultado_pesquisa) {
    $array_resultado = mysqli_fetch_array($resultado_pesquisa);
    if (isset($array_resultado['descricao']) != NULL) {
        header('location:Adicionar.php?erro=2p');

    } else  {
        if (isset($array_resultado['descricao']) == NULL) {
            $sql = "insert into estoque (descricao,quantidade) values ('$descricao','$quant')";
            mysqli_query($link, $sql);
            header('location:Adicionar.php?erro=4p');

        } else {
            header('location:Adicionar.php?erro=1p');
        }
    }


}  else {
    header('location:Adicionar.php?erro=3p');
}
//errou = 0: É por que deu tudo certo. A bateria foi cadastrada e volta com uma msg avisando q deu certo;
//errou = 1: Senha ou bip invalido;
//errou = 2: Bateria já existe no banco. Não pode ser cadastrada!;
//errou = 3: ERRO INTERNO NO BANCO...


?>