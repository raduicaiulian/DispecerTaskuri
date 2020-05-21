function handleSelectUserExtraTask(id_first_select, id_secound_select){
  //alert("test");
  first_object_id = document.getElementById(id_first_select);
  console.log(first_object_id.value);
  secound_object_id = document.getElementById(id_secound_select);
  console.log(secound_object_id.value);
  
  
  $.ajax({type: "GET",url: "../php/Sortare.php", async: false,data : { "echipa":first_object_id.value, "autoritate":secound_object_id.value }, success: function(result){
			$("#l_menu_2").empty();

			//result= JSON.parse(result);
			console.log(result);
			result= JSON.parse(result);
			for( var i =0 ; i <result.length ; i++)
			{
				//console.log(result[i]);
				mydiv = document.getElementById("l_menu_2");
				var divitem = document.createElement('div');
				divitem.setAttribute("class","a1");
				//for ( var key in result[i])
				//{
					divitem.append(result[i]['nume']);
					var spanelement = document.createElement('span');
					spanelement.setAttribute("class","data");
					//console.log(spanelement);
					spanelement.append(result[i]['deadline']);
					divitem.append(spanelement);
					divitem.append('\n');
					mydiv.append(divitem);
				//}
			}
			$(".a1").click(function(){
				$("#scroll_container").empty();
				indexElement=$(this).index();
				//console.log($(georgica).index());
				//console.log(result[indexElement]['nume']);
				mydiv = document.getElementById("scroll_container");
				var div = document.createElement('div');
				div.setAttribute("id","scroll_container_nume");
				div.append(result[indexElement]['nume']);
				mydiv.append(div);
				
				var div = document.createElement('div');
				div.setAttribute("id","scroll_container_deadline");
				div.append(result[indexElement]['deadline']);
				mydiv.append(div);
				
				var div = document.createElement('div');
				div.setAttribute("id","scroll_container_time");
				div.append(result[indexElement]['time']);
				mydiv.append(div);
				
				var div = document.createElement('div');
				div.setAttribute("id","scroll_container_descriere");
				div.append(result[indexElement]['descriere']);
				mydiv.append(div);
				
				var div = document.createElement('div');
				div.setAttribute("id","scroll_container_sugestii");
				div.append(result[indexElement]['sugestii']);
				mydiv.append(div);
			});

		}});

  //sortare
}
