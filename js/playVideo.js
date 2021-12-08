var currentVideo;

function popup_video(titulua, azalpena, irudiURL, bideoURL, bideoId, emanda) {
  $('body').css('overflow', 'hidden');
  var bideoKutxa = document.getElementById("bideoKutxa");
  var irudiaKutxa = document.getElementById("irudiaKutxa");
  var infoKutxa= document.getElementById("infoKutxa");
  irudiaKutxa.style.backgroundImage = "url("+irudiURL+")";
  var kutxaTitulua = bideoKutxa.querySelector("h3");
  var kutxaAzalpena = bideoKutxa.querySelector("p");
  kutxaTitulua.setAttribute('id',bideoId);
  kutxaTitulua.innerText = titulua;
  kutxaAzalpena.innerText = azalpena;
  var arr = bideoURL.split("/");
  currentVideo = arr.at(-1); //arrayko azken elementua
  //player.loadVideoById(keyVideo);
  bideoKutxa.style.display = "grid";
  infoKutxa.style.display="inline-block";
  var bihotza = document.getElementById("bihotza");
  if(emanda=="false"){
    bihotza.classList.remove('fa' , 'fa-heart');
    bihotza.classList.add('fa', 'fa-heart-o');
    bihotza.style.color="";
  }else{
    bihotza.classList.remove('fa', 'fa-heart-o');
    bihotza.classList.add('fa' , 'fa-heart');
    bihotza.style.color="red";
  }
     
  }

function popup_itxi() {
  $('body').css('overflow', 'visible');
  var bideoKutxa = document.getElementById("bideoKutxa");
  bideoKutxa.style.display = "none";
}

function bideoa_itxi() {
  var bideoTxikia = document.getElementById("playerWrapper");
  bideoTxikia.style.display="none";
  player.stopVideo();

}

var player, iframe;
var $qs = document.querySelector.bind(document);


// init player
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
    height: '200',
    width: '300',
    videoId: 'a',
    events: {
      'onReady': onPlayerReady
    }
  });
}

// when ready, wait for clicks
function onPlayerReady(event) {
  var player = event.target;
  iframe = $qs('#player');
  setupListener(); 
}

function setupListener (){
    $qs('#playFull').addEventListener('click', playFullscreen);
}

function playFullscreen (){
  popup_itxi();
  var bideoTxikia = document.getElementById("playerWrapper");
  bideoTxikia.style.display="block";
  player.loadVideoById(currentVideo);
  console.log(currentVideo);
  player.playVideo();//won't work on mobile

  var requestFullScreen = iframe.requestFullScreen || iframe.mozRequestFullScreen || iframe.webkitRequestFullScreen;
  if (requestFullScreen) {
    requestFullScreen.bind(iframe)();
  }
}
