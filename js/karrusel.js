const errenkada = document.querySelector('.container-karrusel');
const pelikulak = document.querySelectorAll('.pelikula');

const ezkerGezia = document.getElementById('ezker-gezia');
const eskuinGezia = document.getElementById('eskuin-gezia');

// ? ----- ----- Event Listener eskuineko geziarentzat. ----- -----
eskuinGezia.addEventListener('click', () => {
	errenkada.scrollLeft += errenkada.offsetWidth;

	const indikagailuAktibatuta = document.querySelector('.indikagailuak .aktibatuta');
	if(indikagailuAktibatuta.nextSibling){
		indikagailuAktibatuta.nextSibling.classList.add('aktibatuta');
		indikagailuAktibatuta.classList.remove('aktibatuta');
	}
});

// ? ----- ----- Event Listener ezkerreko geziarentzat. ----- -----
ezkerGezia.addEventListener('click', () => {
	errenkada.scrollLeft -= errenkada.offsetWidth;

	const indikagailuAktibatuta = document.querySelector('.indikagailuak .aktibatuta');
	if(indikagailuAktibatuta.previousSibling){
		indikagailuAktibatuta.previousSibling.classList.add('aktibatuta');
		indikagailuAktibatuta.classList.remove('aktibatuta');
	}
});

// ? ----- ----- Orrikapena ----- -----
const orriKop = Math.ceil(pelikulak.length / 5);
for(let i = 0; i < orriKop; i++){
	const indikagailua = document.createElement('button');

	if(i === 0){
		indikagailua.classList.add('aktibatuta');
	}

	document.querySelector('.indikagailuak').appendChild(indikagailua);
	indikagailua.addEventListener('click', (e) => {
		errenkada.scrollLeft = i * errenkada.offsetWidth;

		document.querySelector('.indikagailuak .aktibatuta').classList.remove('aktibatuta');
		e.target.classList.add('aktibatuta');
	});
}

// ? ----- ----- Hover ----- -----
pelikulak.forEach((pelikula) => {
	pelikula.addEventListener('mouseenter', (e) => {
		const elementua = e.currentTarget;
		setTimeout(() => {
			pelikulak.forEach(pelikula => pelikula.classList.remove('hover'));
			elementua.classList.add('hover');
		}, 100);
	});
});

errenkada.addEventListener('mouseleave', () => {
	pelikulak.forEach(pelikula => pelikula.classList.remove('hover'));
});