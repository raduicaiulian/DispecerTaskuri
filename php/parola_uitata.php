<html>
	<head>
		<title>Parola uitata</title>
		<link rel="stylesheet" type="text/css" href="../css/parola_uitata.css">
	</head>
	<body>
		<img class="desing_img" src="../images/model.png">
		<div class="RecPassbox">
			<h1 style="font-family: Courier New;">Parola uitata???</h1>
				<form action="../php/parola_uitata_script.php" method="post">

						<div class="spatiere_top">
								<input type="text" id="email" name="email" placeholder="Introduce adresa de email!">

								<?php
									if(isset($_GET["info"])){
											if($_GET["info"] == "emptyfield"){
												echo '<p class="Fail">Email-ul nu este completat.</p>';
											}
											else if($_GET["info"] == "Nuexista"){
												echo '<p class="Fail">Emailul nu exista!</p>';
											}
											else if($_GET["info"] == "succes"){
												echo '<p class="Succes">Verificati Email-ul!</p>';
											}
											
									}
									else if(isset($_GET["error"])){
										echo '<p class="Fail">Cererea ta nu a putut fi inregistrata!</p>';
									}

								?>
						</div>
						<div class="spatiere_top">

								<input class="button" id="submit" type="submit"  name="cerere_trimisa" value="Submit">
								<a class="button" href="../html/inregistrare.php">Nu ai cont?</a>
						</div>
			</form>
		</div>
	</body>
</html>
