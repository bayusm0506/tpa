<?php
session_start();
	if($_SESSION['kode_prodi']=="801"){
		header('Location: /umaweb/tpauma/pasca/');
	}
	else if(($_SESSION['kode_prodi']=="802") || ($_SESSION['kode_prodi']=="803") || ($_SESSION['kode_prodi']=="804") ){
		header('Location: /umaweb/tpauma/pasca/');
	}
	else if(($_SESSION['kode_prodi']=="811") || ($_SESSION['kode_prodi']=="812") || ($_SESSION['kode_prodi']=="813") || ($_SESSION['kode_prodi']=="814") || ($_SESSION['kode_prodi']=="815") || ($_SESSION['kode_prodi']=="821") || ($_SESSION['kode_prodi']=="822") || ($_SESSION['kode_prodi']=="832") || ($_SESSION['kode_prodi']=="833") || ($_SESSION['kode_prodi']=="840") || ($_SESSION['kode_prodi']=="851")
	 || ($_SESSION['kode_prodi']=="852") || ($_SESSION['kode_prodi']=="853") || ($_SESSION['kode_prodi']=="860") || ($_SESSION['kode_prodi']=="870") ){
		header('Location: /');
	}
?>