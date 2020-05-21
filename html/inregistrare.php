<?php
	session_start();
	if(isset($_SESSION['manager']))
		if($_SESSION['manager']=="0")
			header("Location: main_page_user.php");
		else
			header("Location: main_page_manager.php");
?>
<!doctype html>
<html>
	<head>
		<title>Inregistrare</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="../css/inregistrare.css">
		<link rel="stylesheet" href="../css/select2_min.css" >
		<link rel="stylesheet" href="../css/custome_select.css">

		<script src="../js/lib/jquery-3.5.0.js"></script>
		<script src="../js/lib/select2_min.js"></script>
		<script src="../js/lib_aux/select_custome.js"></script>
	</head>
<body>
	
	<img class="desing_img" src="../images/model.png">
	<div class="maincontainer">
	<img src="../images/back.webp" onClick="window.history.back();" style="width: 39px;position: absolute;top: 20px;left: 26px;">	
		<form novalidate method="post" action="../php/register.php">
			<div class="line">
				<label for="nume" class="elem">Nume</label>
				<input id="nume" type="text" name="nume" placeholder="Nume de familie" autocomplete="off">
				<input id="prenume" type="text" name="prenume" placeholder="Prenume" autocomplete="off" >
				<span class="error" style="display: block; margin-left: 130px;"></span>
			</div>
			<div class="line">
				<label for="mail" class="elem">Mail</label>
				<input id="mail" type="email" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" name="mail" placeholder="popescu@gmail.com" autocomplete="off">
				<span class="error"></span>
			</div>
			<div class="line">
				<div class="elem">Functie</div>
				<label for="f1">Angajat</label>
				<input id="f1" type="radio" name="functie" value="0" autocomplete="off">
				<label for="f2">Manager</label>
				<input id="f2" type="radio" name="functie" value="1" autocomplete="off">
			</div>
			<span class="error"></span>
			<div class="line">
				<div class="elem2">Data de nastere</div>
				<select class="select_luna" name="luna">
					<option value="00">Luna</option>
					<option value="1">January</option>
					<option value="2">February</option>
					<option value="3">March</option>
					<option value="4">April</option>
					<option value="5">May</option>
					<option value="6">June</option>
					<option value="7">July</option>
					<option value="8">August</option>
					<option value="9">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
				<select class="select_zi" name="ziua" style="width: 47.5px">
					<option value="00">Zi</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				<select class="select_an" name="an">
					<option value="0000">An</option>
					<option value="2020">2020</option>
					<option value="2019">2019</option>
					<option value="2018">2018</option>
					<option value="2017">2017</option>
					<option value="2016">2016</option>
					<option value="2015">2015</option>
					<option value="2014">2014</option>
					<option value="2013">2013</option>
					<option value="2012">2012</option>
					<option value="2011">2011</option>
					<option value="2010">2010</option>
					<option value="2009">2009</option>
					<option value="2008">2008</option>
					<option value="2007">2007</option>
					<option value="2006">2006</option>
					<option value="2005">2005</option>
					<option value="2004">2004</option>
					<option value="2003">2003</option>
					<option value="2002">2002</option>
					<option value="2001">2001</option>
					<option value="2000">2000</option>
					<option value="1999">1999</option>
					<option value="1998">1998</option>
					<option value="1997">1997</option>
					<option value="1996">1996</option>
					<option value="1995">1995</option>
					<option value="1994">1994</option>
					<option value="1993">1993</option>
					<option value="1992">1992</option>
					<option value="1991">1991</option>
					<option value="1990">1990</option>
					<option value="1989">1989</option>
					<option value="1988">1988</option>
					<option value="1987">1987</option>
					<option value="1986">1986</option>
					<option value="1985">1985</option>
					<option value="1984">1984</option>
					<option value="1983">1983</option>
					<option value="1982">1982</option>
					<option value="1981">1981</option>
					<option value="1980">1980</option>
					<option value="1979">1979</option>
					<option value="1978">1978</option>
					<option value="1977">1977</option>
					<option value="1976">1976</option>
					<option value="1975">1975</option>
					<option value="1974">1974</option>
					<option value="1973">1973</option>
					<option value="1972">1972</option>
					<option value="1971">1971</option>
					<option value="1970">1970</option>
					<option value="1969">1969</option>
					<option value="1968">1968</option>
					<option value="1967">1967</option>
					<option value="1966">1966</option>
					<option value="1965">1965</option>
					<option value="1964">1964</option>
					<option value="1963">1963</option>
					<option value="1962">1962</option>
					<option value="1961">1961</option>
					<option value="1960">1960</option>
				</select>
			</div>
			<div class="line">
				<label for="username" class="elem">Username</label>
				<input id="username" type="text" name="username" autocomplete="off">
				<span class="error"></span>
			</div>
			<div class="line">
				<label for="password" class ="elem">Password</label>
				<input id="password" type="password" name="password">
				<span class="error"></span>
			</div>
				<input type="submit" name="submit" value="Înregistrare">
		</form>
	</div>
	<script src="../js/functii_de_validare.js"></script>
	<script src="../js/validare_inputuri.js"></script>
</body>

</html>