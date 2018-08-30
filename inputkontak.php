<?php
		include "koneksi.php";
		koneksi_buka();
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$subjek = $_POST['subjek'];
		$masuk = mysql_query("INSERT INTO kontak VALUES ('$nama','$email','$mobile','$subjek')");
		if($masuk){
			echo "<script>alert('Terima Kasih kritik dan saran Anda'); window.location = 'index.php'</script>";
		}else{
			echo "<script>alert('Data Anda tidak dapat kami simpan'); window.location = 'index.php?page=kontak#kontak'</script>";
		}
	?>