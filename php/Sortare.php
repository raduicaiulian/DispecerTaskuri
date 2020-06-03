<?php
SESSION_START();
require "db.php";
$id=$_SESSION['id'];

$echipa=$_GET['echipa'];
$criteriu=$_GET['criteriu'];

if ($echipa == 0 && $criteriu == 'Default') {
    //selecteaza toate taskurile
    $sql="SELECT * FROM task t1 LEFT OUTER JOIN task_of_user t2 ON t1.id=t2.id_task WHERE t2.id_task IS NULL ";
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

    $sql="SELECT * FROM task t1 LEFT OUTER JOIN task_of_user t2 ON t1.id=t2.id_task WHERE t2.id_task IS NULL ORDER BY ".$criteriu." ";
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

}else if ($criteriu == 'Default' && $echipa != 0) {

    $sql="SELECT * FROM task t1 LEFT OUTER JOIN task_of_user t2 ON t1.id=t2.id_task WHERE t2.id_task IS NULL and t1.team_id='".$echipa."' ";
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


}else if ($criteriu != 'Default' && $echipa != 0) {

      $sql="SELECT * FROM task t1 LEFT OUTER JOIN task_of_user t2 ON t1.id=t2.id_task WHERE t2.id_task IS NULL and t1.team_id='".$echipa."' ORDER BY ".$criteriu." ";
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
