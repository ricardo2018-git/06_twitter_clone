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

	// -- Recedo nome da pessoa que esta sendo procurada --
	$nome_pessoa = $_POST['nome_pessoa'];

	// -- Acessa a variavel id de sessão do usuario, p/ saber seu id --
	$id_usuario = $_SESSION['id'];

	// -- Intânciamos um objeto --
	$objDb = new db();

	// -- Abrimos conexão com o banco de dados --
	$link = $objDb -> conecta_mysql();

	// -- Comando select todo post, ordenado por data e hora --
	$sql = " SELECT * FROM usuarios WHERE db_usuario_usu LIKE '%$nome_pessoa%' AND db_id_usu != $id_usuario";

	// -- Conecta-se ao banco e executa o Select, guarda na variavel --
	$resultado_id = mysqli_query($link, $sql);

	// -- Valida o retorno do select --
		if($resultado_id){

			// -- Acessa linha por linha, da consulta no bd --
				while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
					
					// -- Gera uma lista no html da pg Procurar_pessoas contendo as informações do bd --
						echo '<a href="#" class="list-group-item">';
							echo '<strong>'.$registro['db_usuario_usu'].'</strong> <small> - '.$registro['db_email_usu'].' </small>';
							echo '<p class="lista-group-item-text pull-right">';

								// -- Botões para seguir e deixar de seguir --
									echo '<button type="button" class="btn btn-default btn_seguir" data-id_usuario="'.$registro['db_id_usu'].'">Seguir</button>';
								// -- FIM Botões para seguir e deixar de seguir --
							echo '</p>';

							// -- Esta classe organiza o botões dentro de cada celula corretamente --
							echo '<div class="clearfix"></div>';
						echo '</a>';
					// -- FIM Gera uma lista no html da pg Procurar_pessoas contendo as informações do bd --
				}
			// -- FIM Acessa linha por linha, da consulta no bd --
		}else{

			// -- Caso de erro na consulta --
			echo 'Erro na consulta de usuários no banco de dados!!';
		}
	// -- FIM Valida o retorno do select --

?>
