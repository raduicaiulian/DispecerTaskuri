<?php
session_start();
require '../db.php';
$id=$_SESSION['id'];
$oldpass = mysqli_real_escape_string($conn,$_POST['oldpassword']);
$newpass = mysqli_real_escape_string($conn,$_POST['newpassword']);
$newpass2 = mysqli_real_escape_string($conn,$_POST['newpassword2']);

$hashedold= hash ("sha512",$oldpass);
$sql="SELECT password FROM user WHERE id='".$id."';";
$result=$conn->query($sql);
$row = mysqli_fetch_assoc($result);
if($row['password']!=$hashedold)
	die("1"); // nu corespunde cu parola veche
if($newpass!=$newpass2)
	die("2"); //cele doua campuri new password nu corespund
if(strlen($newpass)<3)
	die("3"); // parola prea mica
if(strlen($newpass)>20)
	die("4"); //parola prea mare

/* Validari parole in lucru
$array = str_split($newpass);
for($i = 0; $i < count($array); $i++){
	if($array[$i]!=

}
*/
$hashednew = hash("sha512",$newpass);

$sql2="UPDATE user SET password = '$hashednew' WHERE id='".$id."';";
if($conn->query($sql2))
	die("10"); // Parola schimbata cu succes
else
	die("11"); // Eroare baza de date



  ?>
