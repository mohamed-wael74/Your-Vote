function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown menu if the user clicks outside of it
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

//   var button = document.querySelector(".create-election");

//   button.onclick = function(){
//     location.replace("election.php")
// }

function myFuunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}


var btnClass = document.querySelector(".dropdown");

function myFunction(x) {
  x.classList.toggle("change");
  btnClass.classList.toggle("display")
}