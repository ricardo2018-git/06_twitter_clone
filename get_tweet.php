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

	// -- Acessa a variavel id de sessão do usuario, p/ saber seu id --
	$id_usuario = $_SESSION['id'];

	// -- Intânciamos um objeto --
	$objDb = new db();

	// -- Abrimos conexão com o banco de dados --
	$link = $objDb -> conecta_mysql();

	// -- Comando select todo post, ordenado por data e hora --
	$sql = " SELECT DATE_FORMAT(t.data_inclusao_twe, '%d %b %Y %T') AS data_inclusao_formatada, t.tweet_twe, u.db_usuario_usu
				 FROM tweet AS t JOIN usuarios AS u ON(t.id_usuario_twe = u.db_id_usu)
					WHERE id_usuario_twe = $id_usuario ORDER BY data_inclusao_twe DESC; ";

	// -- Conecta-se ao banco e executa o Select, guarda na variavel --
	$resultado_id = mysqli_query($link, $sql);

	// -- Valida o retorno do select --
		if($resultado_id){

			// -- Acessa linha por linha, da consulta no bd --
				while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
					
					// -- Gera uma lista no html da pg home contendo as informações do bd --
						echo '<a href="#" class="list-group-item">';
							echo '<h4 class="list-group-item-heading">'.$registro['db_usuario_usu'].' <small>'.$registro['data_inclusao_formatada'].'</small></h4>';
							echo '<p class="list-group-item-text">'.$registro['tweet_twe'].'</p>';
						echo '</a>';
					// -- FIM Gera uma lista no html da pg home contendo as informações do bd --
				}
			// -- FIM Acessa linha por linha, da consulta no bd --
		}else{

			// -- Caso de erro na consulta --
			echo 'Erro na consulta de tweets no banco de dados!!';
		}
	// -- FIM Valida o retorno do select --

?>
