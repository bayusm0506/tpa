<?php
require 'cek_login.php';
include '../koneksi.php';
koneksi_buka();

$thn = date("Y");
$jlh_thn = $thn+1;
$thn_akad=$thn."/".$jlh_thn;
?>

<div class="container-fluid">
	<div class="span10">
    <div class="text-success">
        <h4>Download Peserta TPA Per Tahun Akademik</h4><hr />
    </div>
     <form class="form-horizontal" action="downpeserta.php" method="post" name="frm" id="frm" target="_blank">
     	  <div class="control-group">
            <div class="control-label">Eksport Keseluruhan :</div>
            <div class="controls">
            	<select id="thn_ini" name="thn_ini" class="input-small"><?php
                        for($thn_ini=2007;$thn_ini<=$thn;$thn_ini++)
						{
                          echo '<option value='.$thn_ini.'>'.$thn_ini.'</option>';
						  }?>
                </select>
            </div>
        </div>
        <div class="input-group">
        	<div class="controls">
            <input class="btn btn-success" type="submit" name="Download" value="Download"/><br />
            </div>
        </div>
     </form>

     <form class="form-horizontal" action="downpeserta_fakultas.php" method="post" name="frm" id="frm" target="_blank">
        <div class="control-group">
            <div class="control-label">Eksport Per Fakultas :</div>
            <div class="controls">
              <select id="thn_ini" name="thn_ini" class="input-small"><?php
                        for($thn_ini=2007;$thn_ini<=$thn;$thn_ini++)
            {
                          echo '<option value='.$thn_ini.'>'.$thn_ini.'</option>';
              }?>
                </select>

                <select name="fakultas" value="" class="chosen-select">
                  <option></option>
                    <?php
                    $q = mysql_query("select * from tbl_formulir_tpa GROUP BY fakultas"); 

                      while ($a = mysql_fetch_array($q)){
                        echo "<option value='$a[fakultas]' selected>$a[fakultas]</option>";
                      }
                    ?>
                </select>
            </div>
        </div>
        <div class="input-group">
          <div class="controls">
            <input class="btn btn-success" type="submit" name="Download" value="Download"/><br />
            </div>
        </div>
     </form>

     <form class="form-horizontal" action="downpeserta_prodi.php" method="post" name="frm" id="frm" target="_blank">
        <div class="control-group">
            <div class="control-label">Eksport Per Prodi :</div>
            <div class="controls">
              <select id="thn_ini" name="thn_ini" class="input-small"><?php
                        for($thn_ini=2007;$thn_ini<=$thn;$thn_ini++)
            {
                          echo '<option value='.$thn_ini.'>'.$thn_ini.'</option>';
              }?>
                </select>
                <select name="prodi" value="" class="chosen-select">
                  <option></option>
                    <?php
                    $q = mysql_query("select * from tbl_formulir_tpa GROUP BY prodi"); 

                      while ($a = mysql_fetch_array($q)){
                        echo "<option value='$a[prodi]' selected>$a[prodi]</option>";
                      }
                    ?>
                </select>
            </div>
        </div>
        <div class="input-group">
          <div class="controls">
            <input class="btn btn-success" type="submit" name="Download" value="Download"/><br />
            </div>
        </div>
     </form>
     
     <div class="text-success">
        <h4>Download Hasil Tes Personaliti Akademik Mahasiswa Per Tahun Akademik</h4><hr />
    </div>
     <form class="form-horizontal" action="downnilai.php" method="post" name="frm" id="frm" target="_blank">
     	<div class="control-group">
            <div class="control-label">EKsport Keseluruhan :</div>
            <div class="controls">
            	<select id="thn_ini" name="thn_ini" class="input-small"><?php
                        for($thn_ini=2007;$thn_ini<=$thn;$thn_ini++)
						{
                          echo '<option value='.$thn_ini.'>'.$thn_ini.'</option>';
						}?>
                </select>
            </div>
        </div>
        <div class="input-group">
        	<div class="controls">
            <input class="btn btn-success" type="submit" name="Download" value="Download"/><br />
            </div>
        </div>
     </form>

     <form class="form-horizontal" action="downnilai_fakultas.php" method="post" name="frm" id="frm" target="_blank">
        <div class="control-group">
            <div class="control-label">Eksport Per Fakultas :</div>
            <div class="controls">
              <select id="thn_ini" name="thn_ini" class="input-small"><?php
                        for($thn_ini=2007;$thn_ini<=$thn;$thn_ini++)
            {
                          echo '<option value='.$thn_ini.'>'.$thn_ini.'</option>';
              }?>
                </select>

                <select name="fakultas" value="" class="chosen-select">
                  <option></option>
                    <?php
                    $q = mysql_query("select * from tbl_formulir_tpa GROUP BY fakultas"); 

                      while ($a = mysql_fetch_array($q)){
                        echo "<option value='$a[fakultas]' selected>$a[fakultas]</option>";
                      }
                    ?>
                </select>
            </div>
        </div>
        <div class="input-group">
          <div class="controls">
            <input class="btn btn-success" type="submit" name="Download" value="Download"/><br />
            </div>
        </div>
     </form>

     <form class="form-horizontal" action="downnilai_prodi.php" method="post" name="frm" id="frm" target="_blank">
        <div class="control-group">
            <div class="control-label">Eksport Per Prodi :</div>
            <div class="controls">
              <select id="thn_ini" name="thn_ini" class="input-small"><?php
                        for($thn_ini=2007;$thn_ini<=$thn;$thn_ini++)
            {
                          echo '<option value='.$thn_ini.'>'.$thn_ini.'</option>';
              }?>
                </select>
                <select name="prodi" value="" class="chosen-select">
                  <option></option>
                    <?php
                    $q = mysql_query("select * from tbl_formulir_tpa GROUP BY prodi"); 

                      while ($a = mysql_fetch_array($q)){
                        echo "<option value='$a[prodi]' selected>$a[prodi]</option>";
                      }
                    ?>
                </select>
            </div>
        </div>
        <div class="input-group">
          <div class="controls">
            <input class="btn btn-success" type="submit" name="Download" value="Download"/><br />
            </div>
        </div>
     </form>
     
     <div class="text-success">
        <h4>Download Hasil Tes Potensi Akademik Mahasiswa Per Tahun Akademik</h4><hr />
    </div>
     <form class="form-horizontal" action="dwnnlpts.php" method="post" name="frm" id="frm" target="_blank">
     	<div class="control-group">
            <div class="control-label">Eksport Keseluruhan :</div>
            <div class="controls">
            	<select id="thn_ini" name="thn_ini" class="input-small"><?php
                        for($thn_ini=2007;$thn_ini<=$thn;$thn_ini++)
						{
                          echo '<option value='.$thn_ini.'>'.$thn_ini.'</option>';
						}?>
                </select>
            </div>
        </div>
        <div class="input-group">
        	<div class="controls">
            <input class="btn btn-success" type="submit" name="Download" value="Download"/><br />
            </div>
        </div>
     </form>

     <form class="form-horizontal" action="dwnnlpts_fakultas.php" method="post" name="frm" id="frm" target="_blank">
        <div class="control-group">
            <div class="control-label">Eksport Per Fakultas :</div>
            <div class="controls">
              <select id="thn_ini" name="thn_ini" class="input-small"><?php
                        for($thn_ini=2007;$thn_ini<=$thn;$thn_ini++)
            {
                          echo '<option value='.$thn_ini.'>'.$thn_ini.'</option>';
              }?>
                </select>

                <select name="fakultas" value="" class="chosen-select">
                  <option></option>
                    <?php
                    $q = mysql_query("select * from tbl_formulir_tpa GROUP BY fakultas"); 

                      while ($a = mysql_fetch_array($q)){
                        echo "<option value='$a[fakultas]' selected>$a[fakultas]</option>";
                      }
                    ?>
                </select>
            </div>
        </div>
        <div class="input-group">
          <div class="controls">
            <input class="btn btn-success" type="submit" name="Download" value="Download"/><br />
            </div>
        </div>
     </form>

     <form class="form-horizontal" action="dwnnlpts_prodi.php" method="post" name="frm" id="frm" target="_blank">
        <div class="control-group">
            <div class="control-label">Eksport Per Prodi :</div>
            <div class="controls">
              <select id="thn_ini" name="thn_ini" class="input-small"><?php
                        for($thn_ini=2007;$thn_ini<=$thn;$thn_ini++)
            {
                          echo '<option value='.$thn_ini.'>'.$thn_ini.'</option>';
              }?>
                </select>
                <select name="prodi" value="" class="chosen-select">
                  <option></option>
                    <?php
                    $q = mysql_query("select * from tbl_formulir_tpa GROUP BY prodi"); 

                      while ($a = mysql_fetch_array($q)){
                        echo "<option value='$a[prodi]' selected>$a[prodi]</option>";
                      }
                    ?>
                </select>
            </div>
        </div>
        <div class="input-group">
          <div class="controls">
            <input class="btn btn-success" type="submit" name="Download" value="Download"/><br />
            </div>
        </div>
     </form>
    </div>
</div>
<?php
koneksi_tutup();
?>
