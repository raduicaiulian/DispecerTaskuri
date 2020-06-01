<?php
	session_start();

	require "db.php";
	$id=$_SESSION['id'];

	$branch_code=$_GET['branch_code'];


// echo "branch code  '".$branch_code."' \n" ;

	if($branch_code == 0 ){//selecteaza date despre manager dupa manager_id

					$manager_id=$_GET['manager_id'];
					//echo "manager id  '".$manager_id."' \n" ;

					$sql="SELECT nume,prenume,mail FROM user WHERE id ='".$manager_id."' ";
					$result=$conn->query($sql);
					$rows = array();
					while($r = mysqli_fetch_assoc($result)) {
							$rows[] = $r;
					}

					if ($result!=FALSE)
							echo json_encode($rows);
					else
						echo ' Mare eroare ';
					mysqli_close($conn);

			}else if($branch_code == 1){//selecteaza angazatii din team_employee cu id la echipa $team_id

							$team_id=$_GET['team_id'];

							$sql="SELECT nume,prenume,mail FROM user t1 INNER JOIN (SELECT user_id FROM team_employee WHERE team_id = '".$team_id."' ) t2 ON t1.id=t2.user_id";
							// echo $sql;
							// die($sql);
							$result=$conn->query($sql);
							$rows = array();
							while($r = mysqli_fetch_assoc($result)) {
									$rows[] = $r;
							}

							if ($result!=FALSE)
									echo json_encode($rows);
							else
								echo ' Mare eroare 2';
							mysqli_close($conn);

			}else {
				echo "Error";
			  exit();
			}
