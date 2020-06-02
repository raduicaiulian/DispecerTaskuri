<?php

require "db.php";
SESSION_START();
$id_manager=$_SESSION['id'];
	$sql="SELECT * FROM team WHERE manager_id='$id_manager';";
	$result=$conn->query($sql);
	while($r = mysqli_fetch_assoc($result)) { // aici se pun echipele
		task_repartizare($r['id']);
	}
	function task_repartizare($id){
		$sql_task="SELECT * FROM task t1 LEFT OUTER JOIN task_of_user t2 ON t1.id=t2.id_task WHERE t2.id_task IS NULL and t1.team_id='$id'"; 
		//toate taskurile nealocate
		global $conn;
			$result_task=$conn->query($sql_task);
			$rows_task = array();
			while($r_task = mysqli_fetch_assoc($result_task)){
				$rows_task[]=$r_task;
			}
			
			$sql_user="SELECT DISTINCT * FROM user t1 INNER JOIN (SELECT user_id FROM skill_of_user_based_on_team WHERE team_id = '$id') t2 ON
t1.id = t2.user_id;";//toti userii pentru echipa respectiva
			$result_user=$conn->query($sql_user);
			$rows_user = array();
			while($r_user = mysqli_fetch_assoc($result_user)){
				$rows_user[]= $r_user;
			}
			print_r(sizeof($rows_task));
			for ($i=0; $i<sizeof($rows_task)-1; $i++ ){
				for( $j=$i+1; $j<sizeof($rows_task); $j++){
					if($rows_task[$i]['prioritate']<$rows_task[$j]['prioritate']){
						$aux=$rows_task[$i];
						$rows_task[$i]=$rows_task[$j];
						$rows_task[$j]=$aux;
					}
				}
			}
			for( $i=0;$i<sizeof($rows_task);$i++){
				$sql_task_detail="SELECT * FROM skill t1 INNER JOIN (SELECT skill_id FROM skills_required WHERE id_task = '".$rows_task[$i]['id']."' ) t2 ON t1.id=t2.skill_id";
				//selecteaza nume_skill , level pentru task-ul respectiv";
				$result_task_detail=$conn->query($sql_task_detail);
				//$r_task_detail = mysqli_fetch_assoc($result_task_detail);
				
				$rows_task_array = array();
				while($r_task_tra=mysqli_fetch_assoc($result_task_detail))
					$r_task_detail[]=$r_task_tra;
				for($j=0;$j<sizeof($rows_user);$j++){
					$sql_user_detail="SELECT * FROM skill t1 INNER JOIN (SELECT skill_id FROM skill_of_user_based_on_team WHERE user_id = '".$rows_user[$j]['id']."' ) t2 ON t1.id=t2.skill_id";
					//select level, skill pentru user";
					$result_user_detail=$conn->query($sql_user_detail);
					//$r_user_detail = mysqli_fetch_assoc($result_user_detail);
					
					$rows_user_array = array();
					while($r_user_tra=mysqli_fetch_assoc($result_user_detail))
					$r_user_detail[]=$r_user_tra;
					//print_r($r_task_detail[$i]);
					//print_r($r_user_detail[$j]);
					if($r_task_detail[$i]['nume_skill']==$r_user_detail[$j]['nume_skill']){

						if($r_task_detail[$i]['level']<=$r_user_detail[$j]['level']){
							$sql_workload_angajat="SELECT workload FROM team_employee WHERE team_id= '$id' AND user_id = '".$r_user_detail[$j]['id']."'";
							$result_workload_angajat=$conn->query($sql_workload_angajat);
							$r_workload_angajat= mysqli_fetch_assoc($result_workload_angajat);
							
							$sql_min_level_echipa="SELECT max_level FROM team WHERE id='$id'";
							$result_min_level_echipa=$conn->query($sql_min_level_echipa);
							$r_min_level_echipa = mysqli_fetch_assoc($result_min_level_echipa);
							print_r($r_workload_angajat['workload']);
							
							if($r_workload_angajat['workload']+r_task_detail[$i]['level']<=r_min_level_echipa['max_level']){
								print_r("te sparg");
								//sql update , iti dam id task si id user, trebuie alocat task-ul in baza de date.
								//sql update, mareste workload cu r_task_detail[i]['level']
							}
							
						}
					}
				}
			}
	}

	
