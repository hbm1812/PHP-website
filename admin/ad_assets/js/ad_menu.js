
 var obj = document.getElementById('nav__menu1');
 nav__menu1.onmouseover = function() {
     document.getElementById("nav__menu1").style.transform= "translateX(0%)";
     document.getElementById("nav__menu1").style.transition= "transform linear 0.2s;";
     document.getElementById("nav__content").style.transform= "translateX(0%)";
     document.getElementById("nav__content").transition= "transform linear 0.2s";
 };
 nav__menu1.onmouseout = function() {
     document.getElementById("nav__menu1").style.transform= "translateX(-69%)";
     document.getElementById("nav__menu1").style.transition= "transform linear 0.2s";
     document.getElementById("nav__content").style.transform= "translateX(72%)";
     document.getElementById("nav__content").style.transition= "transform linear 0.2s";
 };

//  window.onload=function(){
//     document.getElementById("nav__menu1").style.transform= "translateX(-69%)";

//  }
