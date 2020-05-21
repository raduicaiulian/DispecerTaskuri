<?php
SESSION_START();
require "db.php";
$id=$_SESSION['id'];

$echipa=$_GET['echipa'];
$autoritate=$_GET['autoritate'];

//$sql="SELECT * from task t1 INNER JOIN (SELECT id_task from task_of_user where id_user='".$id."') t2 ON t1.id=t2.id_task WHERE id='".$echipa."' ORDER BY'".$autoritate."';";
$sql="Select * FROM (SELECT id_task FROM task_of_user where id_user='".$id."') t1 INNER JOIN task t2 on t2.id=t1.id_task WHERE team_id='".$echipa."'";
$result=$conn->query($sql);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
if ($result!=FALSE)
		echo json_encode($rows);
else
	echo ' Nu sunt task-uri suplimentare ';
mysqli_close($conn);