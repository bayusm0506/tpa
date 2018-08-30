<?php session_start();?>
<!DOCTYPE HTML>
<html>
<head>
<title>Tes Potensi Akademik | Universitas Medan Area</title>
<link rel="shortcut icon" href="images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--- start-mmmenu-script---->
<script src="js/jquery.min.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css" />
<script type="text/javascript" src="js/jquery.mmenu.js"></script>
		<script type="text/javascript">
			//	The menu on the left
			$(function() {
				$('nav#menu-left').mmenu();
			});
		</script>
<!-- start slider -->
	<link href="css/slider.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="js/jquery.eislideshow.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#ei-slider').eislideshow({
					animation			: 'center',
					autoplay			: true,
					slideshow_interval	: 3000,
					titlesFactor		: 0
                });
            });
        </script>
<!-- start top_js_button -->
<script type="text/javascript" src="js/move-top.js"></script>
   <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
</head>
<body>
<!-- start header -->
<div class="top_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<a href="index.php"><img src="images/logoo.png" alt=""/></a>
		</div>
		 <div class="log_reg">
               <?php
                    if(!isset($_SESSION['no_formulir'])){
                ?>
				<ul>
					<li><a href="?page=log#log">Login</a> </li>
                    <div class="clear"></div>
				</ul>
                <?php
                    }
                ?>
                <?php
                    if(isset($_SESSION['no_formulir'])){
                        include ("status.php");
                ?>
                <ul>
                    <li><a href="#">
                        Selamat Datang  :
                            <?php 
                                if(isset($_SESSION['no_formulir'])){ echo ucwords($_SESSION['nama_mhs']);}
                            ?>
                    </a> </li> 
                    <span class="log"> | </span>
                    <li><a href="?page=logout" onClick="return confirm('Apakah Anda yakin akan keluar?')">Logout</a> </li>
                    

                    <div class="clear"></div>
                </ul>
                <?php
                    }
                ?> 
		</div>	
		<div class="web_search">
		 	<!--<form>
				<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
				<input type="submit" value=" " />
			</form> -->
	    </div>						
		<div class="clear"></div>
	</div>	
</div>
</div>
<!-- start header_btm -->
<div class="wrap">
<div class="header_btm">
		<div class="menu">
			<ul>
				<li class="active"><a href="?page=welcome#welcome">Beranda</a></li>
				<li><a href="?page=petunjuk#petunjuk">Pedoman</a></li>
				<li><a href="?page=kontak#kontak">Kontak</a></li>
				<?php
                    if(isset($_SESSION['no_formulir'])){
                        include ("status.php");
                ?>
                <li><a href="?page=mulai">Tes Personaliti Akademik</a></li>
				<li><a href="?page=mlipts">Tes Potensi Akademik</a></li>
				<li><a href="?page=nilai">Nilai</a></li>
                <li><a href="sertifikat.php" target="_blank">Sertifikat</a></li>
                <?php  
                    }
                ?> 
				<div class="clear"></div>
			</ul>
		</div>
		<div id="smart_nav">
			<a class="navicon" href="#menu-left"> </a>
		</div>
	
	<div class="clear"></div>
</div>
</div>
<?php
    if(!isset($_SESSION['no_formulir'])){
?>
<!-- start slider -->
<div class="slider">
                <!---start-image-slider---->
        <div class="image-slider">
            <div class="wrapper">
                <div id="ei-slider" class="ei-slider">
                    <ul class="ei-slider-large">
                        <li>
                            <center><img src="images/imagetpa.jpg" alt="image06"/></center>
                            
                        </li>
                    </ul><!-- ei-slider-large -->
                   
                </div><!-- ei-slider -->
            </div><!-- wrapper -->
        </div

        >
        <!---End-image-slider---->  
</div>
<?php
    }
?>
<!-- start main -->
<div class="main_bg">
<?php 
    if(isset($_GET['page'])){
        $page=htmlentities($_GET['page']);
        }else{
        $page="welcome";
        }
        $file="$page.php";
        $cek=strlen($page);
    if($cek>10 || !file_exists($file) || empty($page)){
        include ("welcome.php");
        }else{
        include ($file);
        }
?>
</div>
<!-- start footer -->
<div class="footer_top">
<div class="wrap">
<div class="footer">
	<!-- start grids_of_3 -->
	<div class="span_of_3">
		<div class="span1_of_3">
			<h3>kata motivasi</h3>
			<p>Tugas kita bukanlah untuk berhasil. Tugas kita adalah untuk mencoba, karena didalam mencoba itulah kita menemukan dan belajar membangun kesempatan untuk sukses.</p>
		</div>
		<div class="span1_of_3">
			<h3>twitter widget</h3>
			<p><a href="#">@bayu_vaab</a> Saya bangga kuliah di UMA, temen-temennya asik. kekeluargaannya dapet, dan suasana agamanya dapat <a href="#">@bayu_vaab</a> </p>
			<p class="top">19 days ago</p>
			<p class="top"><a href="#">@rico31</a> Kuliah di UMA itu asyik banget, apalagi jurusan psikologi, semua dosennya baik2 dan selalu solid kepada mahasiswanya <a href="#">@rico31</a> </p>
			<p class="top">19 days ago</p>
		</div>
		<div class="span1_of_3">
			<h3>flickr widget</h3>
			<ul class="f_nav">
				<li><a href="#"><img src="images/flick1.jpg" alt="" /> </a></li>
				<li><a href="#"><img src="images/flick2.jpg" alt="" /> </a></li>
				<li><a href="#"><img src="images/flick3.jpg" alt="" /> </a></li>
				<li><a href="#"><img src="images/flick4.jpg" alt="" /> </a></li>
				<li><a href="#"><img src="img/asi.gif" alt="" /> </a></li>
				<li><a href="#"><img src="images/flick5.jpg" alt="" /> </a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
</div>
<!-- start footer -->
<div class="footer_mid">
<div class="wrap">
<div class="footer">
	<div class="f_search">
		<form>
			<input type="text" value="" placeholder="Enter email for newsletter" />
			<input type="submit" value=""/>
		</form>
	</div>
	<div class="soc_icons">
			<ul>
				<li><a class="icon1" href="https://www.facebook.com/pages/Universitas-Medan-Area/180847905309257?ref=br_tf" target="_blank"></a></li>
				<li><a class="icon2" href="#"></a></li>
				<li><a class="icon3" href="#"></a></li>
				<li><a class="icon4" href="#"></a></li>
				<li><a class="icon5" href="#"></a></li>
			</ul>	
	</div>
	<div class="clear"></div>
</div>
</div>
</div>
<!-- start footer -->
<div class="footer_bg">
<div class="wrap">
<div class="footer">
		<!-- scroll_top_btn-slide -->
	    <script type="text/javascript">
			$(document).ready(function() {
			
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};
				
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
		 <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
		<!--end scroll_top_btn-slide -->
	<div class="f_nav1">
		<ul>
			<li><a href="?page=welcome">home /</a></li>
			<li><a href="www.uma.ac.id" target="_blank">Universitas Medan Area /</a></li>
			<li>
				<a href="#">
					<?php 
					 	$file = 'counter.txt';
					        if(file_exists($file)){
					            $file_open = fopen($file, "r");
					            $cek = trim(fgets($file_open, 255));
					            $cek++;
					        }  else {
					            $cek = 1;
					        }
					        $file_open = fopen($file, "w");
					        fwrite($file_open, $cek);
					        fclose($file_open);
					        echo 'Anda pengunjung ke '.$cek;
						?>
				</a>
			</li>
		</ul>
		</div>
	<div class="copy">
		<p class="link"><span> Copyright&nbsp; ©<a href="#"> 2006 - 2016 ICT - Universitas Medan Area</a></span></p>
	</div>
	<div class="clear"></div>
</div>
</div>
</div>
</body>
</html>