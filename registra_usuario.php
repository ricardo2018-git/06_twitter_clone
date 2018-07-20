<?php

	// --- Importamos a pg db.class.php p/ utilizarmos suas funções e metodos ---
		require_once('db.class.php');
	// --- FIM Importamos a pg db.class.php p/ utilizarmos suas funções e metodos ---

	// --- Recebe os dados do usuario, que vai se cadastrar no sistema ---
		$usuario = $_POST['usuario'];
		$email   = $_POST['email'];
		$senha   = md5($_POST['senha']);	// --- md5 criptografa a senha recebida do usuario ---
	// --- FIM Recebe os dados do usuario, que vai se cadastrar no sistema ---

	// --- Estância a classe db em nossa pg, e cria um objeto --
		$objDb = new db();
	// --- FIM Estância a classe db em nossa pg, e cria um objeto --

	// --- Executa a função de conexão do nosso objeto, guarda seu retorno em uma variavel link ---
		$link = $objDb -> conecta_mysql();
	// --- FIM Executa a função de conexão do nosso objeto, guarda seu retorno em uma variavel link ---

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