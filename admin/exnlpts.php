<?php
	$nama_file = date('d-n-Y')."_laporan_hasil_tpa_mahasiswa.xls";
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
    	<th width="60">No</th>
        <th width="102">No Formulir</th>
        <th width="100">Kode Prodi</th>
        <th width="179">Nama Peserta</th>
        <th width="100">Fakultas</th>
        <th width="200">Prodi</th>
        <th width="300">Alamat</th>
        <th width="100">Tahun Ajaran</th>
        <th width="102">Tanggal</th>
        <th width="102">Skor</th>
        <th width="102">Kategori</th>
   </tr>
<?php
include '../koneksi.php';
koneksi_buka();

$q = mysql_query("select * from nilai_pts inner join tbl_formulir_tpa on nilai_pts.id_user = tbl_formulir_tpa.no_formulir order by tbl_formulir_tpa.no_formulir ASC");
$n = 1;

while($r = mysql_fetch_array($q))
{
	$baca = mysql_query("SELECT * FROM bobot LIMIT 1");
	$rec = mysql_fetch_array($baca);
		
	if($r['point']>= $rec['angka_2']){ $warna="#B3D577";  }
	 elseif($r['point']>= $rec['angka_1']){ $warna="#ffffff"; } else {$warna="#D87676";}
	 
	/*if($r['point']>=20){ $kg="Sangat Baik";}
		  else if($r['point']>=10){ $kg="Baik";}	
			elseif($r['point']<=9){ $kg="Cukup";}
			*/
	//Cara Database
	
	
	if($r['point']>= $rec['angka_1']){  $kg= $rec['huruf_1']; }
	  else if($r['point']>= $rec['angka_2'] ){ $kg= $rec['huruf_2']; }	
		elseif($r['point']<= $rec['angka_3']){ $kg= $rec['huruf_3'];}
			
	echo '<tr bgcolor="'.$warna.'">
			<td>'.$n.'</td>
			<td>'.$r["no_formulir"].'</td>
			<td>'.$r["kode_prodi"].'</td>
			<td>'.$r["nama_mhs"].'</td>
			<td>'.$r["fakultas"].'</td>
			<td>'.$r["prodi"].'</td>
			<td>'.$r["alamat_mhs"].'</td>
			<td>'.$r["thn_ajaran"].'</td>
			<td>'.date('d - n - Y', strtotime($r["tanggal"])).'</td>
			<td>'.$r["point"].'</td>
			<td>'.$kg.'</td>
	</tr>';
	$n++;
}
koneksi_tutup();
?>
</table>
	