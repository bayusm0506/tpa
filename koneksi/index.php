<?php
    $servername="ictk1.uma.ac.id";
    $username="admin";
    $password="brs2015";
    $database="db_akademik";
    $koneksi= mysql_connect ($servername, $username, $password);

  if ($koneksi) {
    mysql_select_db ($database) or die ("Database Tidak Ditemukan");
     echo "<b> Koneksi Berhasil </b>";
   } else {
     echo "<b> Koneksi Gagal </b>";
   }

?>
