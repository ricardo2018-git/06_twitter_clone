<?php
	
	// --- Inicia as var de SESSION p/ trabalhar com elas ---
		session_start();
	// --- Inicia as var de SESSION p/ trabalhar com elas ---

	// --- Elimina a SESSION do usuaro ---
		unset($_SESSION['usuario']);
		unset($_SESSION['email']);
	// --- FIM Elimina a SESSION do usuaro ---

	echo 'Esperamos você de volta em breve !!!';

?>