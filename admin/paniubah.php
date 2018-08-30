<?php
require 'cek_login.php';
include '../koneksi.php';
    koneksi_buka();	
	
	$id= intval($_REQUEST['id']);
	$query=mysql_query("SELECT * FROM image WHERE id='$id'");
	$row=mysql_fetch_array($query);
?>

<div class="span12">
	<span class="text-info"><h4>Data Panitia Baru</h4><hr /></span>
	<form enctype="multipart/form-data" action="?page=paniubah" method="post" name="frm" id="frm" class="form-horizontal">
    	<input name="id" id="id" type="hidden" class="input-mini" required="true" placeholder="Isi ID" value="<?php echo $row['id']; ?>">
        <div class="control-group">
            <label class="control-label">Nama Lengkap :</label>
            <div class="controls">
            <input name="nama" id="nama" type="text" class="input-xlarge" required="true" placeholder="Isi Nama Lengkap Panitia" value="<?php echo $row['nama_pani']; ?>"> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Gambar :</label>
            <div class="controls">
            <img src="<?php echo $row['path']; ?>" class="image" width="100"></img>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Path  Gambar :</label>
            <div class="controls">
            <input type="text" name="path" value="<?php echo $row['path']; ?>" readonly>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilih File Gambar Baru:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <div class="controls">
            <input type="file" name="image" id="image"> <i>* Ukuran gambar Max : 490 x 536, Untuk Tanda Tangan Baru </i>
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
		$id=htmlentities((trim($_POST['id'])));
	  	$nama=htmlentities((trim($_POST['nama'])));
	  	$path=htmlentities((trim($_POST['path'])));
		
		if(empty($id)){
			echo 'Nama Kosong';
			exit();
		}elseif(empty($nama)){
			echo 'Fakultas Kosong';
			exit();
		}elseif(empty($path)){
			echo 'Path Kosong';
			exit();
		}else{
			
	 		$lokasi_file =$_FILES['image']['tmp_name'];
							
			if(empty($lokasi_file)){
				$query=mysql_query("UPDATE image SET
								 nama_pani='$nama',
								 path='$path'
								 WHERE id='$id'");
				koneksi_tutup();
				if($query){
					echo '<script language="javascript">document.location.href="?page=panitia";</script>';
				}else{
					echo mysql_error();
					exit();
				}
				
			}else{
								
				//hapus dulu gambar yg lama
				$res = mysql_query("SELECT path FROM image WHERE id= '$id' LIMIT 1");
				$d = mysql_fetch_object($res);
				if (strlen($d->path)>3)
				{
				  if (file_exists($d->path)) unlink($d->path);
				}   
				$query=mysql_query("DELETE path FROM image WHERE id='$id' LIMIT 1");
			
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
						// proses upload file dari temporary ke path file
						if (move_uploaded_file($_FILES['image']['tmp_name'], $pathFile))
						{
							$query=mysql_query("UPDATE image SET
								 nama_pani='$nama',
								 path='$pathFile'
								 WHERE id='$id'");
							$hasil = mysql_query($query);
							
							echo "Upload image ke database sukses <br>";
							echo "File berhasil diupload.";
							echo '<script language="javascript">document.location.href="home.php?page=panitia";</script>';
						}else{
							echo "File gagal diupload.";
						}
				} else{
					 echo "File yang diupload bukan file image"; 
				}
			}
		}
	}else{
		unset($_POST['submit']);
	}
?>
	</span>
</div>


