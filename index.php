<?php
	include 'koneksi.php';
	$query = "SELECT * FROM tb_mahasiswa;";
	$sql = mysqli_query($conn, $query);
	$no = 0;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

	<title>sistem_akademik</title>
</head>
<body>
	<nav class="navbar" style="background-color: #e3f2fd;">
<!-- Navbar content -->
  	<div class="container-fluid">
		    		<a class="navbar-brand" href="#">
		      Sistem Akademik (SIAKAD)
		    	</a>
		 		</div>
			</nav>
		<!-- judul -->
			<div class="container-fluid">
			<figure class="text-center">
		  <blockquote class="blockquote">
		    <p>Database Mahasiswa</p>
		  </blockquote>
		  <figcaption class="blockquote-footer">
		    Perguruan Tinggi <cite title="Source Title">Universitas Pamulang</cite>
		  </figcaption>
		</figure>
		<!-- Tombol + Tambah Data -->
			<a href="kelola.php" type="button" class="btn btn-primary mb-3">
			<i class="fa fa-plus-square" aria-hidden="true"></i>
			Tambah Data</a>
		<!-- Membuat table -->
			<div class="table-responsive">
		  	<table class="table align-middle table-hover">
		    <thead>
		    	<tr>
		    	<th><center>No.</center></th>
		    	<th>NIM</th>
		    	<th>Nama Mahasiswa</th>
		    	<th>Jenis Kelamin</th>
		    	<th>Foto Mahasiswa</th>
		    	<th>Alamat</th>
		    	<th>Aksi</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	<?php
		    			while($result = mysqli_fetch_assoc($sql)){
		    	?>
		    	<tr>
		    		<td><center>
		    		<?php echo ++$no; ?>.
		    	</center></td>
		    		<td>
		    		<?php echo $result['nim']; ?>
		    		</td>
		    		<td>
		    			<?php echo $result['nama_mahasiswa']; ?>
		    		</td>
		    		<td>
		    			<?php echo $result['jenis_kelamin']; ?>
		    		</td>
		    		<td><img src="img/<?php echo $result['foto_mahasiswa']; ?>" style="width: 120px"></td>
		    		<td>
		    			<?php echo $result['alamat']; ?>
		    		</td>
		    		<td>
		    			<a href="kelola.php?edit=<?php echo $result['id_mahasiswa']; ?>" type="button" class="btn btn-outline-primary btn-sm">
		    				<i class="fa fa-pencil"></i>Edit</a>
		    			
		    			<a href="proses.php?hapus=<?php echo $result['id_mahasiswa']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin untuk menghapus data tersebut?')">
		    				<i class="fa fa-trash"></i>
		    			Hapus</a>
		    		</td>
		    	</tr>
		    	<?php
		    			}
		   	 ?>
		    </tbody>
		 	</table>
			</div>
    	</div>
</body>
</html>