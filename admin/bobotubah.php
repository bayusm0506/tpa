<?php
require 'cek_login.php';
	include '../koneksi.php';
    koneksi_buka();	
	
	$id= intval($_REQUEST['id']);
	$query=mysql_query("SELECT * FROM bobot WHERE id='$id'");
	$row=mysql_fetch_array($query);
?>
<div class="span10">
	<span class="text-info"><h4>Ubah Data Bobot Nilai</h4><hr /></span>
	<form action="?page=bobotubah" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo $id;?>" />
        <div class="control-group">
            <label class="control-label">Nilai &ge; </label>
            <div class="controls">:
            <input type="text" name="nsb" id="nsb"  required="true" class="input-small" value="<?php echo $row['angka_1']?>" placeholder="Isi Range Nilai"> / <input type="text" name="hsb" id="hsb"  required="true" class="input-medium" value="<?php echo $row['huruf_1']?>" placeholder="Isi Range Huruf">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nilai &ge; </label>
            <div class="controls">:
            <input name="nb" id="nb" type="text" class="input-small" value="<?php echo $row['angka_2'];?>" required="true" placeholder="Isi Range Nilai"> / <input name="hb" id="hb" type="text" class="input-medium" value="<?php echo $row['huruf_2'];?>" required="true" placeholder="Isi Range Huruf">
            </div>
        </div>
   		<div class="control-group">
            <label class="control-label">Nilai &le; </label>
            <div class="controls">:
            <input name="nc" id="nc" type="text" class="input-small" value="<?php echo $row['angka_3'];?>" required="true" placeholder="Isi Range Nilai"> / <input name="hc" id="hc" type="text" class="input-medium" value="<?php echo $row['huruf_3'];?>" required="true" placeholder="Isi Range Huruf">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
            	<input name="submit" type="submit" value="Simpan" class="btn btn-primary"/>
            </div>
        </div>
    </form>
</div>


<?php
if (isset($_POST['submit']))
	{
	  $id=htmlentities((trim($_POST['id'])));
	  $nsb=htmlentities((trim($_POST['nsb'])));
	  $nb=htmlentities((trim($_POST['nb'])));
	  $nc=htmlentities((trim($_POST['nc'])));
	 
	  $hsb=ucwords(htmlentities((trim($_POST['hsb']))));
	  $hb=ucwords(htmlentities((trim($_POST['hb']))));	
	  $hc=ucwords(htmlentities((trim($_POST['hc']))));
	  
			
	  $query=mysql_query("UPDATE bobot SET
	  						 angka_1='$nsb',
							 huruf_1='$hsb',
							 angka_2='$nb',
							 huruf_2='$hb',
							 angka_3='$nc',
							 huruf_3='$hc'
							 WHERE id='$id'");
			koneksi_tutup();
			if($query){
				echo '<script language="javascript">document.location.href="?page=bobot";</script>';
			}else{
				echo mysql_error();
				exit();
			}
			
	}else{
		unset($_POST['submit']);
	}
?> 

