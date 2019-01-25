<html>
<head>
    <title>MWO IF Cost</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<script src= "../advanced/frontend/web/js/Chart.min.js" ></script>

<canvas id="myChart" width="80vw" height="35vh"></canvas>

<!-- <a href = "http://10.193.236.105:85/QSmart/QCost/RAC_IFCost_details.php">IF Cost Details</a> -->

<?php 
$conn = new mysqli("localhost", "root", "", "lg");
$dias_mes = date('t');
$mes = date('m');
$ano = date('Y');

$result = $conn->query("SELECT day(max(data)) as dia FROM qcost WHERE modelo LIKE 'MWO' AND (custo LIKE 'Scrap' OR custo LIKE 'Nowork' OR custo LIKE 'Rework' OR custo LIKE 'Line Repair') AND year(data) = $ano and MONTH(data) = $mes");
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

$accs = 0;
$accn = 0;
$accr = 0;
$acclr = 0;
$acc = 0;

for($i=1; $i<=$dia_max; $i++){
	$data = "$ano-$mes-$i";
	$result = $conn->query("SELECT valor, custo  FROM qcost WHERE modelo LIKE 'MWO' AND (custo LIKE 'Scrap' OR custo LIKE 'Nowork' OR custo LIKE 'Rework' OR custo LIKE 'Line Repair') AND data = '$data'");
	$outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
	$entrou = false;
    foreach ($outp as $value) {
        if($value['custo'] == 'Scrap'){
            $accs = $value['valor'];
            //echo " Scrap ".$value['valor'];
        }
        if($value['custo'] == 'Nowork'){
            $accn = $value['valor'];
            //echo " Nowork ".$value['valor'];
        }
        if($value['custo'] == 'Rework'){
            $accr = $value['valor'];
            //echo " Rework ".$value['valor'];
        }
        if($value['custo'] == 'Line Repair'){
            $acclr = $value['valor'];
            //echo " Line Repair ".$value['valor'];
        }
        $acc = $accs + $accn + $accr + $acclr;
        
        $entrou = true;
    }  
    $valorPassado[] = $acc ." ";      
    if($entrou == false){
        $valor[] = $acc ." ";
    }
    $entrou = false;      
};

$accs = 0;
$accn = 0;
$accr = 0;
$acclr = 0;
$acc = 0;

for($i=1; $i<=$dias_mes; $i++){
	$data = $ano - 1 ."-$mes-$i";
	//$result = $conn->query("SELECT ROUND(SUM(valor),2) AS valor FROM qcost WHERE modelo LIKE 'MWO' AND (custo LIKE 'Scrap' OR custo LIKE 'Nowork' OR custo LIKE 'Rework' OR custo LIKE 'Line Repair') AND data = '$data'");
    $result = $conn->query("SELECT valor, custo FROM qcost WHERE modelo LIKE 'MWO' AND (custo LIKE 'Scrap' OR custo LIKE 'Nowork' OR custo LIKE 'Rework' OR custo LIKE 'Line Repair') AND data = '$data'");
	$outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
	$entrou = false;
    foreach ($outp as $value) {
        if($value['custo'] == 'Scrap'){
            $accs = $value['valor'];
            //echo " Scrap ".$value['valor'];
        }
        if($value['custo'] == 'Nowork'){
            $accn = $value['valor'];
            //echo " Nowork ".$value['valor'];
        }
        if($value['custo'] == 'Rework'){
            $accr = $value['valor'];
            //echo " Rework ".$value['valor'];
        }
        if($value['custo'] == 'Line Repair'){
            $acclr = $value['valor'];
            //echo " Line Repair ".$value['valor'];
        }
        $acc = $accs + $accn + $accr + $acclr;
        
        $entrou = true;
    }
    $valorPassado[] = $acc ." ";    
    if($entrou == false){
        $valorPassado[] =  $acc ." ";
    }
    $entrou = false;	   
};

for($d=1; $d<=$dias_mes; $d++){
	$dia[] = $d;
}

$titulo = "MWO IF Cost [K$] - " . date("F");


?>

</body>
<script>
		var now = new Date();	
        var dados = {
            labels: ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
            datasets: [
                {
                    label: "Acc IF Cost '" + now.getFullYear(),
                    fill:false,
                    backgroundColor: '#ff0000',
                    borderColor: '#ff0000',
					data: <?php  echo json_encode($valor)?>,
					
					pointBorderColor:'#ff0000',
					pointBackgroundColor: '#ffffff',
					pointRadius: 4,
                    pointHoverRadius: 8,
					
                },
                {
                    label: "Acc IF Cost '" +(now.getFullYear() - 1),
                   fill:false,
                    backgroundColor: '#000000',
                    borderColor: '#000000',
                    data: <?php  echo json_encode($valorPassado)?>,
                    
					pointBorderColor:'#000000',
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