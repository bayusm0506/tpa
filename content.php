
<body>
<!-- start header -->
<div class="top_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" alt=""/></a>
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
                    <li><a href="index.php?page=logout" onClick="return confirm('Apakah Anda yakin akan keluar?')">Logout</a> </li>
                    

                    <div class="clear"></div>
                </ul>
                <?php
                    }
                ?> 
		</div>	
		<div class="web_search">
		 	<form>
				<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
				<input type="submit" value=" " />
			</form>
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
				<li class="active"><a href="index.php?page=welcome#welcome">Beranda</a></li>
				<li><a href="index.php?page=petunjuk#petunjuk">Pedoman</a></li>
				<li><a href="index.php?page=kontak#kontak">Kontak</a></li>
				<?php
                    if(isset($_SESSION['no_formulir'])){
                        include ("status.php");
                ?>
                <li><a href="index.php?page=mulai#mulai">Tes Personaliti Akademik</a></li>
				<li><a href="index.php?page=mlipts#mlipts">Tes Potensi Akademik</a></li>
				<li><a href="index.php?page=nilai#nilai">Nilai</a></li>
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

