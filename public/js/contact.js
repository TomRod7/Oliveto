var nameMensaje, emailMensaje, phoneMensaje, addressMensaje, messageMensaje;
var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

$( window ).load(function() {
  $('#send_contact').click(sendContact);
  $('#ok').click(function(){
    window.location.replace('/');
  });
  attachMessages();
})

function attachMessages() {
  var nameContainer = document.getElementById('nameContainer');
  var emailContainer = document.getElementById('emailContainer');
  var phoneContainer = document.getElementById('phoneContainer');
  var addressContainer = document.getElementById('addressContainer');
  var messageContainer = document.getElementById('messageContainer');
  var mensaje = document.createElement('div');
  mensaje.style.display = "none";
  mensaje.style.color = "red";
  nameMensaje = mensaje.cloneNode();
  phoneMensaje = mensaje.cloneNode();
  emailMensaje = mensaje.cloneNode();
  addressMensaje = mensaje.cloneNode();
  messageMensaje = mensaje.cloneNode();

  nameMensaje.innerHTML = "El nombre es obligatorio.";
  phoneMensaje.innerHTML = "El teléfono es obligatorio.";
  emailMensaje.innerHTML = "El email es obligatorio.";
  addressMensaje.innerHTML = "La dirección es obligatoria.";
  messageMensaje.innerHTML = "Este campo es obligatorio.";
  nameContainer.appendChild(nameMensaje);
  phoneContainer.appendChild(phoneMensaje);
  emailContainer.appendChild(emailMensaje);
  addressContainer.appendChild(addressMensaje);
  messageContainer.appendChild(messageMensaje);
}

function sendContact() {
  var name = $('#name').val();
  var phone = $('#phone').val();
  var email = $('#email').val();
  var address = $('#address').val();
  var message = $('#message').val();

  var CSRF_TOKEN = $('#token').text();
  nameMensaje.style.display = "none";
  phoneMensaje.style.display = "none";
  emailMensaje.style.display = "none";
  addressMensaje.style.display = "none";
  messageMensaje.style.display = "none";
  if (!name) nameMensaje.style.display = "block";
  if (!phone) phoneMensaje.style.display = "block";
  if (!email) emailMensaje.style.display = "block";
  if (!address) addressMensaje.style.display = "block";
  if (!message) messageMensaje.style.display = "block";
  var validEmail = regexMail.test(email);
  if(!validEmail) {
    emailMensaje.innerHTML = "Introducir un email válido.";
    emailMensaje.style.display = "block";
  }

  if (name && phone && email && validEmail && address && message)
  {
    $.ajax({
      url: '/contacto',
      type: 'POST',
      data: {_token: CSRF_TOKEN, name: name, phone: phone, email: email, address: address, message: message},
      dataType: 'JSON',
      success: function (data) {
          console.log(data);
      }
    });
    $('#modalSent').modal('show');
  }
}
