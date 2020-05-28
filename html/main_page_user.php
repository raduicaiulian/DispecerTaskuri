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
		<li><a id="teams" href="#">Teams</a></li>
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
			
		</div>
	</div>
					<script src="../js/test_select.js"></script>
					<script src="../js/task_sort.js"></script>
</body>
</html>