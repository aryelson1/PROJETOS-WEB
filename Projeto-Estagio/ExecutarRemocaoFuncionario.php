<?php
		
	require_once("banco.php");

	$Id = $_GET['id'];

	$banco = new Banco_bateria();
	$link = $banco -> conecta_mysql();

	$selectid = "select * from usuarios where id = '$Id'";

	$resultado_select = mysqli_query($link, $selectid);


		if ($resultado_select){
			$array_resultado = mysqli_fetch_array($resultado_select);
			if (isset($array_resultado['id'])) {
					$sql = "DELETE FROM usuarios WHERE id = '$Id'";
					mysqli_query($link, $sql);
					header('location:Remover.php');
				}else{
					header('location:Listar.php?erro=1');
				}
			
		} else {
			header('location:Adicionar.php?erro=1');
		}

  ?>