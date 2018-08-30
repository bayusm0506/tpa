<?php 
if(!isset($_SESSION['no_formulir'])){
	header("location:index.php");
	}
?>
<a href="?page=logout" onClick="return confirm('Apakah Anda yakin akan keluar?')"></a>