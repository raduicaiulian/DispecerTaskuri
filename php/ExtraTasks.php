<?php
require "db.php";
SESSION_START();
$id=$_SESSION['id'];
//die($id);
//$sql = "SELECT * FROM task t1 left outer JOIN task_of_user t2 on t1.id = t2.id_task WHERE t2.id_task is NULL;"; // afiseaza toate taskurile nealocate
$sql="SELECT * FROM (SELECT  team_id FROM team_employee WHERE user_id='".$id."') t3 INNER JOIN (SELECT * FROM task t1 LEFT OUTER JOIN task_of_user t2 ON t1.id=t2.id_task WHERE t2.id_task IS NULL ) t4 on t3.team_id=t4.team_id";
$result=$conn->query($sql);

//print_r($result);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
if ($result!=FALSE)
		echo json_encode($rows);
else
	echo ' Nu sunt task-uri suplimentare ';
mysqli_close($conn);
