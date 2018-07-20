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
			<div class="container"><br/><br/>
				<div class="col-md-4"></div>	
				<div class="col-md-4">

					Usuário autenticado !!!
					<br/>
					<?= $_SESSION['usuario'] ?>
					<br/>
					<?= $_SESSION['email']?>

				</div>

				<div class="col-md-4"></div>
				<div class="clearfix"></div>
					<br/>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>

			</div>
		<!-- FIM Corpo da pagina -->

		<!-- JavaScript Bootstrap -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- FIM JavaScript Bootstrap -->

	</body>
</html>