<!-- start top_bg -->
<div class="top_bg">
<div class="wrap">
<div class="main_top">
    <h4 class="style">Tes Personaliti Akademik</h4>
</div>
</div>
</div>
<!-- start main -->
<div class="wrap">
<div class="main">
    <div class="mulai">
        <div>
            <img src="img/motivate.png" style="float:left; padding-right:50px;">
        </div>
        <h3>Selamat Datang : 
            <?php 
                if(isset($_SESSION['no_formulir'])){ echo ucwords($_SESSION['nama_mhs']);}
            ?>
        </h3>
        <?php
            include 'koneksi.php';
            if(isset($_SESSION['no_formulir'])){
            $no_formulir=$_SESSION['no_formulir'];

            koneksi_buka();
            $query=mysql_query("select id_user from nilai where id_user='$no_formulir'");
            $data=mysql_fetch_array($query);
                if($data ['id_user'] == $no_formulir)
                {   koneksi_tutup();                            
                   echo "<div class='title'>Terimakasih Anda Telah Mengikuti Ujian Tes Personaliti Akademik </div>";
                  ?><p>Silahkan <a href="index.php" class="btn-slide">Kembali</a></p><?php
                }else{
                  ?>
                    <h4></h4>
                    <form action="soal.php" method="get" target="_self" class="form-horizontal">
                    <div class="control-group">
                        <div class="control-label">Mulai Ujian :</div>
                        <div class="controls">
                            <select name="publish" >
                            <?php
                                koneksi_buka();
                                $publish = mysql_query("SELECT DISTINCT publish FROM soal");
                                while($t = mysql_fetch_array($publish))
                                    {
                                    echo "<option>".$t['publish']."</option>\n";
                                    }
                                koneksi_tutup();
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="controls cek">
                        <input type="image" value="mulai" src="img/start.jpg" alt="mulai" width="120px" height="70px">
                    </div>
                    </form>
                    <?php
                    } 

            }
            koneksi_tutup();
        ?>

    </div>
   
    
    <div class="clear"></div>
</div>
</div>
