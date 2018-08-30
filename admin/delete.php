<?php
$id= intval($_REQUEST['id']);
require 'cek_login.php';
	include '../koneksi.php';
	koneksi_buka();
	$query=mysql_query("delete from soal where id_soal='$id'");
	koneksi_tutup();
	if($query){
		echo '<script language="javascript">document.location.href="?page=view"</script>';
	}else{
		echo mysql_error();
		exit;
	}
?>
