<?php

	// --- Esta classe faz a conecção com banco de dados ---
		class db{

			// --- Variaveis que contem os dados p/ conecção ---
				private $host = 'localhost';
				private $usuario = 'root';
				private $senha = '';
				private $database = 'twitter_clone2';
			// --- FIM Variaveis que contem os dados p/ conecção ---

			// --- Função que realiza a conecção com o bd ---
				public function conecta_mysql(){

					// --- Cria conecção
					$con = mysqli_connect($this -> host, $this -> usuario, $this -> senha, $this -> database);

					// --- Ajusta o charset de comunicação entre a aplicação e o banco de dados
					mysqli_set_charset($con, 'utf-8');

					// -- Verifica se houve erro de conexão
					if(mysqli_connect_erro()){	//retorno, != de 0 existe erro
						echo 'Erro ao tentar se conectar com o BD MySql: '.mysqli_connect_error();
					}

					return $con;

				}
			// --- FIM Função que realiza a conecção com o bd ---

		}
	// --- FIM Esta classe faz a conecção com banco de dados ---
?>