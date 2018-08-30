<?php
require 'cek_login.php';	
	include '../koneksi.php';
    koneksi_buka();	
	
	$id_admin=$_REQUEST['id'];
	$query=mysql_query("SELECT * FROM admin WHERE id_admin='$id_admin'");
	$row=mysql_fetch_array($query);
?>

<div class="span12">
	<span class="text-info"><h4>Ubah Data >>&nbsp;<?php echo $row['nama_admin'];?></h4><hr /></span>
	<form action="?page=ubah" method="post" name="frm" id="frm" class="form-horizontal">
    	<input type='hidden' class='form-control' id="pswd_l" name="pswd_l" value='<?php echo $row['password'];?>'>
        <div class="control-group">
            <label class="control-label">ID :</label>
            <div class="controls">
            <input type="text" name="id" id="id" class="input-mini" required="true" readonly value="<?php echo $row['id_admin']?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nama Lengkap :</label>
            <div class="controls">
            <input name="nama" id="nama" type="text" class="input-xlarge" value="<?php echo $row['nama_admin'];?>" required="true" placeholder="Isi Nama Lengkap">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Username :</label>
            <div class="controls">
            <input type="text" name="username" id="username" class="input-xlarge" required="true" value="<?php echo $row['username']; ?>" placeholder="Isi Username">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Password Lama :</label>
            <div class="controls">
            	<input type="password" name='l_pswd' id='l_pswd' class='form-control' placeholder='Password Lama' >	
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
		$id=htmlentities((trim($_POST['id'])));
		$nama=htmlentities((trim($_POST['nama'])));
		$username=htmlentities((trim($_POST['username'])));
		$l_pswd=htmlentities((trim($_POST['l_pswd'])));	
		$pswd=md5(htmlentities((trim($_POST['pswd']))));
		$c_pswd=htmlentities((trim($_POST['c_pswd'])));
		$pswd_l=htmlentities((trim($_POST['pswd_l'])));
		$e_l_pswd=md5($l_pswd);
		$b_pswd=htmlentities((trim($_POST['pswd'])));
		
		if(empty($nama)){
			echo 'Nama Lengkap Kosong';
			exit();
		}elseif(empty($username)){
			echo 'Username Kosong';
			exit();
		}elseif(empty($l_pswd)){
			echo 'Password Lama Kosong';
			exit();
		}elseif(empty($pswd)){
			echo 'Password Baru Kosong';
			exit();
		}elseif(empty($c_pswd)){
			echo 'Konfirmasi Password Kosong';
			exit();
		}elseif($e_l_pswd != $pswd_l){
			echo 'Password Lama Tidak Sesuai <br>';
			exit();
		}elseif($b_pswd != $c_pswd){
			echo 'Password Baru Tidak Sama';
			exit();
		}else{
		
		$query=mysql_query("UPDATE admin SET
							   nama_admin='$nama',
							   username='$username',
							   password='$pswd'
							   WHERE id_admin='$id'");
			  koneksi_tutup();
			  if($query){
				  echo '<script language="javascript">document.location.href="?page=profil";</script>';
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

