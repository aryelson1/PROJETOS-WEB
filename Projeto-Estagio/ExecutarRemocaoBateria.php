<?php

	require_once("banco.php");
    $banco = new Banco_bateria();
    $link = $banco -> conecta_mysql();

	$id = $_GET['id'];

	$bip = "select * from baterias where id = '$id'";

	$resultado_pesquisa2 = mysqli_query($link, $bip);

	if ($resultado_pesquisa2) {
        $array_resultado2 = mysqli_fetch_array($resultado_pesquisa2);
        if (isset($array_resultado2['id'])) {
            $sql = "DELETE FROM baterias WHERE id = '$id'";
            $sql2 = "DELETE FROM entrada_bateria WHERE id_bateria = '$id'";
            mysqli_query($link, $sql);
            mysqli_query($link, $sql2);
            header('location:Remover.php?erro=4b');

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