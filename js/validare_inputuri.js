form  = document.getElementsByTagName('form')[0];//pentru a valida inainte de a trimite
error1 = document.getElementsByClassName('error')[1];//casuta de eroare pentru email
error2 = document.getElementsByClassName('error')[3];//username
error3 = document.getElementsByClassName('error')[4];//password
error4 = document.getElementsByClassName('error')[0];//nume, prenume
error5 = document.getElementsByClassName('error')[2];//functie

email = document.getElementsByName('mail')[0];
username = document.getElementsByName('username')[0];
password = document.getElementsByName('password')[0];
nume = document.getElementsByName('nume')[0];
prenume = document.getElementsByName('prenume')[0];
functia = document.getElementsByName('functie');


function count(a,el){
	var count = 0;
	
	for(var i=0; i<a.length; ++i)
		if(a[i]==el)
			count++;
	return count;
}

function hasUpperCase(str) {
	for(var i=0; i<str.length;i++)
	    if('ĂÎÂŢŞ'.includes(str[i]))
		return true;
	return (/[A-Z]/.test(str));
}

function hasDigit(str){
        return (/[0-9]/.test(str));
}

function hasLowerCase(str){
	for(var i=0; i<str.length;i++)
	    if('ăîâţş'.includes(str[i]))
		return true;
 	return (/[a-z]/.test(str));
}

function hasSpecialChars(str){
	var ok=0;
	for(i=0;i<str.length;i++)
		if((hasLowerCase(str[i]) || hasDigit(str[i]) || hasUpperCase(str[i]) || 'ĂăÎîÂâŞşŢţ'.includes(str[i])) == false)
			ok=i;
	if(ok!=0 )
		return ok;
	return false;
}

function verificare_prenume(str){
	aux=str.split(' ');
	if(aux[aux.length-1]=='')
		return 4;
	for(i=0;i<aux.length;i++){
		if(count(aux,'')>1)// nu conține mai mult de un spațiu între prenume 
			return 0;
		else if (!hasUpperCase(aux[i][0]))// prima litera a fiecareui prenume incepe cu litara mare
			return 2;
	}
	for(i=0;i<aux.length;i++)
		if(hasUpperCase(aux[i].slice(1)))
			return 3;
	return true;//în JS true=1
}

function reset_inputs_state(){
	nume.setCustomValidity(" ");
	prenume.setCustomValidity(" ");
	password.setCustomValidity(" ");
	username.setCustomValidity(" ");
	email.setCustomValidity(" ");
}

reset_inputs_state();

email.addEventListener('input', validare_email);

username.addEventListener('input', validare_username);

password.addEventListener('input', validare_password);

nume.addEventListener('input', validare_nume);

prenume.addEventListener('input', validare_prenume);

//validare_functia();

functia[0].addEventListener('input', validare_functia);

functia[1].addEventListener('input', validare_functia);

form.addEventListener('submit', validare_form);

////////////////////////////////////gunoi rezerva
	//http request
	//https://verify-email.org/home/verify-as-guest/
	//const Http = new XMLHttpRequest("https://www.google.com/search?client=ubuntu&channel=fs&q="+email.value+"&ie=utf-8&oe=utf-8");
	//const url=""+email.value;
	//Http.open("POST", url);
	//Http.send();
	
	//Http.onreadystatechange=(e)=>{
	//console.log(Http.responseText);}
	//http request
