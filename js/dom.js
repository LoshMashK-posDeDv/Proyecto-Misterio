
var gordo = false;
var sable = document.getElementById("sable");
var divsinNoo = document.getElementById("noo");

function noEsColeccionable(){

	if(gordo){
		divsinNoo.style.display='block';
		setTimeout(function() {
  		divsinNoo.style.display='none';
	}, 4000);
	}else{
	
	var noo = document.createElement("img");
	noo.src = "images/NOO.png";
	noo.alt = "hombre de las historietas protestando porque su querido sable laser ya no es coleccionable"
	divsinNoo.appendChild(noo);
	gordo = true;
	sable.src = "images/lightsaber_roto.png"
	setTimeout(function() {
  		divsinNoo.style.display='none';
	}, 4000);
	};
}