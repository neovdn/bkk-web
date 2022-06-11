<?php
	error_reporting(0);
	//---------------- koneksi -------//
	$conn = mysqli_connect("localhost","root","","bkk_smksg");
	
	$delete="delete from pelamar where id=".$_GET["id"]."";
	$query = mysqli_query($conn, $delete);
	
	header("Location: pelamar_read.php");
?>