$(document).ready(function(){
	document.getElementsByClassName("complete_task").addEventListener("click",function(){
		indexElement=$(this).index();
		id_task = indexElement['id'];
		$.ajax({type: "GET",url: "../php/complete_task.php", async: false,date:{"id_task":id_task}, success: function(result){

		});

  })});
