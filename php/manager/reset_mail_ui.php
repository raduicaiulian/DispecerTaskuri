<?php
session_start();
require '../db.php';
$id=$_SESSION['id'];
$oldpass = mysqli_real_escape_string($conn,$_POST['oldpassword2']);
$mail = mysqli_real_escape_string($conn,$_POST['newmail']);
$hashedold= hash ("sha512",$oldpass);
$sql="SELECT password FROM user WHERE id='".$id."';";
$result=$conn->query($sql);
$row = mysqli_fetch_assoc($result);
if($row['password']!=$hashedold)
	die("1"); // nu corespunde cu parola veche
/*


validari mail


*/
$sql2="UPDATE user SET mail = '$mail' WHERE id='".$id."';";
if($conn->query($sql2))
	die("0"); // Mail schimbat cu succes
else
	die("11"); // Eroare baza de date

 ?>
