<?php
	require 'db.php';//este necesă înainte de validarea datelor deoarece imputurile se vor valida pe baza encodării(setului de caracter al) conxiunii
	//Preluare date din form + escape-uire pentru a prevenii SQL injection
	$nume = $conn->real_escape_string($_POST['nume']);
	$prenume = $conn->real_escape_string($_POST['prenume']);
	$mail = $conn->real_escape_string($_POST['mail']);
	$functie = $conn->real_escape_string($_POST['functie']);
	$luna = $conn->real_escape_string($_POST['luna']);
	$zi = $conn->real_escape_string($_POST['ziua']);
	$an = $conn->real_escape_string($_POST['an']);
	$data = $an.'-'.$luna.'-'.$zi;
	/*echo $data;
	echo "<br>";
	echo gettype($data);
	echo "<br>";
	die("asa");*/
	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['password']);

	//validare datele obligatorii escape-uite mai sus
	//--------------------------IN PROGRES---------------
	if(!empty($nume)&&!empty($prenume)&&!empty($functie)&&!empty($username)&&!empty($password)){
		  }
	//aici ai de bagat marius

	//Verificare mail(in lucru-verificare strucrura(regex))
	$sql = "SELECT mail FROM user WHERE mail='".$mail."';";
	$result = $conn->query($sql);//execută interogare
	if($result==FALSE){//daca interogare a reușit
		header("Location: ../html/login.php?m=1");//m1(eroare sql)
		die();
	}
	if (mysqli_fetch_assoc($result)!=NULL){
		header("Location: ../html/login.php?m=2");//m2(email-ul exista deja);
		die();
	}
	//Verificare username(gata)
	if(strlen($username)<3){
		header("Location: ../html/login.php?m=4");//m4(username prea scurt)
		die();
	}
	if(strlen($username)>25){
		header("Location: ../html/login.php?m=5");//m5(username prea lung)
		die();
	}
	$sql = "SELECT username FROM user WHERE username='".$username."';";
	$result = $conn->query($sql);//execută interogare
	if($result==FALSE){//daca interogare a reușit
		header("Location: ../html/login.php?m=1");//m1(eroare sql)
		die();
	}
	if (mysqli_fetch_assoc($result)!=NULL){
		header("Location: ../html/login.php?m=3");//m3(username-ul exista deja);
		die();
	}
	//inserare în baza de date
	$hashedpwd= hash ("sha512",$password);//criptare parola


		$sql="INSERT INTO user (nume,prenume,mail,manager,data,username,password) values ('$nume','$prenume','$mail','$functie','$data','$username','$hashedpwd' )";

	if($conn->query($sql)){
		header("Location: ../html/login.php?m=0");//m0(cont creat cu succes)
		die();
	}else{
		header("Location: ../html/login.php?m=1");//m1(eroare sql)
		die();
	}
	$conn->close();
