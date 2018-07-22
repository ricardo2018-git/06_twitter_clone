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
	$sql = " SELECT * FROM tweet WHERE id_usuario_twe = $id_usuario ORDER BY data_inclusao_twe DESC; ";

	// -- Conecta-se ao banco e executa o Select, guarda na variavel --
	$resultado_id = mysqli_query($link, $sql);

	// -- Valida o retorno do select --
		if($resultado_id){

			// -- Acessa linha por linha, da consulta no bd --
			while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
				var_dump($registro);
				echo '<br/><br/>';
			}
		}else{

			// -- Caso de erro na consulta --
			echo 'Erro na consulta de tweets no banco de dados!!';
		}
	// -- FIM Valida o retorno do select --

?>
