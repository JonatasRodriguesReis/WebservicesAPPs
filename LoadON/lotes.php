<html>
<head>
    <title>Load ON</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<?php

$conn = new mysqli("localhost", "root", "", "lg");

$data0 = array();
$data1 = array();
$data2 = array();
$data3 = array();
$data4 = array();
$data5 = array();
$data6 = array();
$data7 = array();


for($i = 0; $i < 8; $i++){

    switch ($i) {
        case 0:
            $inspetor = 'Greiciane';
            break;

        case 1:
            $inspetor = 'Maiko';
            break;

        case 2:
            $inspetor = 'Jarley';
            break;

        case 3:
            $inspetor = 'Marcia';
            break;
		
		case 4:
            $inspetor = 'Rogerio';
            break;
		
		case 5:
            $inspetor = 'Alan';
            break;
        case 6:
            $inspetor = 'Francisco';
            break;
        
        case 7:
            $inspetor = 'Márcio';
            break;
	

    }

    /*$result = $conn->query("SELECT
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2017-09-01 00:00:00' AND '2017-09-31 23:59:59') AS JAN,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2017-10-01 00:00:00' AND '2017-10-31 23:59:59') AS FEV,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2017-11-01 00:00:00' AND '2017-11-31 23:59:59') AS MAR,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2017-12-01 00:00:00' AND '2017-12-31 23:59:59') AS ABR,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-01-01 00:00:00' AND '2018-01-31 23:59:59') AS MAI,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-02-01 00:00:00' AND '2018-02-31 23:59:59') AS JUN,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-03-01 00:00:00' AND '2018-03-31 23:59:59') AS JUL,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-04-01 00:00:00' AND '2018-04-31 23:59:59') AS AGO,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-05-01 00:00:00' AND '2018-05-31 23:59:59') AS SETE,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-06-01 00:00:00' AND '2018-06-31 23:59:59') AS OUTU,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-07-01 00:00:00' AND '2018-07-31 23:59:59') AS NOV,
	(SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-08-01 00:00:00' AND '2018-08-31 23:59:59') AS DEZ");*/

	$result = $conn->query("SELECT
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-02-01 00:00:00' AND '2018-02-31 23:59:59') AS FEV,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-03-01 00:00:00' AND '2018-03-31 23:59:59') AS MAR,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-04-01 00:00:00' AND '2018-04-31 23:59:59') AS ABR,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-05-01 00:00:00' AND '2018-05-31 23:59:59') AS MAI,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-06-01 00:00:00' AND '2018-06-31 23:59:59') AS JUN,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-07-01 00:00:00' AND '2018-07-31 23:59:59') AS JUL,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-08-01 00:00:00' AND '2018-08-31 23:59:59') AS AGO,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-09-01 00:00:00' AND '2018-09-31 23:59:59') AS SETE,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-10-01 00:00:00' AND '2018-10-31 23:59:59') AS OUTU,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-11-01 00:00:00' AND '2018-11-31 23:59:59') AS NOV,
    (SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-12-01 00:00:00' AND '2018-12-31 23:59:59') AS DEZ,
	(SELECT COUNT(inspetor_iqc) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2019-01-01 00:00:00' AND '2019-01-31 23:59:59') AS JAN");

    $outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    switch ($i) {
        case 0:
            foreach ($outp as $value) {
                $data0[] = $value['FEV'];
                $data0[] = $value['MAR'];
                $data0[] = $value['ABR'];
                $data0[] = $value['MAI'];
                $data0[] = $value['JUN'];
                $data0[] = $value['JUL'];
                $data0[] = $value['AGO'];
                $data0[] = $value['SETE'];
                $data0[] = $value['OUTU'];
                $data0[] = $value['NOV'];
                $data0[] = $value['DEZ'];
				$data0[] = $value['JAN'];
            }
            break;

        case 1:
            foreach ($outp as $value) {
                
                $data1[] = $value['FEV'];
                $data1[] = $value['MAR'];
                $data1[] = $value['ABR'];
                $data1[] = $value['MAI'];
                $data1[] = $value['JUN'];
                $data1[] = $value['JUL'];
                $data1[] = $value['AGO'];
                $data1[] = $value['SETE'];
                $data1[] = $value['OUTU'];
                $data1[] = $value['NOV'];
                $data1[] = $value['DEZ'];
				$data1[] = $value['JAN'];
            }
            break;

        case 2:
            foreach ($outp as $value) {
                
                $data2[] = $value['FEV'];
                $data2[] = $value['MAR'];
                $data2[] = $value['ABR'];
                $data2[] = $value['MAI'];
                $data2[] = $value['JUN'];
                $data2[] = $value['JUL'];
                $data2[] = $value['AGO'];
                $data2[] = $value['SETE'];
                $data2[] = $value['OUTU'];
                $data2[] = $value['NOV'];
                $data2[] = $value['DEZ'];
				$data2[] = $value['JAN'];
            }
            break;

        case 3:
            foreach ($outp as $value) {
                
                $data3[] = $value['FEV'];
                $data3[] = $value['MAR'];
                $data3[] = $value['ABR'];
                $data3[] = $value['MAI'];
                $data3[] = $value['JUN'];
                $data3[] = $value['JUL'];
                $data3[] = $value['AGO'];
                $data3[] = $value['SETE'];
                $data3[] = $value['OUTU'];
                $data3[] = $value['NOV'];
                $data3[] = $value['DEZ'];
				$data3[] = $value['JAN'];
            }
            break;

        case 4:
            foreach ($outp as $value) {
                $data4[] = $value['FEV'];
                $data4[] = $value['MAR'];
                $data4[] = $value['ABR'];
                $data4[] = $value['MAI'];
                $data4[] = $value['JUN'];
                $data4[] = $value['JUL'];
                $data4[] = $value['AGO'];
                $data4[] = $value['SETE'];
                $data4[] = $value['OUTU'];
                $data4[] = $value['NOV'];
                $data4[] = $value['DEZ'];
				$data4[] = $value['JAN'];
            }
            break;

        case 5:
            foreach ($outp as $value) {
                
                $data5[] = $value['FEV'];
                $data5[] = $value['MAR'];
                $data5[] = $value['ABR'];
                $data5[] = $value['MAI'];
                $data5[] = $value['JUN'];
                $data5[] = $value['JUL'];
                $data5[] = $value['AGO'];
                $data5[] = $value['SETE'];
                $data5[] = $value['OUTU'];
                $data5[] = $value['NOV'];
                $data5[] = $value['DEZ'];
				$data5[] = $value['JAN'];
            }
            break;
        case 6:
            foreach ($outp as $value) {
                
                $data6[] = $value['FEV'];
                $data6[] = $value['MAR'];
                $data6[] = $value['ABR'];
                $data6[] = $value['MAI'];
                $data6[] = $value['JUN'];
                $data6[] = $value['JUL'];
                $data6[] = $value['AGO'];
                $data6[] = $value['SETE'];
                $data6[] = $value['OUTU'];
                $data6[] = $value['NOV'];
                $data6[] = $value['DEZ'];
                $data6[] = $value['JAN'];
            }
            break;
        case 7:
            foreach ($outp as $value) {
                
                $data7[] = $value['FEV'];
                $data7[] = $value['MAR'];
                $data7[] = $value['ABR'];
                $data7[] = $value['MAI'];
                $data7[] = $value['JUN'];
                $data7[] = $value['JUL'];
                $data7[] = $value['AGO'];
                $data7[] = $value['SETE'];
                $data7[] = $value['OUTU'];
                $data7[] = $value['NOV'];
                $data7[] = $value['DEZ'];
                $data7[] = $value['JAN'];
            }
            break;
    }




}


?>


<script src="../advanced/frontend/web/js/Chart.min.js"></script>

<canvas id="myChart" width="80vw" height="35vh"></canvas>

</body>
<script>

        var xmlhttp;
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myObj = JSON.parse(this.responseText);

                for(i = 0; i < myObj.length; i++){

                    getValor(myObj[i].inspetor_iqc);

                }
            }
        };

        xmlhttp.open("GET", "../web/json/load/inspetores.php", true);
        xmlhttp.send();

        function getValor(inspetor){

            var xmlhttp;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);
                    console.log(myObj);
                }
            };

            xmlhttp.open("GET", "../web/json/load/valores.php?inspetor="+inspetor, true);
            xmlhttp.send();

        }

        data = {
            data: [86,114,106,106,107,111,133,221,783,2478],
            label: "Africa",
            backgroundColor: "#3e95cd",
            borderColor: "#3e95cd",
            fill: false
        }



        var dados = {
            labels: ['´18 FEB','´18 MAR','´18 APR','´18 MAY','´18 JUN','´18 JUL','´18 AUG','´18 SEP','´18 OCT','´18 NOV', '´18 DEC', '´19 JAN'],
            datasets: [
                {
                    label: "Greiciane",
                    fill:false,
                    backgroundColor: '#ff6384',
                    borderColor: '#ff6384',
                    data: <?php  echo json_encode($data0)?>

                },
                
                {
                    label: "Maiko",
                    fill:false,
                    backgroundColor: '#00ff00',
                    borderColor: '#00ff00',
                    data: <?php  echo json_encode($data1)?>

                },
                
                {
                    label: "Jarley",
                    fill:false,
                    backgroundColor: '#000000',
                    borderColor: '#000000',
                    data: <?php  echo json_encode($data2)?>

                },
                {
                    label: "Marcia",
                    fill:false,
                    backgroundColor: '#cc65fe',
                    borderColor: '#cc65fe',
                    data: <?php  echo json_encode($data3)?>

                },
                {
                    label: "Rogerio",
                    fill:false,
                    backgroundColor: '#FF8C00',
                    borderColor: '#FF8C00',
                    data: <?php  echo json_encode($data4)?>

                },
                {
                    label: "Alan",
                    fill:false,
                    backgroundColor: '#A52A2A',
                    borderColor: '#A52A2A',
                    data: <?php  echo json_encode($data5)?>

                },
                {
                    label: "Francisco",
                    fill:false,
                    backgroundColor: '#ff0000',
                    borderColor: '#ff0000',
                    data: <?php  echo json_encode($data6)?>

                },
                {
                    label: "Márcio",
                    fill:false,
                    backgroundColor: '#3355FF',
                    borderColor: '#3355FF',
                    data: <?php  echo json_encode($data7)?>

                }
                
            ]}

        var ctx = document.getElementById("myChart").getContext("2d");
        var options =
            {
				
			title: {
				display: true,
				text: "Quantidade de Lotes Inspecionados",
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