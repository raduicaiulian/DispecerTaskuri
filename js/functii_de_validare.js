validare_nume=function () {	//de fiecare data cand userul tasteaza in imputulde nume de familie(TERMINAT)
	nume.setCustomValidity(" ");
	error4.className = 'error';
		
	if(nume.value.length==0)
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Numele de familie este un atribut obligatoriu!';
	else if(hasLowerCase(nume.value[0]))
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Prima literă a numelui de familie trebuie să fie majusculă!';
	else if(hasSpecialChars(nume.value)!=0)
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Numele de familie nu poate conţine caractere speciale \"'+nume.value[hasSpecialChars(nume.value)]+'\" !';
	else if(hasDigit(nume.value))
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Numele de familie nu poate conţine cifre!';
	else if(hasUpperCase(nume.value.slice(1)))
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Numele de familie nu poate conţine majuscule cu excepţia primei litere!';
	else if(nume.value.length<3)
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Numele de familie trebuie să aibă măcar 3 caractere('+nume.value.length+'/3)!';
	else if(nume.value.length>25)
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Numele de familie nu pote fi mai mare de 25 de caractere('+nume.value.length+'/25)!';
	else if(!prenume.validity.valid){
		nume.setCustomValidity("");
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Trebuie să completezi şi prenumele!';
	}else{
		nume.setCustomValidity("");
		error4.className = 'noerror';
		error4.innerHTML = '<img src="../images/check.png" style="width: 24px; transform: translate(0px,6px);">OK';
	}
}

validare_password=function () {	//de fiecare data cand userul tasteaza in imputulde pasword(TERMINAT)
	password.setCustomValidity(" ");
	error3.className = 'error';
	
	if(password.value.length==0)
		error3.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Parola este un atribut obligatoriu!';
    else if(!hasUpperCase(password.value))
    	error3.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Mai trebuie măcar o majusculă';
    else if(!hasDigit(password.value))
    	error3.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Parola trebuie să conţină măcar o cifră';
    else if(!hasLowerCase(password.value))
    	error3.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Mai trebuie măcar o minusculă';
	else if(password.validity.tooShort)
		error3.innerHTML =  '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Parola trebuie să aibă '+password.minLength+' caractere,'+ password.value.length+'/'+password.minLength;
	else if(password.value.length>20){
		error3.innerHTML =  '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Parola nu poate să depăşească 20 de caractere,'+ password.value.length+'/20';
		error3.setAttribute("style","display: inline-block; margin-left: 126px;");
	}else{	
		password.setCustomValidity("");
		error3.className = 'noerror';
		error3.innerHTML = '<img src="../images/check.png" style="width: 24px; transform: translate(0px,6px);">OK';
	}		    	
}

validare_email=function () {//de fiecare data cand userul tasteaza in imputulde email(TERMINAT)
	password.setCustomValidity(" ");
	error1.className = 'error';
	
	if(email.value.length==0)
		error1.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Email-ul este un atribut obligatoriu!';
	else if(!email.value.includes('@'))
		error1.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Adresa trebuie să conţină simbolul "@"';	
	else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)){
		console.log("asd");
		password.setCustomValidity(" ");
		error1.className = 'error';
		error1.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Adresă de email invalidă!';
	}else {// if(email.validity.valid)
		email.setCustomValidity("");
		error1.className = 'noerror'; // seteaza atributul class al obiectului error1 
		error1.innerHTML = '<img src="../images/check.png" style="width: 24px; transform: translate(0px,6px);">OK';
	}	
}

validare_username=function () {//aproape gata(terminat)
	username.setCustomValidity(" ");
	error2.className = 'error';
	
	if(username.value.length==0)
		error2.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">username-ul este un atribut obligatoriu!';
	else if(username.value.length<3)
		error2.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">username-ul prea scurt('+username.value.length+'/3)!';
	else if(username.value.length>25){
		error2.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">username-ul prea lung('+username.value.length+'/25)!';
	}else{
		username.setCustomValidity("");
		error2.className = 'noerror';
		$.ajax({url: "../php/username_verify.php?username="+username.value, success: function(result){
			if(result=="1"){
				username.setCustomValidity(" ");
				error2.className = 'error';
				error2.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">username-ul există deja';
			}else{
				error2.innerHTML = '<img src="../images/check.png" style="width: 24px; transform: translate(0px,6px);">OK';
			}
		}});
	}
}

validare_prenume=function () {	//validate prenume(TERMINAT)
	prenume.setCustomValidity(" ");
	error4.className = 'error';	
	
	if(hasSpecialChars(prenume.value) && ' '!=prenume.value[hasSpecialChars(prenume.value)] && '-'!=prenume.value[hasSpecialChars(prenume.value)])
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Prenumele nu poate conţine caractere speciale \"'+prenume.value[hasSpecialChars(prenume.value)]+'\"!';
	else if(hasDigit(prenume.value))
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Prenumele nu poate conţine cifre!';
	else if(verificare_prenume(prenume.value)==0)//de schimbat
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Prenumela nu poate conține două spații consecutive!';
	else if(verificare_prenume(prenume.value)==4)//de schimbat
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Prenumele nu se poate încheia în caracterul spațiu!';
	else if(verificare_prenume(prenume.value)==2)//de schimbat
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Primul caracter al fiecărrui prenume trebuie să fie majusculă!';
	else if(verificare_prenume(prenume.value)==3)//de schimbat
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Prenumele nu poate conține majuscuele cu excepția primei liter!';
	else if(prenume.value.length<3)
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Prenumele trebuie să aibă măcar 3 caractere('+prenume.value.length+'/3)!';
	else if(prenume.value.length>25)
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Prenumele nu pote fi mai mare de 30 de caractere('+prenume.value.length+'/25)!';
	else if(!nume.validity.valid){
		prenume.setCustomValidity("");
		error4.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Trebuie să completezi şi numele de familie!';
	}else{
		prenume.setCustomValidity("");
		error4.className = 'noerror';
		error4.innerHTML = '<img src="../images/check.png" style="width: 24px; transform: translate(0px,6px);">OK!';
	}	
}

validare_functia=function (){
	//console.log(functia[0].checked);
	//console.log(functia[1].checked);

	btn1 = functia[0].checked;
	btn2 = functia[1].checked;

	error5.className = 'error';
	if(btn1==btn2 && btn1==false){
		error5.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Trebuie să bifezi măcar o opţiune!';
		return true;
	}else{
		error5.className = 'noerror';
		error5.innerHTML = '<img src="../images/check.png" style="width: 24px; transform: translate(0px,6px);">OK!';
		return false;
	}
	//functia.setCustomValidity("");
}

validare_form=function () {//(terminat)
	if(!nume.validity.valid) {//nume
		nume.focus();//focusează pe obiectul nume
		validare_nume();//selectează imputul
		event.preventDefault();//împiedică trimiterea datelor mai departe dacă s-au găsit erori 
	}else if(!prenume.validity.valid) {//prenume
		prenume.focus();
		validare_prenume();
		event.preventDefault();
	}else if(!email.validity.valid){//enail
		email.focus();
		validare_email();
		event.preventDefault();
	}else if(validare_functia()) {//functia
		validare_functia();
		event.preventDefault();
	}else if(!username.validity.valid){//username
		username.focus();
		validare_username();
		event.preventDefault();
	}else if(!password.validity.valid){//password
		password.focus();
		validare_password();
		event.preventDefault();
	}
}

//UTIL
//error3.setAttribute("style","");
