<?php
require "db.php";

$sql = "SELECT * from task";

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
