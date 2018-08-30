<?php
$id= intval($_REQUEST['id']);

include '../koneksi.php';
koneksi_buka();
	$query=mysql_query("delete from admin where id_admin='$id'");
koneksi_tutup();

	if($query){
		echo '<script language="javascript">document.location.href="home.php?page=tambah"</script>';
	}else{
		echo mysql_error();
		exit();
	}
?>
