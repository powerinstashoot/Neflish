/*
Irudia igotzeko funtzioa. Irudia aukeratzerakoan, irudi hori agertuko da
formularioan igotzeko prest.
*/
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);

	var img=	document.getElementById("img").value;
	if(img==''){
		document.getElementById("output").style.visibility="hidden";
	}else{
		document.getElementById("output").style.visibility="visible";

	}

};

/*
Irudia aukeratzerakoan, irudi hori ezabatzeko funtzioa. Beste irudi bat
aukeratu daiteke.
*/
function ezabatuArgazkia(){
	document.getElementById("img").value='';
	document.getElementById("output").style.visibility="hidden";
}
