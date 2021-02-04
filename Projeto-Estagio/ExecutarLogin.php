<?php
		
	require_once("banco.php");

	$nome = strtolower($_POST['admin']);
	$senha = $_POST['senhaAdmin'];


	//echo "$nome $senha $email";
	$banco = new Banco_bateria();
	$link = $banco -> conecta_mysql();

	

	$s = "select * from administradores where senha = '$senha' and nome = '$nome' ";
	$resultado_pesquisa = mysqli_query($link, $s);
	if ($resultado_pesquisa){

		$array_resultado = mysqli_fetch_array($resultado_pesquisa);
		if (isset($array_resultado['nome'])) {
			header('location:layoutReserva.php');
		}
			
		else {
			header('location:index.php?erro=1');
		}
		
	} else {
		header('location:index.php?erro=1');
	}


  ?>