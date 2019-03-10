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
    	 
	} 

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

function visualizarInfo(Consulta, elementoAnterior){
	var elementoAnterior = $(elementoAnterior);
			var divContenido = $('<div>').addClass("container-fluid");

			var botonGuardar = $('<input>');
			botonGuardar.attr('type', 'submit');
			botonGuardar.attr('value', 'Guardar Cambios');
			botonGuardar.attr('class', 'btn btn-success');
			botonGuardar.attr('name', 'guardar');
			
			for(var datos in Consulta){
					var Claves = Object.keys(Consulta[datos]);
					//formulario.attr('action', '/cliente/'+Consulta[datos]["id"]);
					var Valores = Object.values(Consulta[datos]);
					for(var key in Claves){
									var divGeneral = $('<div>').attr('class', 'form-group');
									if(Claves[key] != 'id'){
											var label = $('<label>').text(Claves[key]);
											var input = $('<input>').attr('value', Valores[key]);
											input.attr('class', 'form-control form-control-sm');
											input.attr('style', 'width:60%;');
											input.attr('name', Claves[key]);
											divGeneral.append(label);
											divGeneral.append(input);
											divContenido.append(divGeneral); 
									}
									
					}
	}
	
	
	divContenido.append(botonGuardar);
	elementoAnterior.append(divContenido);
	$("label").after($("<br>"));

	$("button").attr("style","margin-right:20px;");
}

function detalles(Consulta,elementoAnteriorId){
	if (Consulta.length>=1) {
		var elementoAnterior = $("#"+elementoAnteriorId);
	console.log(elementoAnterior);
	var tabla = $("<table>").addClass("table");
	var th = $('<thead>');
	var trtitulos =$('<tr>');

	var tdid = $('<th>',{text: "ID"});
	var tdnombre = $('<th>',{text:"Nombre"});
	var tdfmodi = $('<th>',{text:"Fecha Modificacion"});

	trtitulos.append(tdid);
	trtitulos.append(tdnombre);
	trtitulos.append(tdfmodi);
	th.append(trtitulos);
	tabla.append(trtitulos);

	

	for(var datos in Consulta){
		var trdetalles =$('<tr>');
		var Claves = Object.keys(Consulta[datos]);
		var Valores = Object.values(Consulta[datos]);
		for(var key in Claves){
			var titulo = Claves[key];
			if (titulo=="archivo") {
				var ahred = $('<a>',{text:Valores[key],href:"/detallesVentas/"+Consulta[datos]["id"]}); 
				var td = $('<td>');
				td.append(ahred);
				trdetalles.append(td);
			}
			else{
				var td = $('<td>').text(Valores[key]);
				trdetalles.append(td);
			}
			
		}
		var botonmodificar = $('<button>',{text:"Modificar"}).addClass("btn btn-success");
		var td = $('<td>');
		td.append(botonmodificar);
		trdetalles.append(td);
		tabla.append(trdetalles);	
	}
	
	elementoAnterior.after(tabla);
	}
}

function visualizar(Consulta,elementoAnterior){
	var elementoAnterior = $(elementoAnterior);
	console.log(elementoAnterior);
	var tabla = $("<table>").addClass("table");
	var th = $('<thead>');
	var trtitulos =$('<tr>');

	var tdid = $('<th>',{text: "ID"});
	var tdidcliente = $('<th>',{text:"ID CLIENTE"});
	var tdcomprador = $('<th>',{text:"Comprador"});
	var tdarchivo = $('<th>',{text:"Fichero"});
	var tdfmodi = $('<th>',{text:"Fecha Modificacion"});

	trtitulos.append(tdid);
	trtitulos.append(tdidcliente);
	trtitulos.append(tdcomprador);
	trtitulos.append(tdarchivo);
	trtitulos.append(tdfmodi);
	th.append(trtitulos);
	tabla.append(trtitulos);

	for(var datos in Consulta){
		var trdetalles =$('<tr>');
		var Claves = Object.keys(Consulta[datos]);
		var Valores = Object.values(Consulta[datos]);
		for(var key in Claves){
			var td = $('<td>').text(Valores[key]);
			trdetalles.append(td);
		}
		
		tabla.append(trdetalles);	
	}



	elementoAnterior.after(tabla);

}