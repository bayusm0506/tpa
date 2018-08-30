<?php
	$nama_file = date('d-n-Y')."_laporan_soal_tes_potensi_akademik.xls";
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");
	header("Content-Disposition: attachment;filename=".$nama_file."");
	header("Content-Transfer-Encoding: binary ");
?>
<table bordercolor="#807D79" width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr bgcolor="#AAFF00">
    	<th width="24">No</th>
        <th width="600">Pertanyaan</th>
        <th width="50">Pilihan A</th>
        <th width="50">Pilihan B</th>
        <th width="50">Pilihan C</th>
        <th width="50">Pilihan D</th>
        <th width="50">Pilihan E</th>
        <th width="50">Jawaban</th>
        <th width="50">Tampilkan</th>
   </tr>
<?php
include '../koneksi.php';
koneksi_buka();

$q = mysql_query("SELECT * FROM soal_pts");
$n = 1;
while($r = mysql_fetch_array($q))
{				
	if($r['jawaban'] !='B' and $r['jawaban'] !='D' ){ $warna="#FFFF00"; } else {$warna="#FF7F55";}
	echo '<tr bgcolor="'.$warna.'">
			<td>'.$n.'</td>
			<td>'.$r["pertanyaan"].'</td>
			<td>'.$r["pilihan_a"].'</td>
			<td>'.$r["pilihan_b"].'</td>
			<td>'.$r["pilihan_c"].'</td>
			<td>'.$r["pilihan_d"].'</td>
			<td>'.$r["pilihan_e"].'</td>
			<td>'.$r["jawaban"].'</td>
			<td>'.$r["publish"].'</td>
	</tr>';
	$n++;
}
koneksi_tutup();
?>
</table>
	