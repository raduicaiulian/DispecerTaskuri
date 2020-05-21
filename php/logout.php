<?php
	//distruge sesiunea pentru un utilizator, utilizatorii rămân conectați cu un dispozitiv chiar dacă închid pagina până când apasă butonul deconectare care distruge sesiunea
	session_start();
	session_unset();//sterge variabilele din sesiune
	session_destroy();
	header("Location: ../..");
	//header("Location: ../html/login.php");
?>