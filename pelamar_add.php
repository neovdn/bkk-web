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
		$q_simpan = "insert into pelamar (nama, email, jurusan, alamat, no_hp, tahun_lulus) values('".$_POST["nama"]."','".$_POST["email"]."','".$_POST["jurusan"]."','".$_POST["alamat"]."','".$_POST["no_hp"]."','".$_POST["tahun_lulus"]."')";
		$simpan = mysqli_query($conn,$q_simpan);

		header('Location: pelamar_read.php');
	}
?>
    <header>
		<a id="logo" href="beranda.html">BKK SMK SG</a>
		<nav>
			<ul>
			<li><a href="lowongan_read.php"  class="link">Data Lowongan</a></li>
			<li><a href="pelamar_read.php" id="current" class="link">Data Pelamar</a></li>
			<li><a href="lamaran_read.php" class="link">Data Lamaran</a></li>
			</ul>
		</nav>
    </header>
	<br>
	<br>
	<br>
	<br>
	<br>
<form class="whatsapp-form" name='pelamar' method='POST' action='pelamar_add.php'>
	<div class="datainput">
		<input class="validate" id="wa_name" name="nama" required="" type="text" value=''/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Nama</label>
	</div>
	<div class="datainput">
		<input class="validate" id="wa_email" name="email" required="" type="text" value=''/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Email</label>
	</div>
	<div class="datainput">
		<input class="validate" id="wa_email" name="jurusan" required="" type="text" value=''/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Jurusan</label>
	</div>
	<div class="datainput">
		<input class="validate" id="wa_email" name="alamat" required="" type="text" value=''/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Alamat</label>
	</div>
	<div class="datainput">
		<input class="validate" id="wa_email" name="no_hp" required="" type="number" value=''/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Nomor HP</label>
	</div>
	<div class="datainput">
		<input class="validate" id="wa_email" name="tahun_lulus" required="" type="number" value=''/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Tahun Lulus</label>
	</div>
	<div class="button">
        <span><input class="button" type="submit" name="tombol_simpan" value="Simpan" style="background: none; color: white; font-family: 'Maven Pro'; text-decoration: none;"></span>
    </div>
</form>
</body>
</html>