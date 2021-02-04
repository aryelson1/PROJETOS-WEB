<?php
session_start();
require ('banco.php');

$banco = new Banco_eventos();
$link = $banco->conecta_mysql();

$f = $_GET['funcao'];



if($f == 1){
    $nome = $_GET['nomeCliente'];
    $local = $_GET['local'];
    $tipo = $_GET['opcoes'];
    $dataInicial = $_GET['data_inicio'];
    $dataTermino = $_GET['data_termino'];
    $preco = $_GET['preco'];
    adicionar($link,$nome,$preco,$local,$tipo,$dataInicial,$dataTermino);
}
if ($f == 2){
 $id_evento = $_GET['eventos'];
 $func = $_GET['funcionarios'];
 $funcao = $_GET['funcoes'];

 adicionarFunc($link,$id_evento,$func,$funcao);
}

if ($f == 3){
    $_SESSION['id_evento'] = $_GET['id'];
    header("location:index.php?erro=444");
}
if($f == 4){
    $id_evento = $_GET["opcoes"];
    remover($link,$id_evento);
}
function adicionar($link,$nome,$preco,$local,$tipo,$dataInicial,$dataTermino){
    date_default_timezone_set('America/sao_Paulo');
    $date = date('Y-m-d H-i-s');

    if ($dataInicial > $date && $dataInicial <= $dataTermino){
        mysqli_query($link,"INSERT INTO `eventos`(`tipo`, `local`, `preco`, `cliente`, `data_inicial`, `data_termino`) VALUES ('$tipo','$local','$preco','$nome','$dataInicial','$dataTermino')");
        header("location:index.php?erro=11");
    }else{
        header("location:index.php?erro=5555");
    }

}

function adicionarFunc($link,$id_evento,$func,$funcao){
    $idFunc = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `funcionarios` WHERE cpf = '$func'"))['id_funcionario'];
    $consulta = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM `funcionario_evento` WHERE id_evento = '$id_evento' and id_funcionario = '$idFunc'"));
    if (isset($consulta['id_evento']) == NULL){
        mysqli_query($link,"INSERT INTO `funcionario_evento`(`id_evento`, `id_funcionario`, `funcao`) VALUES ('$id_evento','$idFunc','$funcao')");
        header("location:index.php?erro=66");
    }else{
        header("location:index.php?erro=600");
    }

}

function remover($link,$id_evento){

    mysqli_query($link,"DELETE FROM funcionario_evento WHERE id_evento = $id_evento");
    mysqli_query($link,"DELETE FROM eventos WHERE id_evento = $id_evento");

    header("location:index.php?erro=1111");
}