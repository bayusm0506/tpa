<?php
include "koneksi.php";
if(isset($_POST['submit'])){

  $id_user=$_POST['no_formulir'];
  $point=$_POST['point'];
  $tanggal=date("Y-m-d");
  koneksi_buka();
  $cekdata="select id_user from nilai where id_user='$id_user'";
  $ada=mysql_query($cekdata) or die (mysql_error());
  if (mysql_num_rows($ada)>0)
  { koneksi_tutup();
	  ?> <script type='text/javascript'>
  alert ('Data Nilai Sudah tersimpan ..!');
  window.location="index.php?page=nilai";
  </script>
	  <?php
  }
	  else
  {
  koneksi_buka();	  
  $query=mysql_query("insert into nilai values('','$id_user','$point','$tanggal')");
  koneksi_tutup();
  if($query){
	   echo '<script language="javascript">document.location.href="index.php?page=nilai"</script>';
  }else{
	  echo mysql_error();
	  exit();
  }	
}

}
?>
