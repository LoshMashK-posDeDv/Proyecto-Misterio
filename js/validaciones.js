function llamar_id(id) {
    return document.getElementById(id);
}

var form = llamar_id('editar_perfil');

/* CAMPOS */
var nombre = llamar_id('nombre');
var email = llamar_id('email');
var edad = llamar_id('edad');
var nick = llamar_id('nick');
var password = llamar_id('password');
var password_confirm = llamar_id('password_confirm');

/* BTN */
var btn_actualizar = llamar_id('actualizar');

/*  ONSUBMIT  */
form.onsubmit = function() {

    var reg_nombre = /^[\w\s\á\é\í\ó\ú]{3,50}$/i;
    var val_nombre = nombre.value;

    var reg_email = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
    var val_email = email.value;

    var reg_nick = /^[\d\w\s]{3,50}$/i;
    var val_nick = nick.value;

    var reg_edad = /^([0-9]{1,3})?$/;
    var val_edad = edad.value;

    var reg_password = /^([a-z0-9]{6,15})?$/i;
    var val_password = password.value;

    if (reg_nombre.test(val_nombre) == false) {
        nombre.style.border = '2px solid #da1515';
    } else {
        nombre.style.border = '2px solid #59c559';
    }

    if (reg_email.test(val_email) == false) {
        email.style.border = '2px solid #da1515';
    } else {
        email.style.border = '2px solid #59c559';
    }

    if (reg_nick.test(val_nick) == false) {
        nick.style.border = '2px solid #da1515';
    } else {
        nick.style.border = '2px solid #59c559';
    }

    if (reg_edad.test(val_edad) == false || val_edad == '0') {
        edad.style.border = '2px solid #da1515';
    } else {
        edad.style.border = '2px solid #59c559';
    }

    if (reg_password.test(val_password) == false) {
        password.style.border = '2px solid #da1515';
    } else {
        password.style.border = '2px solid #59c559';

        if (val_password != password_confirm.value) {
            password.style.border = '2px solid #da1515';
            password_confirm.style.border = '2px solid #da1515';
        } else {
           password.style.border = '2px solid #59c559';
           password_confirm.style.border = '2px solid #59c559';
        }
    }    

    if (reg_nombre.test(val_nombre) == false  || reg_email.test(val_email) == false || reg_nick.test(val_nick) == false || reg_edad.test(val_edad) == false || val_edad == '0' || reg_password.test(val_password) == false || val_password != password_confirm.value) {
        return false;
    }
}