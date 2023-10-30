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

  var continueOne = document.getElementById("continueone");
  var firstForm = document.querySelector(".vote-form");
  var secondForm = document.querySelector(".vote-form-two");
  var thirdForm = document.querySelector(".vote-form-three");
  var visa = document.querySelector(".imgone");
  var masterCard = document.querySelector(".imgtwo");
  var btnOne = document.querySelector(".btn-group .btn1");
  var btnTwo = document.querySelector(".btn-group .btn2");
  var btnThree = document.querySelector(".btn-group .btn3");

  continueOne.onclick = function(){
    if(firstForm.style.display=="block"){
        firstForm.style.display="none"
    }
    else{
        firstForm.style.display="block"
    }

    if(secondForm.style.display=="none"){
        secondForm.style.display="block"
    }

    btnOne.classList.remove("details")
    btnTwo.classList.add("details")
  }

  visa.onclick = function(){
    if(secondForm.style.display=="block"){
      secondForm.style.display="none"
    }

    if(thirdForm.style.display=="none"){
      thirdForm.style.display="block"
    }

    btnTwo.classList.remove("details")
    btnThree.classList.add("details")
  }
  masterCard.onclick = function(){
    if(secondForm.style.display=="block"){
      secondForm.style.display="none"
    }

    if(thirdForm.style.display=="none"){
      thirdForm.style.display="block"
    }

    btnTwo.classList.remove("details")
    btnThree.classList.add("details")
  }

  


  var btnFour = document.querySelector(".vote-form .btn4");
  var ul = document.getElementById("options");
  

  btnFour.onclick = function(){
    
    // for (var i = 3; i <= 20; ) {
      
    //   i;
    //  }
     

    var node = document.createElement("li");
    var input = document.createElement("input");
    ul.appendChild(node);
    node.appendChild(input);
    input.setAttribute("type" , "text");
    input.setAttribute("placeholder" , "Option" )

  }

  var btnClass = document.querySelector(".dropdown");

  function myFunction(x) {
    x.classList.toggle("change");
    btnClass.classList.toggle("display")
  }
