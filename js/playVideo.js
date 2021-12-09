var currentVideo;

/*
Pelikula bat klikatzean popup-a azaltzeko funtzioa
*/
function popup_video(titulua, azalpena, irudiURL, bideoURL, bideoId, emanda) {
  $('body').css('overflow', 'hidden');
  $('main').css('opacity', '0.05');
  $('.kategoria-estiloa').css('opacity', '0.05');
  $('footer').css('opacity', '0.05');
  $('.dropdown').css('opacity', '0.05');
  $('.bideoakKutxa').css('opacity', '0.05');
  $('header').css('opacity', '0.05');
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
/*
Popup-a ixteko funtzioa
*/
function popup_itxi(emanda, bideoId) {
  $('body').css('overflow', 'visible');
  $('main').css('opacity', '1');
  $('.kategoria-estiloa').css('opacity', '1');
  $('footer').css('opacity', '1');
  $('.dropdown').css('opacity', '1');
  $('.bideoakKutxa').css('opacity', '1');
  $('header').css('opacity', '1');
  var bideoKutxa = document.getElementById("bideoKutxa");
  bideoKutxa.style.display = "none";
  var url = $(location).attr('href');
  if(url.indexOf("bideoGustokoak")>=0){
    if(emanda=="false"){
      $('.topBideoa#'+bideoId).css("display", "none");
    }else{
      $('.topBideoa#'+bideoId).css("display", "block");
    }
  }

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
/*
Pelikula pantaila txikian dagoenean,

*/
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

/*------------Pelikula Nagusia----------*/
function playFullscreenNagusia(){
  popup_itxi();
  currentVideo = "5TdgJW8Mzz4";
  var bideoTxikia = document.getElementById("playerWrapper");
  bideoTxikia.style.display="block";
  player.loadVideoById(currentVideo);
  player.playVideo();//won't work on mobile
  var requestFullScreen = iframe.requestFullScreen || iframe.mozRequestFullScreen || iframe.webkitRequestFullScreen;
  if (requestFullScreen) {
    requestFullScreen.bind(iframe)();
  }
}
