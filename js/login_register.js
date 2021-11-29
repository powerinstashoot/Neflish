
function aldatuActiveLog(){
	document.getElementById("divLog").classList.add("is-active");
	document.getElementById("divReg").classList.remove("is-active");
}

function aldatuActiveReg(){
	document.getElementById("divReg").classList.add("is-active");
	document.getElementById("divLog").classList.remove("is-active");

}

function izenaEgiaztatu(){
	var izena = document.getElementById("izen-abizenak");
	var regex= /^[A-Z]([a-z]+){2,}(\ ([A-Z][a-z]+){1,})+$/;
	if(izena.value.length!=0 && !regex.test(izena.value)){
		izena.style.borderColor="#E50914";
	}else{
		izena.style.borderColor="";
	}
}

function emailEgiaztatu(){
	var email = document.getElementById("signup-email");
	var regex= /^[a-zA-Z0-9]{1,}\@[a-z]{2,}\.[a-z]{2,}$/;
	if(email.value.length!=0 && !regex.test(email.value)){
		email.style.borderColor="#E50914";
	}else{
		email.style.borderColor="";
	}
}

function pasahitzaEgiaztatu(){
	var pas1 = document.getElementById("signup-password").value;
	var pas2 = document.getElementById("signup-password-confirm");
	if(pas2.value.length!=0 && pas1!=pas2.value){
		pas2.style.borderColor="#E50914";
	}else{
		pas2.style.borderColor="";
	}
}
