function comprobarCampos(){  
	var tx = $(".form-control");

    for (var i = 0; i <=tx.length ; i++) {
    	if($(tx[i]).val().length<1) {  
    		alert("Error"+" "+"Campo"+" "+[i]);  
        
    	} 
    }
     
}; 


function moduloError(error) {
	var contenedor = $('.container-fluid');
	var divContenido = $('<div>').addClass("alert alert-danger");
	var pErrores = $('<p>',{text:error});
	var divErrores = $('<div>').addClass("alert alert-light");
	divContenido.append(pErrores);
	divErrores.append(divContenido);
	contenedor.after(divErrores);

}

$(document).ready();

