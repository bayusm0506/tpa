<?php
	$nama_file = date('d-n-Y')."_laporan_peserta_tpa_per_fakultas.xls";
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
        <th width="300">Alamat Peserta</th>
        <th width="100">Tahun Ajaran</th>
   </tr>
<?php
include '../koneksi.php';
koneksi_buka();

$kunci = $_POST['thn_ini'];
$fakultas = $_POST['fakultas'];
$q = mysql_query("select * from tbl_formulir_tpa where left(thn_ajaran,4)='$kunci' AND fakultas LIKE'%$fakultas%' order by tbl_formulir_tpa.fakultas ASC, tbl_formulir_tpa.prodi ASC, tbl_formulir_tpa.tgl_surat ASC");
$n = 1;
while($r = mysql_fetch_array($q))
{				
	echo '<tr>
			<td>'.$n.'</td>
			<td>'.$r["no_formulir"].'</td>
			<td>'.$r["kode_prodi"].'</td>
			<td>'.$r["nama_mhs"].'</td>
			<td>'.$r["fakultas"].'</td>
			<td>'.$r["prodi"].'</td>
			<td>'.$r["alamat_mhs"].'</td>
			<td>'.$r["thn_ajaran"].'</td>
	</tr>';
	$n++;
}
koneksi_tutup();
?>
</table>
	