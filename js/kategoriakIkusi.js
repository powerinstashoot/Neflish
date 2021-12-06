function kategoria(izena,emaila) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    bideoakIkusi(this,izena,emaila);
    }
  };
  xhttp.open("GET", "../data/neflish_bideoak.xml", true);
  xhttp.send();
}

/**
 * 
 * @param {*} xml 
 * @param {*} kategoria 
 * @param {*} emaila 
 */
function bideoakIkusi(xml,kategoria,emaila) {

  let xmlDoc = xml.responseXML;
  let bideoak = xmlDoc.getElementsByTagName('bideoa');

  document.getElementById('bideoak').innerHTML = "";

  for (i = 0; i<bideoak.length; i++) {
    
    if(bideoak[i].getElementsByTagName('kategoria')[0].childNodes[0].nodeValue == kategoria){
      let divBideoa = document.createElement("div");
      divBideoa.className = "divBideoa";
      divBideoa.setAttribute('id', bideoak[i]['id']);

      let titulua = document.createElement("h2");
      titulua.textContent = bideoak[i].getElementsByTagName('titulua')[0].childNodes[0].nodeValue;
      divBideoa.appendChild(titulua);
      console.log(bideoak[i].getElementsByTagName('titulua')[0].childNodes[0].nodeValue);
      let kategoria = document.createElement("h3");
      kategoria.textContent = bideoak[i].getElementsByTagName('kategoria')[0].childNodes[0].nodeValue;
      divBideoa.appendChild(kategoria);
      console.log(bideoak[i].getElementsByTagName('azalpena')[0].childNodes[0]==null);
      if(bideoak[i].getElementsByTagName('azalpena')[0].childNodes[0]!=null){
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
      var aurkitua=false;
      for(j=0; j<bideoak[i].getElementsByTagName('likes')[0].getElementsByTagName('erabiltzailea').length; j++){
        if(emaila==bideoak[i].getElementsByTagName('likes')[0].getElementsByTagName('erabiltzailea')[j].childNodes[0].nodeValue){
          aurkitua = true;
          break;
        }else{
          aurkitua = false;
        }
      }
      if(aurkitua==true){
        let like = document.createElement("span");
        let heart = document.createElement("i");
        heart.style= "color:red";
        heart.className="fa fa-heart";
        heart.setAttribute('onclick', 'likeEman(this)');
        //heart.onclick = likeEman(this);
        like.appendChild(heart);
        divBideoa.appendChild(like);
      }else{
        let like = document.createElement("span");
        let heart = document.createElement("i");
        heart.className="fa fa-heart-o";
        heart.setAttribute('onclick', 'likeEman(this)');
        //heart.onclick = likeEman(this);
        like.appendChild(heart);
        divBideoa.appendChild(like);
      }
      document.getElementById('bideoak').appendChild(divBideoa);
    }
  }

  if(document.getElementById('bideoak').innerHTML == ""){
    let mezua = document.createElement("h2");
    mezua.textContent = "Kategoria honetan oraindik ez dago bideorik";
    mezua.style = "text-align:center; margin-top: 170px";
    document.getElementById('bideoak').appendChild(mezua);

  }

}
