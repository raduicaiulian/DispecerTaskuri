//form = document.getElementsByTagName('form')[0];
console.log("aici");
eroareLive = document.getElementById('live_error');
parola1 = document.getElementsByName("parola")[0];
parola2 = document.getElementsByName("parola")[1];
  // p1 = "X";
  // p2 = "X";

  validare_parola1= function () {
    parola1.setCustomValidity(" ");
    parola2.setCustomValidity(" ");
  	eroareLive.className = 'error';

    if(!hasUpperCase(parola1.value))
      eroareLive.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Mai trebuie măcar o majusculă la prima parola';
    else if(!hasDigit(parola1.value))
      eroareLive.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Prima parola trebuie să conţină măcar o cifră';
    else if(!hasLowerCase(parola1.value))
      eroareLive.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Mai trebuie măcar o minusculă la prima parola';
    else if(parola1.validity.tooShort)
      eroareLive.innerHTML =  '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Prima parola trebuie să aibă '+parola1.minLength+' caractere,'+ parola1.value.length+'/'+parola1.minLength;
    else if(parola1.value.length>20){
      eroareLive.innerHTML =  '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Prima parola nu poate să depăşească 20 de caractere,'+ parola1.value.length+'/20';
    }else if (parola1.value===parola2.value) {
      eroareLive.innerHTML = '<img src="../images/check.png" style="width: 24px; transform: translate(0px,6px);">Parolele sunt identice';
    //  p1 = "OK";
    parola1.setCustomValidity("");
    parola2.setCustomValidity("");
    }else {
      eroareLive.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Parolele nu sunt identice';
    //  p1 = "X";

    }
 }

  validare_parola2 = function () {
    if(!hasUpperCase(parola2.value))
      eroareLive.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Mai trebuie măcar o majusculă la parola a doua';
    else if(!hasDigit(parola2.value))
      eroareLive.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Parola a doua trebuie să conţină măcar o cifră';
    else if(!hasLowerCase(parola2.value))
      eroareLive.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Mai trebuie măcar o minusculă la parola a doua';
    else if(parola2.validity.tooShort)
      eroareLive.innerHTML =  '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Parola a doua trebuie să aibă '+parola2.minLength+' caractere,'+ parola2.value.length+'/'+parola1.minLength;
    else if(parola2.value.length>20){
      eroareLive.innerHTML =  '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Parola a doua nu poate să depăşească 20 de caractere,'+ parola2.value.length+'/20';
    }else if (parola2.value===parola1.value) {
      eroareLive.innerHTML = '<img src="../images/check.png" style="width: 24px; transform: translate(0px,6px);">Parolele sunt identice';
    //  p2 = "OK";
    parola1.setCustomValidity("");
    parola2.setCustomValidity("");
    }else {
      eroareLive.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Parolele nu sunt identice';
      //p2 = "X";
    }
}

// validare_form=function () {//(terminat)
//   if(p1===p2==="OK"){
//     eroareLive.innerHTML = '<img src="../images/check.png" style="width: 24px; transform: translate(0px,6px);">Totul e ok!';
//   }else {
//     eroareLive.innerHTML = '<img src="../images/x.png" style="width: 24px; transform: translate(0px,6px);">Ceva nu e ok!';
//     event.preventDefault();
//   }
// }


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

parola1.addEventListener('input', validare_parola1);
parola2.addEventListener('input', validare_parola2);
//form.addEventListener('submit', validare_form);
