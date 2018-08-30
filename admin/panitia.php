<script language="javascript">
	function hapus(pesan) {
		var pesan = prompt("Masukkan Kode Verifikasi","")
		if (pesan == 2112014){
			return true;
		}else {
			return false;
		}
	}
	function tambah(i){
		var i = ("Hapus Dulu Data Panitia");
	}
</script>

<div class="row-fluid">
	<div class="span10">
    <table class="table table-bordered table-striped" width="450">
    	<div class="text-info"><h4>Data Panitia</h4></div><hr />
		<tr><td width="300">Nama Lengkap</td><td width="300">Path</td><td width="100">Gambar</td><td width="50" colspan="2">Aksi</td></tr>
		<?php						
            include '../koneksi.php';
            koneksi_buka();
                $query = mysql_query("SELECT * FROM image");
                while($r = mysql_fetch_array($query))
                {						
                    echo '<tr><td>'.$r["nama_pani"].'</td><td>'.$r['path'].'</td><td><img src="'.$r['path'].'" alt="'.$r['path'].'" title="'.$r['path'].'" width="50" /></img></td><td><a href="?page=paniubah&id='.$r['id'].'" title="Ubah"><i class="icon-pencil"></i></a></td><td><a href="?page=panihapus&id='.$r['id'].'" title="Hapus" onclick="return hapus(\'Data >> '.$r['nama_pani'].' << Yakin mau dihapus ?? \')"><i class="icon-remove"></i></a></td></tr>';
                }
            koneksi_tutup();
        ?>
   </table>
    <span class="btn btn-warning"><a href="?page=panitambah" title="Tambah" onclick="return confirm('--- PERINGATAN..!! --- Panitia Cuma 1, Kosongkan Terlebih Dahulu, untuk Data Baru.')">Tambah</a></span>
	</div>
</div>
