function llamar_id(id){
  return document.getElementById(id);
}

var form = llamar_id('editar_perfil');
var nombre = llamar_id('nombre');
var email = llamar_id('email');
var password = llamar_id('password');
var password_confirm = llamar_id('password_confirm');
var btn_actualizar = llamar_id('actualizar');
var pass_inc = llamar_id('pass_inc');
var inputs = document.querySelectorAll('[pattern]');

for(var i = 0; i < inputs.length; i++){
  inputs[i].oninput = function(){
    if(this.validity.patternMismatch){
      this.setCustomValidity(this.dataset.msj);
    } else {
      this.setCustomValidity('');
    }
  }
}
form.onsubmit = function(){
    var enviar = true;
    var pass_val = password.value;
    var passo_conf_val = password_confirm.value;

    if(pass_val != passo_conf_val){
      enviar = false;
      var aviso = document.createElement('p');
          aviso.innerHTML = '¡Las contraseñas no coinciden!';
          aviso.className = 'pass_error';
      pass_inc.appendChild(aviso);
    } else {
      enviar = true;
    }

    return enviar;
}
