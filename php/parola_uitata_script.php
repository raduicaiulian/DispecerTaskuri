<?php
	require "db.php";

	if(isset($_POST["cerere_trimisa"])){
		$userEmail = $_POST['email'];

		if(empty($userEmail)){
			header("Location: parola_uitata.php?info=emptyfield");
			exit();
		}else{

			$sql="SELECT mail FROM user WHERE mail='".$userEmail."'";
			$result=$conn->query($sql);

			if($result->num_rows==0){                                                  //verific daca mail-ul triimis este in baza de date
				header("Location: parola_uitata.php?info=Nuexista");
			}else{
				$selector = bin2hex(random_bytes(8));
				$token = random_bytes(32);
				$url = "http://localhost/php/resetare_parola.php?selector=".$selector."&validator=".bin2hex($token);

				$expira = date("U") + 300;

				$sql="DELETE FROM resetare_parola WHERE resetareParolaEmail=?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					//echo "Eroare la stergere din tabela!";
					exit();
				}else{
					mysqli_stmt_bind_param($stmt, "s", $userEmail);
					mysqli_stmt_execute($stmt);


					require 'phpmailer/PHPMailerAutoload.php';

					$mail = new PHPMailer;
				//	$mail->SMTPDebug = 4;

					$mail->isSMTP();
					//$mail->IsSMTP();
					$mail->Host = 'smtp.gmail.com';
					$mail->SMTPAuth = true;
					$mail->SMTPSecure = 'ssl';
					$mail->Port = 465;

					$mail->Username = 'freetaskdisp@gmail.com';
					$mail->Password = 'gmailfreetasks';

					$mail->setFrom('freetaskdisp@gmail.com');
					$mail->addAddress($_POST['email']);

					$mail->isHTML(true);

					$mail->Subject = 'Resetare parola pentru Task Dispecer';
					$mail->Body    = '<p>Am primit o cerere de resetare a parolei. Link-ul de resetare a parolei este mai jos. Ignora acest email daca nu ai facut tu cererea.</br>Aici este link-ul de resetare a parolei: <a href="' . $url . '">' . $url . '</a></p> </p>';

					if(!$mail->send()) {

						echo 'stmp error --> ' . $mail->ErrorInfo;

					} else {

						$sql="INSERT INTO resetare_parola (resetareParolaEmail, resetareParolaSelector, resetareParolaToken, resetareParolaExpirareToken) VALUES(?,?,?,?);";
						$stmt = mysqli_stmt_init($conn);
						if(!mysqli_stmt_prepare($stmt, $sql)){
							//echo "Eroare la update tabela";
							exit();
						}else{
							$hashedToken = password_hash($token, PASSWORD_DEFAULT);
							mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector , $hashedToken, $expira);
							mysqli_execute($stmt);

							mysqli_stmt_close($stmt);
							mysqli_close($conn);

							echo 'Sa trimis!';
							header("Location: parola_uitata.php?info=succes");
					}
				}

			}
			}
		}
	}else
		header("Location:../../index.php");
