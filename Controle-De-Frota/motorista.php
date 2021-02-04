<?php

require('banco.php');

function retornaBanco()
{
    $banco = new banco_frota();
    $link = $banco->conecta_mysql();

    return $link;
}


function excluirMotorista($id)
{
    $sql = "DELETE motorista WHERE id_motorista = '$id' ";
    $query = mysqli_query($sql) or die(mysqli_error());
    $successo = mysqli_affected_rows();
    if ($successo == true) {
        header('location:.php');

    } else {
        //falta o local.
        header('location:.php?erro=1');
    }

}

function cadastroMotorista($nome, $status, $cpf, $id_veiculo, $id_usuario)
{
    $s = "select cpf from motoristas where cpf = '$cpf'";
    $resultado_pesquisa = mysqli_query(retornaBanco(), $s);
    $res = mysqli_fetch_array($resultado_pesquisa);

    if ($res['cpf']) {
        //falta o local, ele voltar para o cadastro.
        header('location:.php?erro=3');
    } else {

        if ($resultado_pesquisa) {
            $array_resultado = mysqli_fetch_array($resultado_pesquisa);
            if (isset($array_resultado['nome'])) {
                $sql = "insert into motoristas (nome,status,cpf,id_usuario,id_veiculo) values ('$nome','$status', '$cpf', '$id_usuario', '$id_veiculo')";
                mysqli_query(retornaBanco(), $sql);
                //falta o local.
                header('location:.php');

            } else {
                //falta o local.
                header('location:.php?erro=1');
            }

        } else {
            //falta o local.
            header('location:.php?erro=1');
        }

    }
}

function listarMotorista()
{
    $consulta = "select * from motoristas where 1";
    $r = mysqli_query(retornaBanco(), $consulta);

    $lista = array();
    while ($row = mysqli_fetch_array($r)) {
        $motorista = array();
        $motorista['id_motorista'] = $row['id_motorista'];
        $motorista['id_veiculo'] = $row['id_veiculo'];
        $motorista['id_usuario'] = $row['id_usuario'];
        $motorista['nome_motorista'] = $row['nome_motorista'];
        $motorista['status'] = $row['status'];
        $motorista['cpf'] = $row['cpf'];
        $motorista['data_cadastro'] = $row['data_cadastro'];


        $lista[] = $motorista;

    }
    return $lista;
}

function alterarMotorista($id_veiculo, $id_usuario, $nome, $status, $cpf)
{
    $consulta = "SELECT * FROM motoristas WHERE cpf = '$cpf'";
    $resultado_pesquisa = mysqli_query(retornaBanco(), $consulta);


    if ($resultado_pesquisa) {
        $array_resultado = mysqli_fetch_array($resultado_pesquisa);
        if (isset($array_resultado['cpf'])) {
            $sql = "UPDATE motoristas SET nome_motorista = '$nome', status = '$status', cpf = '$cpf', id_usuario = '$id_usuario', id_veiculo = '$id_veiculo'  WHERE cpf = '$cpf'";
            mysqli_query(retornaBanco(), $sql);
            //falta o local.
            header('location:.php');

        } else {
            //falta o local.
            header('location:.php?erro=1');
        }

    } else {
        //falta o local.
        header('location:.php?erro=1');
    }

}


?>