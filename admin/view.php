<?php
require 'cek_login.php';
include '../koneksi.php';
koneksi_buka();

echo '<span class="text-info"><h4>Tampilan Soal Personal: </h4><hr></span>';
echo '<div class="span10">';
echo '<p>Download semua dalam format <a href="exportsoal.php" target="_new">Excel</a></p>';
echo '<table class="table table-striped table-bordered">';
echo '<tr>
		<th width="5px">No.</th>
		<th width="180px">Pertanyaan</th>
		<th width="5px">Pilihan A</th>
		<th width="5px">Pilihan B</th>
		<th width="5px">Jawaban</th>
		<th width="5px">Tampilkan</th>
		<th width="5px">Ubah</th>
		<th width="5px">Hapus</th>
	</tr>';
$no=1;
$query=mysql_query("select * from soal");
while($row=mysql_fetch_array($query))
{
	echo '<tr>';
	echo '<td >'.$no++.'</td>';
	echo '<td >'.$row['pertanyaan'].'</td>';
	echo '<td >'.$row['pilihan_a'].'</td>';
    echo '<td >'.$row['pilihan_b'].'</td>';
	echo '<td >'.$row['jawaban'].'</td>';
	echo '<td >'.ucwords($row['publish']).'</td>';
    echo '<td ><a href="?page=edit&id='.$row['id_soal'].'" title="Ubah"><img src="img/update.png" /></a> </td>';
    ?><td ><a href="?page=delete&id=<?php echo $row['id_soal']; ?>" title="Hapus" onclick="return confirm('Apakah anda yakin akan menghapus pertanyaan ini ?')"><img src="img/hapus.png" /></a></td>
	<?php echo '</tr>';
}
koneksi_tutup();
echo '</table>';
echo '</div>';
?>
