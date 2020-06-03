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
	$sql="select level,nume_skill from (SELECT skill_id FROM skills_required  where id_task='".$r['id']."') t1 inner join skill t2 on t1.skill_id=t2.id";
	$result=$conn->query($sql);
	$rows2 =array(); // skilluri, nivele
	while($r = mysqli_fetch_assoc($result)){
		$rows2[] = $r;
}
}

$res = array();
$res[]=$rows;
$res[]=$rows2;
if ($result!=FALSE)
		echo json_encode($res);
else
	echo ' Nu ai task-uri ';
mysqli_close($conn);