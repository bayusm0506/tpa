<?php
require 'cek_login.php';
include '../koneksi.php';
    koneksi_buka();	
?>

<div class="span8">
	<span class="text-info"><h4>Data Panitia Baru</h4><hr /></span>
	<form enctype="multipart/form-data" action="?page=panitambah" method="post" name="frm" id="frm" class="form-horizontal">
        <div class="control-group">
            <label class="control-label">Nama Lengkap :</label>
            <div class="controls">
            <input name="nama" id="nama" type="text" class="input-xlarge" required="true" placeholder="Isi Nama Lengkap Panitia"> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilih File Gambar :</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <div class="controls">
            <input type="file" name="image" id="image"> <i>* Ukuran gambar Max : 490 x 536, Untuk Tanda Tangan </i>
            </div>
        </div>
        <div class="input-group">
        	<div class="controls">
            <input class="btn btn-success" type="submit" name="submit" value="simpan" /><br />
            </div>
        </div>
    </form>
</div>

<div class="span8">
	<span class="label-warning">
<?php
if (isset($_POST['submit']))
	{ 
		$extensionList = array("bmp", "jpg", "gif"); 
		
		$fileName = $_FILES['image']['name'];
		$pecah = explode(".", $fileName);
		$ekstensi = $pecah[1];
 
		// nama direktori upload
		$namaDir = 'gambar/';
		
		// membuat path nama direktori + nama file.
		$pathFile = $namaDir . $fileName;
 
		if (in_array($ekstensi, $extensionList))
		{
			// memindahkan file ke temporary
			$tmpName  = $_FILES['image']['tmp_name'];
			$nama     = $_POST['nama'];
			
			// membaca data file image temporary
			$fp        = fopen($tmpName, 'r');
			$dataimage = fread($fp, filesize($tmpName));
			
			// mengganti data image berupa slash menjadi double slash
			$dataimage = addslashes($dataimage);
			
			fclose($fp);
			
			//$query = "INSERT INTO image(nama_pani, image, path) VALUES ('$nama', '$dataimage','$pathFile')"; untuk di data base gunakan logblob
			$query = "INSERT INTO image(nama_pani, path) VALUES ('$nama','$pathFile')";
			$hasil = mysql_query($query);
			if ($hasil) 
			{
				echo "Upload image ke database sukses <br>";
				// proses upload file dari temporary ke path file
				if (move_uploaded_file($_FILES['image']['tmp_name'], $pathFile))
				{
				echo "File berhasil diupload.";
				echo '<script language="javascript">document.location.href="home.php?page=panitia";</script>';
				}
				else
				{
				echo "File gagal diupload.";
				}
			}else{
				 echo "Upload image ke database gagal";
			}
		}
		else echo "File yang diupload bukan file image"; 
		
	}else{
		unset($_POST['submit']);
	}
?>
	</span>
</div>


