<?php
SESSION_START();
require "db.php";
$id=$_SESSION['id'];

$echipa=$_GET['echipa'];
$criteriu=$_GET['criteriu'];

if ($echipa == 0 && $criteriu == 'Default'){
  // echo "echipa = toate\n";
  // echo "criteriu = default";

  $sql="Select * FROM (SELECT id_task FROM task_of_user where id_user='".$id."') t1 INNER JOIN task t2 on t2.id=t1.id_task  ";
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

}else if($echipa == 0 && $criteriu != 'Default' ){
  // echo "echipa = toate\n";
  // echo "criteriu != default";

  $sql="Select * FROM (SELECT id_task FROM task_of_user where id_user='".$id."') t1 INNER JOIN task t2 on t2.id=t1.id_task ORDER BY ".$criteriu." ";
  // echo $sql;
  // die();
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

}else if ($criteriu == 'Default' && $echipa != 0){
  // echo "echipa != toate\n";
  // echo "criteriu = default";

  $sql="Select * FROM (SELECT id_task FROM task_of_user where id_user='".$id."') t1 INNER JOIN task t2 on t2.id=t1.id_task WHERE team_id='".$echipa."' ";
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

}else if ($criteriu != 'Default' && $echipa != 0){

  $sql="Select * FROM (SELECT id_task FROM task_of_user where id_user='".$id."') t1 INNER JOIN task t2 on t2.id=t1.id_task WHERE team_id='".$echipa."' ORDER BY ".$criteriu." ";
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

}else {
  echo "Error";
  exit();
}
