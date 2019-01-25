<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<div id="example5.3" style="height:300px; width:100%"></div>
<p id="demo"></p>

</body>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	
	/*$(document).ready(function(){
		 $.ajax({
	            url: 'http://10.193.236.94:85/QSmart/advanced/frontend/web/json/loadon.php',
	            type: 'get',
	            success: function (data) {
	            	obj = JSON.parse(data);
	            	alert('T');
	            	drawChart();
	            },
	            error: function(xhr, ajaxOptions, thrownError){
	            	alert('TE' + thrownError);
	            }
	     }); 
     });*/
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        obj = JSON.parse(this.responseText);
	    }
	};


	xmlhttp.open("GET", "../advanced/frontend/web/json/loadon.php", true);
	
	xmlhttp.send();

	
  google.charts.load("current", {packages:["timeline"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var container = document.getElementById('example5.3');
    var chart = new google.visualization.Timeline(container);
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn({ type: 'string', id: 'Room' });
    dataTable.addColumn({ type: 'string', id: 'Name' });
    dataTable.addColumn({ type: 'date', id: 'Start' });
    dataTable.addColumn({ type: 'date', id: 'End' });
	 var x = 0;
	 var tempo_inicio;
	 var inicio_inspecao;
	 
	 var tempo_fim;
	 var fim_inspecao;
	 
	 dataTable.addRows([
		
			[ 'Inspetor', 'Carga Horária', new Date(0,0,0,7,30,0),  new Date(0,0,0,17,18,0)]
			
		]);
	 

	  while (x < obj.length){
	  	
		  
		tempo_inicio = obj[x].inicio_inspecao.split(" ");  
		inicio_inspecao = tempo_inicio[1].split(":"); 
		tempo_fim = obj[x].fim_inspecao.split(" ");  
		fim_inspecao = tempo_fim[1].split(":"); 
		
		dataTable.addRows([
		
			[ obj[x].inspetor_iqc,  obj[x].item, new Date(0,0,0,inicio_inspecao[0], inicio_inspecao[1], inicio_inspecao[2]),  new Date(0,0,0,fim_inspecao[0], fim_inspecao[1], fim_inspecao[2])]
			
		]);
		
		x++;
	}
    
	  	 

    var options = {
      timeline: { 
		singleColor: '#D73925',
		showBarLabels: true
	  }
    };

    chart.draw(dataTable, options);
  }
</script>
</html> 

	