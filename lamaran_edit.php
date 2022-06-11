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
        $q_update = "update lamaran set id_pelamar='" . $_POST["id_pelamar"] . "',id_loker='" . $_POST["id_loker"] . "',waktu_lamar='" . $_POST["waktu_lamar"] . "' where id='" . $_GET["id"] . "'";
        $update = mysqli_query($conn, $q_update);

        header("Location: lamaran_read.php");
    }

    $view = "SELECT * FROM lamaran where id=" . $_GET["id"] . "";
    $query = mysqli_query($conn, $view);
    $data = mysqli_fetch_array($query);
    ?>
	<header>
		<a id="logo" href="beranda.html">BKK SMK SG</a>
		<nav>
			<ul>
			<li><a href="lowongan_read.php" class="link">Data Lowongan</a></li>
			<li><a href="pelamar_read.php" class="link">Data Pelamar</a></li>
			<li><a href="lamaran_read.php" id="current" class="link">Data Lamaran</a></li>
			</ul>
		</nav>
    </header>
	<br>
	<br>
	<br>
	<br>
	<br>
    <form class="whatsapp-form" name='lamaran' method='POST' action='lamaran_edit.php?id=<?php echo $data["id"]; ?>'>
		<div class="datainput">
                    <select id="wa_select" name='id_pelamar'>
                    <option hidden="hidden" selected="selected" value=''>Nama Pelamar</option>
                    <?php
                        $query_pelamar = mysqli_query($conn, 'SELECT * FROM pelamar');
                        while ($data_pelamar = mysqli_fetch_array($query_pelamar)) 
                        {
                    ?>
                     <option value='<?php echo $data_pelamar["id"]; ?>' <?php if($data_pelamar["id"]==$data["id_pelamar"]){echo "selected";} ?>><?php echo $data_pelamar["nama"]; ?></option>
                    <?php
                        }
                    ?>
                    </select>
		</div>
        <div class="datainput">
                    <select id="wa_select" name='id_loker'>
                    <option hidden="hidden" selected="selected" value=''>Nama Perusahaan</option>
                    <?php
                        $query_lowongan = mysqli_query($conn, 'SELECT * FROM lowongan');
                        while ($data_lowongan = mysqli_fetch_array($query_lowongan)) 
                        {
                    ?>
                    <option value='<?php echo $data_lowongan["id"]; ?>' <?php if($data_lowongan["id"]==$data["id_loker"]){echo "selected";} ?>><?php echo $data_lowongan["nama_perusahaan"]; ?></option>
                    <?php
                        }
                    ?>
                    </select>
		</div>
		<div class="datainput">
			<div>Waktu Lamar :</div>
			<input class="validate" id="wa_email" name="waktu_lamar" required="" type="date" value='<?php echo $data["waktu_lamar"]; ?>'/>
			<span class="highlight"></span><span class="bar"></span>
			<label></label>
		</div>
		<div class="button">
        	<span><input class="button" type="submit" name="tombol_simpan" value="Simpan" style="background: none; color: white; font-family: 'Maven Pro'; text-decoration: none;"></span>
    	</div>
    </form>
</body>

</html>