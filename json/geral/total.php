<?php
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "alberto14", "lg");
$result = $conn->query("SELECT 
						(SELECT COUNT(*) FROM lg.load 
						WHERE (status LIKE 'TO DO') 
						OR (status LIKE 'DONE' AND DATE_FORMAT(fim_inspecao, '%Y-%m-%d') = CURRENT_DATE)
						OR (status LIKE 'DOING')) as total,
						(SELECT COUNT(*) FROM lg.load 
						WHERE DATE_FORMAT(fim_inspecao, '%Y-%m-%d') = CURRENT_DATE) as done ");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp, JSON_UNESCAPED_UNICODE );
?>