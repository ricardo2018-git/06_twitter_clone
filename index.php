<?php
	
	// --- login e senha invalido, isset atribui 1 p/ erro no login e 0 se não foi tentado logar ---
		$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
	// --- FIM login e senha invalido, isset atribui 1 p/ erro no login e 0 se não foi tentado logar ---
?>

<!DOCTYPE HTML>
<html>
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
			<script>
				// -- Capitura o clique do botão enviar, p/ validar se os campos foram preenchidos --
					$(document).ready(function(){

						// -- Capita o clique do botão Entrar --
							$('#btn_login').click(function(){
								
								var campo_vazio = false;

								// -- varifica se o campo Login esta vezio --
									if($('#campo_usuario').val() == ''){

										// -- Borda do campo fica vermelha se estiver vazio  --
											$('#campo_usuario').css({'border-color': '#A94442'});
											campo_vazio = true;
										// -- FIM Borda do campo fica vermelha se estiver vazio  --

									}else{
										// -- Borda do campo fica cinza se estiver preenchido  --
											$('#campo_usuario').css({'border-color': '#CCC'});
										// -- FIM Borda do campo fica cinza se estiver preenchido  --
									}
								// -- FIM varifica se o campo Login esta vezio --	

								// -- varifica se o campo Senha esta vezio --
									if($('#campo_senha').val() == ''){

										// -- Borda do campo fica vermelha se estiver vazio  --
											$('#campo_senha').css({'border-color': '#A94442'});
											campo_vazio = true;
										// -- FIM Borda do campo fica vermelha se estiver vazio  --

									}else{
										// -- Borda do campo fica cinza se estiver preenchido  --
											$('#campo_senha').css({'border-color': '#CCC'});
										// -- FIM Borda do campo fica cinza se estiver preenchido  --
									}
								// -- FIM varifica se o campo Senha esta vezio --

								// -- Se algum campo estiver sem preencher o JS ñ é enviado --
									if(campo_vazio) return false;
								// -- FIM Se algum campo estiver sem preencher o JS ñ é enviado --

							});
						// -- FIM Capita o clique do botão Entrar --

					});
				// -- FIM Capitura o clique do botão enviar, p/ validar se os campos foram preenchidos --
			</script>
		<!-- FIM Meu javaScript -->

	</head>

	<body>

		<!-- Barra inicial  -->
			<nav class="navbar navbar-default navbar-static-top">
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
					<!-- Botão três risquinhos -->

					<!-- menu da Barra inicial -->
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="inscrevase.php">Inscrever-se</a></li>
								<li class="<?= $erro == 1? 'open' : '' ?>">	<!-- Se $error == 1, mantem submenu aberto para avisualizar mensagem de login invalido -->
									<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>

									<!-- Submenu dentro do menu Entrar -->
										<ul class="dropdown-menu" aria-labelledby="entrar">
											<div class="col-md-12">
												<p>Você possui uma conta?</p>
													<br/>

												<!-- Formulario para logar-se -->
													<form method="post" action="validar_acesso.php" id="formLogin">
														<div class="form-group">

															<!-- Campo valida usuario -->
																<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário"/>
															<!-- FIM Campo valida usuario -->

																<br/>

															<!-- Campo valida senha -->
																<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha">
															<!-- FIM Campo valida senha -->

																<br/>
																
															<!-- Bontão que invia dados para banco -->
																<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>
															<!-- FIM Bontão que invia dados para banco -->

														</div>
													</form>
												<!-- FIM Formulario para logar-se -->
												
												<!-- Valida se houve erro ao tentar se logar -->
													<?php
														if($erro == 1){
															echo '<font color="red">Usuário e ou senha inválido(s)</font>';
														}
													?>
												<!-- FIM Valida se houve erro ao tentar se logar -->

											</div>
										</ul>
									<!-- FIM Submenu dentro do menu Entrar -->

								</li>
							</ul>
						</div>
					<!-- FIM menu da Barra inicial -->

				</div>				
			</nav>
		<!-- FIM Barra inicial  -->

		<!-- Corpo da pagina inicial -->
			<div class="container">
				<div class="jumbotron">
					<h1>Bem vindo ao twitter clone</h1>
					<p>Veja o que está acontecendo agora...</p>
				</div>

				<div class="clearfix"></div>
			</div>
		<!-- FIM Corpo da pagina inicial -->

		<!-- JavaScript Bootstrap -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- FIM JavaScript Bootstrap -->

	</body>
</html>