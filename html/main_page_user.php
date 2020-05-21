<?php
	session_start();
	if(!isset($_SESSION['manager']))
		header("Location: ../html/login.php");
	if($_SESSION['manager']=="1")
		header("Location: main_page_manager.php");
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="../css/mainpageuser.css">
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<link rel="stylesheet" href="../css/select2_min.css" >
		<link rel="stylesheet" type="text/css" href="../css/custome_select.css" >

		<script src="../js/lib/jquery-3.5.0.js"></script>
		<script src="../js/lib/jquery-ui.js"></script>
		<script src="../js/lib/select2_min.js"></script>
		<script src="../js/ExtraTask.js"></script>
		<script src="../js/UserTask.js"></script>
		<script src="../js/lib_aux/select2_dropDownPositionBellow.js"></script><!--de importat după select 2-->
		<script src="../js/lib_aux/select_custome.js"></script><!--after select2-->
		<script src="../js/lib_aux/also_resize_reverse_for_select2.js"></script><!--after select2-->
	</head>
<body>
	<ul class="top_menu">
		<li><a id="btn1" href="#">Tasks</a></li>
		<li><a href="page2">Button2</a></li>
		<li><a href="teams.php">Teams</a></li>
		<li><a id="btn4" href="#">Extra Tasks</a></li>
		<li><a href="../php/logout.php">Logout</a></li>
	</ul>
		<div id="l_menu" class="dragg">
				<div id="l_menu_2">
					<div class="a1" name="jorjel"> Ana are mere, mere are ana, da da daaaaa mere are ana
						</div>
						<div id="a1"> CEvaaaaa</div>
						<div id="a1"> Ceva</div>
				</div>
					<div id="l_menu_3">
					
					</div>
		</div>
	<div id="workspace">
		<div id="scroll_container">
			<form action="../php/tasks.php" method="POST">
				<div class="line">
					<label for="nume" class="elem">Nume</label>
					<input id="numetask" type="text" name="numetask" placeholder="Nume task" autocomplete="off">
					
					<div class="skillnecesar">Skill-uri necesare</div>
					<select class="limbaj" name="Limbaj">
						<option>Limbaj de programare </option>
						<option value="1">JAVA</option>
						<option value="2">PYTHON</option>
						<option value="3">C++</option>
					</select>
					
					<select name="Level">
						<option>Level</option>
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
					</select>
					
				</div>
				<div class="line">
					
				</div>
			
				<div class="line">
					<div class="elem">Descriere task</div>
					
					<textarea name="descriere" rows = "3"
					  cols = "80"></textarea>
				</div>
				<div class="line">
					<div class="select">Deadline</div>
					<select class="select_luna" name="luna">
						<option>Luna</option>
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
					<select class="select_zi" name="ziua">
						<option>Zi</option>
						<option value="01">1</option>
						<option value="02">2</option>
						<option value="03">3</option>
						<option value="04">4</option>
						<option value="05">5</option>
						<option value="06">6</option>
						<option value="07">7</option>
						<option value="08">8</option>
						<option value="09">9</option>
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
						<option>An</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						
					</select>
					<select class="select_ora" name="ora">
						<option>Ora</option>
						<option value="00">00</option>
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
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
					</select>
					<select class="select_minutul" class="select_minutul" name="minutul">
						<option>Minutul</option>
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
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
						<option value="32">32</option>
						<option value="33">33</option>
						<option value="34">34</option>
						<option value="35">35</option>
						<option value="36">36</option>
						<option value="37">37</option>
						<option value="38">38</option>
						<option value="39">39</option>
						<option value="40">40</option>
						<option value="41">41</option>
						<option value="42">42</option>
						<option value="43">43</option>
						<option value="44">44</option>
						<option value="45">45</option>
						<option value="46">46</option>
						<option value="47">47</option>
						<option value="48">48</option>
						<option value="49">49</option>
						<option value="50">50</option>
						<option value="51">51</option>
						<option value="52">52</option>
						<option value="53">53</option>
						<option value="54">54</option>
						<option value="55">55</option>
						<option value="56">56</option>
						<option value="57">57</option>
						<option value="58">58</option>
						<option value="59">59</option>
					</select>
				</div>
				<div class="line">
					<div class="elem">Sugestii</div>
					
					<textarea name="sugestii" rows = "3"
					  cols = "80"></textarea>
				</div>
				<div class="line">
					<div class="select">Prioritate</div>
					<select name="prioritate">
						<option>Prioritate</option>
						<option value="0">Scazuta</option>
						<option value="1">Medie</option>
						<option value="2">Importanta</option>
						<option value="3">Foarte importanta</option>
						
					</select>
				</div>
					<input type="submit" name="submit" value="Submit">
					<script src="../js/test_select.js"></script>
					<script src="../js/task_sort.js"></script>
			</form>
		</div>
	</div>
</body>
</html>