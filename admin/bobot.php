<?php 
require 'cek_login.php';
?>

<div class="span10">
	<span class="text-info"><h4>Data Bobot Nilai</h4><hr /></span>
    <table class="table table-striped table-bordered">
    	<tr>
        	<th width="50" >Range</th>
            <th width="50" >Nilai</th>
            <th width="100" >Huruf</th>
            <th width="400" >Keterangan</th>
        </tr>
        <?php 
		include '../koneksi.php';
	  	koneksi_buka();
		
		$query=mysql_query("SELECT * FROM bobot LIMIT 1");
		
		while($row=mysql_fetch_array($query)){
	echo '<tr>';  
		echo'<td><b>&ge;</b></td>';     
		echo'<td>'.$row['angka_1'].'</td>';
		echo'<td>'.$row['huruf_1'].'</td>';
		echo'<td>Kriteria Diatas sama dengan &ge; <i>'.$row['angka_1'].'</i> dari Jumlah Soal termasuk dalam range <i>'.$row['huruf_1'].'</i></td>';
	echo '</tr>';
	echo '<tr>';
		echo'<td><b>&ge;</b></td>';
		echo'<td>'.$row['angka_2'].'</td>';
		echo'<td>'.$row['huruf_2'].'</td>';
		echo'<td>Kriteria Diatas sama dengan &ge; <i>'.$row['angka_2'].'</i> dari Jumlah Soal termasuk dalam range <i>'.$row['huruf_2'].'</i></td>';
	echo '</tr>';
	echo '<tr>';
		echo'<td><b>&le;</b></td>';
		echo'<td>'.$row['angka_3'].'</td>';
		echo'<td>'.$row['huruf_3'].'</td>';
		echo'<td>Kriteria Dibawah sama dengan &ge; <i>'.$row['angka_3'].'</i> dari Jumlah Soal termasuk dalam range <i>'.$row['huruf_3'].'</i></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td colspan="4"><a href="?page=bobotubah&id='.$row['id'].'" title="Ubah"><img src="img/update.png" /></a> </td>';
	echo '</tr>';
		}
		koneksi_tutup();
		?>
    </table>
</div>
?>