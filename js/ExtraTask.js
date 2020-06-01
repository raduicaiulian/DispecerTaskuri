$(document).ready(function(){
	document.getElementById("btn4").addEventListener("click",function(){// Click pe  Extra Tasks

		$.ajax({url: "../php/ExtraTasks.php", async: false, success: function(result){//afiseaza taskuri nealocate din echipele mele
			console.log(result);
			$("#l_menu_2").empty();
			$("#scroll_container").empty();
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
		$.ajax({url: "../php/echipe_angajat.php", async: false, success: function(result){//creeaza butoanele de sortare, in functie de echipele din care fac parte
			result= JSON.parse(result);
			$("#l_menu_3").empty();
			mydiv = document.getElementById("l_menu_3");


			ceva_div = document.createElement('div');
			ceva_div.setAttribute('id','dropstyle');

			var newselect = document.createElement("select");
			//newselect.setAttribute('name','dropdownstyle');
			newselect.setAttribute("id","dropdownstyle1");
			newselect.setAttribute('onchange','handleSelectUserExtraTask("dropdownstyle1","dropdownstyle2")'); // listener embeeded

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

			newselect.setAttribute('onchange','handleSelectUserExtraTask("dropdownstyle1","dropdownstyle2")'); // listener embeeded

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
	document.getElementById("teams").addEventListener("click",function(){
		$.ajax({url: "../php/echipe_angajat.php", async: false, success: function(result){
			//console.log(result);
			$("#l_menu_3").empty();
			$("#l_menu_2").empty();
			$("#scroll_container").empty();
			result= JSON.parse(result);
			for( var i =0 ; i <result.length ; i++)
			{
				//console.log(result[i]);
				mydiv = document.getElementById("l_menu_2");
				var divitem = document.createElement('div');
				divitem.setAttribute("class","a1");
				divitem.append(result[i]['team_name']);
				//for ( var key in result[i])
				//{
					mydiv.append(divitem);
				//}
			}

			$(".a1").click(function(){
				$("#scroll_container").empty();
				indexElement=$(this).index();

				mydiv = document.getElementById("scroll_container");
				var div = document.createElement('div');
				div.setAttribute("id","scroll_container_nume");
				div.append(result[indexElement]['team_name']);
				mydiv.append(div);

				var div = document.createElement('div');
				div.setAttribute("id","scroll_container_max_level");
				div.append(result[indexElement]['max_level']);
				mydiv.append(div);

				//adaug mai multe ajaxuri cu cod pentru fiecare Select in php
				$.ajax({type: "GET", url: "../php/user_team_detalii.php", async: false, data : { "branch_code":cod=0, "manager_id" : result[indexElement]['manager_id'] }, success: function(result_team_manager){
						//console.log(result_team_manager);
						result_team_manager = JSON.parse(result_team_manager);

						var div = document.createElement('div');
						div.setAttribute("id","scroll_container_manager");
						div.append(result_team_manager[0]['nume']);
						mydiv.append(div);

						var div = document.createElement('div');
						div.setAttribute("id","scroll_container_manager");
						div.append(result_team_manager[0]['prenume']);
						mydiv.append(div);

						var div = document.createElement('div');
						div.setAttribute("id","scroll_container_manager");
						div.append(result_team_manager[0]['mail']);
						mydiv.append(div);

				}});

				$.ajax({type: "GET", url: "../php/user_team_detalii.php", async: false, data : { "branch_code":cod=1, "team_id" : result[indexElement]['id'] }, success: function(result_team_employee){
						//console.log(result_team_employee);
						result_team_employee = JSON.parse(result_team_employee);
						//console.log(result_team_employee);
						for( var i =0 ; i <result_team_employee.length ; i++)
						{
							var div = document.createElement('div');
							div.setAttribute("id","scroll_container_nume");
							div.append(result_team_employee[i]['nume']);
							mydiv.append(div);

							var div = document.createElement('div');
							div.setAttribute("id","scroll_container_prenume");
							div.append(result_team_employee[i]['prenume']);
							mydiv.append(div);

							var div = document.createElement('div');
							div.setAttribute("id","scroll_container_mail");
							div.append(result_team_employee[i]['mail']);
							mydiv.append(div);

						}


				}});

			});

		}});
	});

});
