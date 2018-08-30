<?php 
require 'cek_login.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cpanel Admin</title>
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link href="css/demo_page.css" rel="stylesheet">
    <link href="css/demo_table.css" rel="stylesheet">
        
    <!-- Javascript files harus ditaruh di bawah untuk meningkatkan performa web -->
	<script src="../assets/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#example').dataTable( {
                    "sPaginationType": "full_numbers"
                } );
            } );
        </script>
	<script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
		if (typeof document.onselectstart!="undefined") {
		document.onselectstart=new Function ("return true");
		}
		else{
		document.onmousedown=new Function ("return true");
		document.onmouseup=new Function ("return false");
		}
	</script>
</head>
<body>
	<div class="container-fluid">		
		<div class="navbar">
			<div class="navbar-inner" id="main">
				<div class="container-fluid">
					<ul class="nav">
                    	<li class="brand">Admin</li>
						<li><a href="?page=welcome"><i class="icon-home"></i> Home</a></li>
                        <li><a href="?page=daftar"><i class="icon-user"></i> Daftar</a></li>
                        <li><a href="?page=soal"><i class="icon-book"></i> Soal Personal</a></li>
                        <li><a href="?page=salpts"><i class="icon-book"></i> Soal Potensi</a></li>
                        <li><a href="?page=bobot"><i class="icon-star"></i> Bobot</a></li>
                        <li><a href="?page=panitia"><i class="icon-eye-open"></i> Panitia</a></li>
                        <li><a href="?page=tambah"><i class="icon-cog"></i> Pengaturan</a></li>
					</ul>
                    <ul class="nav pull-right">
                        <li class="divider-vertical"></li>
                        <li><a href="?page=profil">
								<i class="icon-user"></i>&nbsp; <?php echo ucwords($_SESSION['Nama_Admin']); ?>
							</a>
						</li>
                        <li class="divider-vertical"></li>
                        <li><a href="?page=logout" onclick="return confirm('Apakah Anda yakin akan keluar?')"><i class="icon-off"></i></a></li>
                    </ul>
				</div>
			</div>
		</div>
		<div class="row-fluid">
        	<div class="span2">
					<div class="sidebar">
						<ul class="nav nav-list" id="main">
                             <li class="nav-header">MANAJEMEN</li>
                             <li><a href="?page=anggota">List Peserta</a></li>
                             <li><a href="?page=view">List Soal Personal</a></li>
                             <li><a href="?page=vwpts">List Soal Potensi</a></li>
                             <li><a href="?page=nilai">List Nilai Personal</a></li>
                             <li><a href="?page=nlpts">List Nilai Potensi</a></li>
                             <li><a href="?page=inper">Input Nilai Personaliti</a></li>
                             <li><a href="?page=inpot">Input Nilai Potensi</a></li>
                             <li><a href="#"></a></li>
                        </ul>
                        <ul class="nav nav-list" id="main">
                             <li class="nav-header">KECAMATAN</li>
                             <li><a href="?page=kecamatan">Daftar Kecamatan dan Kelurahan</a></li>
                        </ul>
                        <ul class="nav nav-list" id="main">
                             <li class="nav-header">LAINNYA</li>
                             <li><a href="?page=download">Download</a></li>
                             <li><a href="?page=thngrafik">Grafik</a></li>
                             <li><a href="#"></a></li>
                        </ul>
                    </div>
            </div>
			<div class="span10" id="main-content">
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
		</div>
			
		<hr> <!--Garis Batas-->
		<div class="row-fluid">
			<div class="span12" id="footer">
				<p>CopyRight &copy; 2014 - <?php echo $now=date("Y"); ?> Pusat Data dan Aplikasi Informasi - Universitas Medan Area</p>
			</div>
		</div>
	</div> <!-- end dari class container -->
</body>
</html>
    