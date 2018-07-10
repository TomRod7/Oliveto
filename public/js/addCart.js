var cart;

function scaleProducts() {
  var maxWidth = 600;
  var $window = $(window);
  var width = $window.width();
  var height = $window.height();
  var scale;

  $('#products_table').css({'-webkit-transform': 'top left'});
  $('#products_table').css({'transform-origin': 'top left'});


  if(width >= maxWidth) {
      $('#products_table').css({'-webkit-transform': ''});
      $('#products_table').css({'transform': ''});
      return;
  }

  scale =width/maxWidth;

  $('#products_table').css({'-webkit-transform': 'scale(' + scale + ')'});
  $('#products_table').css({'transform': 'scale(' + scale + ')'});
}

$( window ).load(function() {
  scaleProducts();
  $(window).resize(scaleProducts);
  var cartJSON = window.localStorage.getItem("cart");
  if (cartJSON) {
    cart = JSON.parse(cartJSON);
  } else {
    cart = [];
  }
  $('.btn-cart').prop('disabled', false);
  $('.btn-cart').on('click', function(ev){
    var id = $(this).val();
    $('#product_name').text( $(this).attr('data-name') );
    $('#product_category').text( $(this).attr('data-category') );
    $('#product_id').val(id);
    $('#quantity').val(1);
    $('#product_price').val( $(this).attr('data-price') );
    $('#product_image').val( $(this).attr('data-image') );
    $('.model-content input[name]')
  });
  $('#btnAddToCart').on('click', addToCart);

});

function addToCart(e)
{
  var price = parseFloat($('#product_price').val());
  var subtotal = price * parseInt($('#quantity').val());
  var cartItem = {
    id: parseInt($('#product_id').val()),
    name: $('#product_name').html(),
    quantity: parseInt($('#quantity').val()),
    price: price,
    subtotal: subtotal,
    image: $('#product_image').val()
  }
  cart.push(cartItem);
  window.localStorage.setItem("cart", JSON.stringify(cart));
  $('#modalAddtoCart').modal('toggle');
  $('#msg_add').removeAttr('hidden');
}
