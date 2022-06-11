<?php
    error_reporting(0);
	//---------------- koneksi -------//
	$conn = mysqli_connect("localhost","root","","bkk_smksg");	
?>
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navigasi.css" rel="stylesheet">
    <link href="css/hover.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">
    <title>Read</title>

    <style>
        form, table {
            margin: 0px;
            padding: 125px;
        }
    </style>
</head>
<body>
    <header class="bg-dark bg-opacity-25">
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
    <form name='lowongan' method='POST' action='lowongan_read.php'>
        <div class="input-group">
            <input type="text" name='keyword' value='<?php echo $_POST["keyword"]; ?>' class="form-control" placeholder="Cari data">
            <div class="input-group-append">
            <input class="btn btn-secondary" name="tombol_cari" type="submit">
                <i class="bi bi-search" width="50px" height="50px" fill="currentColor"></i>
            </input>
            </div>
        </div>
        <br>
        <br>
        <table border="1" class="table table-hover table-striped text-center" style="width: auto; position">
    </form>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>Posisi</th>
                <th>Deskripsi</th>
                <th>Kualifikasi</th>
                <th>Tanggal Upload</th> 
                <th>Deadline</th>
                <th></th> 
                <th></th>
            </tr>
        </thead>
            <?php
                if($_POST["keyword"])
                {
                    $sql="where nama_perusahaan like '%".$_POST["keyword"]."%' or posisi like '%".$_POST["keyword"]."%' or deskripsi like '%".$_POST["keyword"]."%' or kualifikasi like '%".$_POST["keyword"]."%' or tgl_upload like '%".$_POST["keyword"]."%' or deadline like '%".$_POST["keyword"]."%'";
                }
                $query = mysqli_query($conn, "SELECT * FROM lowongan ".$sql."");
                while ($data = mysqli_fetch_array($query))  
                {
                    $no++;
                ?>
            <tr>
                <td><?php echo  $no?></td>
                <td><?php echo $data['nama_perusahaan'] ?></td>
                <td><?php echo $data['posisi'] ?></td>
                <td><?php echo $data['deskripsi'] ?></td>
                <td><?php echo $data['kualifikasi'] ?></td>
                <td><?php echo $data['tgl_upload'] ?></td>
                <td><?php echo $data['deadline'] ?></td>
                <td><a style="text-decoration: none; color: blueviolet;" href="lowongan_edit.php?id=<?php echo $data['id']; ?>">Edit</a></td>
                <td><a style="text-decoration: none; color: blueviolet;" href="lowongan_delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
    <div class="button">
        <span><a href="lowongan_add.php" style="color: white; font-family: 'Maven Pro'; text-decoration: none;">Tambah Data</a></span>
    </div>
</body>
</html>