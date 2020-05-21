$(document).ready(function(){
	error=document.getElementById("temp_msg");
	params = new URLSearchParams(location.search);//parametri din url
	err_msg=params.get('m');
	if(err_msg!=null){
		type="error";//presupun ca am eroare
		switch(err_msg) {//delect display mesage and mesage type
		  case "0":
			msg="Cont creat cu succes!";
			type="success";//iar daca nu schimb o singură dată
			break;
		  case "1":
			msg="Eroare la executarea interogării(sql)!";
			break;
		  case "2":
			msg="email-ul introdus de tine există deja!";
			break;
		  case "3":
			msg="usernameul introdus de tine este luat deja!";
			break;
		  case "4":
			msg="usernameul introdus de tine este prea scurt!";
			break;
		  case "5":
			msg="usernameul introdus de tine este prea lung!";
			break;
		  case "6":
			msg="parola introdusă este incorectă!";
				$("#username_inp").val(params.get('user'));
			break;
		case "7":
			msg="parola resetată cu succes!";
			type="success";
			break;
		} 
		$.notify(msg, {
			  className:type,
			  clickToHide: true,
			  autoHide: false,
			  showDuration: 150,
			  globalPosition: 'top right'
			});
		//remove notification and url(soluție temporara)
		$(".notifyjs-corner").click(function(){
			window.location.href=window.location.href.split('?')[0];
		});
	}
//	if (window.performance) {
//	  console.info("window.performance works fine on this browser");
//	}
	if (performance.navigation.type == 1) {
		//console.info( "This page is reloaded" );
		window.location.href=window.location.href.split('?')[0];
	  } else {
		//console.info( "This page is not reloaded");
	  }
});