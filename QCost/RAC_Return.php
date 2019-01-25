<html>
<head>
    <title>RAC Return</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<!-- <script src="http://10.193.236.94:85/QSmart/advanced/frontend/web/js/Chart.min.js"></script> -->

<script src= "../advanced/frontend/web/js/Chart.min.js" ></script>

<canvas id="myChart" width="80vw" height="35vh"></canvas>

<?php 
$conn = new mysqli("localhost", "root", "", "lg");
$dias_mes = date('t');
$mes = date('m');
//$mes = 2;
$ano = date('Y');

$result = $conn->query("SELECT day(max(data)) as dia FROM qcost WHERE modelo LIKE 'RAC' AND custo LIKE 'Return' AND year(data) = $ano and MONTH(data) = $mes");
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
	$result = $conn->query("SELECT valor FROM qcost WHERE modelo LIKE 'RAC' AND custo LIKE 'Return' AND data = '$data'");
	$outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
	$entrou = false;
    foreach ($outp as $value) {
        $acc = $value['valor'];
        //$valor[] = $value['valor']." ";
        $valor[] = $acc ." ";
        $entrou = true;
    }      
    if($entrou == false){
        $valor[] = $acc ." ";
    }
    $entrou = false;  
};
$acc = 0;
for($i=1; $i<=$dias_mes; $i++){
	$data = $ano - 1 ."-$mes-$i";
	$result = $conn->query("SELECT valor FROM qcost WHERE modelo LIKE 'RAC' AND custo LIKE 'Return' AND data = '$data'");
	$outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
	$entrou = false;
    foreach ($outp as $value) {
        $acc = $value['valor'];
        $valorPassado[] = $acc ." ";
        $entrou = true;
    }    
    if($entrou == false){
        $valorPassado[] =  $acc ." ";
    }
    $entrou = false; 
};

for($d=1; $d<=$dias_mes; $d++){
	$dia[] = $d;
}

$titulo = "RAC Return [K$] - ".date("F");

?>

</body>
<script>
		var now = new Date();
        var dados = {
            //labels: ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'],
            labels: ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'],
            datasets: [
                {
                    label: "Acc Return Cost '" + (now.getFullYear() - 1),
                    fill:false,
                    backgroundColor: '#000000',
                    borderColor: '#000000',
					data: <?php  echo json_encode($valorPassado)?>,
                    
					pointBorderColor:'#000000',
					pointBackgroundColor: '#ffffff',
					pointRadius: 4,
                    pointHoverRadius: 8,
                },
                {
                    label: "Acc Return Cost '" + now.getFullYear(),
                    fill:false,
                    backgroundColor: '#ff0000',
                    borderColor: '#ff0000',
                    data: <?php  echo json_encode($valor)?>,
                    
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
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
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