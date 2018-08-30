<?php
require 'cek_login.php';
?>
<div class="span12">
	<span class="text-info"><h4>Daftar Nilai Tes Personaliti Akademik</h4><hr /></span>
   <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
    	<thead>
    	<tr>
            <th width="34" align="center">No.</th>
            <th width="63" >No. Formulir</th>
            <th width="63" >Kode. Prodi</th>
            <th width="345" >Nama Peserta</th>
            <th width="125" >Fakultas</th>
            <th width="130" >Program Studi</th>
            <th width="345" >Alamat</th>
            <th width="172">Tanggal</th>
            <th width="72">Skor</th>
            <th width="121">Klasifikasi</th>
            <th width="20">Print</th>
        </tr>
    </thead>
    <tbody>
    <?php
	include '../koneksi.php';
	koneksi_buka();
	
	//Tahun Akademik
	 $thn = date("Y");
	 $jlh_thn = $thn+1;
	 $thn_akad=$thn."/".$jlh_thn;
	 
	$no=1; 
	$query=mysql_query("select * from nilai inner join tbl_formulir_tpa on nilai.id_user = tbl_formulir_tpa.no_formulir where tbl_formulir_tpa.thn_ajaran = '$thn_akad' order by tbl_formulir_tpa.no_formulir desc");
	
	while($row=mysql_fetch_array($query)){
		//ubah disini untuk menentukan range nilai
		
		/*if($row['point']>=20){ $kg="Sangat Baik";}
		  else if($row['point']>=10){ $kg="Baik";}	
			elseif($row['point']<=9){ $kg="Cukup";}*/
		
		//cara database
		$baca = mysql_query("SELECT * FROM bobot LIMIT 1");
		$rec = mysql_fetch_array($baca);
		
		if($row['point']>= $rec['angka_1']){ $kg=$rec['huruf_1'];}
		  else if($row['point']>=$rec['angka_2']){ $kg=$rec['huruf_2'];}	
			elseif($row['point']<=$rec['angka_3']){ $kg=$rec['huruf_3'];}
			
		echo '<tr lass="gradeA">';
			echo'<td>'.$no=$no+1 .'</td>';
			echo'<td>'.ucwords($row['no_formulir']).'</td>';
			echo'<td>'.ucwords($row['kode_prodi']).'</td>';
			echo'<td>'.ucwords($row['nama_mhs']).'</td>';
			echo'<td>'.ucwords($row['fakultas']).'</td>';
			echo'<td>'.ucwords($row['prodi']).'</td>';
			echo'<td>'.ucwords($row['alamat_mhs']).'</td>';
			echo '<td>'.date('d - n - Y', strtotime($row['tanggal'])).'</td>';
			echo '<td>'.$row['point'].'</td>';
			echo '<td>'.$kg.'</td>';
			echo '<td><a href="sertifikatpdf.php?no_formulir='.$row['no_formulir'].'" title="Print"  target="_new"><img src="img/printer.png" /></a></td>';
		echo '</tr>';
	}
	koneksi_tutup();
	echo '<p>Download semua dalam format <a href="exportnilai.php" target="_new">Excel</a></p>';
	?>
	</tbody>
    </table>
</div>



    