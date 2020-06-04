<?php

require "db.php";
$id=$_POST['id'];
print_r($id);
$sql="DELETE FROM task_of_user WHERE id_task='$id'";

$result=$conn->query($sql);
if($result==FALSE)
	die("Eroare sql");
die(0);
