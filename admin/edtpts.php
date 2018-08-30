<?php
require 'cek_login.php';
	include '../koneksi.php';
    koneksi_buka();	
	
	$id_soal= intval($_REQUEST['id']);
	$query=mysql_query("select * from soal_pts where id_soal='$id_soal'");
	$row=mysql_fetch_array($query);
?>
<div class="span12">
	<span class="text-info"><h4>Ubah Soal Ujian Potensi</h4><hr /></span>
	<form action="?page=edtpts" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="<?php echo $id_soal;?>" />
        <div class="control-group">
            <label class="control-label">Pertanyaan</label>
            <div class="controls">:
            <textarea name="pertanyaan" id="pertanyaan"  required="true"><?php echo $row['pertanyaan']?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan A</label>
            <div class="controls">:
            <input name="pilihan_a" id="pilihan_a" type="text" class="input-xlarge" value="<?php echo $row['pilihan_a'];?>" required="true">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan B</label>
            <div class="controls">:
            <input type="text" name="pilihan_b" id="pilihan_b" class="input-xlarge" value="<?php echo $row['pilihan_b'];?>" required="true"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan C</label>
            <div class="controls">:
            <input name="pilihan_c" id="pilihan_c" type="text" class="input-xlarge" value="<?php echo $row['pilihan_c'];?>" required="true">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan D</label>
            <div class="controls">:
            <input type="text" name="pilihan_d" id="pilihan_d" class="input-xlarge" value="<?php echo $row['pilihan_d'];?>" required="true"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan E</label>
            <div class="controls">:
            <input type="text" name="pilihan_e" id="pilihan_e" class="input-xlarge" value="<?php echo $row['pilihan_e'];?>" required="true"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Jawaban</label>
            <div class="controls">:
            <select name="jawaban" required="true" class="input-mini">
                <option value="a" <?php if($row['jawaban']=="A"){ echo "selected='selected'"; }?>>A</option>
                <option value="b" <?php if($row['jawaban']=="B"){ echo "selected='selected'"; }?>>B</option>
                <option value="c" <?php if($row['jawaban']=="C"){ echo "selected='selected'"; }?>>C</option>
                <option value="d" <?php if($row['jawaban']=="D"){ echo "selected='selected'"; }?>>D</option>
                <option value="e" <?php if($row['jawaban']=="E"){ echo "selected='selected'"; }?>>E</option>
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
	  $pilihan_c=ucwords(htmlentities((trim($_POST['pilihan_c']))));
	  $pilihan_d=ucwords(htmlentities((trim($_POST['pilihan_d']))));
	  $pilihan_e=ucwords(htmlentities((trim($_POST['pilihan_e']))));	
	  $jawaban=ucwords(htmlentities((trim($_POST['jawaban']))));
	  $publish=htmlentities((trim($_POST['publish'])));
			
	  $query=mysql_query("update soal_pts set pertanyaan='$pertanyaan',pilihan_a='$pilihan_a',pilihan_b='$pilihan_b',pilihan_c='$pilihan_c',pilihan_d='$pilihan_d',pilihan_e='$pilihan_e',jawaban='$jawaban',publish='$publish' where id_soal='$id'");
			koneksi_tutup();
			if($query){
				echo '<script language="javascript">document.location.href="?page=vwpts";</script>';
			}else{
				echo mysql_error();
				exit();
			}
			
	}else{
		unset($_POST['submit']);
	}
?> 

