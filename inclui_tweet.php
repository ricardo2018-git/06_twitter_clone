<?php
	
	// -- Iniciar as variaveis de SESSION --
	session_start();

	// --- Verifica se o usuario SESSION 'NÃO' existe ---
		if(!isset($_SESSION['usuario'])){

			// --- Se realmente não existir ele retorna p/ pg index passa parametro erro ---
				header('Location: index.php?erro=1');
			// --- FIM Se realmente não existir ele retorna p/ pg index passa parametro erro ---
		}
	// --- FIM Verifica se o usuario SESSION 'NÃO' existe ---

	// -- Importamos a pg p/ usarmos suas funções e metodos --
	require_once('db.class.php');

	// -- Recebemos informações do campo tweet via Ajax e guardamos na variavel --
	$texto_tweet = $_POST['texto_tweet'];

	// -- Acessa a variavel id de sessão do usuario, p/ saber seu id --
	$id_usuario = $_SESSION['id'];

	// -- Controle de validação antes de inserir informações no banco de dados --
		if($texto_tweet != '' && $id_usuario != ''){

			// -- Intânciamos um objeto --
			$objDb = new db();

			// -- Abrimos conexão com o banco de dados --
			$link = $objDb -> conecta_mysql();

			// -- Preparo o comando de insert no banco --
			$sql = " INSERT INTO tweet(id_usuario_twe, tweet_twe) VALUES ($id_usuario, '$texto_tweet') ";
		
			// -- Conecta-se ao banco e executa o insert --
			mysqli_query($link, $sql);
		}
	// -- FIM Controle de validação antes de inserir informações no banco de dados --

?>