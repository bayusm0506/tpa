<script language="javascript">
	function hapus(pesan) {
		var pesan = prompt("Masukkan Kode Verifikasi","")
		if (pesan == 2112014){
			return true;
		}else {
			return false;
		}
	}
</script>

<div class="row-fluid">
	<div class="span10">
    <table class="table table-bordered table-striped">
    	<div class="text-info"><h4>Tambah Data</h4></div><hr />
		<tr><td width="39">Nama Lengkap</td><td width="118">Username</td><td width="5">Ubah</td><td width="5">Hapus</td></tr>
		<?php
            include '../koneksi.php';
            koneksi_buka();
			$kunci = ($_SESSION['Id_Admin']);
                $query = mysql_query("SELECT * FROM admin");
                while($r = mysql_fetch_array($query))
                {
                    echo '<tr><td>'.$r["nama_admin"].'</td><td>'.$r["username"].'</td><td><a href="?page=ubah&id='.$r['id_admin'].'" title="Ubah"><i class="icon-minus"></i></a></td><td><a href="?page=hapus&id='.$r['id_admin'].'" title="Hapus" onclick="return hapus(\'Data >> '.$r['nama_admin'].' << Yakin mau dihapus ?? \')"><i class="icon-remove"></i></a></td></tr>';
                }
            koneksi_tutup();
        ?>
   </table>
   
    <span class="btn btn-warning"><a href="?page=t_data" title="Tambah">Tambah</a></span>
	</div>
</div>

  <!--<td><a href="?page=hapus&id='.$r['id_admin'].'" title="Hapus" onclick="return hapus(\'Data >> '.$r['nama_admin'].' << Yakin mau dihapus ?? \')"><i class="icon-remove"></i></a></td>-->