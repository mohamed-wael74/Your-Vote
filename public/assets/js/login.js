var voter = document.querySelector(".voter");
var formOne = document.querySelector("table .form-one");
var formTwo = document.querySelector("table .form-two");


voter.onclick = function(){
    if(formOne.style.display=="none"){
        formOne.style.display="block"
    }
    else{
        formOne.style.display="none"
    }

    if(formTwo.style.display=="block" ){
        formTwo.style.display="none"
    }
    
    voter.classList.toggle("voter-click")
    organization.classList.remove("organization-click")
}



var organization = document.querySelector(".organization");

organization.onclick = function(){
    if(formTwo.style.display=="none"){
        formTwo.style.display="block"
    }
    else{
        formTwo.style.display="none"
    }

    if(formOne.style.display=="block" ){
        formOne.style.display="none"
    }
    
    voter.classList.remove("voter-click")

    organization.classList.toggle("organization-click")
}





