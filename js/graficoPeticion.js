
 $(document).ready(function(){
             var popCanvas = $("#grafico");
			 
			/* var barChart = new Chart(popCanvas, {
				type: 'bar',
				data: {
				labels: ["China", "India", "United States", "Indonesia", "Brazil", "Pakistan", "Nigeria", "Bangladesh", "Russia", "Japan"],
				datasets: [{
				label: 'Population',
				data: [1379302771, 1281935911, 326625791, 260580739, 207353391, 204924861, 190632261, 157826578, 142257519, 126451398],
				backgroundColor: [
					'rgba(255, 99, 132, 0.6)',
					'rgba(54, 162, 235, 0.6)',
					'rgba(255, 206, 86, 0.6)',
					'rgba(75, 192, 192, 0.6)',
					'rgba(153, 102, 255, 0.6)',
					'rgba(255, 159, 64, 0.6)',
					'rgba(255, 99, 132, 0.6)',
					'rgba(54, 162, 235, 0.6)',
					'rgba(255, 206, 86, 0.6)',
					'rgba(75, 192, 192, 0.6)',
					'rgba(153, 102, 255, 0.6)'
					]
				}]
			}
        });*/
		

		 $.ajax({
          url: '../clases/progresoUsuario.php', // url del recurso
          type: "get", // podría ser get, post, put o delete.
          data: {}, // datos a pasar al servidor, en caso de necesitarlo
         success: function (r) {
             // aquí trataríamos la respuesta del servidor
          // alert(r);
           var obj = JSON.parse(r);
           console.log(obj.length);
           console.log(" peticion "+obj);
          

        }
        
       });

      console.log('estoy en el js');
		var date=new Date();
		var ano = date.getFullYear();
         var labelUsu=ano+" Peso ";
		Chart.defaults.global.defaultFontFamily = "Lato";
		Chart.defaults.global.defaultFontSize = 18;
        var meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Noviembre","Octubre","Diciembre"]
		var speedData = {
		labels: meses,
		datasets: [{
			label: labelUsu,
			data: [67.2, 59.2, 75.2, 50.12, 50.3, 55.3, 50.1,50.2,42.2,],
			lineTension: 0,
			fill: false,
			borderColor: 'orange',
			backgroundColor: 'transparent',
			borderDash: [5, 5],
			pointBorderColor: 'orange',
			pointBackgroundColor: 'rgba(255,150,0,0.5)',
			pointRadius: 5,
			pointHoverRadius: 10,
			pointHitRadius: 30,
			pointBorderWidth: 2,
			pointStyle: 'rectRounded'
			}]
			};

		var chartOptions = {
			legend: {
			display: true,
			position: 'top',
			labels: {
			boxWidth: 80,
			fontColor: 'black'
			}
			}
		};

		var lineChart = new Chart(grafico, {
			type: 'line',
			data: speedData,
			options: chartOptions
			});
			 
           
         
     
		  
		  
     });	