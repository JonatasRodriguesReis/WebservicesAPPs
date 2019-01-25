<?php
header("Content-Type: application/json; charset=UTF-8");

echo $inspetor = $_GET['inspetor'];

$conn = new mysqli("localhost", "root", "", "lg");
$result = $conn->query("SELECT * FROM lg.load WHERE YEAR(inicio_inspecao) LIKE (SELECT YEAR(SYSDATE()) )  AND inspetor_iqc LIKE 'Marcia';");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

$data = array();
$label = array();

foreach ($outp as $value) {
  $data[] = $value['tempo_inspecao'];
  //$label[] = $value['inspetor_iqc'];
}

echo json_encode($data);
?>
