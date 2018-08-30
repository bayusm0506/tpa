<?php
require 'cek_login.php';
	include '../koneksi.php';
	//Tahun Akademik
	 $thn = date("Y");
	 $jlh_thn = $thn+1;
	 $thn_akad=$thn."/".$jlh_thn;

	 $tgl_surat = date("Y-m-d");
	 $tglupdate = date("Y-m-d H:i:s");
	 
	$no_formulir=$_POST['no_formulir'];
	$nama_mhs=$_POST['nama_mhs'];
	$fakultas=$_POST['fakultas'];
	$kode_prodi=$_POST['kode_prodi'];
	$prodi=$_POST['prodi'];
	$alamat_mhs=$_POST['alamat_mhs'];
	//$awal = $_POST['alamat'];
	// dibikin kecil semua dulu
	//$akhir = strtolower($awal);
	// baru dibikin huruf besar diawal kata
	//$alamat = ucwords($akhir);
	//$alamat=ucwords($_POST['alamat']);
	
	if(empty ($no_formulir)){
		echo'No Formulir Kosong';
		exit();
	}elseif(empty($nama_mhs)){
		echo 'Nama Mahasiswa Kosong';
		exit();
	}elseif(empty($fakultas)){
		echo 'fakultas Kosong';
		exit();
	}elseif(empty($kode_prodi)){
		echo 'kode_prodi Kosong';
		exit();
	}elseif(empty($prodi)){
		echo 'Prodi Kosong';
		exit();
	}elseif(empty($alamat_mhs)){
		echo 'Alamat Kosong';
		exit();
	}else{
	
	koneksi_buka();	
	$cekdata="select no_formulir from tbl_formulir_tpa where no_formulir='$no_formulir'";
	$ada=mysql_query($cekdata) or die (mysql_error());
	   if (mysql_num_rows($ada)>0)
		 { koneksi_tutup(); ?> <script type='text/javascript'>
					alert ('Data Peserta ini Sudah tersimpan ..!');
					window.location="home.php?page=aggota";
				</script> <?php
		  }else{
	koneksi_buka();
	$upload=mysql_query("INSERT INTO tbl_formulir_tpa(id_user ,
			no_formulir ,
			nama_mhs ,
			fakultas ,
			prodi ,
			alamat_mhs ,
			thn_ajaran ,
			tgl_surat ,
			kode_fak ,
			kode_prodi ,
			user_id ,
			tglupdate) VALUES (NULL ,  '$no_formulir',  '$nama_mhs',  '$fakultas',  '$prodi',  '$alamat_mhs',  '$thn_akad',  '$tgl_surat',  '',  '$kode_prodi',  '',  '$tglupdate')");
	koneksi_tutup();	
		if($upload)
			{
				echo "<p>Data Anda berhasil disimpan. Silahkan Peserta untuk Login</p>";
				exit();
			} else {
				echo "<p>Proses upload gagal, kode error = " . $_FILES['location']['error']."</p>";
			}
		  }
	}
?>