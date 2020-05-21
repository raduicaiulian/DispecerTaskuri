<?php
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "dispecer_taskuri";
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
	if(mysqli_connect_error()){
	  die('Connect Error ('.mysqli_connect_errorno().')'.mysqli_connect_error());
	}