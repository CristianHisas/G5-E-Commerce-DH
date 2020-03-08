window.onload = function(){
    setTimeout(zoomMover(),1000);
function zoomMover(){
    document.getElementById("imgPrincipal").addEventListener("mouseover", imageZoom(document.getElementById("imgPrincipal").getAttribute("id"),document.getElementById("myresult").getAttribute("id")));

}
document.querySelector(".img-zoom-container").addEventListener("mouseout",function(){
    console.log(document.querySelector(".cuadro-max"));
    document.querySelector(".img-zoom-lens").style.visibility="hidden";
    document.getElementById("myresult").style.visibility="hidden";
  });

  var imgProducto = document.querySelectorAll(".cuadro-mini");


  imgProducto.forEach(function(item){
    item.addEventListener("click", function(){
      var imgPrincipal = document.querySelector(".img-telefono");
      var imgA = imgPrincipal.getAttribute("src");

      imgPrincipal.setAttribute("src", item.getAttribute("src"));
      item.setAttribute("src", imgA);
      setTimeout(zoomMover(),1000);
    });



  });
  function imageZoom(imgID, resultID) {
    var img, lens, result, cx, cy;
    img = document.getElementById(imgID);
    console.log(img);
    lens=document.querySelector(".img-zoom-lens");
    result = document.getElementById(resultID);
    /* Calculate the ratio between result DIV and lens: */
    cx = result.offsetWidth / lens.offsetWidth;
    cy = result.offsetHeight / lens.offsetHeight;

    /* Set background properties for the result DIV */
    result.style.backgroundImage = "url('" + img.src + "')";
    result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
    /* Execute a function when someone moves the cursor over the image, or the lens: */

    lens.addEventListener("mousemove", moveLens);
    img.addEventListener("mousemove", moveLens);
    /* And also for touch screens: */
    lens.addEventListener("touchmove", moveLens);
    img.addEventListener("touchmove", moveLens);
    function moveLens(e) {
        result.style.visibility="visible";
        document.querySelector(".img-zoom-lens").style.visibility="visible";

      var pos, x, y;
      /* Prevent any other actions that may occur when moving over the image */
      e.preventDefault();
      /* Get the cursor's x and y positions: */
      pos = getCursorPos(e);
      /* Calculate the position of the lens: */
      x = pos.x - (lens.offsetWidth / 2);
      y = pos.y - (lens.offsetHeight / 2);
      /* Prevent the lens from being positioned outside the image: */
      if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
      if (x < 0) {x = 0;}
      if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
      if (y < 0) {y = 0;}
      /* Set the position of the lens: */
      lens.style.left = x + "px";
      lens.style.top = y + "px";
      /* Display what the lens "sees": */
      result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
    }
    function getCursorPos(e) {
      var a, x = 0, y = 0;
      e = e || window.event;
      /* Get the x and y positions of the image: */
      a = img.getBoundingClientRect();
      /* Calculate the cursor's x and y coordinates, relative to the image: */
      x = e.pageX - a.left;
      y = e.pageY - a.top;
      /* Consider any page scrolling: */
      x = x - window.pageXOffset;
      y = y - window.pageYOffset;
      return {x : x, y : y};
    }
  }

}
