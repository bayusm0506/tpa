<?php
require 'cek_login.php';
	include '../koneksi.php';
    koneksi_buka();	
	
	$id_soal= intval($_REQUEST['id']);
	$query=mysql_query("select * from soal where id_soal='$id_soal'");
	$row=mysql_fetch_array($query);
?>
<div class="span12">
	<span class="text-info"><h4>Ubah Soal Ujian</h4><hr /></span>
	<form action="?page=edit" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo $id_soal;?>" />
        <div class="control-group">
            <label class="control-label">Pertanyaan</label>
            <div class="controls">:
            <textarea name="pertanyaan" id="pertanyaan"  required="true"><?php echo $row['pertanyaan']?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan A (+)</label>
            <div class="controls">:
            <input name="pilihan_a" id="pilihan_a" type="text" class="input-medium" value="<?php echo $row['pilihan_a'];?>" required="true">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan B (-)</label>
            <div class="controls">:
            <input type="text" name="pilihan_b" id="pilihan_b" class="input-medium" value="<?php echo $row['pilihan_b'];?>" required="true"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Jawaban</label>
            <div class="controls">:
            <select name="jawaban" required="true" class="input-mini">
                <option value="a" <?php if($row['jawaban']=="A"){ echo "selected='selected'"; }?>>(+)</option>
                <option value="b" <?php if($row['jawaban']=="B"){ echo "selected='selected'"; }?>>(-)</option>
            </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Tampilkan</label>
            <div class="controls">:
            <select name="publish" required="true" class="input-mini">
                <option value="yes" <?php if($row['publish']=="yes"){ echo "selected='selected'"; }?>>Yes</option>
                <option value="no" <?php if($row['publish']=="no"){ echo "selected='selected'"; }?>>No</option>
            </select>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">:
            	<input name="submit" type="submit" value="Submit" class="btn btn-primary"/>
            </div>
        </div>
    </form>
</div>


<?php
if (isset($_POST['submit']))
	{
	  $id=htmlentities((trim($_POST['id'])));
	  $pertanyaan=ucwords(htmlentities((trim($_POST['pertanyaan']))));
	  $pilihan_a=ucwords(htmlentities((trim($_POST['pilihan_a']))));
	  $pilihan_b=ucwords(htmlentities((trim($_POST['pilihan_b']))));	
	  $jawaban=ucwords(htmlentities((trim($_POST['jawaban']))));
	  $publish=htmlentities((trim($_POST['publish'])));
			
	  $query=mysql_query("update soal set pertanyaan='$pertanyaan',pilihan_a='$pilihan_a',pilihan_b='$pilihan_b',jawaban='$jawaban',publish='$publish' where id_soal='$id'");
			koneksi_tutup();
			if($query){
				echo '<script language="javascript">document.location.href="?page=view";</script>';
			}else{
				echo mysql_error();
				exit();
			}
			
	}else{
		unset($_POST['submit']);
	}
?> 

