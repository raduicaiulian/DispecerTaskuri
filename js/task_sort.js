function handleSelectUserTask(id_first_select, id_secound_select){
  //alert("test");
  first_object_id = document.getElementById(id_first_select);
  //console.log(first_object_id.value);
  secound_object_id = document.getElementById(id_secound_select);
  //console.log(secound_object_id.value);


  $.ajax({type: "GET",url: "../php/task_sort.php", async: false,data : { "echipa":first_object_id.value, "criteriu":secound_object_id.value }, success: function(result){
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
            var elem = document.createElement('img');
            elem.setAttribute('class','user_image');
            elem.setAttribute("src","../images/x.png");
            divitem.append(elem);
            mydiv.append(divitem);
				//}
			}
      $(".user_image").click(function(){
				    // id = cheia care va ajunge in php, iar result[id] este valoarea din javascript
				$.ajax({url: "../php/remove_user_task.php",method:"POST" ,data:{id: result[$(".user_image").index($(this))]["id_task"]}, success: function(result2){
					console.log(result2);
				}});
				$(this).parent().remove();
			});
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
				
				$.ajax({url: "../php/skill_necesare_task.php", async: false,data:{php_id_task:result[indexElement]['id']}, success: function(result2){
					
					result2= JSON.parse(result2);
					console.log(result2);
					$("#scroll_container").append('<br>');
				
				var divmare = document.createElement('div');
				divmare.setAttribute('id','new_line2');
				
				for(var i=0;i<result2.length;i++){
					
					var div = document.createElement('div');
					div.setAttribute("id","scroll_container_limbaje");
					var limbaje = document.createElement('span');
					limbaje.setAttribute("id","limbaje");
					limbaje.append(result2[i]['nume_skill']);
					div.append(limbaje);
					divmare.append(div);
					
					var div = document.createElement('div');
					div.setAttribute("id","scroll_container_level");
					var level = document.createElement('span');
					level.setAttribute("id","limbaje_si_level");
					level.append(result2[i]['level']);
					div.append(level);
					divmare.append(div);
					mydiv.append(divmare);
				}
				
				$("#scroll_container").append('<br>');
					
				}});
				var div = document.createElement('div');
				div.setAttribute("class","complete_task");
				div.append("Am terminat task-ul");
				mydiv.append(div);

			});

		}});

  //sortare
}
