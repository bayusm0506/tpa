<?php
include "koneksi.php";
koneksi_buka();

$publish = $_GET['publish'];
$data = mysql_query("SELECT * FROM soal WHERE publish='$publish'");

$json = '{"soal":[ ';
while($x = mysql_fetch_array($data)){
    $json .= '{';
    $json .= '"id":"'.$x['id_soal'].'",
        "publish":"'.htmlspecialchars($x['publish']).'",
        "pertanyaan":"'.htmlspecialchars($x['pertanyaan']).'",
        "A":"'.$x['pilihan_a'].'",
        "B":"'.$x['pilihan_b'].'",
        "jawaban":"'.$x['jawaban'].'"
    },';
}
$json = substr($json,0,strlen($json)-1);
$json .= ']';

$json .= '}';
echo $json;
koneksi_tutup();
?>
