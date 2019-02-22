function comprobarCampos(){  
	var tx = $(".form-control");

    for (var i = 0; i <=tx.length ; i++) {
    	if($(tx[i]).val().length<1) {  
    		alert("Error"+" "+"Campo"+" "+[i]);  
        
    	} 
    }
     
}; 


