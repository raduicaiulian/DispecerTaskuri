<?php
require "db.php";
$php_id_task=$_GET['php_id_task'];
$sql="select level,nume_skill from (SELECT skill_id from skills_required where id_task='$php_id_task' ) t1 inner join skill t2 on t1.skill_id=t2.id;";
$result=$conn->query($sql);
$rows = array();
while($r=mysqli_fetch_assoc($result)){
	$rows[]=$r;
}
if ($result!=FALSE)
		echo json_encode($rows);
else
	echo ' Nu ai task-uri ';
mysqli_close($conn);
	