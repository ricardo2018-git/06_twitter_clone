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
	$seguir_id_usuario = $_POST['seguir_id_usuario'];

	// -- Controle de validação antes de inserir informações no banco de dados --
		if($id_usuario != '' && $seguir_id_usuario != ''){

			// -- Intânciamos um objeto --
			$objDb = new db();

			// -- Abrimos conexão com o banco de dados --
			$link = $objDb -> conecta_mysql();

			// -- Preparo o comando de insert no banco --
			$sql = " INSERT INTO usuarios_seguidores(id_usuario_usuSeg, seguindo_id_usuario_usuSeg) VALUES ($id_usuario, $seguir_id_usuario) ";
			
			echo $sql;

			// -- Conecta-se ao banco e executa o insert --
			mysqli_query($link, $sql);
		}
	// -- FIM Controle de validação antes de inserir informações no banco de dados --

?>