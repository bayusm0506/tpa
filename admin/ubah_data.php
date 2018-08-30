<?php
require 'cek_login.php';
	include '../koneksi.php';
    koneksi_buka();	
	
	$no_formulir= $_REQUEST['no_formulir'];
	$query=mysql_query("SELECT * FROM tbl_formulir_tpa WHERE no_formulir='$no_formulir'");
	$row=mysql_fetch_array($query);
?>
<div class="span12">
	<span class="text-info"><h4>Ubah Data Peserta</h4><hr /></span>
	<form action="?page=ubah_data" method="post" class="form-horizontal">
        <div class="control-group">
            <label class="control-label">No. Formulir</label>
            <div class="controls">:
            <input type="text" name="no_formulir" id="no_formulir"  required="true"  value="<?php echo $no_formulir;?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Kode. Prodi</label>
            <div class="controls">:
            <input type="text" name="kode_prodi" id="kode_prodi"  required="true" value="<?php echo $row['kode_prodi']?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nama Lengkap</label>
            <div class="controls">:
            <input name="nama_mhs" id="nama_mhs" type="text" class="input-xlarge" value="<?php echo $row['nama_mhs'];?>" required="true" placeholder="Isi Nama Lengkap">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Fakultas</label>
            <div class="controls">:
            <select name="fakultas" size="1" required="true">
                <option value="<?php echo $row['fakultas'];?>"><?php echo $row['fakultas'];?></option>
                <option value="PSIKOLOGI">PSIKOLOGI</option>
                <option value="EKONOMI">EKONOMI</option>
                <option value="TEKNIK">TEKNIK</option>
                <option value="HUKUM">HUKUM</option>
                <option value="ISIPOL">ISIPOL</option>
                <option value="BIOLOGI">BIOLOGI</option>
                <option value="PERTANIAN">PERTANIAN</option>
            </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Program Studi</label>
            <div class="controls">:
            <select name="prodi" size="1" required="true">
            	<option value="<?php echo $row['prodi'];?>"><?php echo $row['prodi'];?></option>
            	<option value="PSIKOLOGI">PSIKOLOGI</option>
            	<option value="AKUNTANSI">AKUNTANSI</option>
                <option value="MANAJEMEN">MANAJEMEN</option>
                <option value="SIPIL">SIPIL</option>
                <option value="ELEKTRO">ELEKTRO</option>
                <option value="MESIN">MESIN</option>
                <option value="INDUSTRI">INDUSTRI</option>
                <option value="ARSITEKTUR">ARSITEKTUR</option>
                <option value="HUKUM">HUKUM</option>
                <option value="ILMU KOMUNIKASI">ILMU KOMUNIKASI</option>
                <option value="STUDI KEPEMERINTAHAN">STUDI KEPEMERINTAHAN</option>
                <option value="ADMINISTRASI PUBLIK">ADMINISTRASI PUBLIK</option>
                <option value="BIOLOGI">BIOLOGI</option>
                <option value="AGROTEKNOLOGI">AGROTEKNOLOGI</option>
                <option value="AGRIBISNIS">AGRIBISNIS</option>
                <option value="MAGISTER ADMINISTRASI PUBLIK">MAGISTER ADMINISTRASI PUBLIK</option>
                <option value="MAGISTER AGRIBISNIS">MAGISTER AGRIBISNIS</option>
                <option value="MAGISTER HUKUM">MAGISTER HUKUM</option>
                <option value="MAGISTER PSIKOLOGI">MAGISTER PSIKOLOGI</option>
            </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Alamat</label>
            <div class="controls">:
            <textarea name="alamat_mhs" class="text-area" required="true" placeholder="Isi Alamat"><?php echo $row['alamat_mhs'];?></textarea>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
            	<input name="submit" type="submit" value="Submit" class="btn btn-primary"/>
            </div>
        </div>
    </form>
</div>


<?php
if (isset($_POST['submit']))
	{
	  $nama_mhs=htmlentities((trim($_POST['nama_mhs'])));
	  $fakultas=ucwords(htmlentities((trim($_POST['fakultas']))));	
	  $prodi=ucwords(htmlentities((trim($_POST['prodi']))));
	  $alamat_mhs=htmlentities((trim($_POST['alamat_mhs'])));
	 	if(empty($nama_mhs)){
			echo 'Nama Kosong';
			exit();
		}elseif(empty($fakultas)){
			echo 'Fakultas Kosong';
			exit();
		}elseif(empty($prodi)){
			echo 'Prodi Kosong';
			exit();
		}elseif(empty($alamat_mhs)){
			echo 'Alamat Kosong';
			exit();
		}else{
		
		  $query=mysql_query("UPDATE tbl_formulir_tpa SET
				                nama_mhs='$nama_mhs',
								 fakultas='$fakultas',
								 prodi='$prodi',
								 alamat_mhs='$alamat_mhs'
								 WHERE no_formulir='$no_formulir'");
				koneksi_tutup();
				if($query){
					echo '<script language="javascript">document.location.href="?page=anggota";</script>';
				}else{
					echo mysql_error();
					exit();
				}
		}
	}else{
		unset($_POST['submit']);
	}
?> 

