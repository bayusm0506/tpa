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
				<li><a href="#"><img src="images/f1.jpg" alt="" /> </a></li>
				<li><a href="#"><img src="images/f2.jpg" alt="" /> </a></li>
				<li><a href="#"><img src="images/f3.jpg" alt="" /> </a></li>
				<li><a href="#"><img src="images/f4.jpg" alt="" /> </a></li>
				<li><a href="#"><img src="images/f5.jpg" alt="" /> </a></li>
				<li><a href="#"><img src="images/f6.jpg" alt="" /> </a></li>
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
				<li><a class="icon1" href="#"></a></li>
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
		<p class="link"><span>© Copyright&nbsp;<a href="#"> ICT UMA</a></span></p>
	</div>
	<div class="clear"></div>
</div>
</div>
</div>
</body>
</html>