window.onload=function (argument) {
   	  	document.getElementById("formUsuario").addEventListener("submit", validarUsu);
        
   	  }



   	  function validarUsu (e) {
   	  	if(!validarDni(this.dni)){
          	 // alert("incorreco");

            document.getElementById("errorDNI").innerHTML ="DNI NO VALIDO";
            document.getElementById("errorDNI").style.display = 'block';
            e.preventDefault();
            return false;
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

