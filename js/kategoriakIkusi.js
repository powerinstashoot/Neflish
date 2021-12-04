function kategoria(izena) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    bideoakIkusi(this,izena);
    }
  };
  xhttp.open("GET", "bisitak.xml", true);
  xhttp.send();
}

function bideoakIkusi(xml,kategoria) {

  let xmlDoc = xml.responseXML;
  let bideoak = xml.getElementsByTagName('bideoa');

  for (i = 0; i < bideoak.length; i++) {

    if()
  }

}
