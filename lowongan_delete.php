<?php
	error_reporting(0);
	//---------------- koneksi -------//
	$conn = mysqli_connect("localhost","root","","bkk_smksg");
	
	$delete="delete from lowongan where id=".$_GET["id"]."";
	$query = mysqli_query($conn, $delete);
	
	header("Location: lowongan_read.php");
?>