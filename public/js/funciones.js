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
function moduloError(error) {
	var contenedor = $('.container-fluid');
	var divContenido = $('<div>').addClass("alert alert-danger");
	var pErrores = $('<p>',{text:error});
	var divErrores = $('<div>');
	divContenido.append(pErrores);
	divErrores.append(divContenido);
	contenedor.after(divErrores);
}
function generaTabla(Consulta,elementoAnterior){
	if(Consulta instanceof Array){
		console.log(Consulta);
		var elementoPadre = $(elementoAnterior);
		var divTabla = $('<div>').addClass("table-responsive");
		var tabla = $('<table>').addClass("table table-hover");
		var thead = $('<thead>').addClass("thead-dark");
		var tbody = $('<tbody>');
		var tr_titulos = $('<tr>');
		for(var datos in Consulta){
			var tr_valores = $('<tr>');
			var Claves = Object.keys(Consulta[datos]);
			var Valores = Object.values(Consulta[datos]);
			
			for(var value in Valores){
				
				var a = $('<a>').attr("href","/cliente/"+Consulta[datos]["id"]);
				var tdValor = $('<td>');
				a.text(Valores[value]);
				tdValor.append(a);
				tr_valores.append(tdValor);
			}
			tbody.append(tr_valores);
			thead.append(tr_titulos);
		}
		for(var key in Claves){

			var thTitulo = $('<th>').attr('scope', 'col');
			thTitulo.text(Claves[key]);
			tr_titulos.append(thTitulo);

		}
		tabla.append(thead);
		tabla.append(tbody);
		divTabla.append(tabla);
		elementoPadre.after(divTabla);
	}else{
		console.log("El parametro que has introducido no es un Array, por favor comprueba que lo sea.")
	}
}
function prueba(params) {
	console.log(params);
}

function visualizacionClientes(Consulta,elementoAnterior) {
    listaTitulos = ["ID","Nombre","Direccion","NIF"];
    var ele = $(elementoAnterior);
    var divContenido = $('<div>').addClass("container-fluid");
    var formulario = $('<form>');
    var boton = $('<button>',{text:"modificar"});

    for(var datos in Consulta){
    	var Claves = Object.keys(Consulta[datos]);
		var Valores = Object.values(Consulta[datos]);
        
        var label = $('<label>',{text:Claves}).addClass("col-form-label");
        var NuevoInp = $('<input>',{value:var Valores}).addClass("form-control form-control-sm");
        formulario.append(label,NuevoInp);
    }
    
    divContenido.append(formulario);
    divContenido.append(boton);
    ele.after(divContenido);

}