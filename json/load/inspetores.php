<?php
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "lg");
$result = $conn->query("SELECT DISTINCT(inspetor_iqc) FROM lg.load WHERE YEAR(inicio_inspecao) LIKE (SELECT YEAR(SYSDATE()));");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
