var cart;
$( window ).load(function() {
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
}
