//if(!$.active){//în cazul în care deja există o cerere în procesare evită lansarea unei alte cereri până ce nu se termină cererea prfecedentă
$(document).ready(function() {//toate listenerele din pagina de manager

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
	
	$( "#teams" ).click(function load_l_menu() { //Display teams in sidebar on click event
	
		$.ajax({url: "../php/manager/load_teams.php",async: false, cache: false, dataType:"json",
			success: function(result){
				$("#l_menu_2").empty();//sterge contentul din meniul lateral
				for( var i = 0 ; i <result.length ; i++){
					div=$("<div class='team_slot'></div>");
					div.append("<p class='team_name'><img class='team_img' src='../images/team.png'>"+result[i]['team_name'] +"</p><span class='emp_cnt'>"+result[i]['emp_cnt']+"</span><span class='team_level'>max level:"+ result[i]['max_level']);
					mydiv.append(div);
				}
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
							team_data.append("<div class='team_info'>Team name<br>"+result[team_index]["team_name"]+"</div>");
							team_data.append("<div class='team_info'>Count of teammate:<br>"+result[team_index]['emp_cnt']+"</div>");
							team_data.append("<div class='team_info'>Max level of task dificulty:<br>"+result[team_index]['max_level']+"</div>");
							$("#scroll_container").append(team_data);
							$("#scroll_container").append("<p id='team_employee'>Team employees:</p>");
							emp_list=$("<div id='employee_list'>");//a div where we place all employee
							e=$("<div id='employees'></div>");//aorher grid
							for( var i = 0 ; i <res.length ; i++){
								e.append("<div class='employee'>nume:"+res[i]["nume"]+"<br>prenume:"+res[i]["prenume"]+"<br>username:"+res[i]["username"]+"</div>"); 
							}
							emp_list.append(e);	
							$("#scroll_container").append(emp_list);
							
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
								$("#plus_sign").before('<br><input id="employee_username" type="text" placeholder="username employee" autocomplete="off"><br>');
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
				
				mydiv.append($("<img id='add_team' src='../images/add_team.png'>"));//end append add team button after teams
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
	
	$( "#tasks" ).click(function load_l_menu() {//load tasks
		$.ajax({ type: "POST", async: false, cache: false, url: "../html/main_page_manager/add_task.html",dataType:"html",
			success: function(result){
				$("#l_menu_2").empty();
				$("#l_menu_2").append("aici vin taskurile grupate pe echipe");//clear l_menu
				$("#scroll_container").html(result);
			},
			error: function(){
				console.log("request failed");
				error("eroare de retea");
			}
		});
		console.log("tasks clicked");
	});
	//marius code
	mydiv2 = $("#scroll_container");
	$("#acount_setings").click(function load_scroll_container(){
		$.ajax({url: "../php/manager/account_settings.php",async: false, cache: false, dataType:"json",
			success: function(result){
				$("#l_menu_2").empty();
				$("#scroll_container").empty();
				for( var i = 0 ; i <result.length ; i++){
					div=$("<div class='acc_details'></div>");
					div.append("Nume: "+result[i]['nume'] + "<br></br>"+ "Prenume: "+result[i]['prenume']+ "<br></br>"+"Mail: "+ result[i]['mail']);
					mydiv2.append(div);}
				mydiv2.append("<button id='show_reset' type='button'>Reset your password</button>");
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
							 		$("#reset_input").remove();
								},
				  				error: function plm(){
				  					console.log("request failed");
				  					error("eroare de retea");
				  				}
				  		});
					}
					else{
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
					 			$("#reset_input").remove();
							},
							error: function plm2(){
								console.log("request failed");
								error("eroare de retea");
							}
						});
					}
					else{
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
