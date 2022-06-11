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
        $q_update = "update lowongan set nama_perusahaan='" .$_POST["nama_perusahaan"] ."',posisi='" .$_POST["posisi"] . "',deskripsi='" .$_POST["deskripsi"] . "',kualifikasi='" .$_POST["kualifikasi"] . "',tgl_upload='" .$_POST["tgl_upload"] . "',deadline='" .$_POST["deadline"] . "' where id='" . $_GET["id"] . "'";
        $update = mysqli_query($conn, $q_update);

        header("Location: lowongan_read.php");
    }

    $view = "SELECT * FROM lowongan where id=".$_GET["id"]."";
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
    <form class="whatsapp-form" name='lowongan' method='POST' action='lowongan_edit.php?id=<?php echo $data["id"]; ?>'>
	<div class="datainput">
		<input class="validate" id="wa_name" name="nama_perusahaan" required="" type="text" value='<?php echo $data["nama_perusahaan"]; ?>'/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Nama Perusahaan</label>
	</div>
	<div class="datainput">
		<input class="validate" id="wa_email" name="posisi" required="" type="text" value='<?php echo $data["posisi"]; ?>'/>
		<span class="highlight"></span><span class="bar"></span>
		<label>Posisi</label>
	</div>
		<div class="datainput">
		<textarea name="deskripsi" id='wa_textarea' placeholder='' maxlength='3000' row='1' required=""><?php echo $data["deskripsi"]; ?></textarea>
		<span class="highlight"></span><span class="bar"></span>
		<label>Deskripsi</label>
    </div>
	</div>
		<div class="datainput">
		<textarea name="kualifikasi" id='wa_textarea' placeholder='' maxlength='3000' row='1' required=""><?php echo $data["kualifikasi"]; ?></textarea>
		<span class="highlight"></span><span class="bar"></span>
		<label>Kualifikasi</label>
    </div>
	<div class="datainput">
		<div>Tanggal Upload :</div>
		<input class="validate" id="wa_email" name="tgl_upload" required="" type="date" value='<?php echo $data["tgl_upload"]; ?>'>
		<span class="highlight"></span><span class="bar"></span>
		<label></label>
	</div>
	<div class="datainput">
		<div>Deadline :</div>
		<input class="validate" id="wa_email" name="deadline" required="" type="date" value='<?php echo $data["deadline"]; ?>'>
		<span class="highlight"></span><span class="bar"></span>
		<label></label>
	</div>
	<div class="button">
        <span><input class="button" type="submit" name="tombol_simpan" value="Simpan" style="background: none; color: white; font-family: 'Maven Pro'; text-decoration: none;"></span>
    </div>
</form>
</body>
</html>