<?php
SESSION_START();
require "db.php";
$id=$_SESSION['id'];

$id_task=$_GET['id_task'];

  // $sql = "SELECT * FROM skill t1 INNER JOIN (SELECT skill_id FROM skills_required WHERE id_task = '".$id_task."' ) t2 on t1.id = t2.skill_id ";
  // $stmt = mysqli_stmt_init($conn);
  // mysqli_stmt_prepare($stmt, $sql);
  // mysqli_stmt_bind_param($stmt, "sss", $new_workload,$id, $rows_user[$j]['id']);
  // mysqli_stmt_execute($stmt);
  // echo "Update executat\n\n\n next run:\n";

  $sql = "SELECT * from skill t1 INNER JOIN (SELECT skill_id FROM skills_required WHERE id_task = '".$id_task."') t2 on t1.id = t2.skill_id";
  $skill_id = $sql['id'];

  $sql = "DELETE * FROM skill WHERE id = ?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s",$skill_id;
  mysqli_stmt_execute($stmt);
  echo "Update executat\n\n\n next run:\n";

  $sql = "DELETE * FROM skills_required WHERE id_task = ?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s",$id_task;
  mysqli_stmt_execute($stmt);
  echo "Update executat\n\n\n next run:\n";

  $sql = "DELETE * FROM task WHERE id_task = ?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s",$id_task;
  mysqli_stmt_execute($stmt);
  echo "Update executat\n\n\n next run:\n";

  $sql = "DELETE * FROM task_of_user WHERE id_user = ? AND id_task = ?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "ss",$id,$id_task;
  mysqli_stmt_execute($stmt);
  echo "Update executat\n\n\n next run:\n";

  $sql = "UPDATE team_employee SET workload = workload - ? WHERE team_id= ? AND user_id = ?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "sss", $new_workload,$id, $rows_user[$j]['id']);
  mysqli_stmt_execute($stmt);
  echo "Update executat\n\n\n next run:\n";
