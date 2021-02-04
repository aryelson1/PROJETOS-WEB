<?php

	class Banco_bateria{

		private $host = "localhost";
		private $administrador = "root";
		private $senha = "";
		private $banco = "gerenciador de baterias";

		public function conecta_mysql(){

			$conexao = mysqli_connect($this->host, $this->administrador, $this->senha, $this->banco);

			// ajustar o charset
			mysqli_set_charset($conexao, "utf8");

			return $conexao;
		}
	}

  ?>