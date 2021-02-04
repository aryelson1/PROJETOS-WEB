<?php

session_start();
	require_once("banco.php");

	$senhaAdmin = $_SESSION['senha'];
    $numBateria = $_POST['numBateria'];
    $numeroBip = $_POST['bip'];
    $equipamento = $_POST['equip'];
	$banco = new Banco_bateria();
	$link = $banco -> conecta_mysql();

	$s = "select * from administradores where senha = '$senhaAdmin'";

    $bip = "select * from baterias where codigo_bip = '$numeroBip' OR numero_bateria = '$numBateria' ";

	$resultado_pesquisa = mysqli_query($link, $s);
	$resultado_pesquisa2 = mysqli_query($link, $bip);

	if ($resultado_pesquisa && $resultado_pesquisa2) {
        $array_resultado2 = mysqli_fetch_array($resultado_pesquisa2);
        if (isset($array_resultado2['codigo_bip'])) {
            header('location:Adicionar.php?erro=2b');

        } else  {
            $array_resultado = mysqli_fetch_array($resultado_pesquisa);
            if (isset($array_resultado['senha'])) {
                $sql = "insert into baterias (numero_bateria,codigo_bip,equipamento, nome_adm) values ('$numBateria','$numeroBip','$equipamento','$array_resultado[nome]')";
                mysqli_query($link, $sql);
                header('location:Adicionar.php?erro=4b');

            } else {
                header('location:Adicionar.php?erro=1b');
            }
        }


	}  else {
        header('location:Adicionar.php?erro=3b');
    }
//errou = 0: É por que deu tudo certo. A bateria foi cadastrada e volta com uma msg avisando q deu certo;
//errou = 1: Senha ou bip invalido;
//errou = 2: Bateria já existe no banco. Não pode ser cadastrada!;
//errou = 3: ERRO INTERNO NO BANCO...


  ?>