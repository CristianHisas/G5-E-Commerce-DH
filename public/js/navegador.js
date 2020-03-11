window.addEventListener("load",function(){
    console.log(navigator.vendor=="Google Inc.");
    if(navigator.vendor=="Google Inc."){
        var cuadro=document.querySelector("div.text-j");
        console.log(cuadro);
        cuadro.style.color="white";
    }
});