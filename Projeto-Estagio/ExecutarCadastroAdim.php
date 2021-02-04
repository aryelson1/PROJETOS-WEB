<?php
    session_start();
	require_once("banco.php");

	$senhaAdmin = $_SESSION['senha'];
	$nome = strtolower($_POST['usuario']);
	$senha = $_POST['senhaUsuario'];


	//echo "$nome $senha $email";
	$banco = new Banco_bateria();
	$link = $banco -> conecta_mysql();

	

	$s = "select nome from administradores where senha = '$senhaAdmin' and id = 1";
	$resultado_pesquisa = mysqli_query($link, $s);

	$testesenha = "select * from administradores where senha = '$senha'";
	$resultado_senha = mysqli_query($link, $testesenha);
	$array = mysqli_fetch_array($resultado_senha);	

	if ($array['senha']) {
		header('location:Adicionar.php?erro=2a');
	}else{
	if ($resultado_pesquisa){
		$array_resultado = mysqli_fetch_array($resultado_pesquisa);	
		if (isset($array_resultado['nome'])) {
			$sql = "insert into administradores (nome_cadastrante, nome, senha) values ('$array_resultado[nome]','$nome', '$senha')";
			mysqli_query($link, $sql);
			header('location:Adicionar.php?erro=4a');
			
		} else {
			header('location:Adicionar.php?erro=1a');
		}
		
	} else {
		header('location:Adicionar.php?erro=3a');
	}

}
  ?>