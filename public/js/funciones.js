
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
		var tabla = $('<table>').addClass("table");
		var thead = $('<thead>');//.addClass("thead-dark");
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

function listadoClientes(Consulta,elementoAnterior){
	var elementoPadre = $(elementoAnterior);

	for (var i = 0; i < Consulta.length; i++) {
		
		console.log(Consulta[i]);
	}
}

function visualizarInfo(Consulta, elementoAnterior){
	var elementoAnterior = $("#"+elementoAnterior);
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
	var tabla = $("<table>").addClass("table");
	var th = $('<thead>');
	var trtitulos =$('<tr>').addClass("thead-dark");

	var tdid = $('<th>',{text: "ID"});
	var tdnombre = $('<th>',{text:"Nombre"});
	var tdestado = $('<th>',{text:"Estado"});
	var tdfmodi = $('<th>',{text:"Fecha Modificacion"});

	trtitulos.append(tdid);
	trtitulos.append(tdnombre);
	trtitulos.append(tdestado);
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
		var a = $('<a>').attr('href', '/Modificar/'+Consulta[datos]["id"]).addClass("btn btn-success");
		a.text("Modificar");
		var aVisualizar = $('<a>').attr('href', '/storage/'+Consulta[datos]["archivo"]).addClass("btn btn-success");
		aVisualizar.text("Visualizar");

		var aDescargar = $('<a>').attr('href', '/documento/'+Consulta[datos]["archivo"]).addClass("btn btn-success");
		aDescargar.text("Descargar");

		var td = $('<td>');
		var tdVisualizar = $('<td>');
		var tdDescargar = $('<td>');
		td.append(a);
		tdVisualizar.append(aVisualizar);
		tdDescargar.append(aDescargar);
		trdetalles.append(td);
		trdetalles.append(tdVisualizar);
		trdetalles.append(tdDescargar);
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
			if (titulo=="archivo") {
				$nombreDocumento=$('#NombreDocumento').val(Valores[key]); 
				var td = $('<td>').text(Valores[key]);
				console.log($nombreDocumento);
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
		if(lugar == "btn btn-success"){
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
                ul.append($('<li>', {text:listaErrores[index]}));
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
function validarFormularioVenta()
{
	var valido = true;
	var Camposinvalidos = [];
	if($('input').eq(1).val() == '')
	{
		Camposinvalidos.push('El nombre del comprador está vacio.');
		valido = false;
	}
	if($('input').eq(2).val() == '')
	{
		Camposinvalidos.push('El nombre de la venta está vacio.');
		valido = false;
	}
	if(Camposinvalidos.length > 0)
    {
		mensajeError(undefined, Camposinvalidos, false, "btnNuevaVenta");
	 
	}
	if(valido)
	{
		$('#formulario-venta').submit();
	}
}
function validarFormulario()
{
    /**
     * Como tenemos dos formularios que tenemos que validar, los cuales contienen los mismos campos
     * esta función validará: CIF NIF, Telefono, Email
     * 
     */
	var valido = true;
	var Camposinvalidos = [];
	
	if($('.formulario').eq(0).val() == ''){
		Camposinvalidos.push('El nombre del cliente está vacio.');
		valido = false;
	}
	if($('.formulario').eq(1).val() == ''){
		Camposinvalidos.push('El email está vacio.');
		valido = false;
	}else if(!/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test($('.formulario').eq(1).val())){
		Camposinvalidos.push('El email introducido es incorrecto.');
		valido = false;
	}
	if($('.formulario').eq(2).val() == ''){
		Camposinvalidos.push('El número de telefono está vacio.');
		valido = false;
	}else if($('.formulario').eq(2).val().length > 9){
		Camposinvalidos.push('No puedes introducir más de 9 dígitos.');
		valido = false;
	}
	if($('.formulario').eq(3).val() == ''){
		Camposinvalidos.push('No has introducido una dirección.');
		valido = false;
	}
	if($('.formulario').eq(4).val() ==''){
		Camposinvalidos.push('No has introducido el NIF');
		valido = false;
	}else if(!isValidNif($('.formulario').eq(4).val())){
		Camposinvalidos.push('NIF introducido es incorrecto.');
		valido = false;
	}
	if($('.formulario').eq(5).val() == ''){
		Camposinvalidos.push('El campo Provincia está vacio.');
		valido = false;
	}
	if($('.formulario').eq(6).val() == ''){
		Camposinvalidos.push('El campo Localidad está vacio.');
		valido = false;
	}
	if(isNaN($('.formulario').eq(7).val())){
		Camposinvalidos.push('El código postal no puede contener letras.');
		valido = false;
	}
    if(Camposinvalidos.length > 0)
    {
		mensajeError(undefined, Camposinvalidos, false, "btNuevoCliente");
	 
	}
	if(valido)
	{
		$('#formulario').submit();
	}
	
    
}

function validarFormularioUsuarios()
{
	var Camposinvalidos = [];
	var valido = true;
	
	if($('.formularioUsuarios').eq(0).val() == ''){
		Camposinvalidos.push('El nombre del usuario está vacio.');
		valido = false;
	}
	if($('.formularioUsuarios').eq(1).val() == ''){
		Camposinvalidos.push('La contraseña no puede estar vacia.');
		valido = false;
	}
	if($('.formularioUsuarios').eq(2).val() == ''){
		Camposinvalidos.push('El apellido del usuario está vacio.');
		valido = false;
	}
	if($('.formularioUsuarios').eq(3).val() == ''){
		Camposinvalidos.push('El campo tipo de usuario está vacio.');
		valido = false;
	}
	if($('.formularioUsuarios').eq(4).val() == ''){
		Camposinvalidos.push('El email está vacio.');
		valido = false;
	}else if(!/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test($('.formularioUsuarios').eq(4).val())){
		Camposinvalidos.push('El email introducido es incorrecto.');
		valido = false;
	}
	if($('.formularioUsuarios').eq(5).val() == ''){
		Camposinvalidos.push('El número de telefono está vacio.');
		valido = false;
	}else if($('.formularioUsuarios').eq(5).val().length > 9){
		Camposinvalidos.push('No puedes introducir más de 9 dígitos.');
		valido = false;
	}
		
    if(Camposinvalidos.length > 0)
    {
		mensajeError(undefined, Camposinvalidos, false, "btNuevoCliente");
	 
	}
	if(valido)
	{
		$('#formulario').submit();
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
	botonGuardar.text('Guardar');
	
	divInput.append(inputFile);
	divInput.append(inputHidden);
	divInput.append(tipoDocumento);
	divInput.append(botonGuardar);
	divGeneralInput.append(divInput);
	elementoAnterior.append(divGeneralInput);
}
function AscendenteDescendente(){
    $('th').click(function() {
    var table = $(this).parents('table').eq(0)
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
    this.asc = !this.asc
    if (!this.asc) {
      rows = rows.reverse()
    }
    for (var i = 0; i < rows.length; i++) {
      table.append(rows[i])
    }
    setIcon($(this), this.asc);
  })

  function comparer(index) {
    return function(a, b) {
      var valA = getCellValue(a, index),
        valB = getCellValue(b, index)
      return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
    }
  }

  function getCellValue(row, index) {
    return $(row).children('td').eq(index).html()
  }

  function setIcon(element, asc) {
    $("th").each(function(index) {
      $(this).removeClass("sorting");
      $(this).removeClass("asc");
      $(this).removeClass("desc");
    });
    element.addClass("sorting");
    if (asc) element.addClass("asc");
    else element.addClass("desc");
  }
}