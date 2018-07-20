<?php
	
	// --- Sempre em primeiro lugar, nunca depois de algum comando de saida. Inicia altenticação de usuario ---
		session_start();
	// --- FIM Sempre em primeiro lugar, nunca depois de algum comando de saida. Inicia altenticação de usuario ---

	// --- Importamos a pg db.class.php p/ utilizarmos suas funções e metodos ---
		require_once('db.class.php');
	// --- FIM Importamos a pg db.class.php p/ utilizarmos suas funções e metodos ---

	// --- Recebe informaçõe do usuario que quer se logar no sistema ---
		$usuario = $_POST['usuario'];
		$senha   = $_POST['senha'];
	// --- FIM Recebe informaçõe do usuario que quer se logar no sistema ---

	// --- Faz uma busca no bd p/ saber se é valido as informações passada pelo usuario ---
		$sql = "SELECT db_usuario_usu, db_email_usu FROM usuarios WHERE db_usuario_usu = '$usuario' AND db_senha_usu = '$senha'";
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
			
			// --- verifica se no retorno do array no index db_usuario_usu, esta preenchido ---
				if(isset($dados_usuario["db_usuario_usu"])){
					
					// --- Cria var $_SESSION, p/ sabermos se realmente o usuario fez login ---
						$_SESSION['usuario'] = $dados_usuario["db_usuario_usu"];
						$_SESSION['email']   = $dados_usuario["db_email_usu"];
					// --- Cria var $_SESSION, p/ sabermos se realmente o usuario fez login ---

					// --- Redireciona p/ pg restrita do nosso sistema ---
						header('Location: home.php');
					// --- FIM Redireciona p/ pg restrita do nosso sistema ---

				}else{
					
					// --- Redireciona pg p/ index, passando um parametro via get ---
						header('Location: index.php?erro=1');
					// --- FIMRedireciona pg p/ index, passando um parametro via get ---

				}
			// --- FIM verifica se no retorno do array no index db_usuario_usu, esta preenchido ---

		}else{

			// --- Se caso houver um erro ---
				echo'Erro na excução da consulta, favor entrar em contato com a adm do site!';

		}
	// --- FIM Validação do select no banco ---

	

?>