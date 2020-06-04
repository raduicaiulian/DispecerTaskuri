<?php

require "db.php";
SESSION_START();
$id_manager=$_SESSION['id'];
	$sql="SELECT * FROM team WHERE manager_id='$id_manager';";
	$result=$conn->query($sql);
	while($r = mysqli_fetch_assoc($result)) {
		// aici se pun echipele
		// echo "id team este\n";
		// print_r($r['id']);
		// echo "\n";
		task_repartizare($r['id']);
	}
	function task_repartizare($id){
		//toate taskurile nealocate
		$sql_task="SELECT id, prioritate,team_id FROM task t1 LEFT OUTER JOIN task_of_user t2 ON t1.id=t2.id_task WHERE t2.id_task IS NULL and t1.team_id='$id'";// + IS NULL inainte de AND
		//print_r($sql_task);

		global $conn;
			$result_task=$conn->query($sql_task);
			$rows_task = array();
			while($r_task = mysqli_fetch_assoc($result_task)){
				$rows_task[]=$r_task;
			}

			//toti userii pentru echipa respectiva
			$sql_user="SELECT DISTINCT * FROM user t1 INNER JOIN (SELECT user_id FROM skill_of_user_based_on_team WHERE team_id = '$id') t2 ON t1.id = t2.user_id;";
			//print_r($sql_user);
			$result_user=$conn->query($sql_user);
			$rows_user = array();
			while($r_user = mysqli_fetch_assoc($result_user)){
				$rows_user[]= $r_user;
			}
			//print_r(sizeof($rows_task));
			for ($i=0; $i<sizeof($rows_task)-1; $i++ ){
				for( $j=$i+1; $j<sizeof($rows_task); $j++){
					if($rows_task[$i]['prioritate']<$rows_task[$j]['prioritate']){
						$aux=$rows_task[$i];
						$rows_task[$i]=$rows_task[$j];
						$rows_task[$j]=$aux;
					}
				}
			}
			$k=0;
			$new_workload=0;
			for( $i=0;$i<sizeof($rows_task);$i++){

				$sql_task_detail="SELECT nume_skill,level FROM skill t1 INNER JOIN (SELECT skill_id FROM skills_required WHERE id_task ='".$rows_task[$i]['id']."' ) t2 ON t1.id=t2.skill_id";
				//print_r($sql_task_detail);
				$result_task_detail=$conn->query($sql_task_detail);
				//$r_task_detail = mysqli_fetch_assoc($result_task_detail);

					$rows_task_array = array();
					while($r_task_tra=mysqli_fetch_assoc($result_task_detail))
					$r_task_detail[]=$r_task_tra;

				for($j=0;$j<sizeof($rows_user);$j++){

					//echo "id task : '".$rows_task[$i]['id']."'\n\n";
					//echo "\n";
					//selecteaza nume_skill , level pentru task-ul respectiv";

					//$nume_task_aux = $r_task_detail[$j]['nume_skill'];
					//selecteaza skillurile angajatului din echipa resp
					$sql_user_detail = "SELECT * FROM skill t1 INNER JOIN (SELECT skill_id FROM skill_of_user_based_on_team WHERE team_id = '".$id."' AND user_id ='".$rows_user[$j]['id']."' ) t2 ON t1.id=t2.skill_id  ORDER BY level ASC";
					//print_r($sql_user_detail);
					// echo "\n";
					// print_r($sql_user_detail);
					//select id, level, nume_skill pentru user";
					$result_user_detail=$conn->query($sql_user_detail);
					//$r_user_detail = mysqli_fetch_assoc($result_user_detail);

					$rows_user_array = array();
					while($r_user_tra=mysqli_fetch_assoc($result_user_detail)){

						$r_user_detail[]=$r_user_tra;

					}
					// echo "\ndetalii task\n";
					// print_r($r_task_detail);
					// echo "\ndetalii user \n";
					// print_r($rows_user[$j]['id']);
					// echo "\n";
					// print_r($r_user_detail);
					// print_r(sizeof($r_user_detail));
					for($jk=0; $jk<sizeof($r_task_detail); $jk++){
							for($ik=0; $ik<sizeof($r_user_detail); $ik++) {

								// echo "\nCOMPARAM :\n";
								// print_r($r_task_detail[$jk]['nume_skill']);
								// echo "\n == \n";
								// print_r($r_user_detail[$ik]['nume_skill']);
								// echo "\n \n";

									if($r_task_detail[$jk]['nume_skill']==$r_user_detail[$ik]['nume_skill']){

										// echo "\nCOMPARAM :\n";
										// print_r($r_task_detail[$jk]['level']);
										// echo "\n <= \n";
										// print_r($r_user_detail[$ik]['level']);
										// echo "\n \n";

										if($r_task_detail[$jk]['level']<=$r_user_detail[$ik]['level']){
											echo "O INTRAT, K++\n";
											$k++;
											$new_workload=$new_workload+$r_task_detail[$jk]['level'];
											}else {
												//NU ARE LEVEL <
												echo "\n\n\nNU ARE LEVEL < \n\n\n";
											}

										}else {
											//NU ARE SKILLUL ALA
											echo "\n\n\nNU ARE SKILLUL ALA:\n\n\n";
											// print_r($r_task_detail[$i]);
											// print_r($r_user_detail[$j]);
											// echo "\n\n\n";
										}
								}
					}
						$sql_cate_taskuri_avem_nevoie_la_user="SELECT nume_skill,level FROM skill t1 INNER JOIN (SELECT skill_id FROM skills_required WHERE id_task ='".$rows_task[$i]['id']."') t2 on t1.id=t2.skill_id";

						$result_sql_cate_taskuri_avem_nevoie_la_user=$conn->query($sql_cate_taskuri_avem_nevoie_la_user);
						$rows_sql_cate_taskuri_avem_nevoie_la_user = array();
						while($r_sql_cate_taskuri_avem_nevoie_la_user = mysqli_fetch_assoc($result_sql_cate_taskuri_avem_nevoie_la_user)){
							$rows_sql_cate_taskuri_avem_nevoie_la_user[]= $r_sql_cate_taskuri_avem_nevoie_la_user;
						}

						// print_r($rows_sql_cate_taskuri_avem_nevoie_la_user);
						// echo "mai sus chesti\n\nmai jos cate cesti sunt mai sus\n";
						// print_r(sizeof($rows_sql_cate_taskuri_avem_nevoie_la_user));
					 	// print_r($k);
						if($k>=sizeof($rows_sql_cate_taskuri_avem_nevoie_la_user)){

								$sql_workload_angajat="SELECT workload FROM team_employee WHERE team_id= '$id' AND user_id = '".$rows_user[$j]['id']."' ";
								//print_r($sql_workload_angajat);
								$result_workload_angajat=$conn->query($sql_workload_angajat);
								$r_workload_angajat= mysqli_fetch_assoc($result_workload_angajat);

								$sql_min_level_echipa="SELECT max_level FROM team WHERE id='$id'";
								$result_min_level_echipa=$conn->query($sql_min_level_echipa);
								$r_min_level_echipa = mysqli_fetch_assoc($result_min_level_echipa);
								//print_r($r_workload_angajat['workload']);

								if($r_workload_angajat['workload']+$r_task_detail[$i]['level']<=$r_min_level_echipa['max_level']){
								//	print_r("te sparg");
									//sql update , iti dam id task si id user, trebuie alocat task-ul in baza de date.
									// echo "\ntask id:\n";
									// print_r($rows_task[$i]['id']);
									// echo "\nuser id:\n";
									// print_r($rows_user[$j]['id']);
									// echo "\n";
									$new_workload=$new_workload/$k;
									$sql = "INSERT INTO task_of_user(id_task,id_user) VALUES(?,?)";
									$stmt = mysqli_stmt_init($conn);
									mysqli_stmt_prepare($stmt, $sql);
									mysqli_stmt_bind_param($stmt, "ss", $rows_task[$i]['id'] , $rows_user[$j]['id']);
									mysqli_stmt_execute($stmt);

									// echo "Insert executat, taskul cu id-ul '".$rows_task[$i]['id']."' in echipa cu id-ul: '".$id."' la angajatul cu id : '".$rows_user[$j]['id']."'\n";
									//$sql update, mareste workload cu r_task_detail[i]['level']
									$sql = "UPDATE team_employee SET workload = ? WHERE team_id= ? AND user_id = ?";
									//print_r($sql);
									$stmt = mysqli_stmt_init($conn);
									mysqli_stmt_prepare($stmt, $sql);
									mysqli_stmt_bind_param($stmt, "sss", $new_workload, $id, $rows_user[$j]['id']);
									//print_r($new_workload);
									//print_r($id);
									//print_r( $rows_user[$j]['id']);
									mysqli_stmt_execute($stmt);
									$j=sizeof($rows_user);
								//	echo "Update executat\n\n\n next run:\n";
								}else {
									//nivelul minim este atins
								//	echo "\n\n\nnivelul minim este atins :\n\n\n";
								}

					}else {
						//nu are nimeni toate sckilurile necesare cu nivel necesar
					//	echo "\n\n\nnu are nimeni toate sckilurile necesare cu nivel necesar :\n\n\n";
					}
				// 	if(sizeof($rows_user)){
				// 	unset($r_task_detail);
				// }
				unset($r_user_detail);
			}

			//echo "SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS";
			unset($r_task_detail);
						$k=0;
	}

}
