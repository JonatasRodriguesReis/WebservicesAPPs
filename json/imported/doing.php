<?php
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "alberto14", "lg");
$result = $conn->query("SELECT asn, item, item_name AS item_consulta, receipt_qty, departure_date, receipt_date, iqc_received, inicio_inspecao, fim_inspecao, status, inspetor_iqc,
						(SELECT ROUND(AVG(tempo_inspecao)/60) FROM lg.load WHERE (item_name LIKE item_consulta) AND (status LIKE 'DONE') GROUP BY item_name) AS time
						FROM lg.load 
						WHERE status = 'DOING' AND item_type = 'Imported Item' AND (nw = 7)");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>