/*function kategoria(izena,emaila) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    bideoakIkusi(this,izena,emaila);
    }
  };
  xhttp.open("GET", "../data/neflish_bideoak.xml", true);
  xhttp.send();
}

*/


/**
 * 
 * @param {*} xml 
 * @param {*} kategoria 
 * @param {*} emaila 
 */
 /*
function bideoakIkusi(xml,kategoria,emaila) {

  let xmlDoc = xml.responseXML;
  let bideoak = xmlDoc.getElementsByTagName('bideoa');

  document.getElementById('bideoak').innerHTML = "";

  //Kategoria baten karrusela eratzen

  let div1 = document.createElement("div");
  div1.className = "kategoria-estiloa";
  let div2 = document.createElement("div");
  div2.className = "container-titulua-kontrolak";
  let kat= document.createElement("h3");
  kat.innerHTML = kategoria;
  let div3 = document.createElement("div");
  div3.className = "indikagailuak";
  let div4 = document.createElement("div");
  div4.className = "container-nagusia";
  let ezkerbotoi = document.createElement("button");
  ezkerbotoi.className= "ezker-gezia";
  ezkerbotoi.setAttribute("id", "ezker-gezia");
  let gezObjektua = document.createElement("i");
  gezObjektua.className= "fas fa-angle-left";
  let div5 = document.createElement("div");
  div5.className = "container-karrusel";
  let div6 = document.createElement("div");
  div6.className = "karrusel";

  div2.appendChild(kat);
  div2.appendChild(div3);
  div1.appendChild(div2);
  ezkerbotoi.appendChild(gezObjektua);
  div4.appendChild(ezkerbotoi);


  var kont=0;

  for (i = 0; i<bideoak.length; i++) {
    if(bideoak[i].getElementsByTagName('kategoria')[0].childNodes[0].nodeValue == kategoria){
      kont++;
      var titulua=bideoak[i].getElementsByTagName('titulua')[0].childNodes[0].nodeValue;
      var azalpena= bideoak[i].getElementsByTagName('azalpena')[0].childNodes[0].nodeValue;
      var irudia= bideoak[i].getElementsByTagName('irudia')[0].childNodes[0].nodeValue;
      var linka= bideoak[i].getElementsByTagName('linka')[0].childNodes[0].nodeValue;
      var bideoId=bideoak[i]['id'];

      var emanda=false;
      for(j=0; j<bideoak[i].getElementsByTagName('likes')[0].getElementsByTagName('erabiltzailea').length; j++){
        console.log(bideoak[i].getElementsByTagName('likes')[0].getElementsByTagName('erabiltzailea').length);
        if(emaila==bideoak[i].getElementsByTagName('likes')[0].getElementsByTagName('erabiltzailea')[j].childNodes[0].nodeValue){
          emanda=true;
          break;
        }
      }

      let divBideoa = document.createElement("div");
      divBideoa.className = "divBideoa pelikula";
      divBideoa.setAttribute('id', bideoId);

      let irudiaEl= document.createElement("img");
      irudiaEl.setAttribute("src", irudia);
      irudiaEl.setAttribute("alt", titulua);
      irudiaEl.setAttribute("onclick", "popup_video('"+titulua+"','"+azalpena+"','"+irudia+"','"+linka+"','"+bideoId+"','"+emanda+"')");

      divBideoa.appendChild(irudiaEl);
      div6.appendChild(divBideoa);
 
      
    }
  }
  let eskuinbotoi =document.createElement("button");
  eskuinbotoi.className= "eskuin-gezia";
  eskuinbotoi.setAttribute("id","eskuin-gezia");

  let gezObjektua2 = document.createElement("i");
  gezObjektua2.className= "fas fa-angle-right";

  eskuinbotoi.appendChild(gezObjektua2);
  

  div5.appendChild(div6);
  div4.appendChild(div5);
  div4.appendChild(eskuinbotoi);

  div1.appendChild(div4);

  document.getElementById('bideoak').appendChild(div1);

  if(kont==0){
    document.getElementById('bideoak').innerHTML == ""
    let mezua = document.createElement("h2");
    mezua.textContent = "Kategoria honetan oraindik ez dago bideorik";
    mezua.style = "text-align:center; margin-top: 170px";
    document.getElementById('bideoak').appendChild(mezua);

  }

}

*/
function kategoria(Kategoria){
  var katArray= document.getElementsByClassName('kategoria-estiloa');
  for (var i=0; i< katArray.length ; i++) {
    var titulua= katArray[i].getElementsByTagName("h3")[0].innerText;
    if (titulua==Kategoria) {
      katArray[i].style.display="grid";
    }else{
      katArray[i].style.display="none";
    }
  }
  
}