<?php
	//http://localhost/sql/config.php
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$file = file_get_contents("config_list.ini") or die("Nu am gasit fisierul de configurare!");
	$conf_files = explode("\n",$file);
	//print_r($conf_files); 
	$conn = new mysqli($host, $dbusername, $dbpassword);//conectare
	
	if ($conn->connect_error)//dacă conectarea a reușit
	  die("Connection failed: " . $conn->connect_error);

	for($i = 0; $i < count($conf_files); $i++)
		if(strlen(trim($conf_files[$i]))!=0){
			$sql = file_get_contents(trim($conf_files[$i]));
			$result=$conn->multi_query($sql);
			 if ( $result === TRUE)
			  echo '<p style="color: green;">executat!</p>';
			else
			  echo '<p style="color: red;">eroare la execție:</p> '.'<p style="color: red;">'.trim($conn -> error).'</p>';
			//echo "<br>";
			echo '<p style="color: blue;">'.$sql.'</p>';
			//echo "<br>";
			while($conn->next_result()) //elimină rezultatele multiple ce provin din cadrul interogărilor multiple
				$conn->next_result();
		}
$conn->close();
