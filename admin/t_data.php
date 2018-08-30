<?php
require 'cek_login.php';
	include '../koneksi.php';
    koneksi_buka();	
?>

<div class="span12">
	<span class="text-info"><h4>Tambah Data Baru</h4><hr /></span>
	<form action="?page=t_data" method="post" name="frm" id="frm" class="form-horizontal">
        <div class="control-group">
            <label class="control-label">Nama Lengkap :</label>
            <div class="controls">
            <input name="nama" id="nama" type="text" class="input-xlarge" required="true" placeholder="Isi Nama Lengkap">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Username :</label>
            <div class="controls">
            <input type="text" name="username" id="username" class="input-xlarge" required="true" placeholder="Isi Username">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Password Baru :</label>
            <div class="controls">
            	<input type="password" name='pswd' id='pswd' class='form-control' placeholder='Password Baru'>	
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Konfirmasi Password Baru :</label>
            <div class="controls">
            	<input type="password" name='c_pswd' id='c_pswd' class='form-control' placeholder='Konfirmasi Password Baru'>	
            </div>
        </div>
        <div class="input-group">
        	<div class="controls">
            <input class="btn btn-success" type="submit" name="submit" value="simpan" /><br />
            </div>
        </div>
    </form>
</div>

<div class="span12">
	<span class="label-warning">
<?php
if (isset($_POST['submit']))
	{
		
		$nama=htmlentities((trim($_POST['nama'])));
		$username=htmlentities((trim($_POST['username'])));	
		$pswd=htmlentities((trim($_POST['pswd'])));
		$c_pswd=htmlentities((trim($_POST['c_pswd'])));
		$e_pswd=md5($pswd);
		
		if(empty($nama)){
			echo 'Nama Lengkap Kosong';
			exit();
		}elseif(empty($username)){
			echo 'Username Kosong';
			exit();
		}elseif(empty($pswd)){
			echo 'Password Baru Kosong';
			exit();
		}elseif(empty($c_pswd)){
			echo 'Konfirmasi Password Kosong';
			exit();
		}elseif($c_pswd != $pswd){
			echo 'Kombinasi Password Tidak Sesuai <br>';
			exit();
		}else{
		
		$query=mysql_query("INSERT INTO admin(nama_admin,username,password) VALUES ('$nama','$username','$e_pswd')");
			  koneksi_tutup();
			  if($query){
				  echo '<script language="javascript">document.location.href="home.php?page=tambah";</script>';
			  }else{
				  echo mysql_error();
				  exit();
			  }
		}
	}else{
		unset($_POST['submit']);
	}
?>
	</span>
</div>


