<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/navigasi.css">
	<link rel="stylesheet" href="css/formwa.css">
	<link href="css/hover.css" rel="stylesheet">
    <title>Edit</title>
</head>

<body>
    <?php
    error_reporting(0);
    //---------------- koneksi -------//
    $conn = mysqli_connect("localhost", "root", "", "bkk_smksg");

    //----------------- insert --------//
    if ($_POST["tombol_simpan"]) {
        $q_update = "update pelamar set nama='" .$_POST["nama"] ."',email='" .$_POST["email"] . "',jurusan='" .$_POST["jurusan"] . "',alamat='" .$_POST["alamat"] . "',no_hp='" .$_POST["no_hp"] . "',tahun_lulus='" .$_POST["tahun_lulus"] . "' where id='" . $_GET["id"] . "'";
        $update = mysqli_query($conn, $q_update);

        header("Location: pelamar_read.php");
    }

    $view = "SELECT * FROM pelamar where id=".$_GET["id"]."";
    $query = mysqli_query($conn, $view);
    $data = mysqli_fetch_array($query);
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
    <form class="whatsapp-form" name='pelamar' method='POST' action='pelamar_edit.php?id=<?php echo $data["id"]; ?>'>
	<div class="datainput">
		<input class="validate" id="wa_name" name="nama" required="" type="text" value='<?php echo $data["nama"]; ?>'/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Nama</label>
	</div>
	<div class="datainput">
		<input class="validate" id="wa_email" name="email" required="" type="text" value='<?php echo $data["email"]; ?>'/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Email</label>
	</div>
    <div class="datainput">
		<input class="validate" id="wa_email" name="jurusan" required="" type="text" value='<?php echo $data["jurusan"]; ?>'/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Jurusan</label>
	</div>
	<div class="datainput">
		<input class="validate" id="wa_email" name="alamat" required="" type="text" value='<?php echo $data["alamat"]; ?>'/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Alamat</label>
	</div>
	<div class="datainput">
		<input class="validate" id="wa_email" name="no_hp" required="" type="number" value='<?php echo $data["no_hp"]; ?>'/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Nomor HP</label>
	</div>
	<div class="datainput">
		<input class="validate" id="wa_email" name="tahun_lulus" required="" type="number" value='<?php echo $data["tahun_lulus"]; ?>'/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Tahun Lulus</label>
	</div>
	<div class="button">
        <span><input class="button" type="submit" name="tombol_simpan" value="Simpan" style="background: none; color: white; font-family: 'Maven Pro'; text-decoration: none;"></span>
    </div>
</form>
</body>

</html>