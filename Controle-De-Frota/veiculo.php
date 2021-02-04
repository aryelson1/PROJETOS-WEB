
<?php

require('banco.php');

function retornaBanco() {
    $banco = new banco_frota();
    $link = $banco->conecta_mysql();

    return $link;
}



function excluirveiculo($placa)

{
    $sql = "DELETE veiculos WHERE placa = '$placa' ";
    $query = mysqli_query($sql) or die(mysqli_error());
    $successo = mysqli_affected_rows();
    if ($successo == true) {
        header('location:.php');

    } else {
        //falta o local.
        header('location:.php?erro=1');
    }

}

function cadastroveiculo($modelo, $placa, $id_motorista, $id_usuario, $status)
{
    $s = "SELECT * FROM veiculos WHERE placa = '$placa'";
    $resultado_pesquisa = mysqli_query(retornaBanco(), $s);
    $res = mysqli_fetch_array($resultado_pesquisa);

    if ($res['placa']) {
        //falta o local, ele voltar para o cadastro.
        header('location:.php?erro=3');
    } else {

        if ($resultado_pesquisa) {
            $array_resultado = mysqli_fetch_array($resultado_pesquisa);
            if (isset($array_resultado['modelo'])) {
                $sql = "insert into veiculos (modelo,placa,motorista) values ('$modelo','$placa', '$id_motorista, $id_usuario, $status')";
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

function listarveiculo()
{
    $consulta = "select * from veiculos where 1";
    $r = mysqli_query(retornaBanco(), $consulta);

    $lista = array();
    while ($row = mysqli_fetch_array($r)) {
        $veiculo = array();
        $veiculo['id_veiculo'] = $row['id_veiculo'];
        $veiculo['modelo'] = $row['modelo'];
        $veiculo['placa'] = $row['placa'];
        $veiculo['id_motorista'] = $row['id_motorista'];
        $veiculo['id_usuario'] = $row['id_usuario'];
        $veiculo['status'] = $row['status'];
        $veiculo['data_cadastro'] = $row['data_cadastro'];


        $lista[] = $veiculo;

    }
    return $lista;
}

function alterarveiculo($modelo, $placa, $id_motorista, $status,$placa )
{
    $consulta = "SELECT * FROM veiculos WHERE placa = '$placa'";
    $resultado_pesquisa = mysqli_query(retornaBanco(), $consulta);


    if ($resultado_pesquisa) {
        $array_resultado = mysqli_fetch_array($resultado_pesquisa);
        if (isset($array_resultado['placa'])) {
            $sql = "UPDATE veiculos SET modelo = '$modelo', placa = '$placa', id_motorista = '$id_motorista', WHERE placa = '$placa'";
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