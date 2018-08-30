<?php
$con = mysql_connect("tpa.uma.ac.id","tpaumaac_tpa14","uma14tpabaru");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("tpaumaac_tpa", $con);

$result = mysql_query("SELECT prodi, COUNT(*) AS JUMLAH
FROM tbl_formulir_tpa    
GROUP BY prodi");

$rows = array();
while($r = mysql_fetch_array($result)) {
	$row[0] = $r[0];
	$row[1] = $r[1];
	array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 

