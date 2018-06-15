 window.onload=function (argument) {
   	  	document.getElementById("formClases").addEventListener("submit", validarClase);
   	  }


   	  function validarClase (e) {
   	  	  alert("validar");
   	  	  //e.preventDefault();
   	  	  var horain =this.horaIni.value.split(":");
   	  	  var horafin = this.horaFin.value.split(":");

   	  	  var hhin = parseInt(horain[0]);
   	  	  var minin = parseInt(horain[1]) ;

   	  	  var hhfin = parseInt(horafin[0]);
   	  	  var minfin = parseInt(horafin[1]);

   	  	  var textArea = this.diasSemana.value;

   	  	  if(hhfin<hhin || (hhfin==hhin && minfin<minin) || (hhfin==hhin && minfin==minin)){

             alert("incorreco");

            document.getElementById("errorHora").innerHTML ="HORA FIN NO VALIDA NO MENOR HORA D INICIO";
            document.getElementById("errorHora").style.display = 'block';
            e.preventDefault();
            return false;

   	  	  }



   	  	  alert(textArea);

   	  	  if(textArea=="" || textArea==null || textArea==undefined){
   	  	  	    alert("incorreco");

            document.getElementById("errorDias").innerHTML ="ERROR INGRESE MINIMO UN DIA";
            document.getElementById("errorDias").style.display = 'block';
            e.preventDefault();
            return false;

   	  	  }










   	  }
