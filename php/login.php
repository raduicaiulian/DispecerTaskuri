<?php
	require "db.php";
	session_start();
	/*if(isset($_SESSION['username']))
			 header("Location: ../php/interfata_red.php");//daca userul este logat il redirectionez direct la interfata*/
	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['password']);
	$hashedpwd= hash ("sha512",$password);//criptare parola
	$sql="SELECT * FROM user WHERE username='".$username."' and password='".$hashedpwd."';";

	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	if ($row!=NULL){
		$_SESSION['id'] = $row['id'];
		$_SESSION['nume'] = $row['nume'];
		$_SESSION['prenume'] = $row['prenume'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['manager'] = $row['manager'];
		if($row['manager']=='0')
			header("Location: ../html/main_page_user.php");
		else
			header("Location: ../html/main_page_manager.php");
	}else
		header("Location: ../html/login.php?m=6&user=".$username);//m6(parola incorectă)
	mysqli_close($conn);
