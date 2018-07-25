<?php

	require_once('db.class.php');

	$sql = " select * from usuarios where id = 8 ";
	
	$objDb = new db();
	$link = $objDb->conecta_mysql();
	
	$resultado_id = mysqli_query($link, $sql);
	
	if($resultado_id){
		
		$dados_usuario = array();
		
		while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
			$dados_usuario[] = $linha;
		}
			foreach($dados_usuario as $usuario){
				echo $usuario['email'];
				echo '<br /><br />';
			}
			
			
	}else{
		echo 'Erro na execução da consulta, favor entrar em contato com admin do site';
	}
	
	
	//Retorno comando PHP
		//MYSQLI_NUM = indice por número, p/ relatório.
		//MYSQLI_ASSOC = indice por nome, p/ editar posterior.
		//MYSQLI_BOTH = indice por número e nome.
		
?>