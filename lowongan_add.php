<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/navigasi.css">
	<link rel="stylesheet" href="css/formwa.css">
	<link href="css/hover.css" rel="stylesheet">
    <title>Add</title>
</head>
<body>
<?php
    error_reporting(0);
	//---------------- koneksi -------//
	$conn = mysqli_connect("localhost","root","","bkk_smksg");

	//----------------- Untuk memasukkan data ke table database --------//
	if($_POST["tombol_simpan"])
	{
		$q_simpan = "insert into lowongan (nama_perusahaan, posisi, deskripsi, kualifikasi, tgl_upload, deadline) values('".$_POST["nama_perusahaan"]."','".$_POST["posisi"]."','".$_POST["deskripsi"]."','".$_POST["kualifikasi"]."','".$_POST["tgl_upload"]."','".$_POST["deadline"]."')";
		$simpan = mysqli_query($conn,$q_simpan);

		header('Location: lowongan_read.php');
	}
?>
    <header>
		<a id="logo" href="beranda.html">BKK SMK SG</a>
		<nav>
			<ul>
			<li><a href="lowongan_read.php" id="current" class="link">Data Lowongan</a></li>
			<li><a href="pelamar_read.php" class="link">Data Pelamar</a></li>
			<li><a href="lamaran_read.php" class="link">Data Lamaran</a></li>
			</ul>
		</nav>
    </header>
	<br>
	<br>
	<br>
	<br>
	<br>
<form class="whatsapp-form" name='lowongan' method='POST' action='lowongan_add.php'>
	<div class="datainput">
		<input class="validate" id="wa_name" name="nama_perusahaan" required="" type="text" value=''/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Nama Perusahaan</label>
	</div>
	<div class="datainput">
		<input class="validate" id="wa_email" name="posisi" required="" type="text" value=''/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Posisi</label>
	</div>
		<div class="datainput">
		<textarea name="deskripsi" id='wa_textarea' placeholder='' maxlength='3000' row='1' required=""></textarea>
		<span class="highlight"></span><span class="bar"></span>
		<label>Deskripsi</label>
    </div>
	</div>
		<div class="datainput">
		<textarea name="kualifikasi" id='wa_textarea' placeholder='' maxlength='3000' row='1' required=""></textarea>
		<span class="highlight"></span><span class="bar"></span>
		<label>Kualifikasi</label>
    </div>
	<div class="datainput">
		<div>Tanggal Upload :</div>
		<input class="validate" id="wa_email" name="tgl_upload" required="" type="date" value=''/>
		<span class="highlight"></span><span class="bar"></span>
		<label></label>
	</div>
	<div class="datainput">
		<div>Deadline :</div>
		<input class="validate" id="wa_email" name="deadline" required="" type="date" value=''/>
		<span class="highlight"></span><span class="bar"></span>
		<label></label>
	</div>
	<div class="button">
        <span><input class="button" type="submit" name="tombol_simpan" value="Simpan" style="background: none; color: white; font-family: 'Maven Pro'; text-decoration: none;"></span>
    </div>
</form>
</body>
</html>