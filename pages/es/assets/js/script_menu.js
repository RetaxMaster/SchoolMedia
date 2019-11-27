
$(document).ready(function(){

  //Toggle del menú
  $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
    }
  });

  $("#close-sidebar").click(function() {
    $(".page-wrapper").removeClass("toggled");
  });
  $("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
  });


 // FUNCIÓN PARA LOS ITEMS DEL MENÚ
  var cambio = false;
  $('.ulItemMenu li a').each(function(event){
      if(this.href.trim() == window.location){
      $(this).addClass('activeMenu');
      //$(this).prepend('<i></i>').addClass('iconMenu');
      cambio = true;
  }
  });

  if (!cambio) {
      $('.ulItemMenu li a:first').addClass('activeMenu');
      //$('.ulItemMenu li a i:first').addClass('iconMenu');
  }


});
