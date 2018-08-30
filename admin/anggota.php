<?php 
require 'cek_login.php';
?>

<div class="">
	<span class="text-info"><h4>Tampilan Data Peserta</h4><hr /></span>
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
            <th width="40" >Ubah</th>
            <th width="40" >Hapus</th>
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
		
		$no=0; 
		$query=mysql_query("select * from tbl_formulir_tpa where thn_ajaran = '$thn_akad' order by no_formulir asc");
		
		while($row=mysql_fetch_array($query)){
	echo '<tr class="gradeA">';       
		echo'<td>'.$no=$no+1 .'</td>';
		echo'<td>'.ucwords($row['no_formulir']).'</td>';
		echo'<td>'.ucwords($row['kode_prodi']).'</td>';
		echo'<td>'.ucwords($row['nama_mhs']).'</td>';
		echo'<td>'.ucwords($row['fakultas']).'</td>';
		echo'<td>'.ucwords($row['prodi']).'</td>';
		echo'<td>'.ucwords($row['alamat_mhs']).'</td>';
		echo '<td><a href="?page=ubah_data&no_formulir='.$row['no_formulir'].'" title="Edit"><img src="img/update.png" /></a> </td>';
        ?><td><a href="hapus_data.php?no_formulir=<?php echo $row['no_formulir']; ?>" title="Delete" onclick="return confirm('Apakah anda yakin akan menghapus peserta ini ?')"><img src="img/hapus.png" /></a></td>
        <?php
	echo '</tr>';
		}
		koneksi_tutup();
		echo '<p>Download semua dalam format <a href="exportpeserta.php" target="_new">Excel</a></p>';
		?>
	</tbody>
    </table>
</div>