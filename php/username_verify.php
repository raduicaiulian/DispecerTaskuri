<?php

session_start();
require "db.php";
/*if(isset($_SESSION['username']))
         header("Location: ../php/interfata_red.php");//daca userul este logat il redirectionez direct la interfata*/

$sql="SELECT username from user WHERE username='".$_GET['username']."';";

$result = $conn->query($sql);
if (mysqli_fetch_assoc($result)==NULL)
		echo '0';
	else
		echo '1';
mysqli_close($conn);
