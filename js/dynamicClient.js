
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function onClickMenu() {
  event.preventDefault();
  var menua=document.getElementById("myDropdown");
  menua.classList.toggle("show");
  if(menua.classList.contains("show")){
    document.getElementById("gezia").classList.remove('fa-sort-down');
    document.getElementById("gezia").classList.add('fa-sort-up');
  }else{
    document.getElementById("gezia").classList.add('fa-sort-down');
    document.getElementById("gezia").classList.remove('fa-sort-up');
  }
  
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

/*
//STICKY NAVBAR
// When the user scrolls the page, execute myFunction
window.onscroll = function() {stickyNavbar()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function stickyNavbar() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    alert("asd");
  } else {
    navbar.classList.remove("sticky");
  }
}
*/
function balidatu(f) {
  var titulua = document.getElementById("titulua");
  var linka = document.getElementById("linka");
  var azalpena = document.getElementById("azalpena");
  var kategoria = document.getElementById("kategoria");
  if (titulua.value=="") {
    alert("Titulua adieraztea derrigorrezkoa da.");
    return false;
  }
  if (linka.value=="") {
    alert("Linka adieraztea derrigorrezkoa da.");
    return false;
  }
  return true;

}
