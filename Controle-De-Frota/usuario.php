<?php
require('banco.php');

function retornaBanco()
{

    $banco = new banco_frota();
    $link = $banco->conecta_mysql();

    return $link;
}

function cadastroUsuario($nome, $senha)
{
    $s = "SELECT * from usuario where senha = '$senha'";
    $resultado_pesquisa = mysqli_query(retornaBanco(), $s);


    if ($res['senha']) {
        header('location:.php?erro=3');
    } else {

        if ($resultado_pesquisa) {
            $array_resultado = mysqli_fetch_array($resultado_pesquisa);
            if (isset($array_resultado['nome'])) {
                $sql = "insert into usuario (nome,senha) values ('$nome','$senha')";
                mysqli_query(retornaBanco(), $sql);
                header('location:.php?erro=4');

            } else {
                header('location:.php?erro=1');
            }

        } else {
            header('location:.php?erro=1');
        }

    }
}

function excluirUsuario($id)
{
    $sql = "DELETE usuario WHERE id_usuario = '$id' ";
    $query = mysqli_query($sql) or die(mysqli_error());
    $successo = mysqli_affected_rows();
    if ($successo == true) {
        header('location:.php');

    } else {
        //falta o local.
        header('location:.php?erro=1');
    }


}

function alterarUsuario($nome, $senha)
{
    $consulta = "SELECT * FROM usuario WHERE senha = '$senha'";
    $resultado_pesquisa = mysqli_query(retornaBanco(), $consulta);


    if ($resultado_pesquisa) {
        $array_resultado = mysqli_fetch_array($resultado_pesquisa);
        if (isset($array_resultado['nome'])) {
            $sql = "UPDATE usuario SET nome_usuario = '$nome', senha = '$senha' WHERE cpf = '$cpf'";
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

function listarUsuario()
{
    $consulta = "select * from usuario where 1";
    $r = mysqli_query(retornaBanco(), $consulta);

    $lista = array();
    while ($row = mysqli_fetch_array($r)) {
        $usuario = array();
        $usuario['id_usuario'] = $row['id_usuario'];
        $usuario['nome'] = $row['nome'];
        $usuario['senha'] = $row['senha'];
        $usuario['data_cadastro'] = $row['data_cadastro'];

        $lista[] = $motorista;

    }
    return $lista;
}

?>

