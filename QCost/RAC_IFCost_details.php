<html>
<head>
    <title>RAC IF Cost</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<script src= "../advanced/frontend/web/js/Chart.min.js" ></script>

<canvas id="myChart" width="80vw" height="35vh"></canvas>

<a href = "./RAC_IFCost.php">Voltar</a>

<?php 
$conn = new mysqli("localhost", "root", "", "lg");
$dias_mes = date('t');
$mes = date('m');
$ano = date('Y');

$result = $conn->query("SELECT day(max(data)) as dia FROM qcost WHERE modelo LIKE 'RAC' AND custo LIKE 'Scrap' AND year(data) = $ano and MONTH(data) = $mes");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);
$dia_max = 0;
foreach ($outp as $value) {
        $dia_max = $value['dia'];
        break;
} 
if($dia_max == 0){
 $dia_max = 1;
}

$acc = 0;
for($i=1; $i<=$dia_max; $i++){
	$data = "$ano-$mes-$i";
	$result = $conn->query("SELECT(valor) FROM qcost WHERE modelo LIKE 'RAC' AND custo LIKE 'Scrap' AND data = '$data'");
	$outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
	$entrou = false;
    foreach ($outp as $value) {
        $acc = $value['valor'];
        $valorScrap[] = $acc ." ";
        $entrou = true;
    }      
    if($entrou == false){
        $valorScrap[] = $acc ." ";
    }
    $entrou = false;	   
};

$result = $conn->query("SELECT day(max(data)) as dia FROM qcost WHERE modelo LIKE 'RAC' AND custo LIKE 'Nowork' AND year(data) = $ano and MONTH(data) = $mes");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);
$dia_max = 0;
foreach ($outp as $value) {
        $dia_max = $value['dia'];
        break;
} 
if($dia_max == 0){
 $dia_max = 1;
}

$acc = 0;
for($i=1; $i<=$dia_max; $i++){
	$data = "$ano-$mes-$i";
	$result = $conn->query("SELECT(valor) FROM qcost WHERE modelo LIKE 'RAC' AND custo LIKE 'Nowork' AND data = '$data'");
	$outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
	$entrou = false;
    foreach ($outp as $value) {
        $acc = $value['valor'];
        $valorNowork[] = $acc ." ";
        $entrou = true;
    }      
    if($entrou == false){
        $valorNowork[] = $acc ." ";
    }
    $entrou = false; 

};

$result = $conn->query("SELECT day(max(data)) as dia FROM qcost WHERE modelo LIKE 'RAC' AND custo LIKE 'Rework' AND year(data) = $ano and MONTH(data) = $mes");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);
$dia_max = 0;
foreach ($outp as $value) {
        $dia_max = $value['dia'];
        break;
} 
if($dia_max == 0){
 $dia_max = 1;
}

$acc = 0;
for($i=1; $i<=$dia_max; $i++){
	$data = "$ano-$mes-$i";
	$result = $conn->query("SELECT(valor) FROM qcost WHERE modelo LIKE 'RAC' AND custo LIKE 'Rework' AND data = '$data'");
	$outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
	$entrou = false;
    foreach ($outp as $value) {
        $acc += $value['valor'];
        $valorRework[] =  $acc ." ";
        $entrou = true;
    }      
    if($entrou == false){
        $valorRework[] = $acc ." ";
    }
    $entrou = false; 
	   
};

$result = $conn->query("SELECT day(max(data)) as dia FROM qcost WHERE modelo LIKE 'RAC' AND custo LIKE 'Line Repair' AND year(data) = $ano and MONTH(data) = $mes");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);
$dia_max = 0;
foreach ($outp as $value) {
        $dia_max = $value['dia'];
        break;
} 
if($dia_max == 0){
 $dia_max = 1;
}

$acc = 0;
for($i=1; $i<=$dia_max; $i++){
	$data = "$ano-$mes-$i";
	$result = $conn->query("SELECT(valor) FROM qcost WHERE modelo LIKE 'RAC' AND custo LIKE 'Line Repair' AND data = '$data'");
	$outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
	$entrou = false;
    foreach ($outp as $value) {
        $acc += $value['valor'];
        $valorRepair[] = $acc ." ";
        $entrou = true;
    }      
    if($entrou == false){
        $valorRepair[] = $acc ." ";
    }
    $entrou = false;       
};

for($d=1; $d<=$dias_mes; $d++){
	$dia[] = $d;
}

$titulo = "RAC IF Cost [K$] - ".date("F");


?>

</body>
<script>
		var now = new Date();	
        var dados = {
            labels: ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'],
            datasets: [
                {
                    label: "Nowork",
                    fill:false,
                    backgroundColor: '#999999',
                    borderColor: '#999999',
					data: <?php  echo json_encode($valorNowork)?>,
					
					pointBorderColor:'#999999',
					pointBackgroundColor: '#ffffff',
					pointRadius: 4,
                    pointHoverRadius: 8,
					
                },
                {
                    label: "Rework",
                   fill:false,
                    backgroundColor: '#666666',
                    borderColor: '#666666',
                    data: <?php  echo json_encode($valorRework)?>,
                    
					pointBorderColor:'#666666',
					pointBackgroundColor: '#ffffff',
					pointRadius: 4,
                    pointHoverRadius: 8,						
                },
				{
                    label: "Scrap",
                   fill:false,
                    backgroundColor: '#000000',
                    borderColor: '#000000',
                    data: <?php  echo json_encode($valorScrap)?>,
                    
					pointBorderColor:'#000000',
					pointBackgroundColor: '#ffffff',
					pointRadius: 4,
                    pointHoverRadius: 8,						
                },
				{
                    label: "Line Repair",
                   fill:false,
                    backgroundColor: '#ff0000',
                    borderColor: '#ff0000',
                    data: <?php  echo json_encode($valorRepair)?>,
                    
					pointBorderColor:'#ff0000',
					pointBackgroundColor: '#ffffff',
					pointRadius: 4,
                    pointHoverRadius: 8,						
                },
                
            ]}

        var ctx = document.getElementById("myChart").getContext("2d");
        var options =
            {
			title: {
					display: true,
					text: <?php  echo json_encode($titulo)?>,
				},
			responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
				scales: {
					xAxes: [{
						stacked: true
					}],
					yAxes: [{
						stacked: true
					}]
				}
            }

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: dados,
            options: options
        });

</script>

</html>