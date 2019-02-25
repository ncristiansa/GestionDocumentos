function comprobarCampos(){
	var nom=$("#nom").val();
	var email=$("#email").val();
	var Telefon=$("#telefon").val();
	var data=$("#data").val();
	var data=$("#dataModificacio").val();
	var direccio=$("#direccio").val();
	var nifCif=$("#nifCif").val();
	var prov=$("#prov").val();
	var localitat=$("#localitat").val();
	var cp=$("#cp").val();
	var tx = $(".form-control");

	

	if (nom.length<1 && email.length<1 && Telefon.length<1 && data.length<1 && direccio.length<1 && nifCif.length<1 && prov.length<1 && localitat.length<1 && cp.length<1) {
    		moduloError("No se pueden dejar los campos vacios")
    	}
    
    else{
    	for (var i = 0; i <=tx.length ; i++) {
    	if($(tx[i]).val().length<1) {
    		moduloError("No se puede dejar vacio el campo"+" "+tx[i].name);
    		
        
    		} 
    	}
    	 
	}; 

}
    

//function comprobarCampos(){
//	var listaInputs = $("input[name]");
	
//	listaName=[];
//	for (var i =0 ; i < listaInputs.length; i++) {
//		var nombre = listaInputs[i].name;
//		listaName.append(nombre);
//	}
	
     
//}; 


function moduloError(error) {
	var contenedor = $('.container-fluid');
	var divContenido = $('<div>').addClass("alert alert-danger");
	var pErrores = $('<p>',{text:error});
	var divErrores = $('<div>');
	divContenido.append(pErrores);
	divErrores.append(divContenido);
	contenedor.after(divErrores);

}

$(document).ready();

