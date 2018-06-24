 $(document).ready(function(){

      var ventana_ancho = $(window).width();
		  var ventana_alto = $(window).height();
	     //alert(ventana_ancho);
	     //alert(ventana_alto);
		 
		 if(ventana_ancho <=360){
		     
		   // alert("movil");
			if($("#arowCambio").hasClass("fa fa-angle-double-right")){
			      $("#arowCambio").removeClass("fa fa-angle-double-right")
			}
			$("#arowCambio").addClass("fa fa-angle-double-down");
		 }else{
		    if($("#arowCambio").hasClass("fa fa-angle-double-down")){
			      $("#arowCambio").removeClass("fa fa-angle-double-down")
			}
			$("#arowCambio").addClass("fa fa-angle-double-right");
		 }
         
        



        $(".arrow").click(function (argument) {
        	
             
           
                 var str = [];
               $( "#seldias option:selected" ).each(function() {
                     str.push($( this ).text()) ; 
                });
               console.log(str);
              
             var textArea = $("#diasSemana").val();
             console.log(textArea);
             if(str.length!=0 && textArea==""){//para que solo ingrese uno
                 
                  for (var i =0; i < str.length; i++) {
                  	 if(textArea.search(str[i])==-1){
                  	 	   textArea+=str[i]+" ";
                  	 	   $("#diasSemana").text(textArea);

                  	 }
                  	
                  }


             }



        });
		  
		  
     });		  