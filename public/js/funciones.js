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
		var tr_valores = $('<tr>')
		for(var datos in Consulta){
			var Claves = Object.keys(Consulta[datos]);
			var Valores = Object.values(Consulta[datos]);
			for(var key in Claves){
				console.log(Claves[key]);
				var thTitulo = $('<th>').attr('scope', 'col');
				thTitulo.text(Claves[key]);
				tr_titulos.append(thTitulo);

			}
			for(var value in Valores){
				var thValor = $('<th>');
				var tdValor = $('<td>');
				tdValor.text(Valores[value]);
				console.log(Valores[value]);
				tr_valores.append(tdValor);
			}
		}
		
		tbody.append(tr_valores);
		thead.append(tr_titulos);
		tabla.append(thead);
		tabla.append(tbody);
		
		divTabla.append(tabla);
		h2.after(divTabla);
	}else{
		console.log("El parametro que has introducido no es un Array, por favor comprueba que lo sea.")
	}

}


