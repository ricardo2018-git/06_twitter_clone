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
							$('#btn_tweet').click(function(){
								
								// -- Valida se há informações no campo tweet --
									if($('#texto_tweet').val().length > 0){
										
										// -- Requisição pg via Ajax do Jquery --
											$.ajax({

												// -- Para onde vai as informações --
												url: 'inclui_tweet.php',

												// -- Metodo de envio --
												method: 'post',

												// -- Uma forma: O que vai, com um index e seu conteúdo --
												//data: { 
												//	texto_tweet: 				// -- Este é o index --
												//	$('#texto_tweet').val() 	// -- Conteúdo do campo tweet, pego pelo id --
												//},

												// -- Uma Outra forma: Envia um formulario inteiro, que contenha 'name' em seus campos--
												data: $('#form_tweet').serialize(),

												// -- Pega conteudo de data e envia p/ url  --
												success: function(data){

													// -- Limpa o campo tweet depois q inseri no banco --
													$('#texto_tweet').val('');

													// -- Mensagem que foi inserido no bd --
													alert('Tweet Ok');
												}
											});
										// -- FIM Requisição pg via Ajax do Jquery --
									}else{
										alert('Preencha o campo tweet');
									}
								// -- FIM Valida se há informações no campo tweet --
							});
						// -- FIM Capitura o clique do botão tweet --

						// -- Função para atualizar os post tweet --
							function atualizaTweet(){

								// -- Requisição ajax para carregar todas mensagem do bd --
									$.ajax({
										url: 'get_tweet.php',
										success: function(data){

											// -- Recebe informações do get_tweet pelo data e insere no campo #tweets da pg home --
											$('#tweets').html(data);
										}
									});
								// -- FIM Requisição ajax para carregar todas mensagem do bd --
							}
						// -- FIM Função para atualizar os post tweet --

						// -- Executa função p/ atualizar mensagens tweet --
							atualizaTweet();

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
										<form  id="form_tweet" class="input-group">
											<input type="text" id="texto_tweet" name="texto_tweet" class="form-control" placeholder="O que está acontecendo agora?" maxlength="140"/>
											<span class="input-group-btn">
												<button class="btn btn-default" id="btn_tweet" type="button">Tweet</button>
											</span>
										</form>
									<!-- FIM Alinha caixa de texto e botão -->
								</div>
							</div>
						<!-- FIM Painel -->

						<!-- Camo dos twets postados -->
							<div id="tweets" class="list-group">
								
							</div>
						<!-- FIM Camo dos twets postados -->
					</div>
				<!-- FIM Divide em coluna do centro tamanho 6 -->
				
				<!-- Divide em coluna da direita tamanho 3 -->	
					<div class="col-md-3">

						<!-- Painel -->
							<div class="panel panel-default">
								<div class="panel-body">
									<h4><a href="#">Procurar por pessoas</a></h4>
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