<?php
	
	// -- Verifica se existe valor p/ variaveis caso não ele atribui 0 assim ñ exibe erro --
		$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
		$erro_email   = isset($_GET['erro_email'])   ? $_GET['erro_email']   : 0;

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
								<li><a href="index.php">Voltar para Home</a></li>
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
					<h3>Inscreva-se já.</h3><br/>

					<!-- Formulario de inscrição -->
						<form method="post" action="registra_usuario.php" id="formCadastrarse">

							<!-- Campo de cadastro Usuario -->
								<div class="form-group">
									<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required="requiored">
									<?php
									
										// -- Se true, emite mensagem --
										if($erro_usuario){	// 1=true && 0=false
											echo '<font style="color: red">Usuário já existe</font>';
										}
									?>
								</div>
							<!-- FIM Campo de cadastro Usuario -->

							<!-- Campo de cadastro Email -->
								<div class="form-group">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
									<?php

										// -- Se true, emite mensagem --
										if($erro_email){	// 1=true && 0=false
											echo '<font style="color: red">E-mail já existe</font>';
										}
									?>
								</div>
							<!-- FIM Campo de cadastro Email -->

							<!-- Campo de cadastro Senha -->
								<div class="form-group">
									<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
								</div>
							<!-- FIM Campo de cadastro Senha -->

							<!-- Botão que envia os dados -->
								<button type="submit" class="btn btn-primary form-control">Inscreva-se</button>
							<!-- FIM Botão que envia os dados -->

						</form>
					<!-- FIM Formulario de inscrição -->

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