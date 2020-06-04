<?php

SESSION_START();
require "db.php";
$id=$_SESSION['id'];
echo "sunt in interio";

//$id_task=$_GET['id_task'];
$id_task=1;
print_r($id_task);
  $k=0;
  $sql = "SELECT * from skill t1 INNER JOIN (SELECT skill_id FROM skills_required WHERE id_task = '".$id_task."') t2 on t1.id = t2.skill_id";
  //print_r($sql_user);
  $skilluri_task=$conn->query($sql);
  $rows_skilluri_task = array();
  while($r_skilluri_task = mysqli_fetch_assoc($skilluri_task)){
    $rows_skilluri_task[]= $r_skilluri_task;
  }
  print_r($rows_skilluri_task);
  $k=sizeof($rows_skilluri_task);
  for ($i=0; $i <sizeof($rows_skilluri_task) ; $i++) {
    $new_workload = $new_workload + $rows_skilluri_task[$i]['level'];

    $sql = "DELETE FROM skill WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s",$rows_skilluri_task[$i]['id']);
    mysqli_stmt_execute($stmt);
    echo "Delete 1 executat pentru skill id-ul egal cu : '".$rows_skilluri_task[$i]['id']."'\n\n\n next run:\n";

  }

  $sql = "DELETE FROM skills_required WHERE id_task = ?";
  print_r($sql_user);
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s",$id_task);
  mysqli_stmt_execute($stmt);
  echo "Delete 2 executat pentru taskul cu id egal  : '".$id_task."'\n\n\n next run:\n";

  $sql = "DELETE FROM task WHERE id = ?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s",$id_task);
  mysqli_stmt_execute($stmt);
  echo "Update executat\n\n\n next run:\n";

  $sql = "DELETE FROM task_of_user WHERE id_user = ? AND id_task = ?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "ss",$id,$id_task);
  mysqli_stmt_execute($stmt);
  echo "Update executat\n\n\n next run:\n";

  $sql = "UPDATE team_employee SET workload = workload - ? WHERE team_id= ? AND user_id = ?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  $id_user = $rows_user[$j]['id'];
  $new_workload = $new_workload/$k;
  mysqli_stmt_bind_param($stmt, "sss", $new_workload,$id, $id_user);
  mysqli_stmt_execute($stmt);
  echo "Update executat\n\n\n next run:\n";
