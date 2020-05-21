<?php
	session_start();
	require 'db.php';
	$id=$_SESSION['id'];//id-ul user-ului
$result1 = $conn->query("SELECT t1.id,t1.team_name FROM team as t1 INNER JOIN (
SELECT team_id FROM team_employee WHERE user_id='".$id." ') as t2 on t1.id=t2.team_id;");



	$result = array();
	while($row = mysqli_fetch_assoc($result1))
		$result[] = $row;

	echo json_encode($result);
	mysqli_close($conn);
 ?>
