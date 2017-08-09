var input = document.getElementById('buscador_input');
var listita = document.getElementById('opciones');

input.oninput = function() {
  listita.innerHTML = '';
  var busqueda = this.value.trim();
  if(busqueda.length > 3){
    var ajax = new XMLHttpRequest();
        ajax.open('POST', 'ajax/buscador_ajax.php', true);
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        ajax.send('item=' + busqueda);
        ajax.onreadystatechange = function() {
          if(ajax.readyState == 4){
            var json = JSON.parse(ajax.responseText);
            for(var i = 0; i < json.length; i++){
              listita.innerHTML += "<li><a href='index.php?buscar="+json[i].ID+"'>"+json[i].NOMBRE+"</a></li>";
            }
          }
        }
  }
}
