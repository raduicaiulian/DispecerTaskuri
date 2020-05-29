//this function load unalocated tasks in sidebar for tasks submenu
load_unallocated_tasks=function(){
	$.ajax({url: "../php/manager/load_unallocated_tasks.php",async: false, cache: false, dataType:"json",
		success: function(result){
			menu=$("#l_menu_2");
			menu.empty();
			for(i=0;i<result.length;i++){
				menu.append("<div class='task'>"
					+result[i]['nume']+"<span class='date'>"+result[i]['deadline']+"</span><span class='time'>"+result[i]['time']+"</span><div class='container_descriere'><span class='descriere'>"+result[i]['descriere']+"</span><span class='sugestie'>"+result[i]['sugestii']+"</span>"+
				"</div></div>");
				console.log(result[i]);
			}
			//console.log(result);
		}
	});
};
console.log('importat');