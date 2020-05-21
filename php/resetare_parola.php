<html>
	<head>
		<title>Resetare Parola</title>
		<link rel="stylesheet" type="text/css" href="../css/parola_uitata.css">
		<script src="../js/lib/jquery-1.12.4.js"></script>

	</head>
	<body>

		<img class="desing_img" src="../images/model.png">
		<div class="RecPassbox">
      <h1 style="font-family: Courier New;">Resetare Parola</h1>

					 <?php
					 $selector = $_GET["selector"];
					 $validator = $_GET["validator"];
						if(empty($selector) || empty($validator)){
								//echo "Nu am putut valida cererea dumneavoastra!";
								header("Location: parola_uitata.php?error=NAPVCD");
						}
						else{
									if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
											?>
											<form action="resetare_parola_script.php" name="form"method="post">
													<input type="hidden" name="selector" value="<?php echo $selector; ?>"></input>
													<input type="hidden" name="validator" value="<?php echo $validator; ?>"></input>
													<div class="spatiere_top">
															<input class="parola" type="password" id="parola" name="parola" placeholder="Parola noua." required></input></br></br>
															<input class="parola1" type="password" id="parola1" name="parola" placeholder="Parola noua." required></input></br></br>
															<span class="live_Error" id="live_error" ></span></br>
													</div>
													 <div class="spatiere_PWD">
															<input class="button" id="submit" type="submit"  name="resetare-parola" value="Submit"></input>
													</div>
												</form>
											<?php
										}
										else {
												echo '<p class="Fail">Nu am putut valida cererea dumneavoastra!</p>';
												header("Location: parola_uitata.php?error=NAPVCD");
										}
						}
					?>
					<script src="../js/verificare_parole.js"></script>
		</div>

	</body>
</html>
