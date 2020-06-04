//if(!$.active){//în cazul în care deja există o cerere în procesare evită lansarea unei alte cereri până ce nu se termină cererea prfecedentă
$(document).ready(function() {//toate listenerele din pagina de manager

	//functie temporară
	remove_skill=function(this_ptr){//remove skill from skill list
		console.log($(".skill").index($(this_ptr).parent()));
		$(this_ptr).parent().remove();
		//console.log(obj.attr("src"));
		//	console.log($("#skill").index());
	};
	
	
	//functie temporară
	

	cache=false;//set to false on debug, true in production
	mydiv = $("#l_menu_2");
	var error=function(msg){$.notify(msg, {//asign error pop-up to use later
		className:"error",
		clickToHide: true,
		showDuration: 60,
		globalPosition: 'top right'
	});}
	var succes_notify=function(msg){$.notify(msg, {//asign error pop-up to use later
		className:"success",
		clickToHide: true,
		showDuration: 60,
		globalPosition: 'top right'
	});}
	//temp ffffffffffffff
	add_emp_skill=function(this_ptr, id, team_id){
		index=$(".employees_skils").index($(this_ptr).parent());
		skill_div=$(".employees_skils:eq("+index+") .add_emp_skill");
		//console.log(skill_div);
		if($(".skill").length==0)//daca inputul nu există
			skill_div.before("<div class='skill'><br><input placeholder='skill' class='slill_name' style='margin: 0 auto; display: block;'><input  placeholder='level' class='level' style='margin: 0 auto; display: block;'></input><br></div>");
		else{//la a doua apăsare a butonului(plus) de adaugat skilluri
			//console.log($(".employees_skils:eq("+index+") .skill"));
			skill=$(".employees_skils:eq("+index+") .skill .slill_name").val();
			level=$(".employees_skils:eq("+index+") .skill .level").val();
			$.ajax({url: "../php/manager/insert_user_skill.php",async: false, cache: false, data:{ id : id, team_id:team_id, skill: skill, level:level },/*dataType:"json",*/
			success: function(result){
				if(result=="0"){
					succes_notify("skill adăugat cu succes");
					//dacă este primul skill se șterge textul inițial
					$(".employees_skils:eq("+index+") .skill").before(skill+"<span style='float: right; display: block;margin-left: 100px;'>"+level+"</span><br>");
				}
				else
					error("eroare la inserare skill");
				console.log(result);
			}
		});
			$(".employees_skils:eq("+index+") .skill").remove();
		}
		
		//console.log(res[$(".employees_skils").index($(this))]["id"]);//id user pentru care trebuie adăugate skilurile
		//$(".add_emp_skill:eq("+$(".employees_skils").index($(this))+")").before('<div class="skill"><select class="limbaj"name="Limbaj"><option value="1">Limbaj</option></select><select class="level"><option>Level</option></select><img class="skill_rm" onclick="remove_skill(this)" style="width: 20px" src="../images/x.png"></div>'); 	
	};
	//tamp ffffffffffffff
	
	$( "#teams" ).click(function load_l_menu() { //Display teams in sidebar on click event
		$("#l_menu > img").remove();//sterge imaginile butoane din partea stanga jos
		$.ajax({url: "../php/manager/load_teams.php",async: false, cache: false, dataType:"json",
			success: function(result){
				$("#l_menu_2").empty();//sterge contentul din meniul lateral
				for( var i = 0 ; i <result.length ; i++){
					div=$("<div class='team_slot'></div>");
					div.append(" <p  class='team_name'>  <img class='team_img' src='../images/team.png'>"+result[i]['team_name'] +"</p><span class='emp_cnt'>"+result[i]['emp_cnt']+"</span><span class='team_level'>max level:"+ result[i]['max_level']);
					mydiv.append(div);
				}
				//remove team listener
				$(".remove_team").click(function remove_team(){
					i=$(".team_name").index($(this).parent());
					
					//jquery care face stergerea
					//apelare reload_team_tetails();
					//console.log(mydiv.index(this));
					console.log(result[i]);
					console.log(result[i]["id"]);
					var result2=result[i]["id"];
				});
				//add team listener
				$(".team_slot").click(function reload_team_tetails(this_ptr=false,team_index=false){//click on every team of sidebar
					if(team_index==false)//dacă nu a fost pasată o echipă pentru care să fac refresh consider echipa pe care s-a dat click ca fiind echipa curentă
						team_index=$(this).index();
					//throw new Error("Something went badly wrong!");
					var team_id=result[team_index]['id'];
					$.ajax({type: "POST", async: false, cache: false, url: "../php/manager/get_team_data.php", data: {team_id: team_id},
						dataType:"json",
						success: function(res){
							
							$("#scroll_container").empty();
							team_data=$("<div id='team_data'></div>");//grid
							team_data.append("<div class='team_info'>Team name:<br>"+result[team_index]["team_name"]+"</div>");
							team_data.append("<div class='team_info'>Max level of task dificulty:<br>"+result[team_index]['max_level']+"</div>");
							$("#scroll_container").append(team_data);
							$("#scroll_container").append("<p id='team_employee'>Team employees:</p>");
							e=$("<div id='employees'></div>");//emplyees grid
							//console.log(result);
							for( var i = 0 ; i <res.length ; i++){
								emp=$("<div class='employee'><span style='position: absolute; color: black; margin-top: -35px;'>date angajat</div></div>");
								emp.append("nume<span style='float: right; display: block;margin-left: 100px;'>"+res[i]["nume"]+"</span><br>");
								emp.append("prenume<span style='float: right; display: block;margin-left: 100px;'>"+res[i]["prenume"]+"</span><br>");
								emp.append("username<span style='float: right; display: block;margin-left: 100px;'>"+res[i]["username"]+"</span><br>");
								emp.append("email<span style='float: right; display: block;margin-left: 100px;'>"+res[i]["mail"]+"</span>"); 
								e.append(emp);
								//request to get emplyee skills(-----------pobleme la refresh)
								$.ajax({type: "POST", async: false, cache: false, url: "../php/manager/get_employee_skills.php", data: {team_id: team_id, user_id: res[i]['id'] },
									dataType:"json",
									success: function(resp){
											emp_skills=$("<div class='employees_skils'><span style='position: absolute; color: black; margin-top: -35px;'>skilluri</div>")
											if(resp.length>0){
												for( var j = 0 ; j <resp.length ; j++){
													emp_skills.append(resp[j]['nume_skill']);
													emp_skills.append("<span style='float: right; display: block;margin-left: 100px;'>"+resp[j]['level']+"</span><br>");
												}
											}else{
												emp_skills.append("This employee has no skills, please add some!");
											}
											id=res[i]['id'];
											console.log(team_id);
											emp_skills.append("<img class='add_emp_skill' onclick='add_emp_skill(this, "+id+","+team_id+")' src='../images/plus_sign.png'>");
											e.append(emp_skills);
											
											
											
//---------------------------------------in lucru											
									}
								});
								
							}
							
							$("#scroll_container").append(e);
							
							$("#scroll_container").append("<img id='plus_sign' src='../images/plus_sign.png'>");
							$("#plus_sign").click(function(){//la click pe semnul de add employee to team
							if ($("#employee_username").length!=0){
								username=$("#employee_username").val();//username of the employee that need to be inserted
								//call insert in team script
								$.ajax({ type: "POST", async: false, cache: false, url: "../php/manager/add_employee.php", data: { username: username,team_id:team_id },
									success: function(returned){
										//la succes
										if(returned=='2')
											error("angajatul nu există");
										else if(returned=='1')
											error("angajatul este introdus deja în echipă");
										else if(returned=='0'){
											succes_notify("angajat adăugat cu succes");
											reload_team_tetails(this,team_index);//refresh team detail team_index(parametrul pe baza căruia se face refresh) this este primul parametru care nu poate fi suprascris
											load_l_menu();//reload l_menu to display updated count of teamate
											console.clear();//curata consola sa fim shyny
										}
										$("#employee_username").remove();
									},error: function(){
										console.log("request failed");
										error("eroare de retea");
									}
								});
							} else {//if #employee_username does not exist
								$("#plus_sign").before('<input id="employee_username" type="text" placeholder="username employee" autocomplete="off">');
								$("#employee_username").focus();
							}
								
							});
							//console.log(res);
						},
						error: function(){
							console.log("request failed");
							error("eroare de retea");
						}
					});
				});
				
				$("#l_menu").append($("<img id='add_team' src='../images/add_team.png'>"));//end append add team button after teams
			},
			error: function(){
				console.log("request failed");
				error("eroare de retea");
			}
		});
		
		$("#add_team").click(function() {//click on add team button(img)
			$("#scroll_container").load('../html/main_page_manager/create_team.html', function(responseTxt, statusTxt, xhr){
				if(statusTxt == "success"){
					$("#create_team").click(function (){//când se apasă pe submit team
						nume_echipa=$("#nume_echipa").val();
						maxlevel=$("#maxlevel").val();
						l_skils=$("#lista_skills li");//de prelucrat
						skiluri=[];//creaza lista ce o pasez la php
						for (var i = 0; i < l_skils.length; i++ ) {
							skiluri.push(l_skils[ i ].innerHTML.split("<")[0]);//extrage continultul din li eliminand 
						}
						//de verificat lista de skilluri înainte de a trimite la server pentru a evita congestionarea rețelei
						//post request to add team(for inserting in database)
						$.ajax({ type: "POST", async: false, cache: false, url: "../php/manager/add_team.php", data: { nume_echipa: nume_echipa, maxlevel: maxlevel, skiluri:skiluri },
							success: function(data){
								//la succes
								if(data=='0'){
									succes_notify("Echipă creeată cu succes");
									$("#scroll_container").empty();
								}
								else if(data=='1')
									error("Această echipă există deja");
								load_l_menu();//apelez funcția care face refresh la meniul lateral pentru a afișa echipa nou introdusă
							},dataType:"json"
						});
					});
				}else
					if(statusTxt == "error"){//eroarea apare doar dacă fișierul nu este deja cache-uit(la prima accesare)
						console.log("request failed");
						error("eroare de retea");
					}
			});
		});
	}); 
	
	$( "#tasks" ).click(function load_l_menu() {//la click pe tasks button
		$("#l_menu > img").remove();//sterge imaginile butoane din partea stanga jos
		mydiv.empty();
		$("#l_menu").append($("<img id='add_task' src='../images/add_task.png'>"));
		$("#l_menu").append($("<img id='spread_tasks' src='../images/spread_t.svg'>"));
		$("#add_task").click(function(){//la lick pe add task button
			$.ajax({ type: "POST", async: false, cache: false, url: "../html/main_page_manager/add_task.html",dataType:"html",
				success: function(result){
					//$("#l_menu_2").append("aici vin taskurile grupate pe echipe");//clear l_menu
					$("#scroll_container").html(result);
				},
				error: function(){
					console.log("request failed");
					error("eroare de retea");
				}
			});
		});
		
		$("#spread_tasks").click(function(){//la lick pe spread tasks
			$.ajax({ type: "POST", async: false, cache: false, url: "../php/imparte_taskuri.php",dataType:"html",
				success: function(result){
					//console.log(result);
					$("#tasks").trigger( "click" );
				},
				error: function(){
					console.log("request failed");
					error("eroare de retea");
				}
			});
		});
		//load all tasks unallocated
		load_unallocated_tasks();
	});
	
	//marius code
	mydiv2 = $("#scroll_container");
	
	$("#acount_setings").click(function load_scroll_container(){
		$.ajax({url: "../php/manager/account_settings.php",async: false, cache: false, dataType:"json",
			success: function(result){
				div3 = $("<div class='acc_details'></div>");
				$("#l_menu_2").empty();
				$("#scroll_container").empty();
				$("#acc_details").empty();	
				div1=$("<div class='nume'></div>");
				div1.append("Nume "+ "<br>" + result[0]['nume'] );
				div8=$("<div class='prenume'></div>");
				div8.append("Prenume "+ "<br>" + result[0]['prenume']);
				div9=$("<div class='mail'></div>");
				div9.append("Mail "+ "<br>" + result[0]['mail']);
				div3.append(div1);
				div3.append(div8);
				div3.append(div9);	
				mydiv2.append(div3);
				mydiv2.append("<br></br>" +"<button id='show_reset' type='button'>Reset your password</button>");
				$( "#show_reset" ).click(function show_reset(){//click pe butonul de schimbare parola din account setings
					if ($("#old_password").length!=0){
						oldpassword=$("#old_password").val();
						newpassword=$("#new_password").val();
						newpassword2=$("#new_password2").val();
						$.ajax({ type: "POST", async: false, cache: false, url: "../php/manager/reset_password_ui.php", data: { oldpassword: oldpassword, newpassword: newpassword, newpassword2:newpassword2 },
								success: function(data){
									//la succes
									
							     	if(data=='0')
										succes_notify("Parola schimbată cu succes!");
									else if(data=='2')
										error("Cele doua campuri parola noua nu corespund ");
									else if(data=='3')
										error("Parola este prea mica");
									else if(data=='4')
											error("Parola este prea mare");
									else if(data=='1')
											error("Parola nu corespunde cu cea veche");
									
									else{
										error("Toate campurile sunt obligatorii");
									}
							 		$("#reset_input").remove();
								},
				  				error: function plm(){
				  					console.log("request failed");
				  					error("eroare de retea");
				  				}
				  		});
					}
					else{
						if($("#reset_input").length!=0){
							$("#reset_input").remove();
						}
						
							
	   					 $("#show_reset").before('<div id="reset_input" ><br><input id="old_password" type="text" placeholder="old password" autocomplete="off"><br>'+
	   					 '<br><input id="new_password" type="text" placeholder="new password" autocomplete="off"><br>'
	   					 +'<br><input id="new_password2" type="text" placeholder="new password" autocomplete="off"><br></div>');
	 	   				}
				});
				mydiv2.append("<button id='show_rmail' type='button'>Reseteaza mail-ul</button>");
				$("#show_rmail" ).click(function show_reset2(){//click pe butonul de schimbare email din account setings
					if ($("#old_password2").length!=0){
						oldpassword2=$("#old_password2").val();
						newmail=$("#new_mail").val();
						$.ajax({ type: "POST", async: false, cache: false, url: "../php/manager/reset_mail_ui.php", data: { oldpassword2: oldpassword2, newmail: newmail },
							success: function(data){
								//la succes
								if(data=='0')
									succes_notify("Email-ul schimbat cu succes!");
								else if(data=='1')
									error("Parola nu corespunde cu cea veche");
								else{
									error("Toate campurile sunt obligatorii");
									}
								
								
					 			$("#reset_input").remove();
								
							},
							error: function plm2(){
								console.log("request failed");
								error("eroare de retea");
							}
						});
					}
					else{
						if($("#reset_input").length!=0){
							$("#reset_input").remove();
						}
						$("#show_reset").before('<div id="reset_input" ><br><input id="old_password2" type="text" placeholder="old password" autocomplete="off"><br>'+
						'<br><input id="new_mail" type="text" placeholder="new mail" autocomplete="off"><br>');
					}
				});
			}
		});
	});
		
	//linie utilă pentru debug(aruncă o eroare și oprește execuția codului)
	//throw new Error("Something went badly wrong!");	
});
