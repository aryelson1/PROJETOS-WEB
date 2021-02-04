<?php
session_start();

require_once("banco.php");

	$senhaAdmin = $_SESSION["senha"];
	echo $senhaAdmin;
	$nome = strtolower($_POST['usuario']);
	$senha = $_POST['senhaUsuario'];
	$equipamento = $_POST['Equipamento'];

	$banco = new Banco_bateria();
	$link = $banco -> conecta_mysql();



	$s = "select nome from administradores where senha = '$senhaAdmin'";
	$resultado_pesquisa = mysqli_query($link, $s);

	$testesenha = "select id from usuarios where senha = '$senha'";
	$resultado_senha = mysqli_query($link, $testesenha);
	$res = mysqli_fetch_array($resultado_senha);

	if ($res['id']) {
		header('location:Adicionar.php?erro=3f');
	}else{

		if ($resultado_pesquisa){
			$array_resultado = mysqli_fetch_array($resultado_pesquisa);
			if (isset($array_resultado['nome'])) {
				$sql = "insert into usuarios (nome,senha,equipamento,nome_Adm,status) values ('$nome','$senha', '$equipamento','$array_resultado[nome]','ativo')";
				mysqli_query($link, $sql);
				header('location:Adicionar.php?erro=4f');

				} else {
						header('location:Adicionar.php?erro=1f');
				}

		} else {
			header('location:Adicionar.php?erro=1f');
		}

	}
  ?>