function scaleAdminC() {
  var maxWidth = 404;
  var $window = $(window);
  var width = $window.width();
  var height = $window.height();
  var scale;

  $('#admin_categories').css({'-webkit-transform': 'top left'});
  $('#admin_categories').css({'transform-origin': 'top left'});


  if(width >= maxWidth) {
      $('#admin_categories').css({'-webkit-transform': ''});
      $('#admin_categories').css({'transform': ''});
      return;
  }

  scale =width/maxWidth;

  $('#admin_categories').css({'-webkit-transform': 'scale(' + scale + ')'});
  $('#admin_categories').css({'transform': 'scale(' + scale + ')'});
}

function scaleAdminP() {
  var maxWidth = 456;
  var $window = $(window);
  var width = $window.width();
  var height = $window.height();
  var scale;

  $('#admin_products').css({'-webkit-transform': 'top left'});
  $('#admin_products').css({'transform-origin': 'top left'});


  if(width >= maxWidth) {
      $('#admin_products').css({'-webkit-transform': ''});
      $('#admin_products').css({'transform': ''});
      return;
  }

  scale =width/maxWidth;

  $('#admin_products').css({'-webkit-transform': 'scale(' + scale + ')'});
  $('#admin_products').css({'transform': 'scale(' + scale + ')'});
}

$( window ).load(function() {
  scaleAdminC();
  $(window).resize(scaleAdminC);
  scaleAdminP();
  $(window).resize(scaleAdminP);
})
