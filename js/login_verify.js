$( document ).ready(function() {
	//event.preventDefault();
	//$("#submit").prop('disabled', true);
	username_field = document.getElementsByTagName("input")[0];
	username_field.addEventListener('input', function(event){
		username=username_field.value;
		$.ajax({url: "../php/username_verify.php?username="+username, success: function(result){
			if(result==='1'){//username valid
				//console.log("username valid!")
				$("#submit").prop('disabled', false);//enable if username is valid
				$("#error").removeClass("invalid");
				$("#error").addClass("valid");
				$("#error").html('<img src="../images/check.png" style="width: 24px; transform: translate(0px,6px);">');
				$("#error").append("username valid!");
				$("#submit").removeClass("btn_no_hover");
				$("#submit").addClass("btn_sub");
			}else{
				//console.log("username invalid!");
				$("#submit").prop('disabled', true);//disable if username is invalid
				$("#error").removeClass("valid");
				$("#error").addClass("invalid");
				$("#error").html('<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">');
				$("#error").append("username invalid!");
				$("#submit").removeClass("btn_sub");
				$("#submit").addClass("btn_no_hover");
			}
	  }});
	});
});