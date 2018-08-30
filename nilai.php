<!-- start top_bg -->
<div class="top_bg" id="nilai">
<div class="wrap">
<div class="main_top">
    <h4 class="style">Nilai Keseluruhan Ujian</h4>
</div>
</div>
</div>
<!-- start main -->
<div class="wrap">
<div class="main">
	<div class="nilai">
		<h3>Selamat Datang : 
			<?php 
    			if(isset($_SESSION['no_formulir'])){ echo ucwords($_SESSION['nama_mhs']);}
    		?>
    	</h3>
		<?php
            include 'koneksi.php';
            koneksi_buka();

            if(isset($_SESSION['no_formulir'])){
            $id_user=$_SESSION['no_formulir'];
            ?>

                <h3 class="title">Nilai <i> <?php echo ucwords($_SESSION['nama_mhs']);?></i></h3>

                <p><b>Hasil Nilai Tes Personaliti Akademik</b></p>
                <table style="border-spacing: 10px; border-collapse: separate; border:1px solid red; width:700px;">
                    <tr>
                        <th>Skor</th><th>Tanggal</th><th>Klasifikasi</th>
                    </tr>
                    <?php
                        $query=mysql_query("select * from nilai where id_user='$id_user'");
                
                        while($row=mysql_fetch_array($query)){
                            
                        //cara database
                        $baca = mysql_query("SELECT * FROM bobot LIMIT 1");
                        $rec = mysql_fetch_array($baca);
                        
                        if($row['point']>= $rec['angka_1']){ $kg=$rec['huruf_1'];}
                          else if($row['point']>=$rec['angka_2']){ $kg=$rec['huruf_2'];}    
                            elseif($row['point']<=$rec['angka_3']){ $kg=$rec['huruf_3'];}
                            
                        ?>
                    <tr align="center" bgcolor="#EDEF9A">
                          <td><span><?php echo $row['point'];?></span></td>
                          <td><span><?php echo date('d F Y', strtotime($row['tanggal']));?></span></td>
                          <td><b><?php echo $kg;?></b></td>
                    </tr>
                    <?php   
                    }
                    ?>
                </table>  
                
                <p><b>Hasil Nilai Tes Potensi Akademik</b></p>
                <table style="border-spacing: 10px; border-collapse: separate; border:1px solid red; width:700px;">
                    <tr>
                        <th>Skor</th><th>Tanggal</th><th>Klasifikasi</th>
                    </tr>
                    <?php
                        $query=mysql_query("select * from nilai_pts where id_user='$id_user'");
                
                        while($row=mysql_fetch_array($query)){
                            
                        //cara database
                        $baca = mysql_query("SELECT * FROM bobot LIMIT 1");
                        $rec = mysql_fetch_array($baca);
                        
                        if($row['point']>= $rec['angka_1']){ $kg=$rec['huruf_1'];}
                          else if($row['point']>=$rec['angka_2']){ $kg=$rec['huruf_2'];}    
                            elseif($row['point']<=$rec['angka_3']){ $kg=$rec['huruf_3'];}
                            
                        ?>
                    <tr align="center" bgcolor="#EDEF9A">
                          <td><span><?php echo $row['point'];?></span></td>
                          <td><span><?php echo date('d F Y', strtotime($row['tanggal']));?></span></td>
                          <td><b><?php echo $kg;?></b></td>
                    </tr>
                    <?php   
                    }
                    ?>
                </table>

            <?php
            }else{
                echo '<p>Anda belum login. silahkan <a href="index.php">Login</a></p>';
            }
            koneksi_tutup();
        ?>
	</div>
	<div class="clear"></div>
</div>
</div>
