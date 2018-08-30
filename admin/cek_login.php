<?php
if(!isset($_SESSION))
{
	session_start();
	if(empty($_SESSION['Id_Admin']) and empty($_SESSION['Nama_Admin']) and empty($_SESSION['User_Admin']))
	{
		header('Location: index.php');
	}
}
?>  