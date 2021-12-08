//var errenkada = document.querySelectorAll('.container-karrusel');
var errenkada = document.querySelectorAll('.kategoria-estiloa');
//var pelikulak = document.querySelectorAll('.pelikula');

//var ezkerGezia = document.getElementById('ezker-gezia');
//var eskuinGezia = document.getElementById('eskuin-gezia');

function karrusel (errenk) {
	var ezkerGezia = errenk.querySelector('.ezker-gezia');
	var eskuinGezia = errenk.querySelector('.eskuin-gezia');

	var pelikulak = errenk.querySelectorAll('.pelikula');

	eskuinGezia.addEventListener('click', () => {
		
		var karrusel = errenk.querySelector('.container-karrusel');
		karrusel.scrollLeft += karrusel.offsetWidth;
		var indikagailuAktibatuta = errenk.querySelector('.indikagailuak .aktibatuta');
		if(indikagailuAktibatuta.nextSibling){
			indikagailuAktibatuta.nextSibling.classList.add('aktibatuta');
			indikagailuAktibatuta.classList.remove('aktibatuta');
		}
	});

	// ? ----- ----- Event Listener ezkerreko geziarentzat. ----- -----
	ezkerGezia.addEventListener('click', () => {
		
		var karrusel = errenk.querySelector('.container-karrusel');
		karrusel.scrollLeft -= karrusel.offsetWidth;
		var indikagailuAktibatuta = errenk.querySelector('.indikagailuak .aktibatuta');
		if(indikagailuAktibatuta.previousSibling){
			indikagailuAktibatuta.previousSibling.classList.add('aktibatuta');
			indikagailuAktibatuta.classList.remove('aktibatuta');
		}
	});

	// ? ----- ----- Orrikapena ----- -----
	var orriKop = Math.ceil(pelikulak.length / 5);
	for(let i = 0; i < orriKop; i++){
		var indikagailua = document.createElement('button');

		if(i === 0){
			indikagailua.classList.add('aktibatuta');
		}

		errenk.querySelector('.indikagailuak').appendChild(indikagailua);
		
		indikagailua.addEventListener('click', (e) => {
			var karrusel = errenk.querySelector('.container-karrusel');
			karrusel.scrollLeft = i * errenk.offsetWidth;
			errenk.querySelector('.indikagailuak .aktibatuta').classList.remove('aktibatuta');
			e.target.classList.add('aktibatuta');
		});
	}
}

for (var i = 0, len = errenkada.length; i < len; i++) {
    
	var errenk = errenkada[i];
	karrusel(errenk);

}






