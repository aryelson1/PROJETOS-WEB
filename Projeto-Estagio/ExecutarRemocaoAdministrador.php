<?php
		
	require_once("banco.php");

	//$senhaAdmin = md5($_POST['senhaAdmin']);
	$Id = $_GET['id'];



	//echo "$nome $senha $email";
	$banco = new Banco_bateria();
	$link = $banco -> conecta_mysql();



	$selectid = "select * from administradores where id > 1 AND id = '$Id'";

	$resultado_select = mysqli_query($link, $selectid);


		if ($resultado_select){
			$select_array = mysqli_fetch_array($resultado_select);
			if (isset($select_array['id']) and isset($select_array['nome'])) {
					$sql = "DELETE FROM `administradores` WHERE id = '$Id'";
					mysqli_query($link, $sql);
					header('location:Remover.php?erro=4a');
				}else{
					header('location:Remover.php?erro=1');
				}
			
		} else {
			header('location:Remover.php?erro=1');
		}


  ?>