<div class="row-fluid">
	<div class="span8">
    <table class="table table-bordered table-striped">
    	<div class="text-info"><h4>Profil >>
		<?php
			echo ucwords($_SESSION['User_Admin']);
		?> </h4></div>
		<tr><td width="39">Nama Lengkap</td><td width="118">Username</td><td width="10">Ubah</td></tr>
		<?php
            include '../koneksi.php';
            koneksi_buka();
			$kunci = ($_SESSION['Id_Admin']);
                $query = mysql_query("SELECT * FROM admin WHERE id_admin = '$kunci' ");
                while($r = mysql_fetch_array($query))
                {
                    echo '<tr><td>'.$r["nama_admin"].'</td><td>'.$r["username"].'</td><td><a href="?page=ubah&id='.$r['id_admin'].'" title="Ubah"><img src="img/update.png" /></td></tr>';
                }
            koneksi_tutup();
        ?>
   </table>
   </div>
</div>