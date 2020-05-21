<?php
require '../db.php';
session_start();
$id=$_SESSION['id'];
$sql="SELECT nume,prenume,mail FROM user where id='".$id."';";
$result=$conn->query($sql);
$rows2 = array();
while($row = mysqli_fetch_assoc($result)){
	$rows2[] = $row;
}
if ($result!=FALSE)
	echo json_encode($rows2);
else
	die("eroare sql");
