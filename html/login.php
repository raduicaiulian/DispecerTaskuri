<?php
	session_start();
	if(isset($_SESSION['manager']))
		if($_SESSION['manager']=="0")
			header("Location: main_page_user.php");
		else
			header("Location: main_page_manager.php");
?>
<html>
	<head>
		<title>Login</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/login.css">
		<script src="../js/lib/jquery-3.5.0.js"></script>
		<script src="../js/lib/notify.js"></script><!--pentru norificări-->
		<script src="../js/login_verify.js"></script>
		<script src="../js/login_page_eror_handler.js"></script>
	</head>
	<body>
		<img class="desing_img" src="../images/model.png">
		<div class="maincontainer">
			<form action="../php/login.php" method="post" novalidate>
			<h1 style="font-family: Courier New;">Bine ai venit!</h1>
				<div class="line">
					<input type="text" id="username_inp" autocomplete="off" name="username"required>
					<span id="username">username<span>
				</div>
				<div class="line">
					<input type="password" id="password_inp" name="password" required>
					<span id="password">password<span>
				</div>
				<div class="line fbt">
					<span id="error"></span>
				</div>
				<div class="line fbt">
					<input id="submit" type="submit" class="btn_sub" value="Login">
				</div>
				<div class="line">
					<a class="btn" href="inregistrare.php">Inregistrare</a>
					<a class="btn" href="../php/parola_uitata.php">Am uitat parola</a>
				</div>
			</form>
		</div>
	</body>
</html>
