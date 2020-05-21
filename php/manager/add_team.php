<?php
	session_start();
	require '../db.php';
	
	$id=$_SESSION['id'];
	$nume = mysqli_real_escape_string($conn,$_POST['nume_echipa']);
	$maxlevel = mysqli_real_escape_string($conn,$_POST['maxlevel']);
	$skills= $_POST['skiluri'];
	$skiluri2 = json_decode(json_encode($skills),true);
	//Tratare exceptii
	for ($i = 0; $i < count($skiluri2)-1; $i++) {
		for ($j=$i+1; $j < count($skiluri2); $j++){
			if($skiluri2[$i]==$skiluri2[$j])
				die("2");//2=nu poți avea două skiluri cu același nume
		}
	}
	//Inserare date
	$sql="INSERT INTO team (team_name, manager_id, max_level ) values ('$nume','$id','$maxlevel')";
	$sql3 = "SELECT team_name FROM team WHERE team_name='$nume'";
	$result3=$conn->query($sql3);
		if (mysqli_fetch_assoc($result3)!=NULL)
			die("1");//1=echipa există deja
		

	if(!$conn->query($sql))
		die("Error: ". $sql . "<br". $conn->error);


	$result1 = $conn->query("SELECT id FROM team WHERE team_name='".$nume."'");
	if($result1==FALSE)
		die("roare sql");
	$row = $result1->fetch_assoc();
	$team_id = $row['id'];
	
	$ok=1;
	for ($i = 0; $i < count($skiluri2); $i++) {//insert all skils in skils of team
		$sql2="INSERT INTO skills_of_team (team_id, nume_skill ) values ('$team_id','$skiluri2[$i]')";
		if(!$conn->query($sql2))
			$ok=0;
	}
	if($ok==0)
		die("eroare sql");
	else
		die("0");
