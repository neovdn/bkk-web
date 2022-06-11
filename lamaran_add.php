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
	if ($_POST["tombol_simpan"]) {
        $q_update = "update lamaran set id_pelamar='" . $_POST["id_pelamar"] . "',id_loker='" . $_POST["id_loker"] . "',waktu_lamar='" . $_POST["waktu_lamar"] . "' where id='" . $_GET["id"] . "'";
        $update = mysqli_query($conn, $q_update);

        header("Location: lamaran1_read.php");
    }
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
<form class="whatsapp-form" name='lamaran' method='POST' action='lamaran_add.php'>
	<div class="datainput">
	<select id="wa_select" name='id_pelamar'>
		<option hidden="hidden" selected="selected" value=''>Nama Pelamar</option>
		<?php
		$query = mysqli_query($conn, 'SELECT * FROM pelamar');
		while ($data = mysqli_fetch_array($query))
		{
			?>
			<option value='<?php echo $data["id"]; ?>'><?php echo $data["nama"]; ?></option>
			<?php
		}
		?>
		</select>
	</div>
	<div class="datainput">
	<select id="wa_select" name='id_loker'>
		<option hidden="hidden" selected="selected" value=''>Nama Perusahaan</option>
		<?php
		$query = mysqli_query($conn, 'SELECT * FROM lowongan');
		while ($data = mysqli_fetch_array($query))
		{
			?>
			<option value='<?php echo $data["id"]; ?>'><?php echo $data["nama_perusahaan"]; ?></option>
			<?php
		}
		?>
		</select>
	</div>
	<div class="datainput">
		<div>Waktu Lamar :</div>
		<input class="validate" id="wa_email" name="waktu_lamar" required="" type="date" value=''/>
		<span class="highlight"></span><span class="bar"></span>
		<label></label>
	</div>
	<div class="button">
        <span><input class="button" type="submit" name="tombol_simpan" value="Simpan" style="background: none; color: white; font-family: 'Maven Pro'; text-decoration: none;"></span>
    </div>
</table>
</form>
</body>
</html>