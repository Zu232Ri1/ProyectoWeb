window.onload=function (argument) {
   	  	document.getElementById("formMoni").addEventListener("submit", validarMoni);
       
   	  }

   	  function validarMoni (e) {
         

         if(!validarDni(this.dni_emple)){
         	 document.getElementById("errorDNI").innerHTML ="DNI NO VALIDO";
            document.getElementById("errorDNI").style.display = 'block';
            e.preventDefault();
            return false;
         }
         if(!validarCCC(this.ente.value+this.control.value+this.numCuen.value)){
            document.getElementById("errorCCC").innerHTML ="CCC NO VALIDO";
            document.getElementById("errorCCC").style.display = 'block';
            e.preventDefault();
            return false;
         }

   	  }

   	  function validarCCC (cuenta) {
   	  	


   	  	var banco=cuenta.substring(0, 4);
   	  	var sucursal=cuenta.substring(4, 8);
   	  	var dc=cuenta.substring(8, 10);
   	  	var CCC=cuenta.substring(10,20);

   	  	if(!(obtenerDigito("00"+banco+sucursal)==parseInt(dc.charAt(0))) ||
   	  		!(obtenerDigito(CCC)==parseInt(dc.charAt(1)))
   	  		){

   	  		return false;
   	  	}else{
   	  		return true;
   	  	}
   	  }
       function validarDni(o){
			valor = o.value;
			var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N',
			'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
		
			/*alert(valor.charAt(9));
			alert(valor.substring(0, 8));*/
			if(valor.charAt(9) != letras[(valor.substring(0, 8))%23]) {
				return false;
			}
			return true;
		}
   	  function obtenerDigito (valor) {
   	  	

   	  	var valores =[1,2,4,8,5,10,9,7,3,6];

   	  	control=0;

   	  	for(var i=0;i<valores.length;i++){
   	  		control+=parseInt(valor.charAt(i))*valores[i];
   	  	}
        modulo=control%11;
   	  	control=11-modulo;

   	  	if(control==11)
   	  		control=0;
   	  	else if(control==10)
   	  		control=1;

   	  	return control;




   	  }
