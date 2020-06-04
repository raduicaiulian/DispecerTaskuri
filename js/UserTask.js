$(document).ready(function(){
	document.getElementById("btn1").addEventListener("click",function (){

		$.ajax({url: "../php/UserTasks.php", success: function(result){
			$("#l_menu_2").empty();
			$("#scroll_container").empty();
			//console.log(result);
			//throw new Error("Something went badly wrong!");  Pentru debug
			result= JSON.parse(result);
			//console.log(result);
			for( var i =0 ; i <result.length ; i++)
			{

				mydiv = document.getElementById("l_menu_2");
				var divitem = document.createElement('div');
				divitem.setAttribute("class","a1");
					divitem.append(result[i]['nume']);
					var spanelement = document.createElement('span');
					spanelement.setAttribute("class","data");
					spanelement.append(result[i]['deadline']);
					divitem.append(spanelement);
					divitem.append('\n');
						var elem = document.createElement('img');
						elem.setAttribute('class','user_image');
						elem.setAttribute("src","../images/x.png");
						divitem.append(elem);
						mydiv.append(divitem);
			}
			//console.log(result);
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

				//$.ajax({url: "../php/UserTasks.php", success: function(result){

				//})

				var div = document.createElement('div');
				div.setAttribute("id","scroll_container_time");
				div.append(result[indexElement]['time']);
				mydiv.append(div);

				/*var div = document.createElement('span');
				div.setAttribute("span","descriere");
				div.append("Descriere");
				mydiv.append(div);*/

				var divmare=document.createElement('div');
				divmare.setAttribute("id","new_line");


				var div = document.createElement('div');
				div.setAttribute("id","scroll_container_descriere");
				var descriere = document.createElement('span');
				descriere.setAttribute("id","descriere");
				descriere.append("Descriere");
				div.append(descriere);
				div.append(result[indexElement]['descriere']);
				divmare.append(div);
				//mydiv.append(div);

				var div = document.createElement('div');
				div.setAttribute("id","scroll_container_sugestii");
				var sugestii = document.createElement('span');
				sugestii.setAttribute("id","descriere");
				sugestii.append("Sugestii");
				div.append(sugestii);
				div.append(result[indexElement]['sugestii']);
				divmare.append(div)
				mydiv.append(divmare);
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

				//console.log(result);

				$(".complete_task").click(function(){
					//console.log(result);
					//console.log(result[$(".complete_task").index($(this))][0]['id']);
					id_task_trimitem = result[$(".complete_task").index($(this))]["id"];
					console.log(id_task_trimitem);
				$.ajax({type: "GET",url: "../php/complete_task.php", async: false,date:{"id_task":id_task_trimitem}, success: function(result3){
					console.log("\n\nam intart\n\n");
					// console.log(result3);
					$("#l_menu_2").empty();
					$("#scroll_container").empty();
					$.ajax({url: "../php/UserTasks.php", success: function(result){
						$("#l_menu_2").empty();
						$("#scroll_container").empty();
						//console.log(result);
						//throw new Error("Something went badly wrong!");  Pentru debug
						result= JSON.parse(result);
						//console.log(result);
						for( var i =0 ; i <result.length ; i++)
						{

							mydiv = document.getElementById("l_menu_2");
							var divitem = document.createElement('div');
							divitem.setAttribute("class","a1");
								divitem.append(result[i]['nume']);
								var spanelement = document.createElement('span');
								spanelement.setAttribute("class","data");
								spanelement.append(result[i]['deadline']);
								divitem.append(spanelement);
								divitem.append('\n');
									var elem = document.createElement('img');
									elem.setAttribute('class','user_image');
									elem.setAttribute("src","../images/x.png");
									divitem.append(elem);
									mydiv.append(divitem);
						}
						//console.log(result);
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

							//$.ajax({url: "../php/UserTasks.php", success: function(result){

							//})

							var div = document.createElement('div');
							div.setAttribute("id","scroll_container_time");
							div.append(result[indexElement]['time']);
							mydiv.append(div);

							/*var div = document.createElement('span');
							div.setAttribute("span","descriere");
							div.append("Descriere");
							mydiv.append(div);*/

							var divmare=document.createElement('div');
							divmare.setAttribute("id","new_line");


							var div = document.createElement('div');
							div.setAttribute("id","scroll_container_descriere");
							var descriere = document.createElement('span');
							descriere.setAttribute("id","descriere");
							descriere.append("Descriere");
							div.append(descriere);
							div.append(result[indexElement]['descriere']);
							divmare.append(div);
							//mydiv.append(div);

							var div = document.createElement('div');
							div.setAttribute("id","scroll_container_sugestii");
							var sugestii = document.createElement('span');
							sugestii.setAttribute("id","descriere");
							sugestii.append("Sugestii");
							div.append(sugestii);
							div.append(result[indexElement]['sugestii']);
							divmare.append(div)
							mydiv.append(divmare);
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

							//console.log(result);

							$(".complete_task").click(function(){
								//console.log(result);
								//console.log(result[$(".complete_task").index($(this))][0]['id']);
								id_task_trimitem = result[$(".complete_task").index($(this))]["id"];
								console.log(id_task_trimitem);
							$.ajax({type: "GET",url: "../php/complete_task.php", async: false,date:{"id_task":id_task_trimitem}, success: function(result3){
								console.log("\n\nam intart\n\n");
								// console.log(result3);
								$("#l_menu_2").empty();
								$("#scroll_container").empty();

							}});
						});


						});



					}});
				}});
			});


			});



		}});

		$.ajax({url: "../php/echipe_angajat.php", async: false, success: function(result){//creeaza butoanele de sortare, in functie de echipele din care fac parte
			result= JSON.parse(result);
			$("#l_menu_3").empty();
			mydiv = document.getElementById("l_menu_3");

			ceva_div = document.createElement('div');
			ceva_div.setAttribute('id','dropstyle');

			var newselect = document.createElement("select");
			//newselect.setAttribute('name','dropdownstyle');
			newselect.setAttribute("id","dropdownstyle1");
			newselect.setAttribute('onchange','handleSelectUserTask("dropdownstyle1","dropdownstyle2")'); // listener embeeded

			newOption = document.createElement("option");
			newOption.setAttribute('class','team_selector');
			newOption.setAttribute('value', "0");
			newOptionVal = document.createTextNode("Toate Echipele");
			newOption.appendChild(newOptionVal);
			newselect.insertBefore(newOption,newselect.firstChiled);

			for(var i=0;i<result.length;i++)
			{
				newOption = document.createElement("option");
				newOption.setAttribute('class','team_selector');
				newOption.setAttribute('value', result[i]['id']);
				newOptionVal = document.createTextNode(result[i]['team_name']);
				newOption.appendChild(newOptionVal);
				newselect.insertBefore(newOption,newselect.lastChiled);
			}
			ceva_div.append(newselect);


			var newselect = document.createElement("select");
			newselect.setAttribute("id","dropdownstyle2");

			newselect.setAttribute('onchange','handleSelectUserTask("dropdownstyle1","dropdownstyle2")'); // listener embeeded

			newOption = document.createElement("OPTION");
			newOption.setAttribute('class','sort_selector');
			newOptionVal = document.createTextNode('Default');
			newOption.appendChild(newOptionVal);
			newselect.insertBefore(newOption,newselect.firstChiled);

			newOption = document.createElement("OPTION");
			newOption.setAttribute('class','sort_selector');
			newOptionVal = document.createTextNode('Prioritate');
			newOption.appendChild(newOptionVal);
			newselect.insertBefore(newOption,newselect.firstChiled);

			newOption = document.createElement("OPTION");
			newOption.setAttribute("class","sort_selector");
			newOptionVal = document.createTextNode('Deadline');
			newOption.appendChild(newOptionVal);
			newselect.insertBefore(newOption,newselect.firstChiled);

			ceva_div.append(newselect);
			mydiv.append(ceva_div);

		}});


	});
});
