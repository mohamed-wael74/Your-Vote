function myFuunction() {
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

  var add = document.getElementById("add");

  add.onclick = function(){
    location.replace("payment.html")
}





  var announcment = document.getElementById("announcment");
  var announcmentt = document.getElementById("announcmentt");

  announcment.onclick = function(){
    location.replace("announcment.html")
}
  announcmentt.onclick = function(){
    location.replace("announcment.html")
}


var btnClass = document.querySelector(".dropdownn");


function myFunction(x) {
    x.classList.toggle("change");
    btnClass.classList.toggle("display")
  }
