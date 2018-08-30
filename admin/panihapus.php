<?php
$id= intval($_REQUEST['id']);

include '../koneksi.php';
koneksi_buka();
	$res = mysql_query("SELECT path FROM image WHERE id= '$id' LIMIT 1");
	$d = mysql_fetch_object($res);
	if (strlen($d->path)>3)
	{
	  if (file_exists($d->path)) unlink($d->path);
	}   
	$query=mysql_query("DELETE FROM image WHERE id='$id' LIMIT 1");
koneksi_tutup();

	if($query){
		echo '<script language="javascript">document.location.href="?page=panitia"</script>';
	}else{
		echo mysql_error();
		exit();
	}
?>
