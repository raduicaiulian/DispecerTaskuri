<?php
$nume = filter_input(INPUT_POST,'numetask');
$limbaj = filter_input(INPUT_POST, 'Limbaj');
$level=filter_input(INPUT_POST, 'Level');
$skill=$limbaj.$level;
$descriere = filter_input(INPUT_POST,'descriere');
$luna = filter_input(INPUT_POST, 'luna');
$zi = filter_input(INPUT_POST, 'ziua');
$an = filter_input(INPUT_POST, 'an');
$deadline = $an.'-'.$luna.'-'.$zi;
$ora1 =filter_input(INPUT_POST, 'ora');
$ora2 =filter_input(INPUT_POST, 'minutul');
$ora = $ora1.':'.$ora2;
$sugestii= filter_input(INPUT_POST, 'sugestii');
$prioritate = filter_input(INPUT_POST, 'prioritate');
//sugestii - optional
if(!empty($nume)&&!empty($skill)&&!empty($descriere)&&!empty($deadline)&&!empty($prioritate)){
  require 'db.php';
  $nume = mysqli_real_escape_string($conn,$nume);
  $skill = mysqli_real_escape_string($conn,$skill);
  $descriere = mysqli_real_escape_string($conn,$descriere);
  $deadline = mysqli_real_escape_string($conn,$deadline);
  $sugestii= mysqli_real_escape_string($conn,$sugestii);
  $prioritate = mysqli_real_escape_string($conn,$prioritate);
  $sql="INSERT INTO tasks (skill_necesar, nume, descriere, deadline,time, sugestii, prioritate ) values ('$skill','$nume','$descriere','$deadline','$ora','$sugestii', '$prioritate')";
  if($conn->query($sql))
    {
      echo "Task inregistrat cu succes ! ";
      echo "<script>setTimeout(\"location.href = '../html/main_page_user.php';\",1500);</script>";


    }
  else {
    echo "Error: ". $sql . "<br". $conn->error;
  }
  $conn->close();
}

  else {
  echo "Campurile obligatorii trebuie completate !  ";
  die();
  }
