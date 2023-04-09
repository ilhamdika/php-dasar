<?php
require 'functions.php';

if ( isset($_POST["submit"]) ){


	//cek data ditambah atau tidak
	if (tambah($_POST) > 0){
		echo "
		<script>
			alert ('Data berhasil');
			document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert ('Data gagal');
			document.location.href = 'index.php';
		</script>
		";

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah data mahasiswa</title>
</head>
<body>
	<h1>Tambah data mahasiswa</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="nrp"> NRP :</label>
				<input type="text" name="nrp" id="nrp">
			</li>
			<li>
				<label for="nama"> Nama :</label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="email"> Email :</label>
				<input type="text" name="email" id="email">
			</li>
			<li>
				<label for="jurusan"> Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan">
			</li>
			<li>
				<label for="gambar"> Gambar :</label>
				<input type="text" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Save</button>
			</li>
		</ul>

	</form>



</body>
</html>