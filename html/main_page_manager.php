<?php
	session_start();
	if(!isset($_SESSION['manager']))
		header("Location: ../html/login.php");
	if($_SESSION['manager']=="0")
		header("Location: main_page_user.php");
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="../css/main_page_manager.css">
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<link rel="stylesheet" href="../css/select2_min.css">
		<link rel="stylesheet" href="../css/custome_select.css">
	
		<script src="../js/manager/load_unallocated_tasks.js"></script><!--load unalocated tasks fot tasks submenu-->
		<script src="../js/lib/jquery-3.5.0.js"></script>
		<script src="../js/lib/notify.js"></script><!--pentru norificări-->
		<script src="../js/lib/jquery-ui.js"></script>
		<script src="../js/lib/select2_min.js"></script>
		<script src="../js/lib_aux/select2_dropDownPositionBellow.js"></script><!--de importat după select 2-->
		<script src="../js/lib_aux/select_custome.js"></script><!--after select2-->
		<script src="../js/lib_aux/also_resize_reverse_for_select2.js"></script><!--after select2-->
		<script src="../js/main_page_manager.js"></script><!--after jquery-->
	</head>
	<body>
		<ul class="top_menu">
			<li><a id="tasks" href="#">Tasks</a></li>
			<li><a id="teams" href="#">Teams</a></li>
			<li><a id="acount_setings" href="#">Account setings</a></li>
			<li><a id="neralocat" href="#">Ne Alocat</a></li>
			<li><a href="../php/logout.php">Logout</a></li>
		</ul>
		<div id="l_menu" class="dragg">
			<div id="l_menu_2">
				<div id="a1" name="jorjel"> Ana are mere, mere are ana, da da daaaaa mere are ana</div>
				<div id="a1"> CEvaaaaa</div>
				<div id="a1"> Ceva</div>
			</div>
		</div>
		<div id="workspace">
			<div id="scroll_container">
				
			</div>
		</div>
	</body>
</html>
