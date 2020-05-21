
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="../css/mainpageuser.css">
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<link rel="stylesheet" href="../css/select2_min.css" >
		<link rel="stylesheet" type="text/css" href="../css/custome_select.css" >

		<script src="../js/lib/jquery-1.12.4.js"></script>
		<script src="../js/lib/jquery-ui.js"></script>
		<script src="../js/lib/select2_min.js"></script>
		<script src="../js/lib_aux/select2_dropDownPositionBellow.js"></script><!--de importat după select 2-->
		<script src="../js/lib_aux/select_custome.js"></script><!--after select2-->
		<script src="../js/lib_aux/also_resize_reverse_for_select2.js"></script><!--after select2-->
		<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#l_menu').load('../php/teams1.php')
			}, 3000);
		});
	</script>
	<script type="text/javascript">
	function showDiv() {
   document.getElementById('addteam').style.display = "block";
}
</script>
	</head>
<body>
	<ul class="top_menu">
		<li><a href="page1">Button1</a></li>
		<li><a href="page2">Button2</a></li>
		<li><a href="data.php">Teams</a></li>
		<li><a href="page4">Button4</a></li>
		<li><a href="logout">Logout</a></li>
	</ul>
		<div id="l_menu" class="dragg">

		</div>
	<div id="workspace">
		<div id="scroll_container">
			<div id="addteam"  style="display:none;" class="addteam_form" >

			</div>



		</div>
	</div>
</body>
</html>
