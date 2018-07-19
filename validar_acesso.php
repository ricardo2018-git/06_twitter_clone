<?php
	
	// --- Importamos a pg db.class.php p/ utilizarmos suas funções e metodos ---
		require_once('db.class.php');
	// --- FIM Importamos a pg db.class.php p/ utilizarmos suas funções e metodos ---

	// --- Recebe informaçõe do usuario que quer se logar no sistema ---
		$usuario = $_POST['usuario'];
		$senha   = $_POST['senha'];
	// --- FIM Recebe informaçõe do usuario que quer se logar no sistema ---

	// --- Faz uma busca no bd p/ saber se é valido as informações passada pelo usuario ---
		$sql = "SELECT * FROM usuarios WHERE db_usuario_usu = '$usuario' AND db_senha_usu = '$senha'";
	// --- FIM Faz uma busca no bd p/ saber se é valido as informações passada pelo usuario ---

	// --- Estância a classe db em nossa pg, e cria um objeto --
		$objDb = new db();
	// --- FIM Estância a classe db em nossa pg, e cria um objeto --

	// --- Executa a função de conexão do nosso objeto, guarda seu retorno em uma variavel link ---
		$link  = $objDb->conecta_mysql();
	// --- FIM Executa a função de conexão do nosso objeto, guarda seu retorno em uma variavel link ---

	// --- Executa o comando select e retorna false ou resoucer ---
		$resultado_id = mysqli_query($link, $sql);
	// --- FIM Executa o comando select e retorna false ou resoucer ---

	// --- Validação do select no banco ---
		if($resultado_id){

			// --- Recebe o resoucer e coloca em um array e atribuimos a uma variavel ---
			$dados_usuario = mysqli_fetch_array($resultado_id);
			
			// ---  ---
			if(isset($dados_usuario['usuario'])){
				echo 'usuário existe';
			}else{
				echo 'usuário não existe';
			}

		}else{

			// --- Se caso houver um erro ---
			echo'Erro na excução da consulta, favor entrar em contato com a adm do site!';

		}
	// --- FIM Validação do select no banco ---

	

?>