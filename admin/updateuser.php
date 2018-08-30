<?php

require 'cek_login.php';
	include '../koneksi.php';
    koneksi_buka();	
if (isset($_POST['submit']))
	{
	  $no_formulir=htmlentities((trim($_POST['no_formulir'])));
	  $nama=htmlentities((trim($_POST['nama'])));
	  $fakultas=ucwords(htmlentities((trim($_POST['fakultas']))));	
	  $prodi=ucwords(htmlentities((trim($_POST['prodi']))));
	  $alamat=htmlentities((trim($_POST['alamat'])));
	 	
		if(empty($no_formulir)){
			echo 'No Formulir Kosong';
			exit();
		}elseif(empty($nama)){
			echo 'Nama Kosong';
			exit();
		}elseif(empty($fakultas)){
			echo 'Fakultas Kosong';
			exit();
		}elseif(empty($prodi)){
			echo 'Prodi Kosong';
			exit();
		}elseif(empty($alamat)){
			echo 'Alamat Kosong';
			exit();
		}else{
		
		  $query=mysql_query("UPDATE tbl_mhs SET
								 no_formulir='$no_formulir',
								 nama_mhs='$nama',
								 fakultas='$fakultas',
								 prodi='$prodi',
								 alamat='$alamat'
								 WHERE no_formulir='$no_formulir'");
				koneksi_tutup();
				if($query){
					echo '<script language="javascript">document.location.href="?page=anggota";</script>';
				}else{
					echo mysql_error();
					exit();
				}
		}
	}else{
		unset($_POST['submit']);
	}
?> 

