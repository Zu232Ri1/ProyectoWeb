window.onload=function (argument) {
   	  	document.getElementById("formEjercicios").addEventListener("submit", validarCheck);
   	  }


   	  function validarCheck (e) {
           

   	  		

			if(!isCheck(this.checkejer)){
				 alert("incorreco");

            document.getElementById("errorCheck").innerHTML ="DEBES SELECIONAR ALGUN CHECK";
            document.getElementById("errorCheck").style.display = 'block';
            e.preventDefault();
            return false;
                
			}


   	  }

   	  function isCheck (o) {
   	  	for(var i=0;i<o.length; i++) {
					//alert(u[i].checked);
				if(o[i].checked) {
						return true;
					}
			}

			return false;
   	  }
