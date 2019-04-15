// determines the height of nav bar plus buffer
let navOffset = $("ul").height() + 260;

// function for animated nav scroll
$("ul li a").click(function(e) {

  //    alert("HEY!");

  // prevents browser from doing a default click
  e.preventDefault();

  // finds the position of selected link/ID
  let idPosNav = $($(this).attr("href")).offset().top - navOffset;

  // animates to selected section position
  $("body, html").animate({
    scrollTop: idPosNav
  }, 1000, "easeInOutQuad");

});