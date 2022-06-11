<?php 
// koneksi database
error_reporting(0);
        //---koneksi---//
        $conn = mysqli_connect("localhost","root","","bkk_smksg");

// menangkap data id yang di kirim dari url
$delete="delete from lamaran where id=".$_GET["id"]."";

$query=mysqli_query($conn,$delete);


// menghapus data dari database
mysqli_query($koneksi,"delete from bkk_smksg where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:lamaran_read.php");

?>