<?php session_start();
	include "koneksi.php";
	$no_formulir = $_SESSION['no_formulir'];
	koneksi_buka();

		$query=mysql_query("select * from nilai inner join tbl_formulir_tpa on nilai.id_user = tbl_formulir_tpa.no_formulir where nama_mhs='".$_SESSION['nama_mhs']."'");
		$row=mysql_fetch_array($query);
		
		$query_1=mysql_query("select * from nilai_pts inner join tbl_formulir_tpa on nilai_pts.id_user = tbl_formulir_tpa.no_formulir where nama_mhs='".$_SESSION['nama_mhs']."'");
		$row_1=mysql_fetch_array($query_1);
		
			if (empty($row) and empty($row_1))
			{ koneksi_tutup();
			  ?><script type='text/javascript'>
			  alert ('Maaf Data Nilai Belum Ada di DataBase..!');
			  window.location="index.php";
			  </script><?php
			}
			else
			{ koneksi_tutup();
				?><script type='text/javascript'> 
				window.location="./admin/sertifikatpdf.php?no_formulir=<?php echo $no_formulir; ?>";
				</script><?php
	        }
?>
