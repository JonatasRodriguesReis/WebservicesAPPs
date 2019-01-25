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
	
    $result = $conn->query("SELECT
    (SELECT SUM(tempo_inspecao) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-02-01 00:00:00' AND '2018-02-31 23:59:59') AS FEV,
    (SELECT SUM(tempo_inspecao) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-03-01 00:00:00' AND '2018-03-31 23:59:59') AS MAR,
    (SELECT SUM(tempo_inspecao) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-04-01 00:00:00' AND '2018-04-31 23:59:59') AS ABR,
    (SELECT SUM(tempo_inspecao) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-05-01 00:00:00' AND '2018-05-31 23:59:59') AS MAI,
    (SELECT SUM(tempo_inspecao) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-06-01 00:00:00' AND '2018-06-31 23:59:59') AS JUN,
    (SELECT SUM(tempo_inspecao) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-07-01 00:00:00' AND '2018-07-31 23:59:59') AS JUL,
    (SELECT SUM(tempo_inspecao) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-08-01 00:00:00' AND '2018-08-31 23:59:59') AS AGO,
    (SELECT SUM(tempo_inspecao) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-09-01 00:00:00' AND '2018-09-31 23:59:59') AS SETE,
    (SELECT SUM(tempo_inspecao) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-10-01 00:00:00' AND '2018-10-31 23:59:59') AS OUTU,
    (SELECT SUM(tempo_inspecao) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-11-01 00:00:00' AND '2018-11-31 23:59:59') AS NOV,
    (SELECT SUM(tempo_inspecao) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2018-12-01 00:00:00' AND '2018-12-31 23:59:59') AS DEZ,
    (SELECT SUM(tempo_inspecao) FROM lg.load WHERE inspetor_iqc LIKE '$inspetor' AND inicio_inspecao BETWEEN '2019-01-01 00:00:00' AND '2019-01-31 23:59:59') AS JAN");

    $outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    switch ($i) {
        case 0:
            foreach ($outp as $value) {
                $data0[] = intval($value['FEV']/60);
                $data0[] = intval($value['MAR']/60);
                $data0[] = intval($value['ABR']/60);
                $data0[] = intval($value['MAI']/60);
                $data0[] = intval($value['JUN']/60);
                $data0[] = intval($value['JUL']/60);
                $data0[] = intval($value['AGO']/60);
                $data0[] = intval($value['SETE']/60);
                $data0[] = intval($value['OUTU']/60);
                $data0[] = intval($value['NOV']/60);
                $data0[] = intval($value['DEZ']/60);
                $data0[] = intval($value['JAN']/60);
            }
            break;

        case 1:
            foreach ($outp as $value) {
                $data1[] = intval($value['FEV']/60);
                $data1[] = intval($value['MAR']/60);
                $data1[] = intval($value['ABR']/60);
                $data1[] = intval($value['MAI']/60);
                $data1[] = intval($value['JUN']/60);
                $data1[] = intval($value['JUL']/60);
                $data1[] = intval($value['AGO']/60);
                $data1[] = intval($value['SETE']/60);
                $data1[] = intval($value['OUTU']/60);
                $data1[] = intval($value['NOV']/60);
                $data1[] = intval($value['DEZ']/60);
                $data1[] = intval($value['JAN']/60);
            }
            break;

        case 2:
            foreach ($outp as $value) {
                $data2[] = intval($value['FEV']/60);
                $data2[] = intval($value['MAR']/60);
                $data2[] = intval($value['ABR']/60);
                $data2[] = intval($value['MAI']/60);
                $data2[] = intval($value['JUN']/60);
                $data2[] = intval($value['JUL']/60);
                $data2[] = intval($value['AGO']/60);
                $data2[] = intval($value['SETE']/60);
                $data2[] = intval($value['OUTU']/60);
                $data2[] = intval($value['NOV']/60);
                $data2[] = intval($value['DEZ']/60);
                $data2[] = intval($value['JAN']/60);
            }
            break;

        case 3:
            foreach ($outp as $value) {
                $data3[] = intval($value['FEV']/60);
                $data3[] = intval($value['MAR']/60);
                $data3[] = intval($value['ABR']/60);
                $data3[] = intval($value['MAI']/60);
                $data3[] = intval($value['JUN']/60);
                $data3[] = intval($value['JUL']/60);
                $data3[] = intval($value['AGO']/60);
                $data3[] = intval($value['SETE']/60);
                $data3[] = intval($value['OUTU']/60);
                $data3[] = intval($value['NOV']/60);
                $data3[] = intval($value['DEZ']/60);
                $data3[] = intval($value['JAN']/60);
            }
            break;

        case 4:
            foreach ($outp as $value) {
                $data4[] = intval($value['FEV']/60);
                $data4[] = intval($value['MAR']/60);
                $data4[] = intval($value['ABR']/60);
                $data3[] = intval($value['MAI']/60);
                $data4[] = intval($value['JUN']/60);
                $data4[] = intval($value['JUL']/60);
                $data4[] = intval($value['AGO']/60);
                $data4[] = intval($value['SETE']/60);
                $data4[] = intval($value['OUTU']/60);
                $data4[] = intval($value['NOV']/60);
                $data4[] = intval($value['DEZ']/60);
                $data4[] = intval($value['JAN']/60);
            }
            break;

        case 5:
            foreach ($outp as $value) {
                $data5[] = intval($value['FEV']/60);
                $data5[] = intval($value['MAR']/60);
                $data5[] = intval($value['ABR']/60);
                $data5[] = intval($value['MAI']/60);
                $data5[] = intval($value['JUN']/60);
                $data5[] = intval($value['JUL']/60);
                $data5[] = intval($value['AGO']/60);
                $data5[] = intval($value['SETE']/60);
                $data5[] = intval($value['OUTU']/60);
                $data5[] = intval($value['NOV']/60);
                $data5[] = intval($value['DEZ']/60);
                $data5[] = intval($value['JAN']/60);
            }
            break;
        case 6:
            foreach ($outp as $value) {
                $data6[] = intval($value['FEV']/60);
                $data6[] = intval($value['MAR']/60);
                $data6[] = intval($value['ABR']/60);
                $data6[] = intval($value['MAI']/60);
                $data6[] = intval($value['JUN']/60);
                $data6[] = intval($value['JUL']/60);
                $data6[] = intval($value['AGO']/60);
                $data6[] = intval($value['SETE']/60);
                $data6[] = intval($value['OUTU']/60);
                $data6[] = intval($value['NOV']/60);
                $data6[] = intval($value['DEZ']/60);
                $data6[] = intval($value['JAN']/60);
            }
            break;
        case 7:
            foreach ($outp as $value) {
                $data7[] = intval($value['FEV']/60);
                $data7[] = intval($value['MAR']/60);
                $data7[] = intval($value['ABR']/60);
                $data7[] = intval($value['MAI']/60);
                $data7[] = intval($value['JUN']/60);
                $data7[] = intval($value['JUL']/60);
                $data7[] = intval($value['AGO']/60);
                $data7[] = intval($value['SETE']/60);
                $data7[] = intval($value['OUTU']/60);
                $data7[] = intval($value['NOV']/60);
                $data7[] = intval($value['DEZ']/60);
                $data7[] = intval($value['JAN']/60);
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
                    backgroundColor: '#36a2eb',
                    borderColor: '#36a2eb',
                    data: <?php  echo json_encode($data1)?>

                },
                {
                    label: "Jarley",
                    fill:false,
                    backgroundColor: '#00ff00',
                    borderColor: '#00ff00',
                    data: <?php  echo json_encode($data2)?>

                },
                {
                    label: "Márcia",
                    fill:false,
                    backgroundColor: '#ffce56',
                    borderColor: '#ffce56',
                    data: <?php  echo json_encode($data3)?>

                },
                {
                    label: "Rogério",
                    fill:false,
                    backgroundColor: '#000000',
                    borderColor: '#000000',
                    data: <?php  echo json_encode($data4)?>

                },
                {
                    label: "Alan",
                    fill:false,
                    backgroundColor: '#cc65fe',
                    borderColor: '#cc65fe',
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
				text: "Tempo Inspecinando",
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