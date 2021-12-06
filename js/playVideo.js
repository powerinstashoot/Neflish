
var currentVideo;
function popup_video(titulua, azalpena, irudiURL, bideoURL) {
    var bideoKutxa = document.getElementById("bideoKutxa");
    var irudi = bideoKutxa.querySelector("img");
    var kutxaTitulua = bideoKutxa.querySelector("h3");
    var kutxaAzalpena = bideoKutxa.querySelector("p");
    kutxaTitulua.innerText = titulua;
    kutxaAzalpena.innerText = azalpena;
    irudi.src = irudiURL;
    var arr = bideoURL.split("/");
    currentVideo = arr.at(-1); //arrayko azken elementua
    //player.loadVideoById(keyVideo);
    bideoKutxa.style.display = "block";
}

function popup_itxi() {
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
  
  player.playVideo();//won't work on mobile

  
  var requestFullScreen = iframe.requestFullScreen || iframe.mozRequestFullScreen || iframe.webkitRequestFullScreen;
  if (requestFullScreen) {
    requestFullScreen.bind(iframe)();
  }
}