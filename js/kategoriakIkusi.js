function kategoria(izena) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    bideoakIkusi(this,izena);
    }
  };
  xhttp.open("GET", "../data/neflish_bideoak.xml", true);
  xhttp.send();
}

function bideoakIkusi(xml,kategoria) {

  let xmlDoc = xml.responseXML;
  let bideoak = xmlDoc.getElementsByTagName('bideoa');

  document.getElementById('bideoak').innerHTML = "";

  for (i = 0; i < bideoak.length; i++) {

    if(bideoak[i].getElementsByTagName('kategoria')[0].childNodes[0].nodeValue == kategoria){

      let divBideoa = document.createElement("div");
      divBideoa.className = "divBideoa";

      let titulua = document.createElement("h2");
      titulua.textContent = bideoak[i].getElementsByTagName('titulua')[0].childNodes[0].nodeValue;
      divBideoa.appendChild(titulua);

      let kategoria = document.createElement("h3");
      kategoria.textContent = bideoak[i].getElementsByTagName('kategoria')[0].childNodes[0].nodeValue;
      divBideoa.appendChild(kategoria);

      if(bideoak[i].getElementsByTagName('azalpena')[0].childNodes[0].nodeValue != ""){

        let azalpena = document.createElement("p");
        azalpena.textContent = bideoak[i].getElementsByTagName('azalpena')[0].childNodes[0].nodeValue;
        divBideoa.appendChild(azalpena);
      }

      let bideoa = document.createElement("iframe");
      bideoa.width = "430";
      bideoa.height ="315";
      bideoa.src = bideoak[i].getElementsByTagName('linka')[0].childNodes[0].nodeValue;
      bideoa.setAttribute("allowfullscreen","");
      divBideoa.appendChild(bideoa);


      document.getElementById('bideoak').appendChild(divBideoa);
    }
  }

}
