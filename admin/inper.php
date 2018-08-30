<?php
require 'cek_login.php';
include '../koneksi.php';
koneksi_buka();
if (isset($_POST['submit']))
    {
        $no_formulir=htmlentities((trim($_POST['no_formulir'])));
        $nilai=htmlentities((trim($_POST['nilai'])));
        
        if(empty($no_formulir)){
            echo 'Nomor Formulir Kosong';
            exit();
        }elseif(empty($nilai)){
            echo 'Nilai Kosong';
            exit();
        }else{
        
        $query=mysql_query("INSERT INTO nilai VALUES(NULL, '$no_formulir', '$nilai', NOW())");
              koneksi_tutup();
              if($query){
                  echo "<B><font color=red>Nilai Tes Personaliti Akademik berhasil disimpan.</font> </B>";
                exit();
              }else{
                  echo mysql_error();
                  exit();
              }
        }
    }else{
        unset($_POST['submit']);
    }
?>

<html>
<head>
</head>
<body onLoad="document.daftar.elements['no_formulir'].focus()">
	<div class="span12">
      <span class="text-info"><h4>Input Skor Nilai Personaliti Akademik</h4><hr></span>
    	<form enctype="multipart/form-data" action="?page=inper" method="post" name="daftar" class="form-horizontal">
        <div class="control-group">
            <label class="control-label">No. Formulir</label>
            <div class="controls">:
            <input type="text" name="no_formulir" class="input-medium" required="true" placeholder="No Formulir">
            </div>
        </div> 
        <div class="control-group">
            <label class="control-label">Skor Nilai</label>
            <div class="controls">:
            <input type="text" name="nilai" class="input-medium" required="true" placeholder="No Formulir">
            </div>
        </div> 
    <div class="form-action">
            <div class="controls">
             <input name="submit" type="submit" value="Submit" class="btn btn-primary">
            </div>
        </div>
        </form>
    </div>
</body>
</html>

       