function aldatuActiveLog(){
	document.getElementById("divLog").classList.add("is-active");
	document.getElementById("divReg").classList.remove("is-active");
}

function aldatuActiveReg(){
	document.getElementById("divReg").classList.add("is-active");
	document.getElementById("divLog").classList.remove("is-active");
}

var dis=false;
var dis2=false;
var dis3=false;

function izenaEgiaztatu(){
	var izena = document.getElementById("izen-abizenak");
	var regex= /^[A-Z]([a-z]+){2,}(\ ([A-Z][a-z]+){1,})+$/;
	if(izena.value.length!=0 && !regex.test(izena.value)){
		izena.style.borderColor="#E50914";
		document.getElementById('IzenErr').style.display="block";
		dis=true;
	}else{
		izena.style.borderColor="";
		document.getElementById('IzenErr').style.display="none";
		dis=false;
	}
}

function emailEgiaztatu(){
	var email = document.getElementById("signup-email");
	var regex= /^[a-zA-Z0-9]{1,}\@[a-z]{2,}\.[a-z]{2,}$/;
	if(email.value.length!=0 && !regex.test(email.value)){
		email.style.borderColor="#E50914";
		document.getElementById('EmailErr').style.display="block";
		dis2=true;
	}else{
		email.style.borderColor="";
		document.getElementById('EmailErr').style.display="none";
		dis2=false;
	}
}

function pasahitzaEgiaztatu(){
	var pas1 = document.getElementById("signup-password").value;
	var pas2 = document.getElementById("signup-password-confirm");
	if(pas2.value.length!=0 && pas1!=pas2.value){
		pas2.style.borderColor="#E50914";
		document.getElementById('PasErr').style.display="block";
		dis3=true;
	}else{
		pas2.style.borderColor="";
		document.getElementById('PasErr').style.display="none";
		dis3=false;
	}
}

function aldatu(){
	if(dis || dis2 || dis3){
		document.getElementById('btn-signup').disabled=true;
	}else{
		document.getElementById('btn-signup').disabled=false;
	}
}


setInterval(aldatu, 0);


