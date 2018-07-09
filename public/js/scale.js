function scaleSlider() {
  var maxWidth = 600;
  var $window = $(window);
  var width = $window.width();
  var height = $window.height();
  var scale;

  $('#contenedor1').css({'-webkit-transform': 'top left'});
  $('#contenedor1').css({'transform-origin': 'top left'});


  if(width >= maxWidth) {
      $('#contenedor1').css({'-webkit-transform': ''});
      $('#contenedor1').css({'transform': ''});
      return;
  }

  scale =width/maxWidth;

  $('#contenedor1').css({'-webkit-transform': 'scale(' + scale + ')'});
  $('#contenedor1').css({'transform': 'scale(' + scale + ')'});
}

$( window ).load(function() {
  scaleProducts();
  $(window).resize(scaleProducts);
});
