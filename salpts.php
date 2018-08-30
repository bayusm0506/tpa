<?php session_start();
if(isset($_SESSION['no_formulir'])){
$id_user=$_SESSION['no_formulir'];
include 'header.php';
?>

<script>
var totalwaktu = 720; 
var indexsoal = 0;
var publish;
var timer;
var habis = 0;
var nilaiakhir = 0;
var inputpilihan;
var inputjawaban;
$(document).ready(function(){
    $("#benar").val(nilaiakhir);
    checkCookie();
    publish = $("#divpublish").html();
    url = "ablslpts.php?publish="+publish
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            publish = msg;
            setinputpilihan();
            setinputjawaban()
            tampilkan();
            mainkanwaktu();
        }
    });
    $("#next").click(function(){
        indexsoal++;
        $("#divpertanyaan").hide();
        $("#divoption").hide();
        tampilkan();
    });
});

function setinputpilihan(){
    inputpilihan = "";
    for(i=0;i<publish.soal.length;i++){
        inputpilihan = inputpilihan+"<input type=hidden name=pilihan[] id=pilihan"+i+">";
    }
    $("#divpilihan").html(inputpilihan);
}

function setinputjawaban(){
    inputjawaban = "";
    for(i=0;i<publish.soal.length;i++){
        inputjawaban = inputjawaban+"<input type=hidden name=jawaban[] value='"+publish.soal[i].jawaban+"'>";
    }
    $("#divjawaban").html(inputjawaban);
}
function mainkanwaktu(){
    if(totalwaktu>0){
        $("#divtotalwaktu").html(totalwaktu);
        totalwaktu--;
        timer = setTimeout("mainkanwaktu()",1000);
    }else{
        clearTimeout(timer);
        habis = 1;
        document.getElementById("formulir").submit();
    }
}
function setnilai(nilai){
    idinput = "#pilihan"+indexsoal;
    $(idinput).val(nilai);
}
function tampilkan(){
    if(indexsoal<publish.soal.length){
        nomorsoal = indexsoal + 1;
        $("#divnomor").html("Soal "+nomorsoal+" dari "+ publish.soal.length);
        $("#divpertanyaan").html(publish.soal[indexsoal].pertanyaan);
        $("#divpertanyaan").fadeIn(1000);
        $("#jawaban_a").html("<input type='radio' onclick='setnilai(this.value)' name='R"+indexsoal+"'value='A'> A. "+publish.soal[indexsoal].A);
        $("#jawaban_b").html("<input type='radio' onclick='setnilai(this.value)' name='R"+indexsoal+"'value='B'> B. "+publish.soal[indexsoal].B);
		$("#jawaban_c").html("<input type='radio' onclick='setnilai(this.value)' name='R"+indexsoal+"'value='C'> C. "+publish.soal[indexsoal].C);
        $("#jawaban_d").html("<input type='radio' onclick='setnilai(this.value)' name='R"+indexsoal+"'value='D'> D. "+publish.soal[indexsoal].D);
		$("#jawaban_e").html("<input type='radio' onclick='setnilai(this.value)' name='R"+indexsoal+"'value='E'> E. "+publish.soal[indexsoal].E);
        $("#divoption").slideDown(750);
    }else{
        habis = 1;
        document.getElementById("formulir").submit();
    }
}

function getCookie(c_name){
    if (document.cookie.length>0){
        c_start=document.cookie.indexOf(c_name + "=");
        if (c_start!=-1){
            c_start=c_start + c_name.length+1;
            c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        }
    }
    return "";
}

function setCookie(c_name,value,expiredays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays);
    document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}

function checkCookie(){
    totalwaktucookies=getCookie('waktucookies');
    if (totalwaktucookies!=null && totalwaktucookies!=""){
        totalwaktu = totalwaktucookies;
    }else{
        setCookie('waktucookies',totalwaktu,7);
    }
}
function keluar(){
    if(habis==0){
        setCookie('waktucookies',totalwaktu,7);
    }else{
        setCookie('waktucookies',0,-1);
    }
}
</script>
<style>
body{font-family:arial}
.waktu{padding:10}
#divpertanyaan{padding:10;background-color:yellow;display:none}
#divoption{padding:10;background-color:pink;display:none}
</style>

<?php include 'content.php';?>
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
            <h3>Mulai Ujian : 
                    <?php 
                        if(isset($_SESSION['no_formulir'])){ echo ucwords($_SESSION['nama_mhs']);}
                    ?>
            </h3>
                        <p class="text-warning"><P>Petunjuk Pengisian :<br>
                            Silahkan anda menjawab pertanyaan-pertanyaan dibawah ini dengan baik dan benar.<br></p>
            <h4 style="font-family:'Comic Sans MS', cursive"><blink>Selamat Mengerjakan</blink></h3>
            
        <hr style="color:#E9E9E9;" width="100%" size="5" align="center">
        </h4>
        <h3 class=waktu>Sisa Waktu Mengerjakan : <font color="#0000FF"> <span id="divtotalwaktu"></span></font> Detik.</h3>
    <div class="box">
<div id="divpublish" style="color:#FFF">
<?php
echo $_GET['publish'] ;
?>
</div>
    <table>
        <tr>
            <th id="divnomor"></th>
        </tr>
        <tr style="font-size:15px;">
            <td id="divpertanyaan"></td>
        </tr>
        <tr>
            <td id="divoption"></td>
        </tr>
        <tr style="font-size:16px bold;">
            <td id="jawaban_a"></td>
        </tr>
        <tr style="font-size:16px bold;">
            <td id="jawaban_b"></td>
        </tr>
         <tr style="font-size:16px bold;">
            <td id="jawaban_c"></td>
        </tr>
        <tr style="font-size:16px bold;">
            <td id="jawaban_d"></td>
        </tr>
        <tr style="font-size:16px bold;">
            <td id="jawaban_e"></td>
        </tr>
    </table>
    
    <p>
    <img id="next" style="cursor:pointer" src="img/next.jpg" width="140px" height="70px">
    <form action="nlakhrpts.php" method="post" id="formulir">
    <div id="divpilihan"></div>
    <div id="divjawaban"></div>
    </form>
    </p> 
</div>  
        </div>
        <div class="clear"></div>
    </div>

</div>

</div>
</div>

                    
                        
<?php
include 'footer.php';
}else{
echo '<p>Anda belum login. silahkan <a href="index.php">Login</a>';
}
?>