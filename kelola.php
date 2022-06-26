<!DOCTYPE html>

<?php
	include 'koneksi.php';

					$id_mahasiswa = '';
					$nim_mahasiswa = '';
					$nama_mahasiswa = '';
					$jenis_kelamin = '';
					$alamat = '';

					IF(isset($_GET['edit'])){
						$id_mahasiswa = $_GET['edit'];

						$query = "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa = '$id_mahasiswa';";
						$sql = mysqli_query($conn, $query);

						$result = mysqli_fetch_assoc($sql);
						
						$nim_mahasiswa = $result['nim'];
						$nama_mahasiswa = $result['nama_mahasiswa'];
						$jenis_kelamin = $result['jenis_kelamin'];
						$alamat = $result['alamat'];

						//var_dump($result);
						//die();
					} 

			?>
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
	<nav class="navbar mb-4" style="background-color: #e3f2fd;">
<!-- Navbar content -->
  	<div class="container-fluid">
    <a class="navbar-brand" href="#">
      Sistem Akademik (SIAKAD)
    </a>
  </div>
	</nav>
	<div class="container-fluid">
	<figure class="text-center">
  <blockquote class="blockquote">
    <p>Form Tambah Data</p>
  </blockquote>
</figure>
</div>
		<div class="container">
		<form method="POST" action="proses.php" enctype="multipart/form-data">
		<input type="hidden" value="<?php echo $id_mahasiswa; ?>" name="id_mahasiswa">
		<div class="mb-3 row">
    <label for="nim" class="col sm-2 col-form-label">
    NIM</label>
    <div class="col-sm-10">
    <input required type="text" name="nim_mahasiswa" class="form-control" id="nim" placeholder="ex: 111122" value="<?php echo $nim_mahasiswa;?>">
  </div>
	</div>
	
	<div class="mb-3 row">
    <label for="nama_mahasiswa" class="col sm-2 col-form-label">
    Nama Mahasiswa</label>
    <div class="col-sm-10">
    <input required type="text" name="nama_mahasiswa" class="form-control" id="nama_mahasiswa" placeholder="ex: Apsyah Paradila" value="<?php echo $nama_mahasiswa;?>">
  </div>
	</div>
	
	<div class="mb-3 row">
    <label for="jenis_kelamin" class="col sm-2 col-form-label">
    Jenis Kelamin</label>
    <div class="col-sm-10">
    		<select required id="jenis_kelamin" name="jenis_kelamin" class="form-select">
			  <option <?php if($jenis_kelamin == 'Perempuan'){ echo "selected";} ?> value="Perempuan">Perempuan</option>
			  <option <?php if($jenis_kelamin == 'Laki-laki'){ echo "selected";} ?> value="Laki-laki">Laki-Laki</option>
			</select>
  </div>
	</div>

	<div class="mb-3 row">
    <label for="foto_mahasiswa" class="col sm-2 col-form-label">
    Foto Mahasiswa</label>

    <div class="col-sm-10 mb-3">
    <input <?php if(!isset($_GET['edit'])){ echo "required";} ?> class="form-control" type="file" name="foto_mahasiswa" id="foto_mahasiswa" accept="image/*">
	</div>
	
	<div class="mb-3 row">
    <label for="alamat" class="col sm-2 col-form-label">
    Alamat Lengkap</label>
    <div class="col-sm-10">
    <textarea required class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat;?></textarea>
	</div>
</div>

	<div class="mb-3 row">
		<div class="col col-form-label">
			<?php
					IF(isset($_GET['edit'])){
			?>
			<button type="sumbmit" name="aksi" value="edit" class="btn btn-primary">
		<i class="fa fa-floppy-o" aria-hidden="true"></i>
		Simpan Perubahan
		</button>
		<?php
				} else {
		?>
					<button type="sumbmit" name="aksi" value="add" class="btn btn-primary">
					<i class="fa fa-floppy-o" aria-hidden="true"></i>
					Tambahkan
					</button>
		<?php
				}
		?>
		<a href="index.php" type="button" class="btn btn-danger">
		<i class="fa fa-reply" aria-hidden="true"></i>
		Batal
		</a>
	</div>
		</form>
</div>
</body>
</html>