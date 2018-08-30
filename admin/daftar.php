<html>
<head>
</head>
<body onLoad="document.daftar.elements['no_formulir'].focus()">
	<div class="span12">
      <span class="text-info"><h4>Formulir Peserta TPA</h4><hr></span>
    	<form enctype="multipart/form-data" action="?page=upload" method="post" name="daftar" class="form-horizontal">
        <div class="control-group">
            <label class="control-label">No. Formulir</label>
            <div class="controls">:
            <input type="text" name="no_formulir" class="input-medium" required="true" placeholder="No Formulir">
            </div>
        </div> 
        <div class="control-group">
            <label class="control-label">Nama Lengkap</label>
            <div class="controls">:
            <input type="text" name="nama_mhs" class="input-xlarge" required="true" placeholder="Isi Nama Lengkap">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Kode Prodi</label>
            <div class="controls">:
            <select name="kode_prodi" size="1" required="true">
                    <option value="811">811 - Teknik Sipil</option>
                    <option value="812">812 - Teknik Elektro</option>
                    <option value="813">813 - Teknik Mesin</option>
                    <option value="814">814 - Teknik Arsitektur</option>
                    <option value="815">815 - Teknik Industri</option>
                    <option value="821">821 - Agroteknologi</option>
                    <option value="822">822 - Agribisnis</option>
                    <option value="832">832 - Manajemen</option>
                    <option value="833">833 - Akuntansi</option>
                    <option value="840">840 - Hukum</option>
                    <option value="851">851 - Studi Kepemerintahan</option>
                    <option value="852">852 - Administrasi Publik</option>
                    <option value="853">853 - Ilmu Komunikasi</option>
                    <option value="860">860 - Psikologi</option>
                    <option value="870">870 - Biologi</option>
                    <option value="801">801 - Magister Administrasi Publik</option>
                    <option value="802">802 - Magister Agribisnis</option>
                    <option value="803">803 - Magister Hukum</option>
                    <option value="804">804 - Magister Psikologi</option>
                </select>
            </div>
        </div> 
        <div class="control-group">
            <label class="control-label">Fakultas</label>
            <div class="controls">:
            <select name="fakultas" size="1" required="true">
                <option value="">----</option>
                <option value="PSIKOLOGI">PSIKOLOGI</option>
                <option value="EKONOMI">EKONOMI</option>
                <option value="TEKNIK">TEKNIK</option>
                <option value="HUKUM">HUKUM</option>
                <option value="ISIPOL">ISIPOL</option>
                <option value="BIOLOGI">BIOLOGI</option>
                <option value="PERTANIAN">PERTANIAN</option>
            </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Program Studi</label>
            <div class="controls">:
            <select name="prodi" size="1" required="true">
                <option value="">----</option>
                <option value="PSIKOLOGI">PSIKOLOGI</option>
                <option value="AKUNTANSI">AKUNTANSI</option>
                <option value="MANAJEMEN">MANAJEMEN</option>
                <option value="SIPIL">SIPIL</option>
                <option value="ELEKTRO">ELEKTRO</option>
                <option value="MESIN">MESIN</option>
                <option value="INDUSTRI">INDUSTRI</option>
                <option value="ARSITEKTUR">ARSITEKTUR</option>
                <option value="HUKUM">HUKUM</option>
                <option value="ILMU KOMUNIKASI">ILMU KOMUNIKASI</option>
                <option value="STUDI KEPEMERINTAHAN">STUDI KEPEMERINTAHAN</option>
                <option value="ADMINISTRASI PUBLIK">ADMINISTRASI PUBLIK</option>
                <option value="BIOLOGI">BIOLOGI</option>
                <option value="AGROTEKNOLOGI">AGROTEKNOLOGI</option>
                <option value="AGRIBISNIS">AGRIBISNIS</option>
                <option value="MAGISTER ADMINISTRASI PUBLIK">MAGISTER ADMINISTRASI PUBLIK</option>
                <option value="MAGISTER AGRIBISNIS">MAGISTER AGRIBISNIS</option>
                <option value="MAGISTER HUKUM">MAGISTER HUKUM</option>
                <option value="MAGISTER PSIKOLOGI">MAGISTER PSIKOLOGI</option>
            </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Alamat</label>
            <div class="controls">:
            <input type="text" name="alamat_mhs" class="input-xlarge" required="true" placeholder="Isi Alamat">
            </div>
        </div>
        <!--
        <span class="text-warning"><h4>Data Login Peserta TPA</h4><hr></span>
        <div class="control-group">
            <label class="control-label">Username</label>
            <div class="controls">:
            <input type="text" name="username" class="input-large" required="true" placeholder="Isi Username">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Password</label>
            <div class="controls">:
            <input name="password" type="password"  class="input-medium" required="true" placeholder="Isi Password">
            </div>
        </div>
    -->
    <div class="form-action">
            <div class="controls">
             <input name="submit" type="submit" value="Submit" class="btn btn-primary">
            </div>
        </div>
        </form>
    </div>
</body>
</html>
 
       