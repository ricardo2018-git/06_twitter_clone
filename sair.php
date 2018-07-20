<?php
	
	// --- Inicia as var de SESSION p/ trabalhar com elas ---
		session_start();
	// --- Inicia as var de SESSION p/ trabalhar com elas ---

	// --- Elimina a SESSION ---
		unset($_SESSION['usuario']);
		unset($_SESSION['email']);
	// --- FIM Elimina a SESSION ---

	echo 'Esperamos você de volta em breve !!!';

?>