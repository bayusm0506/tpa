<?php 
ob_start();
session_start(); //membuat session
include '../koneksi.php';
koneksi_buka();

$nm_user=$_POST['username']; //diambil dari nama='username'
$pass_user=md5($_POST['password']); //diambil dari name='password'

//query u mendapatkan record dari username
$login=sprintf("SELECT * FROM admin WHERE username='$nm_user' AND password='$pass_user'", mysql_real_escape_string($nm_user), mysql_real_escape_string($pass_user));
$cek_lagi=mysql_query($login);
$ketemu=mysql_num_rows($cek_lagi);
$r=mysql_fetch_array($cek_lagi);
if ($ketemu > 0){
  
  $_SESSION['Id_Admin'] = $r['id_admin'];
  $_SESSION['Nama_Admin'] = $r['nama_admin'];
  $_SESSION['User_Admin'] = $r['username'];
  
  echo "<meta http-equiv='refresh' content='0; url=home.php'>";
}else{
  echo '<script>alert("Maaf... username atau password anda salah...!!!");</script>';
  echo "<meta http-equiv='refresh' content='0; url=/admin/index.php'>";
}
?>