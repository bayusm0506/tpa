<?php session_start();
if(isset($_SESSION['no_formulir'])){
$id_user=$_SESSION['no_formulir'];

include 'header.php';
include 'content.php';
?>
    <div class="main_bg">
    <!-- start top_bg -->
        <div class="top_bg" id="soal">
        <div class="wrap">
        <div class="main_top">
            <h4 class="style">TES I (Pertama) > Tes Personaliti Akademik</h4>
        </div>
        </div>
        </div>
        <div class="main">
            <div class="soal">
                <h3>NILAI TES POTENSI AKADEMIK : 
                <?php 
                    if(isset($_SESSION['no_formulir'])){ echo ucwords($_SESSION['nama_mhs']);}
                ?>
                </h3>
                
                    <?php
                    $point = 0;
                    $i = 1;
                    if (empty($_POST['pilihan'])){
                        ?><script type='text/javascript'>
                                  alert ('Error..!');
                                  window.location="index.php";
                                </script><?php
                    }else{
                    foreach($_POST['pilihan'] as $key => $value){
                        if($value == $_POST['jawaban'][$key]){
                            $j = "<font color='blue'>Sesuai</font>";
                            $point++;
                        }else{
                            $j = "<font color='red'>Tidak Sesuai</font>";
                        }
                        ?>
                        <table style="border-spacing: 10px; border-collapse: separate; border:1px solid #EBE7DF; width:500px;">
                            <tr>
                                <td><?php
                                echo "No $i : $value ($j)<br>";
                                $i++;?>
                                </td>
                        </tr>
                      </table>
                      <?php
                    }
                    }
                    ?>
                    <table style="border-spacing: 10px; border-collapse: separate; border:1px solid red; width:500px;">
                        <tr>
                            <th>Nilai Anda : <?php echo "Skor = $point"; ?></th>
                        </tr>
                        <tr align>
                            <td><form name="frm" action="smpnlpts.php" method="post" class="form-horizontal">       
                                <input type="hidden" name="no_formulir" value="<?php echo $_SESSION['no_formulir']?>" />
                                <input type="hidden" name="point" value="<?php echo $point;?>" />
                                <input class="btn btn-success btn-medium" type="submit" name="submit" value="Simpan Nilai"/>
                                <!--<script language="JavaScript">setTimeout("document.frm.submit();",5000 ); </script>-->
                                </form>
                            </td>
                        </tr> 
                    </table>
            </div>
            <div class="clear"></div>
        </div>

    </div>

        			                    
                    
<?php
include 'footer.php';
}else{
echo'<p>Anda belum login. silahkan <a href="index.php">Login</a></p>';
}
?>

