<?php
SESSION_START();
require "db.php";
$id=$_SESSION['id'];
//$sql = "SELECT nume, deadline from task";
$sql="Select * FROM (SELECT id_task FROM task_of_user where id_user='".$id."') t1 INNER JOIN task t2 on t2.id=t1.id_task";
$result=$conn->query($sql);

//print_r($result);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
if ($result!=FALSE)
		echo json_encode($rows);
else
	echo ' Nu ai task-uri ';
mysqli_close($conn);