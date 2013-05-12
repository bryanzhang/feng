$(document).ready(function() {
//  $("img.slide_image").each(function() {
//    var h = this.height;
//    var liHeight = $("li.slide_item").css("height");
//    var t = Math.floor((parseInt(liHeight.substr(0, liHeight.length -2)) - parseInt(h)) /2);
//    this.style.marginTop = t + "px";
//  });
  $("a#btnReserve1").click(function() {
    showReserveBox(jsonData['name'], jsonData['id']);
  }); 
  $("a#btnReserve2").click(function() {
    showReserveBox(jsonData['name'], jsonData['id']);
  });
});
