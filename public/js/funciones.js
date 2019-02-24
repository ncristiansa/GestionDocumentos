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

function generaTabla(Consulta){
	console.log("Entra en la funcion.");
	if(Consulta instanceof Array){
		var h2 = $('h2');
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
		h2.after(divTabla);
	}else{
		console.log("El parametro que has introducido no es un Array, por favor comprueba que lo sea.")
	}

}


