<?php
session_start();
require ('banco.php');

$banco = new Banco_eventos();
$link = $banco->conecta_mysql();

$f = $_GET['funcao'];

if($f == 1){
    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $celular = $_GET['celular'];
    adicionar($link,$nome,$cpf,$celular);
}

if($f == 2){
    $email = $_GET['email'];
    $senha = $_GET['senha'];
    validar($link,$email,$senha);

}

if($f == 3){
    $cpf = $_GET['opcoes'];
    remover($link,$cpf);
}
if($f == 4){
    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $cpfA = $_GET['cpfAntigo'];
    $celular = $_GET['celular'];
    alterar($link,$nome,$cpf,$cpfA,$celular);
}
function adicionar($link,$nome,$cpf,$celular ){

    $teste_cpf = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM funcionarios WHERE cpf = '$cpf'"));
    if(!isset($teste_cpf) && $nome != "" && $cpf != "" ){
        mysqli_query($link,"INSERT INTO funcionarios (nome,cpf,celular) VALUES ('$nome','$cpf','$celular')");
        header("location:index.php?erro=11");
    }else{
        header("location:index.php?erro=111");

    }

}

function remover($link,$cpf){

    $id = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM funcionarios WHERE cpf = '$cpf'"))['id_funcionario'];

    mysqli_query($link,"DELETE FROM `funcionario_evento` WHERE id_funcionario = '$id'");
    mysqli_query($link,"DELETE FROM `funcionarios` WHERE cpf = '$cpf'");

    header("location:index.php?erro=1001");

}

function alterar($link,$nome,$cpf,$cpfA,$celular){
    mysqli_query($link,"UPDATE `funcionarios` SET nome = '$nome',`cpf`= '$cpf' ,`celular` = '$celular' WHERE cpf = '$cpfA'");
    header("location:index.php?erro=11");
}