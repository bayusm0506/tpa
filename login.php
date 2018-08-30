<?php
include 'koneksi.php';

if(isset($_POST['kode_prodi'])){
	$kode_prodi=htmlentities($_POST['kode_prodi']);
	$no_formulir=$_POST['no_formulir'];
	
	
	if(empty($kode_prodi) || empty($no_formulir)){
	
		echo '<p>No. Formulir atau No. No. Peserta Anda masih kosong. silahkan ulangi <a href="index.php">Login</a></p>';
		
	}else{
		koneksi_buka();
		$login=("SELECT * FROM tbl_formulir_tpa WHERE kode_prodi='$kode_prodi' AND no_formulir='$no_formulir'");
		$cek_lagi=mysql_query($login);
		$ketemu=mysql_num_rows($cek_lagi);
		$r=mysql_fetch_array($cek_lagi);
		if ($ketemu > 0){
		  $_SESSION['kode_prodi'] = $r['kode_prodi'];
		  $_SESSION['nama_mhs'] = $r['nama_mhs'];
		  $_SESSION['no_formulir'] = $r['no_formulir'];
		  //$_SESSION['nama'] = $r['nama'];
			
		  koneksi_tutup();
			echo '<script language="javascript">document.location.href="auth.php";</script>';
		}else{
			echo '<script>alert("Maaf... username atau password anda salah...!!!");</script>';
			echo '<script language="javascript">document.location.href="index.php";</script>';
			echo mysql_error();
			exit();
		}
	
	}

}else{
	unset($_POST['kode_prodi']);
}
?>