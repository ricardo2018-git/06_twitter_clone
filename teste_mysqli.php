<?php
	
	// --- Importamos a pg db.class.php p/ utilizarmos suas funções e metodos ---
		require_once('db.class.php');
	// --- FIM Importamos a pg db.class.php p/ utilizarmos suas funções e metodos ---

	// --- Faz uma busca no bd p/ saber se é valido as informações passada pelo usuario ---
		$sql = "SELECT * FROM usuarios";
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

			// --- Recebe o resoucer e atribuimos a um array ---
				$dados_usuario = array();

				// --- Busca no banco registro por registro e guarda no array ---
					while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){ // --- MYSQLI_NUM, retorna o indice num
						$dados_usuario[] = $linha;
					}

				// --- Trata os dados para melhor visualização  ---
					foreach($dados_usuario as $usuario){
						echo $usuario['db_email_usu'];
						echo '<br/><br/>';
					}
			
		}else{

			// --- Se caso houver um erro ---
				echo'Erro na excução da consulta, favor entrar em contato com a adm do site!';

		}
	// --- FIM Validação do select no banco ---

?>