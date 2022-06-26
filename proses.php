<?php
include 'koneksi.php';
if(isset($_POST['aksi'])){
	if($_POST['aksi'] == "add"){
		
		$nim = $_POST['nim_mahasiswa'];
		$nama_mahasiswa = $_POST['nama_mahasiswa'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$foto_mahasiswa = $_FILES['foto_mahasiswa']['name'];
		$alamat = $_POST['alamat'];

		$dir = "img/";
		$tmpfile = $_FILES['foto_mahasiswa']['tmp_name'];

		move_uploaded_file($tmpfile, $dir.$foto_mahasiswa);

		//die();

		$query = "INSERT INTO tb_mahasiswa value(null, '$nim', '$nama_mahasiswa', '$jenis_kelamin', '$foto_mahasiswa', '$alamat')";
		$sql = mysqli_query($conn, $query);

		if($sql){
			header("location: index.php");
			//echo "Data berhasil Ditambahkan <a href='index.php'>[Home]</a>";
		} else {
			echo $query;
		} 

		//echo $nim." | ".$nama_mahasiswa." | ".$jenis_kelamin." | ".$foto_mahasiswa." | ".$alamat;
		//echo "<br>Tambah Data <a href='index.php'>[Home]</a>";
		} else if($_POST['aksi'] == "edit"){
		echo "Edit Data <a href='index.php'>[Home]</a>";
		//var_dump($_POST); 

		$id_mahasiswa = $_POST['id_mahasiswa'];
		$nim = $_POST['nim_mahasiswa'];
		$nama_mahasiswa = $_POST['nama_mahasiswa'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$alamat = $_POST['alamat'];

		$queryShow = "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa = '$id_mahasiswa';";
		$sqlShow = mysqli_query($conn, $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		if($_FILES['foto_mahasiswa']['name'] == ""){
			$foto_mahasiswa = $result['foto_mahasiswa'];
		} else {
			$foto_mahasiswa = $_FILES['foto_mahasiswa']['name'];
			unlink("img/" .$result['foto_mahasiswa']);
			move_uploaded_file($_FILES['foto_mahasiswa']['tmp_name'], 'img/'.$_FILES['foto_mahasiswa']['name']);
		}

		$query = "UPDATE tb_mahasiswa SET nim='$nim', nama_mahasiswa='$nama_mahasiswa', jenis_kelamin='$jenis_kelamin', alamat='$alamat' foto_mahasiswa='$foto_mahasiswa' WHERE id_mahasiswa='$id_mahasiswa';";
		$sql= mysqli_query($conn, $query);
 

	}
}
	if(isset($_GET['hapus'])){
	$id_mahasiswa = $_GET['hapus'];
		$queryShow = "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa = '$id_mahasiswa';";
		$sqlShow = mysqli_query($conn, $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		//var_dump($result);
		
		unlink("img/" .$result['foto_mahasiswa']);
		

		$query = "DELETE FROM tb_mahasiswa WHERE id_mahasiswa = '$id_mahasiswa';";
		$sql = mysqli_query($conn, $query);

		if($sql){
			header("location: index.php");
			//echo "Data berhasil Ditambahkan <a href='index.php'>[Home]</a>";
		} else {
			echo $query;
		} 

		//echo "Hapus Data <a href='index.php'>[Home]</a>";
	}
?>