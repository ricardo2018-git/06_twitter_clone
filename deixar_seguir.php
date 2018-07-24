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

	// -- Acessa a variavel id de sessão do usuario, p/ saber o id --
	$id_usuario = $_SESSION['id'];

	// -- Recebe id da pessoa que vai ser seguida por vc --
	$deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];

	// -- Controle de validação antes de inserir informações no banco de dados --
		if($id_usuario != '' && $deixar_seguir_id_usuario != ''){

			// -- Intânciamos um objeto --
			$objDb = new db();

			// -- Abrimos conexão com o banco de dados --
			$link = $objDb -> conecta_mysql();

			// -- Preparo o comando de delete no banco --
			$sql = " DELETE FROM usuarios_seguidores WHERE id_usuario_usuSeg = $id_usuario AND seguindo_id_usuario_usuSeg = $deixar_seguir_id_usuario ";
			
			echo $sql;

			// -- Conecta-se ao banco e executa o insert --
			mysqli_query($link, $sql);
		}
	// -- FIM Controle de validação antes de inserir informações no banco de dados --

?>