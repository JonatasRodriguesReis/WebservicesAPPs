<html>
<head>
    <title>Q Cost MWO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<!--<script src="http://10.193.236.94:85/QSmart/advanced/frontend/web/js/Chart.min.js"></script>-->

<script src= "../advanced/frontend/web/js/Chart.min.js" ></script>

<canvas id="myChart" width="80vw" height="35vh"></canvas>


<?php 
$ano = date('Y') ;
$mes = date('m');

$conn = new mysqli("localhost", "root", "", "lg");

	$resultSales = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Sales' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Sales' AND modelo LIKE 'MWO')");
	$resultRepair = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Repair' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Repair' AND modelo LIKE 'MWO')");
	$resultReturn = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Return' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Return' AND modelo LIKE 'MWO')");
	$resultScrap = $conn->query("SELECT valor FROM qcost WHERE (custo LIKE 'Scrap' OR custo LIKE 'Nowork' OR custo LIKE 'Rework' OR custo LIKE 'Line Repair') AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Scrap' AND modelo LIKE 'MWO')");
	
    $resultNowork = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Nowork' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Nowork' AND modelo LIKE 'MWO')");

    $resultRework = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Rework' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Rework' AND modelo LIKE 'MWO')");
    $resultLineRepair = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Line Repair' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Line Repair' AND modelo LIKE 'MWO')");

	$outp1 = array();
	$outp2 = array();
	$outp3 = array();
	$outp4 = array();
    $outpNowork = array();
    $outpRework = array();
    $outpLineRepair = array();
	
    $outp1 = $resultSales->fetch_all(MYSQLI_ASSOC);
    $outp2 = $resultRepair->fetch_all(MYSQLI_ASSOC);
    $outp3 = $resultReturn->fetch_all(MYSQLI_ASSOC);
    $outp4 = $resultScrap->fetch_all(MYSQLI_ASSOC);
    $outpNowork = $resultNowork->fetch_all(MYSQLI_ASSOC);
    $outpRework = $resultRework->fetch_all(MYSQLI_ASSOC);
    $outpLineRepair = $resultLineRepair->fetch_all(MYSQLI_ASSOC);
	
	$max = $conn->query("SELECT DAY(MAX(data))-1 AS numero FROM qcost");
	$outp5 = array();
	$outp5 = $max->fetch_all(MYSQLI_ASSOC);
	foreach ($outp5 as $valueMax) {
		$diaMax[] = $valueMax['numero']." ";
    };
	
	$sales2016 = [0.43, 0.46, 0.46, 0.46, 0.51, 0.60, 0.59, 0.77, 1.05, 1.05, 1.05, 1.05, 1.21, 1.39, 1.53, 1.71, 1.71, 1.71, 1.81, 1.97, 2.24, 2.44, 2.54, 2.64, 2.64, 3.48, 4.50, 6.40, 8.52, 9.53];
	$entrou = false;
    foreach ($outp1 as $value1) {
        $sales[] = $value1['valor']." ";
        $entrou = true;
        //echo $sales[0];
    };
    if($entrou == false){
        $sales[] = '0 ';
    }
    //$sales[] = $sales2016[$diaMax];
    //echo $diaMax;
    
    $entrou = false;
    foreach ($outp2 as $value2) {
        $repair[] = $value2['valor']." ";
        //echo $repair[0];
        $entrou = true;
    }   
    if($entrou == false){
        $repair[] = '0 ';
    } 
    $entrou = false;
    foreach ($outp3 as $value3) {
        $return[] = $value3['valor']." ";
        //echo $return[0];
        $entrou = true;
    }   
    if($entrou == false){
        $return[] = '0 ';
    } 
    $entrou = false;
    foreach ($outp4 as $value4) {
        $scrap[] = $value4['valor']." ";
        //echo $scrap[0];
        $entrou = true;
    }    
    if($entrou == false){
        $scrap[] = '0 ';
    } 

    $entrou = false;
    foreach ($outpRework as $value4) {
        $rework[] = $value4['valor']." ";
        //echo $scrap[0];
        $entrou = true;
    }    
    if($entrou == false){
        $rework[] = '0 ';
    } 

    $entrou = false;
    foreach ($outpNowork as $value4) {
        $nowork[] = $value4['valor']." ";
        //echo $scrap[0];
        $entrou = true;
    }    
    if($entrou == false){
        $nowork[] = '0 ';
    }  

    $entrou = false;
    foreach ($outpLineRepair as $value4) {
        $linerepair[] = $value4['valor']." ";
        //echo $scrap[0];
        $entrou = true;
    }    
    if($entrou == false){
        $linerepair[] = '0 ';
    }


    $ano -= 1;
    $resultSales2 = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Sales' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Sales' AND modelo LIKE 'MWO')");
    $resultRepair2 = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Repair' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Repair' AND modelo LIKE 'MWO')");
    $resultReturn2 = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Return' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Return' AND modelo LIKE 'MWO')");
    $resultScrap2 = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Scrap' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Scrap' AND modelo LIKE 'MWO')");

    $resultNowork2 = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Nowork' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Nowork' AND modelo LIKE 'MWO')");

    $resultRework2 = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Rework' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Rework' AND modelo LIKE 'MWO')");
    $resultLineRepair2 = $conn->query("SELECT valor FROM qcost WHERE custo LIKE 'Line Repair' AND modelo LIKE 'MWO' AND data = (SELECT MAX(data) FROM qcost WHERE Year(data) = '". $ano ."' and MONTH(data) = '" . $mes . "' and custo LIKE 'Line Repair' AND modelo LIKE 'MWO')");

    $outp12 = array();
    $outp22 = array();
    $outp32 = array();
    $outp42 = array();
    $outpNowork2 = array();
    $outpRework2 = array();
    $outpLineRepair2 = array();

    
    $outp12 = $resultSales2->fetch_all(MYSQLI_ASSOC);
    $outp22 = $resultRepair2->fetch_all(MYSQLI_ASSOC);
    $outp32 = $resultReturn2->fetch_all(MYSQLI_ASSOC);
    $outp42 = $resultScrap2->fetch_all(MYSQLI_ASSOC);
    $outpNowork2 = $resultNowork2->fetch_all(MYSQLI_ASSOC);
    $outpRework2 = $resultRework2->fetch_all(MYSQLI_ASSOC);
    $outpLineRepair2 = $resultLineRepair2->fetch_all(MYSQLI_ASSOC);
    
    $entrou = false;
    foreach ($outp12 as $value1) {
        $sales2[] = $value1['valor']." ";
        $entrou = true;
        //echo $sales[0];
    };
    if($entrou == false){
        $sales2[] = '0 ';
    }
    //$sales[] = $sales2016[$diaMax];
    //echo $diaMax;
    
    $entrou = false;
    foreach ($outp22 as $value2) {
        $repair2[] = $value2['valor']." ";
        $entrou = true;
    }   
    if($entrou == false){
        $repair2[] = '0 ';
    } 
    $entrou = false;
    foreach ($outp32 as $value3) {
        $return2[] = $value3['valor']." ";
        //echo $return[0];
        $entrou = true;
    }   
    if($entrou == false){
        $return2[] = '0 ';
    } 
    $entrou = false;
    foreach ($outp42 as $value4) {
        $scrap2[] = $value4['valor']." ";
        //echo $scrap[0];
        $entrou = true;
    }    
    if($entrou == false){
        $scrap2[] = '0 ';
    }   

    $entrou = false;
    foreach ($outpRework2 as $value4) {
        $rework2[] = $value4['valor']." ";
        //echo $scrap[0];
        $entrou = true;
    }    
    if($entrou == false){
        $rework2[] = '0 ';
    } 

    $entrou = false;
    foreach ($outpNowork2 as $value4) {
        $nowork2[] = $value4['valor']." ";
        //echo $scrap[0];
        $entrou = true;
    }    
    if($entrou == false){
        $nowork2[] = '0 ';
    }  

    $entrou = false;
    foreach ($outpLineRepair2 as $value4) {
        $linerepair2[] = $value4['valor']." ";
        //echo $scrap[0];
        $entrou = true;
    }    
    if($entrou == false){
        $linerepair2[] = '0 ';
    }

?>

</body>
<script>
        var now = new Date();
        var dados = {
            labels: [now.getFullYear() - 1,  now.getFullYear()],
            datasets: [
                {
                    label: "Sales[M$]",
                    fill:false,
                    backgroundColor: '#6E040B',
                    borderColor: '#6E040B',
                    data: [<?php  echo json_encode($sales2[0]);?>, <?php  echo json_encode($sales[0]);?>],	
                },
				{
                    label: "Repair[K$]",
                    fill:false,
                    backgroundColor: '#363636',
                    borderColor: '#363636',
                    data: [<?php  echo json_encode($repair2[0]);?>, <?php  echo json_encode($repair[0]);?>],		
                },
				{
                    label: "Return[K$]",
                    fill:false,
                    backgroundColor: '#B5B5B5',
                    borderColor: '#B5B5B5',
                    data: [<?php  echo json_encode($return2[0]);?>, <?php  echo json_encode($return[0]);?>],				
                },
				{
                    label: "IF Cost[K$]",
                    fill:false,
                    backgroundColor: '#E8E8E8',
                    borderColor: '#E8E8E8',
                    data: [<?php  echo json_encode($scrap2[0] + $rework2[0] + $nowork2[0] + $linerepair2[0]);?>, <?php  echo json_encode($scrap[0] + $rework[0] + $nowork[0] + $linerepair[0]);?>],
                },
                
            ]}

        var ctx = document.getElementById("myChart").getContext("2d");
        var options =
            {
			responsive: true,
				title: {
					display: true,
					text: 'Dashboard MWO'
				},
                tooltips: {
                    mode: 'index',
                    intersect: true,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    yAxes: [{
					stacked:true,
                        ticks: {
                            beginAtZero:true
                        }
                    }],
					xAxes: [{
					stacked:true,
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }

        var myLineChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: dados,
            options: options
        });

</script>

</html>