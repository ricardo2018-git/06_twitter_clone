<?php

	// --- Inicia SESSION, para validar q o usuário se logou realmente ---
		session_start();
	// --- FIM Inicia SESSION, para validar q o usuário se logou realmente ---

	// --- Verifica se o usuario SESSION 'NÃO' existe ---
		if(!isset($_SESSION['usuario'])){

			// --- Se realmente não existir ele retorna p/ pg index passa parametro erro ---
				header('Location: index.php?erro=1');
			// --- FIM Se realmente não existir ele retorna p/ pg index passa parametro erro ---
		}
	// --- FIM Verifica se o usuario SESSION 'NÃO' existe ---

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>

		<!-- Linguagem da pagina com caracter special-->
			<meta charset="UTF-8">
		<!-- FIM Linguagem da pagina com caracter special -->

			<title>Twitter clone</title>

		<!-- Jquery link cdn -->
			<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<!-- FIM Jquery link cdn -->

		<!-- Bootstrap link cdn -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- FIM Bootstrap link cdn -->

		<!-- Meu javaScript -->
			<script type="text/javascript">

				// -- Verifica se o documento foi carregado, Se sim executa funções --
					$(document).ready(function(){

						// -- Capitura o clique do botão tweet --
							$('#btn_procurar_pessoa').click(function(){
								
								// -- Valida se há informações no campo tweet --
									if($('#nome_pessoa').val().length > 0){
										
										// -- Requisição pg via Ajax do Jquery --
											$.ajax({

												// -- Para onde vai as informações --
												url: 'get_pessoas.php',

												// -- Metodo de envio --
												method: 'post',

												// -- Uma forma: O que vai, com um index e seu conteúdo --
												//data: { 
												//	texto_tweet: 				// -- Este é o index --
												//	$('#texto_tweet').val() 	// -- Conteúdo do campo tweet, pego pelo id --
												//},

												// -- Uma Outra forma: Envia um formulario inteiro, que contenha 'name' em seus campos--
												data: $('#form_procurar_pessoas').serialize(),

												// -- Pega conteudo de data e envia p/ url  --
												success: function(data){

													// -- Exibe nomes na pg procurar pessoas --
													$('#pessoas').html(data);

													// -- Ao clicar no botão seguir, aciona uma função--
														$('.btn_seguir').click(function(){

															// -- Capitura o id da pessoa que vc quer seguir, passado pelo data --
															var id_usuario = $(this).data('id_usuario');

															// -- Oculta o botão seguir --
															$('#btn_seguir_'+id_usuario).hide();

															// -- Habilita botão deixar de seguir --
															$('#btn_deixar_seguir_'+id_usuario).show();

															// -- Requisição ajax --
																$.ajax({

																	// -- Pra onde vai --
																	url: 'seguir.php',

																	// -- Como vai --
																	method: 'post',

																	// -- Parametros que vou passar --
																	data: { seguir_id_usuario:  id_usuario },		// Indice e valor

																	// -- Se der certo --
																		success: function(data){
																			alert('Registro efetuado com sucesso!');
																		}
																	// -- FIM Se der certo --
																});
															// -- FIM Requisição ajax --

														});
													// -- FIM Ao clicar no botão seguir, aciona uma função--

													// -- Ao clicar no botão Deixar de seguir, aciona uma função--
														$('.btn_deixar_seguir').click(function(){

															// -- Capitura o id da pessoa que vc quer seguir, passado pelo data --
															var id_usuario = $(this).data('id_usuario');

															// -- Oculta o botão seguir --
															$('#btn_seguir_'+id_usuario).show();

															// -- Habilita botão deixar de seguir --
															$('#btn_deixar_seguir_'+id_usuario).hide();

															// -- Requisição ajax --
																$.ajax({

																	// -- Pra onde vai --
																	url: 'deixar_seguir.php',

																	// -- Como vai --
																	method: 'post',

																	// -- Parametros que vou passar --
																	data: { deixar_seguir_id_usuario:  id_usuario },		// Indice e valor

																	// -- Se der certo --
																		success: function(data){
																			alert('Registro removido com sucesso!');
																		}
																	// -- FIM Se der certo --
																});
															// -- FIM Requisição ajax --
														});
													// -- Ao clicar no botão Deixar de seguir, aciona uma função--
												}
											});
										// -- FIM Requisição pg via Ajax do Jquery --
									}else{
										alert('Preencha o campo Procurar pessoa');
									}
								// -- FIM Valida se há informações no campo tweet --
							});
						// -- FIM Capitura o clique do botão tweet --
					});
				// -- FIM Verifica se o documento foi carregado, Se sim executa funções --
			</script>
		<!-- FIM Meu javaScript -->

	</head>

	<body>

		<!-- Barra inicial -->
			<nav class="navbar-default navbar-static-top">
				<div class="container">

					<!-- Botão três risquinhos -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapsed" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<!-- Logo twitter -->
								<img src="img/icone_twitter.png" />
							<!-- FIM Logo twitter -->

						</div>
					<!-- FIM Botão três risquinhos -->

					<!-- menu da Barra -->
						<div id="navbar" class="navbar-collapse colapse">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="home.php">Home</a></li>
								<li><a href="sair.php">Sair</a></li>
							</ul>
						</div>
					<!-- FIM menu da Barra -->

				</div>
			</nav>
		<!-- FIM Barra inicial -->

		<!-- Corpo da pagina -->
			<div class="container">

				<!-- Divide coluna da esquerda com tamanho 3 -->
					<div class="col-md-3">

						<!-- Area do painel -->
							<div class="panel panel-default">
								<div class="panel-body">
									<h4><?= $_SESSION['usuario']?></h4>

									<!-- linha horizontal -->
										<hr/> 

									<!-- Coluna esquerda -->
										<div class="col-md-6">
											TWEETS <br/> 1
										</div>
									<!-- FIM Coluna esquerda -->
									
									<!-- Coluna direita -->
										<div class="col-md-6">
											SEGUIDORES <br/> 1
										</div>
									<!-- Coluna direita -->
								</div>
							</div>
						<!-- FIM Area do painel -->
					</div>
				<!-- FIM Divide coluna da esquerda com tamanho 3 -->

				<!-- Divide em coluna do centro tamanho 6 -->
					<div class="col-md-6">

						<!-- Painel -->
							<div class="panel panel-default">
								<div class="panel-body">

									<!-- Alinha caixa de texto e botão -->
										<form  id="form_procurar_pessoas" class="input-group">
											<input type="text" id="nome_pessoa" name="nome_pessoa" class="form-control" placeholder="Quem você está procurando?" maxlength="140"/>
											<span class="input-group-btn">
												<button class="btn btn-default" id="btn_procurar_pessoa" type="button">Procurar</button>
											</span>
										</form>
									<!-- FIM Alinha caixa de texto e botão -->
								</div>
							</div>
						<!-- FIM Painel -->

						<!-- Campo com nome das pessoas a ser seguida -->
							<div id="pessoas" class="list-group">
								
							</div>
						<!-- FIM Campo com nome das pessoas a ser seguida -->
					</div>
				<!-- FIM Divide em coluna do centro tamanho 6 -->
				
				<!-- Divide em coluna da direita tamanho 3 -->	
					<div class="col-md-3">

						<!-- Painel -->
							<div class="panel panel-default">
								<div class="panel-body">
									
								</div>
							</div>
						<!-- Fim Painel -->
					</div>
				<!-- FIM Divide em coluna da direita tamanho 3 -->	

			</div>
		<!-- FIM Corpo da pagina -->

		<!-- JavaScript Bootstrap -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- FIM JavaScript Bootstrap -->

	</body>
</html>