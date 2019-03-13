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
	var trtitulos =$('<tr>').addClass("thead-dark");

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
			if (titulo=="nombreVentas") {
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
		
		
		tabla.append(trdetalles);	
	}
	
	elementoAnterior.after(tabla);
	}
}

function detallesFichero(Consulta,elementoAnteriorId){
	if (Consulta.length>=1) {
		var elementoAnterior = $("#"+elementoAnteriorId);
	var tabla = $("<table>").addClass("table");
	tabla.attr({'style':'margin-left:30px;'});
	var th = $('<thead>');
	var trtitulos =$('<tr>');

	var tdid = $('<th>',{text: "ID"});
	var tdidventa = $('<th>',{text:"ID Venta"});
	var tdnomfichero = $('<th>',{text:"Nombre Fichero"});
	var tdfmodi = $('<th>',{text:"Fecha Modificacion"});

	trtitulos.append(tdid);
	trtitulos.append(tdidventa);
	trtitulos.append(tdnomfichero);
	trtitulos.append(tdfmodi);
	th.append(trtitulos);
	tabla.append(trtitulos);

	

	for(var datos in Consulta){
		var trdetalles =$('<tr>');
		var Claves = Object.keys(Consulta[datos]);
		var Valores = Object.values(Consulta[datos]);
		for(var key in Claves){
			var titulo = Claves[key];
			if (titulo=="") {
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
		var a = $('<a>').attr('href', '/Modificar/'+Consulta[datos]["id"]);
		a.text("Modificar");

		var td = $('<td>');
		td.append(a);
		trdetalles.append(td);
		tabla.append(trdetalles);	
	}
	
	elementoAnterior.after(tabla);
	}
}

function detallesFicheroModificar(Consulta,elementoAnteriorId){
	if (Consulta.length>=1) {
		var elementoAnterior = $("#"+elementoAnteriorId);
	var tabla = $("<table>").addClass("table");
	tabla.attr({'style':'margin-left:30px;'});
	var th = $('<thead>');
	var trtitulos =$('<tr>');

	var tdid = $('<th>',{text: "ID"});
	var tdidventa = $('<th>',{text:"ID Venta"});
	var tdnomfichero = $('<th>',{text:"Nombre Fichero"});
	var tdfmodi = $('<th>',{text:"Fecha Modificacion"});

	trtitulos.append(tdid);
	trtitulos.append(tdidventa);
	trtitulos.append(tdnomfichero);
	trtitulos.append(tdfmodi);
	th.append(trtitulos);
	tabla.append(trtitulos);

	

	for(var datos in Consulta){
		var trdetalles =$('<tr>');
		var Claves = Object.keys(Consulta[datos]);
		var Valores = Object.values(Consulta[datos]);
		for(var key in Claves){
			var titulo = Claves[key];
			if (titulo=="") {
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
		
		tabla.append(trdetalles);	
	}
	
	elementoAnterior.after(tabla);
	}
}

function visualizar(Consulta,elementoAnterior){
	var elementoAnterior = $(elementoAnterior);
	console.log(elementoAnterior);
	var tabla = $("<table>").addClass("table table-hover");
	var th = $('<thead>');
	var trtitulos =$('<tr>').addClass("thead-dark");

	var tdid = $('<th>',{text: "ID"});
	var tdidcliente = $('<th>',{text:"ID CLIENTE"});
	var tdcomprador = $('<th>',{text:"Comprador"});
	var tdarchivo = $('<th>',{text:"Venta"});
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
			if(Claves[key] != "created_at"){
				var td = $('<td>').text(Valores[key]);
				trdetalles.append(td);
			}
			
		}
		
		tabla.append(trdetalles);	
	}



	elementoAnterior.after(tabla);

}


/**
* Esta funcion recibe como parametros:
* _text = Texto que deseamos mostrar.
* listaErrores = Podemos pasarle un array de errores que deseamos mostrar.
* estado = El estado que recibe hace refencia si quieres que este duré X segundos, en caso de recibir true.
*/
function mensajeError(_text, listaErrores, estado, lugar)
{

    if(_text != undefined){
		if(lugar == "btn.btn-success"){
			$('.'+lugar).eq(2).after($('<div>').attr('id','mensajeError').addClass('alert alert-danger').append($('<p>', {text:_text})));
			if(estado != true){
				setTimeout(function(){
					$('#mensajeError').remove();
				},6000);
			}
		}
		$('#'+lugar).after($('<div>').attr('id','mensajeError').addClass('alert alert-danger').append($('<p>', {text:_text})));
		if(estado != true){
            setTimeout(function(){
                $('#mensajeError').remove();
            },6000);
        }
    }
    if(listaErrores != undefined){
        if(listaErrores instanceof Array)
        {
			var ul = $('<ul>').attr("style","list-style:none;");
			ul.attr('id','listaError');
            for (var index = 0; index < listaErrores.length; index++) {
                ul.append($('<li>', {text:'Campo '+listaErrores[index]+' no ha sido rellenado.'}));
            }
            $('#'+lugar).after($('<div>').attr({'id':'mensajeError', 'style':'margin-top:1%;'}).addClass('alert alert-danger').append(ul));
        }
        if(estado != true){
            setTimeout(function(){
                $('#mensajeError').remove();
            },8000);
        }
    }
    
}

function isValidNif(NIF){
	dni=NIF.substring(0,NIF.length-1);
	let=NIF.charAt(NIF.length-1);
	if (!isNaN(let)) {
		return false;
	}else{
		cadena = "TRWAGMYFPDXBNJZSQVHLCKET";
		posicion = dni % 23;
		letra = cadena.substring(posicion,posicion+1);
		if (letra!=let.toUpperCase()){

			return false;
		}
	}
	return true;
}
function validarFormulario()
{
    /**
     * Como tenemos dos formularios que tenemos que validar, los cuales contienen los mismos campos
     * esta función validará: CIF NIF, Telefono, Email
     * 
     */
    var expresionregularNumero = "^([0-9]+){9}$";
	var Camposinvalidos = [];
	
    for (var index = 0; index < $('.formulario').length; index++) {
        if($('.formulario').eq(index).val().length<1){
            Camposinvalidos.push($('.formulario').eq(index).attr('placeholder'));
        }
    }
    if(Camposinvalidos.length > 0)
    {
		mensajeError(undefined, Camposinvalidos, false, "btNuevoCliente");
		if($('.formulario').eq(2).val().length > 9){
			$('#listaError').append($('<li>',{text:'No puedes introducir más de 9 dígitos.'}));
		}
		if(!/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test($('.formulario').eq(1).val())){
			$('#listaError').append($('<li>',{text:'El email introducido es incorrecto.'}));
		}

		if(!isValidNif($('.formulario').eq(4).val())){
			$('#listaError').append($('<li>',{text:'NIF introducido es incorrecto.'}));
		}
        
    }
    
}
function validarDocVacio(){
	if($('input[type="file"]') != ''){
		mensajeError("No has añadido ningún documento.", undefined, false, "btn.btn-success");
	}else{
		console.log("continua");
	}
}
function formularioDocumento(idDiv, tipoArchivoTitulo, idForm, ConsultaVentas, tipoArchivo)
{
	$('#'+idDiv).before($('<h3>', {text: tipoArchivoTitulo}).attr({'style':'margin-left:30px;', 'id':tipoArchivoTitulo}));
	var elementoAnterior = $('#'+idForm);
	var divGeneralInput = $('<div>').addClass("form-group");
	var divInput = $('<div>').addClass("col-md-6");

	var inputFile = $('<input>').attr('name', 'archivo');
	inputFile.attr('type', 'file');
	inputFile.attr('accept', 'application/pdf');
	var inputHidden = $('<input>').attr('name', 'id_venta');
	inputHidden.attr('type', 'hidden');
	var tipoDocumento = $('<input>').attr({'name':'tipo_archivo','value':tipoArchivo, 'type':'hidden'});
	for(datos in ConsultaVentas)
	{
		var Claves = Object.keys(ConsultaVentas[datos]);
		for(key in Claves)
		{
			if(Claves[key] == "id")
			{
				inputHidden.attr('value', Claves[key]);
			}
		}
		
	}
	
	var botonGuardar = $('<button>').attr({'id':'btNuevoArchivo', 'class':'btn btn-success', 'name':'enviar', 'style':'margin-top:10px;'});
	//botonGuardar.attr("onclick",'validarDocVacio();return false;');
	botonGuardar.text('Guardar');
	
	divInput.append(inputFile);
	divInput.append(inputHidden);
	divInput.append(tipoDocumento);
	divInput.append(botonGuardar);
	divGeneralInput.append(divInput);
	elementoAnterior.append(divGeneralInput);
}

