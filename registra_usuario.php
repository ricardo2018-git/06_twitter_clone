<?php

	// --- Importamos a pg db.class.php p/ utilizarmos suas funções e metodos ---
		require_once('db.class.php');
	// --- FIM Importamos a pg db.class.php p/ utilizarmos suas funções e metodos ---

	// --- Recebe os dados do usuario, que vai se cadastrar no sistema ---
		$usuario = $_POST['usuario'];
		$email   = $_POST['email'];
		$senha   = md5($_POST['senha']);	// --- md5 criptografa a senha recebida do usuario ---
	// --- FIM Recebe os dados do usuario, que vai se cadastrar no sistema ---

	// --- Variaveis p/ controle de usuarios q ja foram cadastrados ---
		$usuario_existe = false;
		$email_existe   = false;
	// --- Variaveis p/ controle de usuarios q ja foram cadastrados ---

	// --- Estância a classe db em nossa pg, e cria um objeto --
		$objDb = new db();
	// --- FIM Estância a classe db em nossa pg, e cria um objeto --

	// --- Executa a função de conexão do nosso objeto, guarda seu retorno em uma variavel link ---
		$link = $objDb -> conecta_mysql();
	// --- FIM Executa a função de conexão do nosso objeto, guarda seu retorno em uma variavel link ---

	// --- Verifica se o usuário ja foi cadastrado ---
		$sql = " SELECT * FROM usuarios WHERE db_usuario_usu = '$usuario' ";// --- Busca no bd se ja foi cadastrado ---

		// --- Varifica se houve erro durante a consulta, caso não ---
		if($resultado_id = mysqli_query($link, $sql)){	//guarda retorno na variavel $resultado_id
			
			$dados_usuario = mysqli_fetch_array($resultado_id);

			if(isset($dados_usuario['db_usuario_usu'])){
				$usuario_existe = true;
			}
			
		}else{
			echo 'Erro ao tentar localizar o resgistro de usuário';
		}
	// --- FIIM Verifica se o usuário ja foi cadastrado ---

	// --- Verifica se o e-mail ja foi cadastrado ---
		$sql = " SELECT * FROM usuarios WHERE db_email_usu = '$email' ";// --- Busca no bd se ja foi cadastrado ---

		// --- Varifica se houve erro durante a consulta, caso não ---
		if($resultado_id = mysqli_query($link, $sql)){	//guarda retorno na variavel $resultado_id
			
			$dados_usuario = mysqli_fetch_array($resultado_id);

			if(isset($dados_usuario['db_email_usu'])){
				$email_existe = true;
			}
			
		}else{
			echo 'Erro ao tentar localizar o resgistro de usuário';
		}
	// --- FIM Verifica se o e-mail ja foi cadastrado ---

	// --- Verifica se usuario ou email ja foi cadastrado ---
	if($usuario_existe || $email_existe){
		
		$retorno_get = '';

		// --- Se usuario já existir atribui um parametro a variavel ---
		if($usuario_existe){
			$retorno_get.= "erro_usuario=1&";
		}

		// --- Se email já existir atribui um outro parametro a variavel ---
		if($email_existe){
			$retorno_get.= "erro_email=1&";
		}

		// -- Redireciona p/ pg com algumas config. na url --
		header('Location: inscrevase.php?'.$retorno_get);

		// -- encerra a execução da pg aqui --
		die();
	}

	// --- Variavel que vai passar o comando de insert p/ o BD ---
		$sql = "INSERT INTO usuarios(db_usuario_usu, db_email_usu, db_senha_usu) VALUES('$usuario', '$email', '$senha')";
	// --- Variavel que vai passar o comando de insert p/ o BD ---

	// -- Executa o comando de insert e valida se foi bem sucedido --
		if(mysqli_query($link, $sql)){
			echo 'Usuario registrado com sucesso!';
		}else{
			echo 'Erro ao registrar o usuário!';
		}
	// -- FIM Executa o comando de insert e valida se foi bem sucedido --

?>