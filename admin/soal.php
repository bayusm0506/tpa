<?php
require 'cek_login.php';
	include '../koneksi.php';
    koneksi_buka();

	if (isset($_POST['submit']))
	{
		$pertanyaan=ucwords(htmlentities((trim($_POST['pertanyaan']))));
		$pilihan_a=ucwords(htmlentities((trim($_POST['pilihan_a']))));
		$pilihan_b=ucwords(htmlentities((trim($_POST['pilihan_b']))));
	
		$jawaban=ucwords(htmlentities((trim($_POST['jawaban']))));
		$publish=htmlentities((trim($_POST['publish'])));
		
		$query=mysql_query("insert into soal values('','$pertanyaan','$pilihan_a','$pilihan_b','$jawaban','$publish')");
		if($query){
			koneksi_tutup();
			echo '<script language="javascript">document.location.href="?page=view";</script>';
		}else{
			echo mysql_error();
		}
	}else{
		unset($_POST['submit']);
	}?>

<div class="span12">
	<span class="text-info"><h4>Input Soal Tes Personaliti Akademik</h4><hr /></span>
    <form action="?page=soal" method="post" name="soal" class="form-horizontal">
    	<div class="control-group">
            <label class="control-label">Pertanyaan</label>
            <div class="controls">:
            <textarea cols="23" rows="5" name="pertanyaan" required="true" placeholder="Isikan Pertanyaan" class="text-area"/></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan (+)</label>
            <div class="controls">:
            <input type="text" name="pilihan_a" class="input-medium" required="true" placeholder="Isikan +">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan (-)</label>
            <div class="controls">:
            <input type="text" name="pilihan_b" class="input-medium" required="true" placeholder="Isikan -">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Jawaban</label>
            <div class="controls">:
            <select name="jawaban" class="input-mini" required="true">
                <option value="a">(+)</option>
                <option value="b">(-)</option>
            </select>
        	</div>
        </div>
        <div class="control-group">
            <label class="control-label">Tampilkan</label>
            <div class="controls">:
            <select name="publish" class="input-mini" required="true">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        	</div>
        </div>
        <div class="control-group">
            <div class="controls">
            <input name="submit" type="submit" value="Submit" class="btn btn-primary"/>
        	</div>
        </div>
    </form>
</div>
    


    
