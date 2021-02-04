<?php

	class Banco_eventos{

		private $host = "localhost";
		private $administrador = "root";
		private $senha = "";
		private $banco = "banco_eventos";

		public function conecta_mysql(){

			$conexao = mysqli_connect($this->host, $this->administrador, $this->senha, $this->banco);


			return $conexao;
		}
	}

  ?>