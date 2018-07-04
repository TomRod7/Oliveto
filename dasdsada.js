for (var i = 0; i < campos.length; i++) {
  if(campos[i].tagName != 'BUTTON'){
  campos[i].addEventListener('blur', function(e){
    console.log('blur', e.target)

    // this.className = '';
    var error = this.nextElementSibling;
  	if (this.value === '') {
  		// this.className = 'errores';
  		error.innerText = 'Debes completar este campo.';
  	} else if (this.name == 'email') {
  	  if (!regexMail.test(this.value)) {
  	    error.innerText = 'Introducir un email válido.';
  	  }else {
  	    error.innerText = '';
  	  }
  	 } else {
  		  error.innerText = '';
  		  // this.className = '';
  	 }
    });
  }
}
