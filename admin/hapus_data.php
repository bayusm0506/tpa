<?php
$id= $_GET['no_formulir'];

include '../koneksi.php';
koneksi_buka();
	$query=mysql_query("delete from tbl_formulir_tpa where no_formulir='$id'");
	$query_n=mysql_query("delete from nilai where id_user='$id'");
	$query_np=mysql_query("delete from nilai_pts where id_user='$id'");
koneksi_tutup();

	if($query){
		echo '<script language="javascript">document.location.href="home.php?page=anggota"</script>';
	}else{
		echo mysql_error();
		exit();
	}
?>
