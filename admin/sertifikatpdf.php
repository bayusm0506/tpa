<?php
ob_start();

 
	$id_user=$_GET['no_formulir'];
	
	require('fpdf16.php');

	include '../koneksi.php';
	koneksi_buka();

	$query=mysql_query("select * from nilai inner join tbl_formulir_tpa on nilai.id_user = tbl_formulir_tpa.no_formulir where tbl_formulir_tpa.no_formulir ='$id_user'");
	$row=mysql_fetch_array($query);
	
	$query_1=mysql_query("select * from nilai_pts inner join tbl_formulir_tpa on nilai_pts.id_user = tbl_formulir_tpa.no_formulir where tbl_formulir_tpa.no_formulir='$id_user'");
	$row_1=mysql_fetch_array($query_1);
	
	$pani = mysql_query("SELECT * FROM image");
	$data = mysql_fetch_array($pani);
	
	//cara database
	$baca = mysql_query("SELECT * FROM bobot LIMIT 1");
	$rec = mysql_fetch_array($baca);
	
	ob_start();
	$pdf=new FPDF('L','mm','A4');
	$pdf->SetMargins(30,60,30);
	$pdf->AddPage();
	
	$pdf->ln(11);
	
	$pdf->SetFont('Times','',12);
	$pdf->Cell(80, 1.5, '',0,0,'L');
	$pdf->Cell(30, 1.5, 'Nama	 ',0,0,'L');
	$pdf->Cell(2, 1.5, ':',0,0,'L');
	$pdf->SetFont('Times','B',14);
	$pdf->Cell(100, 1.5, strtoupper($row['nama_mhs']),0,'LR','L');
	
	$pdf->ln(5);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(80, 1.5, '',0,0,'L');
	$pdf->Cell(30, 1.5, 'Fakultas  ',0,0,'L');
	$pdf->Cell(2, 1.5, ':',0,0,'L');
	$pdf->Cell(30, 1.5,ucwords($row['fakultas']),0,'','L');
	
	$pdf->ln(5);
	$pdf->Cell(80, 1.5, '',0,0,'L');
	$pdf->Cell(30, 1.5, 'Program Studi ',0,0,'L');
	$pdf->Cell(2, 1.5, ':',0,0,'L');
	$pdf->Cell(30, 1.5, ucwords($row['prodi']),0,'LR','L');
		
	$pdf->ln(5);
	$pdf->Cell(80, 1.5, '',0,0,'L');
	$pdf->Cell(30, 1.5, 'Alamat ',0,0,'L');
	$pdf->Cell(2, 1.5, ':',0,0,'L');
	$pdf->Cell(100, 1.5, ucwords($row['alamat_mhs']),0,'LR','L');
		
	$pdf->ln(6);
	$pdf->SetFont('Times', '',12);	
	$message2 = "Saat ini telah mengikuti Tes Personaliti dan Potensi Akademik (TPPA Online) di Universitas Medan Area";
	$pdf->MultiCell(0, 3, $message2, 0,'C');
	
	$pdf->ln(3);
	$pdf->SetFont('Times', '',12);
	$message = "Dengan Predikat : ";
	$pdf->MultiCell(0, 2, $message,0,'C');
	
	$Total_nilai = 0;
		$Total_nilai = ($row['point'] + $row_1['point']) / 2 ;
 			if($Total_nilai>= $rec['angka_1'])
			{ 
			  $am= "Personaliti anda sangat mendukung untuk meneruskan pendidikan di Perguruan Tinggi. Intelektual anda tidak dipengaruhi hal-hal yang emosional yang negatif. Bila anda rajin belajar, kesempatan berhasil di universitas, sangat besar.";
			  $ket= strtoupper($rec['huruf_1']); }
			else if($Total_nilai>= $rec['angka_2'])
			{ 
			  $am="Personaliti anda cukup sesuai dengan pendidikan tinggi walaupun intelektual anda kadang dipengaruhi kata hati. Usaha yang keras dan rajin belajar, akan menyokong kesempatan meraih sukses.";
			  $ket=strtoupper($rec['huruf_2']); }	
			elseif($Total_nilai< $rec['angka_3'])
			{ 
			  $am="Personaliti anda menuntut anda harus bekerja keras mengingat keadaan anda kadang menggunakan rasio, kadang kurang cermat, kadang terpengaruh emosi. Bila ingin melanjutkan pendidikan tinggi, maka anda harus berubah dan membuat komitmen untuk belajar dengan keras agar dapat mencapai cita-cita.";
			  $ket= strtoupper($rec['huruf_3']); }		
			  
	$pdf->Ln(5);
	$pdf->SetFont('Times', 'B',14);
	$pdf->Cell(0, 2, $ket ,0,0,'C');
		
	$pdf->Ln(6);
	$pdf->SetFont('Times', '',12);
	$pdf->Cell(0,1.5,'Keterangan:',0,0,'C');
	
	$pdf->Ln(3);
	$pdf->SetFont('Times', '',12);
	$pdf->MultiCell(0, 4, $am ,0,'C');
	
	$pdf->Ln(2);
	$pdf->SetFont('Times', '',12);
	$pdf->MultiCell(0, 4, "Kami mengucapkan terima kasih untuk semangat dan cita-cita Saudara dalam meningkatkan kemajuan dan proses belajar Saudara, semoga harapan dan keinginan Saudara untuk kuliah di Universitas Medan Area menjadi mahasiswa yang terbaik." ,0,'C');
		
	// Untuk membuat tanggal dalam format indonesia
	  $angkaBln = date("n");
	  switch($angkaBln)
	  {
	  case 1 : $namaBln = "Januari";
	  break;
	  case 2 : $namaBln = "Pebruari";
	  break;
	  case 3 : $namaBln = "Maret";
	  break;
	  case 4 : $namaBln = "April";
	  break;
	  case 5 : $namaBln = "Mei";
	  break;
	  case 6 : $namaBln = "Juni";
	  break;
	  case 7 : $namaBln = "Juli";
	  break;
	  case 8 : $namaBln = "Agustus";
	  break;
	  case 9 : $namaBln = "September";
	  break;
	  case 10: $namaBln = "Oktober";
	  break;
	  case 11: $namaBln = "Nopember";
	  break;
	  case 12: $namaBln = "Desember";
	  break;
	  }
	  
	  $pdf->Ln(5);
	  $pdf->SetFont('Times','',12);
	  $pdf->Cell(160, 0.5, '',0,0,'L');
	  $pdf->Cell(30 ,2, 'Medan, '.date('d').' '.$namaBln.' '.date('Y') , 0,1, 'L');
	   
	  $pdf->Ln(2);
	  $pdf->Cell(160, 0.5, '',0,0,'L');
	  $pdf->Cell(30 ,2,'Ketua Panitia, ',0,2,'L');
	   
	  $pdf->Ln(21);
	  //$pdf->Image('gambar/Ttd.jpg',210,145,40); //Manual Gambar
	  $gambar = $data['path'];
	  $pdf->Image($gambar,190,151,40);
	  
	  $pdf->Ln(13);
	  $pdf->Cell(160, 0.5, '',0,0,'L');
	  //$pdf->Cell(30 ,2,'Ir. Hj. Haniza, M.T.',0,1,'L'); Manual Nama Panitia
	  ////$pdf->Cell(100 ,2,'UMA menghasilkan sumber daya manusia inovatif dan berakhlak',0,0,'L');
	  ////$pdf->Cell(80, 0.5, '',0,0,'L');
	  $pdf->Cell(30,0,$data['nama_pani'],0,1,'L');
	  
	  $pdf->Ln(5);
	  $pdf->SetFont('Times','I',12);
	  $pdf->Cell(68, 0.5, '',0,0,'L');
	  $pdf->Cell(0 ,2,'UMA menghasilkan sumber daya manusia Inovatif, Berkepribadian dan Mandiri',0,0,'L');
	  $pdf->Output();
koneksi_tutup();
?>