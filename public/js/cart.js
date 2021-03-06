var cartRow;
var cartContainer;
var cart;
var nameMensaje, emailMensaje, phoneMensaje, addressMensaje;
var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

function scaleCart() {
  var maxWidth = 550;
  var $window = $(window);
  var width = $window.width();
  var height = $window.height();
  var scale;

  $('#cart_table').css({'-webkit-transform': 'top left'});
  $('#cart_table').css({'transform-origin': 'top left'});


  if(width >= maxWidth) {
      $('#cart_table').css({'-webkit-transform': ''});
      $('#cart_table').css({'transform': ''});
      return;
  }

  scale =width/maxWidth;

  $('#cart_table').css({'-webkit-transform': 'scale(' + scale + ')'});
  $('#cart_table').css({'transform': 'scale(' + scale + ')'});
}

$( window ).load(function() {
  scaleCart();
  $(window).resize(scaleCart);
  cartContainer = document.getElementById('cart_container');
  cartRow = document.getElementById('cart_item');
  var cartJSON = window.localStorage.getItem("cart");
  if (cartJSON) {
    cart = JSON.parse(cartJSON);
    loadCart();
  } else {
    $('#modalSent').modal('show');
    $('#modalMessage').html('El carrito está vacio, no ha seleccionado ningún producto para comprar.')
  }
  $('#send_order').click(sendOrder);
  $('#ok').click(function(){
    window.location.replace('/products');
  });
  attachMessages();
})

function loadCart() {
  cartContainer.innerHTML = "";
  cart.forEach(addItem);
  var total = 0;
  for (var idx in cart) {
    total += cart[idx].subtotal;
  }
  $('#total').text('$ ' + total.toFixed(2));
}

function changeQuantity(e, value) {
  var index = getChildIndex(e.target.parentElement.parentElement);
  cart[index].quantity += value;
  cart[index].quantity = Math.max(1, cart[index].quantity);
  cart[index].subtotal = cart[index].quantity * cart[index].price;
  window.localStorage.setItem("cart", JSON.stringify(cart))
  loadCart();
}

function incQuantity(e) {
    changeQuantity(e, 1);
}

function decQuantity(e) {
    changeQuantity(e, -1);
}

function addItem(cartItem) {
  var row = cartRow.cloneNode(true);
  $(row).removeAttr('hidden');
  var img = row.querySelector("#item_img");
  var name = row.querySelector('#item_name');
  var price = row.querySelector('#item_price');
  var quantity = row.querySelector('#item_quantity');
  var subtotal = row.querySelector('#item_subtotal');
  var itemDelete = row.querySelector('#item_delete');
  var plus = row.querySelector('#plus');
  plus.addEventListener('click', incQuantity);
  var minus = row.querySelector('#minus');
  minus.addEventListener('click', decQuantity);
  $(itemDelete).click(function(e) {
    var index = getChildIndex(e.target.parentElement);
    cart.splice(index, 1);
    if (cart.length > 0) {
      window.localStorage.setItem("cart", JSON.stringify(cart))
    } else {
      window.localStorage.removeItem("cart");
    }
    $('#msg_delete').removeAttr('hidden');
    loadCart();
  });

  img.src = cartItem.image;
  name.innerHTML = cartItem.name;
  price.innerHTML = '$ ' + cartItem.price.toFixed(2);
  quantity.innerHTML = cartItem.quantity;
  subtotal.innerHTML = '$ ' + cartItem.subtotal.toFixed(2);
  cartContainer.appendChild(row);
}

function getChildIndex(child){
    var parent = child.parentNode;
    var children = parent.children;
    var i = children.length - 1;
    for (; i >= 0; i--){
        if (child == children[i]){
            break;
        }
    }
    return i;
};

function attachMessages() {
  var nameContainer = document.getElementById('nameContainer');
  var phoneContainer = document.getElementById('phoneContainer');
  var emailContainer = document.getElementById('emailContainer');
  var addressContainer = document.getElementById('addressContainer');
  var mensaje = document.createElement('div');
  mensaje.style.display = "none";
  mensaje.style.color = "red";
  nameMensaje = mensaje.cloneNode();
  phoneMensaje = mensaje.cloneNode();
  emailMensaje = mensaje.cloneNode();
  addressMensaje = mensaje.cloneNode();

  nameMensaje.innerHTML = "El nombre es obligatorio.";
  phoneMensaje.innerHTML = "El teléfono es obligatorio.";
  emailMensaje.innerHTML = "El email es obligatorio.";
  addressMensaje.innerHTML = "La dirección es obligatoria.";
  nameContainer.appendChild(nameMensaje);
  phoneContainer.appendChild(phoneMensaje);
  emailContainer.appendChild(emailMensaje);
  addressContainer.appendChild(addressMensaje);
}


function sendOrder() {
  var name = $('#name').val();
  var phone = $('#phone').val();
  var email = $('#email').val();
  var address = $('#address').val();

  var CSRF_TOKEN = $('#token').text();
  nameMensaje.style.display="none";
  phoneMensaje.style.display="none";
  emailMensaje.style.display="none";
  addressMensaje.style.display="none";
  if (!name) nameMensaje.style.display="block";
  if (!phone) phoneMensaje.style.display="block";
  if (!email) emailMensaje.style.display="block";
  if (!address) addressMensaje.style.display="block";
  var validEmail = regexMail.test(email);
  if(!validEmail) {
    emailMensaje.innerHTML = "Introducir un email válido.";
    emailMensaje.style.display = "block";
  }

  if (name && phone && email && validEmail && address)
  {
  $.ajax({
    url: '/carrito',
    type: 'POST',
    data: {_token: CSRF_TOKEN, name: name, phone: phone, email: email, address: address, cart: cart},
    dataType: 'JSON',
    success: function (data) {
        console.log(data);
    }
  });
  window.localStorage.removeItem('cart');
  $('#modalSent').modal('show');
  }
}
