//var buttonOne = document.querySelector(".signup");

             // buttonOne.onclick = function(){
             // location.replace("signup.php")
             // }

            //var buttonTwo = document.querySelector(".signin");

            //  buttonTwo.onclick = function(){
            //  location.replace("login.php")}




var features = document.getElementById("features");
var how = document.getElementById("how");
var others = document.getElementById("others");

features.onclick = function(){
    window.scrollTo(
        {
            top :1300,
            behavior : 'smooth'
        }
    );
}
how.onclick = function(){
    window.scrollTo(
        {
            top :2720,
            behavior : 'smooth'
        }
    );
}
others.onclick = function(){
    window.scrollTo(
        {
            top :2040,
            behavior : 'smooth'
        }
    );
}



var btnClass = document.querySelector(".navbar-buttons");


function myFunction(x) {
    x.classList.toggle("change");
    btnClass.classList.toggle("display")
  }