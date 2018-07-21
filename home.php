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
										<div class="input-group">
											<input type="text" class="form-control" placeholder="O que está acontecendo agora?" maxlength="140"/>
											<span class="input-group-btn">
												<button class="btn btn-default" type="button">Tweet</button>
											</span>
										</div>
									<!-- FIM Alinha caixa de texto e botão -->
								</div>
							</div>
						<!-- FIM Painel -->
					</div>
				<!-- Divide em coluna do centro tamanho 6 -->
				
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
				<!-- Divide em coluna da direita tamanho 3 -->	

			</div>
		<!-- FIM Corpo da pagina -->

		<!-- JavaScript Bootstrap -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- FIM JavaScript Bootstrap -->

	</body>
</html>