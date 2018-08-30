<?php
define('DB_NAMA','mypro_tpa'); //nama database
define('DB_USER','root'); //nama pengguna database
define('DB_PASSWORD', 'bsm'); //password database
define('DB_HOST', 'localhost'); // ganti jika letak database mysql dikomputer laun

//fungsi u melakukan konkeksi ke database mysql
function koneksi_buka(){
	mysql_select_db(DB_NAMA,mysql_connect(DB_HOST,DB_USER,DB_PASSWORD));
}
//function u menutup koneksike database mysql
function koneksi_tutup(){
	mysql_close(mysql_connect(DB_HOST,DB_USER,DB_PASSWORD));
}
?> 