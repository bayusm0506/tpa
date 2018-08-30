<?php 
require 'cek_login.php';
?>

<div style="font-size:16px;">
	<span class="text-info"><h4>Tampilan Data Peserta</h4><hr /></span>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
    <thead>
    	<tr>
            <th width="34" align="left">No.</th>
            <th width="63" align="left">Kabupaten</th>
            <th width="63" align="left">Kecamatan</th>
            <th width="345" align="left">Kelurahan</th>
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
		$query=mysql_query("select * from data_kecamatan order by kecamatan asc");
		
		while($row=mysql_fetch_array($query)){
	echo '<tr class="gradeA">';       
		echo'<td>'.$no=$no+1 .'</td>';
		echo'<td>'.ucwords($row['kabupaten']).'</td>';
		echo'<td>'.ucwords($row['kecamatan']).'</td>';
		echo'<td>'.ucwords($row['kelurahan']).'</td>';
        ?>
        <?php
	echo '</tr>';
		}
		koneksi_tutup();
		//echo '<p>Download semua dalam format <a href="exportpeserta.php" target="_new">Excel</a></p>';
		?>
	</tbody>
    </table>
</div>