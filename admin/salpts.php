<?php
require 'cek_login.php';

	include '../koneksi.php';
	require 'cek_xss.php';
    koneksi_buka();

	if (isset($_POST['submit']))
	{
		$pertanyaan=xss_cegah(ucwords(htmlentities((trim($_POST['pertanyaan'])))));
		$pilihan_a=xss_cegah(ucwords(htmlentities((trim($_POST['pilihan_a'])))));
		$pilihan_b=xss_cegah(ucwords(htmlentities((trim($_POST['pilihan_b'])))));
		$pilihan_c=xss_cegah(ucwords(htmlentities((trim($_POST['pilihan_c'])))));
		$pilihan_d=xss_cegah(ucwords(htmlentities((trim($_POST['pilihan_d'])))));
		$pilihan_e=xss_cegah(ucwords(htmlentities((trim($_POST['pilihan_e'])))));
		
		$jawaban=ucwords(htmlentities((trim($_POST['jawaban']))));
		$publish=htmlentities((trim($_POST['publish'])));
		
		$query=mysql_query("insert into soal_pts values('','$pertanyaan','$pilihan_a','$pilihan_b','$pilihan_c','$pilihan_d','$pilihan_e','$jawaban','$publish')") or die(mysql_error());
		if($query){
			koneksi_tutup();
			echo '<script language="javascript">document.location.href="?page=vwpts";</script>';
		}else{
			echo mysql_error();
		}
	}else{
		unset($_POST['submit']);
	}?>

<div class="span12">
	<span class="text-info"><h4>Input Soal Tes Potensi Akademik</h4><hr /></span>
    <form action="?page=salpts" method="post" name="soal" class="form-horizontal">
    	<div class="control-group">
            <label class="control-label">Pertanyaan</label>
            <div class="controls">:
            <textarea cols="23" rows="5" name="pertanyaan" required="true" placeholder="Isikan Pertanyaan" class="text-area"/></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan (A)</label>
            <div class="controls">:
            <input type="text" name="pilihan_a" class="input-xlarge" required="true" placeholder="Isikan Jawaban">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan (B)</label>
            <div class="controls">:
            <input type="text" name="pilihan_b" class="input-xlarge" required="true" placeholder="Isikan Jawaban">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan (C)</label>
            <div class="controls">:
            <input type="text" name="pilihan_c" class="input-xlarge" required="true" placeholder="Isikan Jawaban">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan (D)</label>
            <div class="controls">:
            <input type="text" name="pilihan_d" class="input-xlarge" required="true" placeholder="Isikan Jawaban">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pilihan (E)</label>
            <div class="controls">:
            <input type="text" name="pilihan_e" class="input-xlarge" required="true" placeholder="Isikan Jawaban">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Jawaban</label>
            <div class="controls">:
            <select name="jawaban" class="input-mini" required="true">
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
                <option value="e">E</option>
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
    
<?php
?>



    
